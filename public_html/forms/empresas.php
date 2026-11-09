<?php
declare(strict_types=1);

/**
 * ÓPTICA INFINITO — Procesamiento del Formulario Empresarial B2B (Campañas y Protección Industrial)
 * Destinatario: contacto@opticainfinito.com.mx
 */

require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/mailer.php';

$isJsonRequest = str_contains(strtolower((string)($_SERVER['HTTP_ACCEPT'] ?? '')), 'application/json')
    || strtolower((string)($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '')) === 'xmlhttprequest';

function respond_empresa(bool $success, string $message, int $httpCode = 200, array $extra = []): never
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
    $referer = sanitize_header_value((string)($_SERVER['HTTP_REFERER'] ?? site_url('empresas.php')));
    header('Location: ' . $referer);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond_empresa(false, 'Método no permitido.', 405);
}

// 1. Honeypot Antispam
$honeypot = trim((string)($_POST['website_url'] ?? ''));
if ($honeypot !== '') {
    respond_empresa(true, 'Solicitud empresarial recibida.', 200);
}

// 2. Token CSRF
$csrf = (string)($_POST['csrf_token'] ?? '');
if (!verify_csrf_token($csrf)) {
    respond_empresa(false, 'La sesión del formulario expiró por seguridad. Por favor recarga la página e inténtalo de nuevo.', 403);
}

// 3. Rate Limiting
if (!check_rate_limit('form_empresas', 5, 600)) {
    respond_empresa(false, 'Demasiadas solicitudes recientes. Por favor comunícate con nuestro equipo empresarial al 442 221 7851.', 429);
}

// 4. Sanitización y Validación de los campos solicitados en Sección 7 (Formularios empresariales)
$empresa       = sanitize_text($_POST['empresa'] ?? '', 150);
$contacto      = sanitize_text($_POST['contacto'] ?? '', 120);
$correo        = sanitize_text($_POST['correo'] ?? '', 150);
$telefono      = sanitize_text($_POST['telefono'] ?? '', 25);
$colaboradores = sanitize_text($_POST['colaboradores'] ?? '', 80);
$servicio      = sanitize_text($_POST['servicio'] ?? '', 150);
$mensaje       = sanitize_textarea($_POST['mensaje'] ?? '', 2500);

$errors = [];

if (mb_strlen($empresa, 'UTF-8') < 2) {
    $errors[] = 'Ingresa el nombre de la empresa o institución.';
}

if (mb_strlen($contacto, 'UTF-8') < 3) {
    $errors[] = 'Ingresa el nombre de la persona de contacto.';
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Ingresa un correo electrónico empresarial válido.';
}

$digitsOnly = preg_replace('/\D+/', '', $telefono);
if (strlen((string)$digitsOnly) < 10) {
    $errors[] = 'Ingresa un número telefónico válido (mínimo 10 dígitos).';
}

if ($colaboradores === '') {
    $errors[] = 'Selecciona el número aproximado de colaboradores.';
}

if ($servicio === '') {
    $errors[] = 'Selecciona el servicio empresarial requerido.';
}

if (mb_strlen($mensaje, 'UTF-8') < 5) {
    $errors[] = 'Por favor describe brevemente los requerimientos de tu empresa.';
}

if (!empty($errors)) {
    respond_empresa(false, implode(' ', $errors), 422);
}

// 5. Envío al correo comercial oficial existente: contacto@opticainfinito.com.mx
$subject = "Cotización de Salud Empresarial: {$empresa} ({$servicio})";
$emailRows = [
    'Nombre de empresa'                 => $empresa,
    'Nombre del contacto'               => $contacto,
    'Correo empresarial'                => $correo,
    'Teléfono directo / Ext.'           => $telefono,
    'Número aprox. de colaboradores'    => $colaboradores,
    'Servicio empresarial requerido'    => $servicio,
    'Detalles / Mensaje'                => $mensaje,
];

$htmlBody = build_email_template(
    'Nueva Solicitud de Salud Empresarial',
    'Prospecto corporativo captado desde la sección de Salud Empresarial',
    $emailRows,
    'Solicitud dirigida al área de Salud Visual Empresarial y Optometría Ocupacional de Óptica Infinito.'
);

send_optica_email($subject, $htmlBody, $correo, $contacto . ' - ' . $empresa, [
    'type'          => 'salud_empresarial',
    'empresa'       => $empresa,
    'colaboradores' => $colaboradores,
    'servicio'      => $servicio,
    'telefono'      => $telefono,
]);

$waMsg = "Hola Óptica Infinito, soy {$contacto} de la empresa {$empresa} ({$colaboradores} colaboradores). Solicité una cotización en su sitio web para: {$servicio}.";

respond_empresa(
    true,
    'Hemos recibido la solicitud de tu empresa. Nuestro equipo de Salud Visual Empresarial se pondrá en contacto contigo para brindarte atención personalizada y preparar tu propuesta.',
    200,
    [
        'title'        => '¡Solicitud empresarial registrada!',
        'whatsapp_url' => whatsapp_url('empresas', $waMsg),
    ]
);
