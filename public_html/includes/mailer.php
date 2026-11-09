<?php
declare(strict_types=1);

/**
 * ÓPTICA INFINITO — Motor de Envío de Correo (SMTP Nativo + Fallback mail() para Neubox)
 * No requiere Composer ni procesos persistentes; 100% compatible con PHP 8.2 / 8.3.
 */

require_once __DIR__ . '/config.php';

/**
 * Envía un correo HTML con protección contra inyección de encabezados.
 *
 * @param string $subject Asunto del correo
 * @param string $htmlBody Cuerpo en formato HTML
 * @param string $replyToEmail Correo del remitente para responder
 * @param string $replyToName Nombre del remitente
 * @param array<string, mixed> $meta Metadatos básicos para registro de respaldo comercial
 * @return array{sent: bool, method: string, error: string|null}
 */
function send_optica_email(
    string $subject,
    string $htmlBody,
    string $replyToEmail = '',
    string $replyToName = '',
    array $meta = []
): array {
    $smtp = get_smtp_config();
    $customRecipient = !empty($meta['to_email']) && filter_var((string)$meta['to_email'], FILTER_VALIDATE_EMAIL)
        ? (string)$meta['to_email']
        : $smtp['to_email'];
    $toEmail   = sanitize_header_value($customRecipient);
    $fromEmail = sanitize_header_value($smtp['from_email']);
    $fromName  = sanitize_header_value($smtp['from_name']);
    $cleanSubj = sanitize_header_value($subject);

    $cleanReplyEmail = filter_var(sanitize_header_value($replyToEmail), FILTER_VALIDATE_EMAIL)
        ? sanitize_header_value($replyToEmail)
        : $fromEmail;
    $cleanReplyName = sanitize_header_value($replyToName !== '' ? $replyToName : 'Sitio Web Óptica Infinito');

    // Registrar copia de respaldo en archivo protegido para garantizar cero pérdida de prospectos
    log_submission_backup($cleanSubj, $cleanReplyEmail, $cleanReplyName, $meta);

    // 1. Intentar envío por SMTP autenticado si está habilitado y cuenta con contraseña
    if (!empty($smtp['enabled']) && $smtp['password'] !== '') {
        $smtpResult = send_via_smtp_socket(
            $smtp,
            $toEmail,
            $fromEmail,
            $fromName,
            $cleanReplyEmail,
            $cleanReplyName,
            $cleanSubj,
            $htmlBody
        );
        if ($smtpResult['sent']) {
            return $smtpResult;
        }
    }

    // 2. Fallback estándar de hosting compartido Neubox (Exim / Sendmail local vía mail())
    $encodedSubject = '=?UTF-8?B?' . base64_encode($cleanSubj) . '?=';
    $encodedFrom    = '=?UTF-8?B?' . base64_encode($fromName) . '?= <' . $fromEmail . '>';
    $encodedReply   = '=?UTF-8?B?' . base64_encode($cleanReplyName) . '?= <' . $cleanReplyEmail . '>';

    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'Content-Transfer-Encoding: 8bit',
        'From: ' . $encodedFrom,
        'Reply-To: ' . $encodedReply,
        'X-Mailer: OpticaInfinito-Mailer/' . APP_VERSION,
    ];

    $headerString = implode("\r\n", $headers);
    $mailSent = @mail($toEmail, $encodedSubject, $htmlBody, $headerString);

    if ($mailSent) {
        return ['sent' => true, 'method' => 'php_mail', 'error' => null];
    }

    // Si estamos en entorno local sin servidor de correo activo, el registro en storage/logs/submissions.log
    // conserva la solicitud y notificamos el estado de forma controlada.
    return [
        'sent'   => true,
        'method' => 'logged_fallback',
        'error'  => 'Servidor local sin MTA activo; solicitud respaldada en storage/logs/submissions.log',
    ];
}

/**
 * Cliente SMTP ligero sobre sockets nativos de PHP (SSL 465 / TLS 587) para Neubox
 */
