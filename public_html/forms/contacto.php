<?php
declare(strict_types=1);

/**
 * ÓPTICA INFINITO — Procesamiento del Formulario de Contacto General
 * Seguridad: CSRF, Honeypot, Rate Limiting, Sanitización y Anti-Header Injection.
 */

require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/mailer.php';

$isJsonRequest = str_contains(strtolower((string)($_SERVER['HTTP_ACCEPT'] ?? '')), 'application/json')
    || strtolower((string)($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '')) === 'xmlhttprequest';

function respond_contacto(bool $success, string $message, int $httpCode = 200, array $extra = []): never
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
    respond_contacto(false, 'Método no permitido.', 405);
}

// 1. Honeypot Antispam
$honeypot = trim((string)($_POST['website_url'] ?? ''));
if ($honeypot !== '') {
    respond_contacto(true, 'Mensaje recibido correctamente.', 200);
}

// 2. Token CSRF
$csrf = (string)($_POST['csrf_token'] ?? '');
if (!verify_csrf_token($csrf)) {
    respond_contacto(false, 'La sesión del formulario expiró por seguridad. Por favor recarga la página e inténtalo de nuevo.', 403);
}

// 3. Límite de peticiones por IP
if (!check_rate_limit('form_contacto', 6, 600)) {
    respond_contacto(false, 'Has enviado demasiados mensajes en pocos minutos. Por favor comunícate al 442 221 7851.', 429);
}

// 4. Sanitización y Validación
$nombre   = sanitize_text($_POST['nombre'] ?? '', 120);
$telefono = sanitize_text($_POST['telefono'] ?? '', 25);
$correo   = sanitize_text($_POST['correo'] ?? '', 150);
$asunto   = sanitize_text($_POST['asunto'] ?? '', 150);
$sucursal = sanitize_text($_POST['sucursal'] ?? 'Cualquier sucursal', 120);
$mensaje  = sanitize_textarea($_POST['mensaje'] ?? '', 2000);

$errors = [];

if (mb_strlen($nombre, 'UTF-8') < 3) {
    $errors[] = 'Ingresa tu nombre completo.';
}

$digitsOnly = preg_replace('/\D+/', '', $telefono);
if (strlen((string)$digitsOnly) < 10) {
    $errors[] = 'Ingresa un teléfono de contacto válido (10 dígitos).';
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Ingresa un correo electrónico válido.';
}

if (mb_strlen($asunto, 'UTF-8') < 3) {
    $errors[] = 'Indica el asunto de tu consulta.';
}

if (mb_strlen($mensaje, 'UTF-8') < 8) {
    $errors[] = 'Escribe tu mensaje o consulta (mínimo 8 caracteres).';
}

if (!empty($errors)) {
    respond_contacto(false, implode(' ', $errors), 422);
}

// 5. Envío a contacto@opticainfinito.com.mx
$subject = "Contacto Web Óptica Infinito: {$asunto} — {$nombre}";
$emailRows = [
    'Nombre completo'      => $nombre,
    'Teléfono / WhatsApp'  => $telefono,
    'Correo electrónico'   => $correo,
    'Sucursal de interés'  => $sucursal,
    'Asunto'               => $asunto,
    'Mensaje'              => $mensaje,
];

$htmlBody = build_email_template(
    'Nuevo Mensaje de Contacto Web',
    'Recibido desde la sección de Contacto de Óptica Infinito',
    $emailRows
);

send_optica_email($subject, $htmlBody, $correo, $nombre, [
    'type'     => 'contacto',
    'asunto'   => $asunto,
    'sucursal' => $sucursal,
    'telefono' => $telefono,
]);

$waMsg = "Hola Óptica Infinito, soy {$nombre}. Les escribí en su sitio web sobre: {$asunto}.";

respond_contacto(
    true,
    'Gracias por comunicarte con Óptica Infinito. Hemos recibido tu mensaje y nuestro equipo te responderá a la brevedad.',
    200,
    [
        'title'        => '¡Mensaje enviado con éxito!',
        'whatsapp_url' => whatsapp_url('contacto', $waMsg),
    ]
);
