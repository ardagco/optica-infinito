<?php
declare(strict_types=1);

/**
 * ÓPTICA INFINITO — Procesamiento de Solicitudes de Cita Optométrica
 * Seguridad: CSRF, Honeypot, Rate Limiting, Sanitización y Anti-Header Injection.
 */

require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/mailer.php';

$isJsonRequest = str_contains(strtolower((string)($_SERVER['HTTP_ACCEPT'] ?? '')), 'application/json')
    || strtolower((string)($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '')) === 'xmlhttprequest';

function respond_cita(bool $success, string $message, int $httpCode = 200, array $extra = []): never
{
    global $isJsonRequest;
    if ($isJsonRequest) {
        http_response_code($httpCode);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode(array_merge([
            'success' => $success,
            'message' => $message,
        ], $extra), JSON_UNESCAPED_UNICODE);
        exit;
    }

    $_SESSION['form_flash'] = [
        'type'    => $success ? 'success' : 'danger',
        'message' => $message,
    ];
    $referer = sanitize_header_value((string)($_SERVER['HTTP_REFERER'] ?? site_url('contacto.php')));
    header('Location: ' . $referer);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond_cita(false, 'Método no permitido.', 405);
}

// 1. Verificar Honeypot Antispam
$honeypot = trim((string)($_POST['website_url'] ?? ''));
if ($honeypot !== '') {
    // Responder éxito silencioso a bots automatizados sin enviar correo
    respond_cita(true, 'Solicitud recibida correctamente.', 200);
}

// 2. Verificar Token CSRF
$csrf = (string)($_POST['csrf_token'] ?? '');
if (!verify_csrf_token($csrf)) {
    respond_cita(false, 'La sesión del formulario expiró por seguridad. Por favor recarga la página e inténtalo de nuevo.', 403);
}

// 3. Verificar límite de envíos por IP
if (!check_rate_limit('form_citas', 6, 600)) {
    respond_cita(false, 'Has realizado demasiadas solicitudes en pocos minutos. Por favor comunícate directamente al 442 221 7851.', 429);
}

// 4. Sanitizar y Validar Entradas
$nombre      = sanitize_text($_POST['nombre'] ?? '', 120);
$telefono    = sanitize_text($_POST['telefono'] ?? '', 25);
$correo      = sanitize_text($_POST['correo'] ?? '', 150);
$servicio    = sanitize_text($_POST['servicio'] ?? '', 120);
$sucursal    = sanitize_text($_POST['sucursal'] ?? '', 120);
$fecha       = sanitize_text($_POST['fecha'] ?? '', 20);
$horario     = sanitize_text($_POST['horario'] ?? '', 80);
$comentarios = sanitize_textarea($_POST['comentarios'] ?? '', 1000);

$errors = [];

if (mb_strlen($nombre, 'UTF-8') < 3) {
    $errors[] = 'Ingresa tu nombre completo.';
}

$digitsOnly = preg_replace('/\D+/', '', $telefono);
if (strlen((string)$digitsOnly) < 10) {
    $errors[] = 'Ingresa un número telefónico válido de al menos 10 dígitos.';
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Ingresa un correo electrónico válido.';
}

$allowedServices = [
    'Examen visual',
    'Lentes de contacto',
    'Lentes express',
    'Salud visual empresarial',
    'Entregas a domicilio',
    'Protección visual industrial',
];
if ($servicio === '') {
    $errors[] = 'Selecciona el servicio de tu interés.';
}

if ($sucursal === '') {
    $errors[] = 'Selecciona la sucursal de tu preferencia.';
}

if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $fecha)) {
    $errors[] = 'Selecciona una fecha solicitada válida.';
}

if ($horario === '') {
    $errors[] = 'Selecciona tu horario preferido.';
}

if (!empty($errors)) {
    respond_cita(false, implode(' ', $errors), 422);
}

// 5. Construir y enviar correo a contacto@opticainfinito.com.mx
$smtpConfig = get_smtp_config();
$citasRecipient = $smtpConfig['to_citas_email'] ?: SITE_DATA['email'];
$subject = "Solicitud de Cita Web: {$nombre} ({$servicio})";
$emailRows = [
    'Destinatario de citas' => $citasRecipient,
    'Nombre completo'      => $nombre,
    'Teléfono / WhatsApp'  => $telefono,
    'Correo electrónico'   => $correo,
    'Servicio de interés'  => $servicio,
    'Sucursal solicitada'  => $sucursal,
    'Fecha solicitada'     => $fecha,
    'Horario preferido'    => $horario,
    'Comentarios'          => $comentarios !== '' ? $comentarios : 'Sin comentarios adicionales',
    'Estado de la cita'    => 'PENDIENTE DE CONFIRMACIÓN POR PERSONAL DE ÓPTICA INFINITO',
];

$htmlBody = build_email_template(
    'Nueva Solicitud de Cita en Línea',
    'Recibida desde el portal web de Óptica Infinito (' . $citasRecipient . ')',
    $emailRows,
    'Importante: Esta solicitud no representa una cita confirmada hasta que el personal de Óptica Infinito contacte al paciente para confirmar disponibilidad.'
);

$sendResult = send_optica_email($subject, $htmlBody, $correo, $nombre, [
    'type'     => 'cita',
    'to_email' => $citasRecipient,
    'servicio' => $servicio,
    'sucursal' => $sucursal,
    'fecha'    => $fecha,
    'horario'  => $horario,
    'telefono' => $telefono,
]);

$waMsg = "Hola Óptica Infinito, acabo de solicitar una cita en su sitio web a nombre de {$nombre} para {$servicio} en {$sucursal} (fecha solicitada: {$fecha}, horario: {$horario}).";

respond_cita(
    true,
    'Hemos recibido tu solicitud de cita. Recuerda que una solicitud en línea no representa una cita confirmada; nuestro equipo de Óptica Infinito se comunicará contigo a la brevedad para confirmar tu horario.',
    200,
    [
        'title'        => '¡Solicitud de cita registrada!',
        'whatsapp_url' => whatsapp_url('examen', $waMsg),
    ]
);