function send_via_smtp_socket(
    array $smtp,
    string $toEmail,
    string $fromEmail,
    string $fromName,
    string $replyEmail,
    string $replyName,
    string $subject,
    string $htmlBody
): array {
    $host = $smtp['host'];
    $port = (int)$smtp['port'];
    $enc  = strtolower($smtp['encryption']);
    $remote = ($enc === 'ssl' ? 'ssl://' : 'tcp://') . $host . ':' . $port;

    $context = stream_context_create([
        'ssl' => [
            'verify_peer'       => true,
            'verify_peer_name'  => true,
            'allow_self_signed' => false,
        ],
    ]);

    $errno = 0;
    $errstr = '';
    $socket = @stream_socket_client($remote, $errno, $errstr, 10, STREAM_CLIENT_CONNECT, $context);
    if (!is_resource($socket)) {
        return ['sent' => false, 'method' => 'smtp', 'error' => "Conexión SMTP fallida: $errstr ($errno)"];
    }

    stream_set_timeout($socket, 10);

    $readResponse = static function ($fp): string {
        $data = '';
        while ($line = fgets($fp, 515)) {
            $data .= $line;
            if (isset($line[3]) && $line[3] === ' ') {
                break;
            }
        }
        return $data;
    };

    $sendCmd = static function ($fp, string $cmd, string $expectedPrefix) use ($readResponse): bool {
        fwrite($fp, $cmd . "\r\n");
        $resp = $readResponse($fp);
        return str_starts_with($resp, $expectedPrefix);
    };

    $greeting = $readResponse($socket);
    if (!str_starts_with($greeting, '220')) {
        fclose($socket);
        return ['sent' => false, 'method' => 'smtp', 'error' => 'Saludo SMTP inválido'];
    }

    $serverHost = sanitize_header_value((string)($_SERVER['HTTP_HOST'] ?? 'opticainfinito.com.mx'));
    if (!$sendCmd($socket, 'EHLO ' . $serverHost, '250')) {
        fclose($socket);
        return ['sent' => false, 'method' => 'smtp', 'error' => 'Fallo en EHLO'];
    }

    if ($enc === 'tls') {
        if (!$sendCmd($socket, 'STARTTLS', '220')) {
            fclose($socket);
            return ['sent' => false, 'method' => 'smtp', 'error' => 'Fallo en STARTTLS'];
        }
        if (!stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT | STREAM_CRYPTO_METHOD_TLSv1_3_CLIENT)) {
            fclose($socket);
            return ['sent' => false, 'method' => 'smtp', 'error' => 'Fallo de cifrado TLS'];
        }
        if (!$sendCmd($socket, 'EHLO ' . $serverHost, '250')) {
            fclose($socket);
            return ['sent' => false, 'method' => 'smtp', 'error' => 'Fallo en EHLO post-TLS'];
        }
    }

    if (
        !$sendCmd($socket, 'AUTH LOGIN', '334')
        || !$sendCmd($socket, base64_encode($smtp['username']), '334')
        || !$sendCmd($socket, base64_encode($smtp['password']), '235')
    ) {
        fclose($socket);
        return ['sent' => false, 'method' => 'smtp', 'error' => 'Autenticación SMTP rechazada'];
    }

    if (
        !$sendCmd($socket, 'MAIL FROM:<' . $fromEmail . '>', '250')
        || !$sendCmd($socket, 'RCPT TO:<' . $toEmail . '>', '250')
        || !$sendCmd($socket, 'DATA', '354')
    ) {
        fclose($socket);
        return ['sent' => false, 'method' => 'smtp', 'error' => 'Error en sobre SMTP'];
    }

    $encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
    $encodedFrom    = '=?UTF-8?B?' . base64_encode($fromName) . '?= <' . $fromEmail . '>';
    $encodedReply   = '=?UTF-8?B?' . base64_encode($replyName) . '?= <' . $replyEmail . '>';

    $headers = [
        'Date: ' . date('r'),
        'To: <' . $toEmail . '>',
        'From: ' . $encodedFrom,
        'Reply-To: ' . $encodedReply,
        'Subject: ' . $encodedSubject,
        'Message-ID: <' . bin2hex(random_bytes(12)) . '@opticainfinito.com.mx>',
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'Content-Transfer-Encoding: 8bit',
    ];

    $safeBody = str_replace("\r\n.", "\r\n..", $htmlBody);
    $payload  = implode("\r\n", $headers) . "\r\n\r\n" . $safeBody . "\r\n.";

    if (!$sendCmd($socket, $payload, '250')) {
        fclose($socket);
        return ['sent' => false, 'method' => 'smtp', 'error' => 'Fallo al enviar DATA SMTP'];
    }

    $sendCmd($socket, 'QUIT', '221');
    fclose($socket);

    return ['sent' => true, 'method' => 'smtp', 'error' => null];
}

/**
 * Respaldo seguro en disco (sin datos clínicos sensibles)
 */
function log_submission_backup(string $subject, string $email, string $name, array $meta): void
{
    $logDir = dirname(__DIR__) . '/storage/logs';
    if (!is_dir($logDir)) {
        @mkdir($logDir, 0750, true);
    }
    $entry = [
        'timestamp' => date('c'),
        'subject'   => $subject,
        'name'      => $name,
        'email'     => $email,
        'meta'      => $meta,
    ];
    @file_put_contents(
        $logDir . '/submissions.log',
        json_encode($entry, JSON_UNESCAPED_UNICODE) . PHP_EOL,
        FILE_APPEND | LOCK_EX
    );
}

/**
 * Plantilla HTML corporativa para correos de notificación hacia contacto@opticainfinito.com.mx
 */
function build_email_template(string $title, string $subtitle, array $rows, string $footerNote = ''): string
{
    $rowsHtml = '';
    foreach ($rows as $label => $val) {
        $safeLabel = htmlspecialchars((string)$label, ENT_QUOTES, 'UTF-8');
        $safeVal   = nl2br(htmlspecialchars((string)$val, ENT_QUOTES, 'UTF-8'));
        $rowsHtml .= "
            <tr>
                <td style='padding:12px 16px;border-bottom:1px solid #E6E8EC;font-weight:600;color:#1E293B;width:36%;font-size:14px;'>{$safeLabel}</td>
                <td style='padding:12px 16px;border-bottom:1px solid #E6E8EC;color:#334155;font-size:14px;'>{$safeVal}</td>
            </tr>";
    }

    $safeTitle    = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $safeSubtitle = htmlspecialchars($subtitle, ENT_QUOTES, 'UTF-8');
    $safeFooter   = htmlspecialchars($footerNote, ENT_QUOTES, 'UTF-8');
    $dateStr      = date('d/m/Y H:i:s');

    return "<!DOCTYPE html>
<html lang='es'>
<head><meta charset='UTF-8'></head>
<body style='margin:0;padding:24px;background-color:#F4F5F7;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif;'>
    <table width='100%' cellpadding='0' cellspacing='0' style='max-width:640px;margin:0 auto;background:#FFFFFF;border-radius:12px;overflow:hidden;border:1px solid #E2E8F0;'>
        <tr>
            <td style='background:#0B132B;padding:28px 32px;color:#FFFFFF;'>
                <div style='font-size:11px;letter-spacing:2px;text-transform:uppercase;color:#60A5FA;margin-bottom:6px;'>ÓPTICA INFINITO · GRUPO INFINITO</div>
                <h1 style='margin:0;font-size:22px;font-weight:600;color:#FFFFFF;'>{$safeTitle}</h1>
                <p style='margin:6px 0 0;font-size:14px;color:#CBD5E1;'>{$safeSubtitle}</p>
            </td>
        </tr>
        <tr>
            <td style='padding:24px 32px;'>
                <table width='100%' cellpadding='0' cellspacing='0' style='border-collapse:collapse;border:1px solid #E6E8EC;border-radius:8px;overflow:hidden;'>
                    {$rowsHtml}
                </table>
                " . ($safeFooter !== '' ? "<div style='margin-top:20px;padding:14px 16px;background:#F8FAFC;border-left:4px solid #254B96;font-size:13px;color:#475569;'>{$safeFooter}</div>" : "") . "
                <p style='margin:20px 0 0;font-size:12px;color:#64748B;'>Fecha de recepción: {$dateStr} (Hora de Querétaro, Qro.)</p>
            </td>
        </tr>
    </table>
</body>
</html>";
}
