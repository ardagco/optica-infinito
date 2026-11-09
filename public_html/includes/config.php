<?php
declare(strict_types=1);

/**
 * ÓPTICA INFINITO — Configuración Central y Seguridad
 * Compatible con PHP 8.2 / 8.3 en Neubox Hosting Compartido
 */

if (defined('OPTICA_INFINITO_INIT')) {
    return;
}
define('OPTICA_INFINITO_INIT', true);

// Configuración de zona horaria (Querétaro, México)
date_default_timezone_set('America/Mexico_City');

// Cargar credenciales privadas fuera de public_html si existen en el servidor Neubox
$externalConfigPath = dirname(__DIR__, 2) . '/config.env.php';
$envConfig = [];
if (is_file($externalConfigPath) && is_readable($externalConfigPath)) {
    $loaded = include $externalConfigPath;
    if (is_array($loaded)) {
        $envConfig = $loaded;
    }
}

// Entorno de ejecución ('production' por defecto para evitar exposición de trazas como ocurría con Kint)
define('APP_ENV', (string)($envConfig['APP_ENV'] ?? getenv('APP_ENV') ?: 'production'));
define('APP_VERSION', '2.0.0');

if (APP_ENV === 'production') {
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
} else {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
}

// Registro seguro de errores en directorio protegido
$logDir = dirname(__DIR__) . '/storage/logs';
if (is_dir($logDir) && is_writable($logDir)) {
    ini_set('log_errors', '1');
    ini_set('error_log', $logDir . '/php-errors.log');
}

// Inicialización segura de sesión para CSRF y destellos de formulario
if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || ((int)($_SERVER['SERVER_PORT'] ?? 80) === 443)
        || (strtolower((string)($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '')) === 'https');

    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'domain'   => '',
        'secure'   => $isHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_name('OI_SESSION');
    session_start();
}

// Encabezados de seguridad HTTP en tiempo de ejecución
if (!headers_sent()) {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
}

// Detección de URL base para funcionar tanto en raíz de dominio como en subcarpetas o entorno local
function detect_base_url(array $envConfig): string
{
    if (!empty($envConfig['BASE_URL'])) {
        return rtrim((string)$envConfig['BASE_URL'], '/');
    }
    $scriptName = str_replace('\\', '/', (string)($_SERVER['SCRIPT_NAME'] ?? ''));
    // Si estamos dentro de /pacientes/, /optica/, /legal/ o /forms/, subir un nivel
    $subDirs = ['/pacientes/', '/optica/', '/legal/', '/forms/', '/includes/'];
    foreach ($subDirs as $dir) {
        $pos = strpos($scriptName, $dir);
        if ($pos !== false) {
            return rtrim(substr($scriptName, 0, $pos), '/');
        }
    }
    $dirName = rtrim(dirname($scriptName), '/\\');
    return ($dirName === '.' || $dirName === '/') ? '' : $dirName;
}

define('BASE_URL', detect_base_url($envConfig));
define('CANONICAL_DOMAIN', 'https://opticainfinito.com.mx');

// Datos reales verificados en la auditoría de https://opticainfinito.com.mx/
const SITE_DATA = [
    'name'          => 'Óptica Infinito',
    'group_name'    => 'Grupo Infinito',
    'founded_year'  => 2008,
    'slogan_main'   => 'Más allá de tu visión',
    'slogan_alt'    => 'Quédate con quien te haga ver bien',
    'slogan_family' => 'En nuestras Ópticas cuidamos a tu familia',
    'slogan_b2b'    => 'La experiencia completa de nuestro consultorio directo en su empresa',
    'phone_display' => '442 221 7851',
    'phone_raw'     => '4422217851',
    'phone_intl'    => '+524422217851',
    'whatsapp_num'  => '5214422217851',
    'email'         => 'contacto@opticainfinito.com.mx',
    'email_citas'   => 'contacto@opticainfinito.com.mx',
    'gtm_id'        => 'GTM-5KS9W256',
    'social'        => [
        'facebook'  => 'https://www.facebook.com/opticainfinito.com.mx',
        'instagram' => 'https://www.instagram.com/opticainfinito.com.mx',
    ],
    'hours'         => [
        'weekdays' => 'Lunes a viernes: 10:00 a 19:00 hrs.',
        'saturday' => 'Sábado: 10:00 a 14:00 hrs.',
        'sunday'   => 'Domingo: Cerrado',
    ],
    'branches'      => [
        'tecnologico' => [
            'id'          => 'Tecnológico',
            'name'        => 'Sucursal Tecnológico (Matriz)',
            'badge'       => 'Sede Principal · Centro / Niños Héroes',
            'address'     => 'Av. Tecnológico Sur, No. 6B, Col. Niños Héroes, Querétaro, Qro.',
            'street'      => 'Av. Tecnológico Sur, No. 6B',
            'colony'      => 'Col. Niños Héroes',
            'city'        => 'Santiago de Querétaro, Qro.',
            'postal_code' => '76010',
            'phone'       => '442 221 7851',
            'hours_mf'    => 'Lunes a viernes: 10:00 a 19:00',
            'hours_sat'   => 'Sábado: 10:00 a 14:00',
            'maps_url'    => 'https://www.google.com/maps/search/?api=1&query=Av.+Tecnologico+Sur+6B+Col.+Ninos+Heroes+Queretaro',
            'features'    => ['Exámenes visuales computarizados y subjetivos', 'Laboratorio de Lentes Express', 'Adaptación de lentes de contacto', 'Exhibición oftálmica, solar e industrial'],
        ],
        'mirador' => [
            'id'          => 'Mirador',
            'name'        => 'Sucursal Plaza El Mirador',
            'badge'       => 'Zona Constituyentes Oriente · El Mirador',
            'address'     => 'Plaza Comercial El Mirador, local 45. Av. Prol. Constituyentes Ote. 5, Fracc. El Mirador, Querétaro, Qro.',
            'street'      => 'Plaza Comercial El Mirador, local 45. Av. Prol. Constituyentes Ote. 5',
            'colony'      => 'Fracc. El Mirador',
            'city'        => 'Santiago de Querétaro, Qro.',
            'postal_code' => '76040',
            'phone'       => '442 221 7851',
            'hours_mf'    => 'Lunes a viernes: 10:00 a 19:00',
            'hours_sat'   => 'Sábado: 10:00 a 14:00',
            'maps_url'    => 'https://www.google.com/maps/search/?api=1&query=Plaza+Comercial+El+Mirador+Av+Prol+Constituyentes+Ote+5+Queretaro',
            'features'    => ['Diagnóstico optométrico integral', 'Asesoría personalizada en armazones y micas', 'Recepción y entrega de pedidos', 'Estacionamiento en plaza comercial'],
        ],
    ],
    'operational_units' => ['Tecnológico', 'Mirador', 'Campañas'],
    'certifications'    => ['ANSI Z87', 'CE EN', 'AS/NZS', 'CAN/CSA', 'MCEPS'],
    'corporate_clients' => [
        ['name' => 'Safran', 'logo' => '/assets/img/partners/brand-safran.png', 'sector' => 'Industria Aeroespacial'],
        ['name' => 'Nestlé', 'logo' => '/assets/img/partners/brand-nestle.png', 'sector' => 'Industria Alimentaria'],
        ['name' => 'Eaton', 'logo' => '/assets/img/partners/brand-eaton.png', 'sector' => 'Gestión de Energía e Industria'],
        ['name' => 'Kellogg\'s', 'logo' => '/assets/img/partners/brand-kellogs.png', 'sector' => 'Manufactura y Consumo'],
        ['name' => 'CFE', 'logo' => '/assets/img/partners/brand-cfe.png', 'sector' => 'Sector Eléctrico y Energético'],
    ],
    'payment_methods' => [
        'cards' => ['VISA', 'MasterCard', 'American Express', 'Carnet', 'Sí Vale'],
        'msi'   => '6, 9 ó 12 meses sin intereses (en términos aplicables en sucursal y campañas)',
    ],
];

// Configuración SMTP (Carga desde config.env.php fuera de public_html o variables de entorno)
const SMTP_DEFAULT = [
    'enabled'    => false, // Cambiar a true en config.env.php cuando se agreguen las credenciales de Neubox
    'host'       => 'mail.opticainfinito.com.mx',
    'port'       => 465,
    'encryption' => 'ssl', // 'ssl' (puerto 465 en Neubox) o 'tls' (puerto 587)
    'username'   => 'contacto@opticainfinito.com.mx',
    'password'   => '',
    'from_email'     => 'contacto@opticainfinito.com.mx',
    'from_name'      => 'Óptica Infinito Sitio Web',
    'to_email'       => 'contacto@opticainfinito.com.mx',
    'to_citas_email' => 'contacto@opticainfinito.com.mx',
];

function get_smtp_config(): array
{
    global $envConfig;
    return [
        'enabled'        => (bool)($envConfig['SMTP_ENABLED'] ?? SMTP_DEFAULT['enabled']),
        'host'           => (string)($envConfig['SMTP_HOST'] ?? SMTP_DEFAULT['host']),
        'port'           => (int)($envConfig['SMTP_PORT'] ?? SMTP_DEFAULT['port']),
        'encryption'     => (string)($envConfig['SMTP_ENCRYPTION'] ?? SMTP_DEFAULT['encryption']),
        'username'       => (string)($envConfig['SMTP_USERNAME'] ?? SMTP_DEFAULT['username']),
        'password'       => (string)($envConfig['SMTP_PASSWORD'] ?? SMTP_DEFAULT['password']),
        'from_email'     => (string)($envConfig['SMTP_FROM_EMAIL'] ?? SMTP_DEFAULT['from_email']),
        'from_name'      => (string)($envConfig['SMTP_FROM_NAME'] ?? SMTP_DEFAULT['from_name']),
        'to_email'       => (string)($envConfig['SMTP_TO_EMAIL'] ?? SMTP_DEFAULT['to_email']),
        'to_citas_email' => (string)($envConfig['SMTP_TO_CITAS_EMAIL'] ?? SMTP_DEFAULT['to_citas_email']),
    ];
}

/**
 * Construye una ruta interna respetando BASE_URL
 */
function site_url(string $path = ''): string
{
    $clean = ltrim($path, '/');
    if ($clean === '') {
        return BASE_URL !== '' ? BASE_URL . '/' : '/';
    }
    return (BASE_URL !== '' ? BASE_URL : '') . '/' . $clean;
}

/**
 * Alias de compatibilidad para rutas internas
 */
function base_url(string $path = ''): string
{
    return site_url($path);
}

/**
 * Construye una URL canónica absoluta para SEO
 */
function canonical_url(string $path = ''): string
{
    $clean = ltrim($path, '/');
    return $clean === '' ? CANONICAL_DOMAIN . '/' : CANONICAL_DOMAIN . '/' . $clean;
}

/**
 * Genera enlace de WhatsApp con mensaje predefinido según la sección de origen
 */
function whatsapp_url(string $context = 'general', string $customMessage = ''): string
{
    $messages = [
        'general'     => 'Hola Óptica Infinito, visito su sitio web y me gustaría recibir atención sobre salud visual.',
        'inicio'      => 'Hola Óptica Infinito, me gustaría agendar una cita para examen visual o recibir información de sus servicios.',
        'nosotros'    => 'Hola Óptica Infinito, conocí su trayectoria en su sitio web y deseo agendar una consulta optométrica.',
        'servicios'   => 'Hola Óptica Infinito, me interesa solicitar información sobre sus servicios ópticos y agendar una cita.',
        'examen'      => 'Hola Óptica Infinito, quiero agendar una cita para un Examen Visual en Querétaro.',
        'contacto_lentes' => 'Hola Óptica Infinito, me interesa información sobre adaptación de Lentes de Contacto.',
        'express'     => 'Hola Óptica Infinito, me interesa el servicio de Lentes Express (entrega el mismo día).',
        'domicilio'   => 'Hola Óptica Infinito, me gustaría solicitar información sobre Entregas a Domicilio.',
        'industrial'  => 'Hola Óptica Infinito, solicito información sobre Lentes de Protección Visual Industrial certificados (ANSI Z87 / CE EN).',
        'empresas'    => 'Hola Óptica Infinito, me comunico de una empresa para solicitar información sobre Campañas de Salud Visual Empresarial y Protección Industrial.',
        'contacto'    => 'Hola Óptica Infinito, deseo comunicarme con una de sus sucursales (Tecnológico / El Mirador).',
        'pacientes'   => 'Hola Óptica Infinito, soy paciente y requiero asistencia con mi seguimiento o consulta.',
        'optica'      => 'Hola Óptica Infinito, me gustaría cotizar armazones y micas oftálmicas.',
    ];

    $text = $customMessage !== '' ? $customMessage : ($messages[$context] ?? $messages['general']);
    return 'https://wa.me/' . SITE_DATA['whatsapp_num'] . '?text=' . rawurlencode($text);
}

/**
 * Escapado seguro de salida HTML
 */
function e(?string $value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Generación y validación de Token CSRF
 */
function csrf_token(): string
{
    if (empty($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token(?string $token): bool
{
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Limpieza contra inyección de encabezados de correo (Header Injection)
 */
function sanitize_header_value(string $value): string
{
    $cleaned = preg_replace('/[\r\n\t%0A%0D]+/i', ' ', $value);
    return trim((string)$cleaned);
}

/**
 * Sanitización general de texto de entrada
 */
function sanitize_text(?string $input, int $maxLength = 500): string
{
    $text = trim(strip_tags((string)$input));
    $text = preg_replace('/\s+/u', ' ', $text);
    return mb_substr((string)$text, 0, $maxLength, 'UTF-8');
}

/**
 * Sanitización de campo multilínea (comentarios / mensajes)
 */
function sanitize_textarea(?string $input, int $maxLength = 2500): string
{
    $text = trim(strip_tags((string)$input));
    $text = str_replace(["\r\n", "\r"], "\n", $text);
    return mb_substr($text, 0, $maxLength, 'UTF-8');
}

/**
 * Limitador de tasa de peticiones por IP (Antispam sin requerir Redis/BD)
 */
function check_rate_limit(string $formKey, int $maxAttempts = 5, int $windowSeconds = 600): bool
{
    $ip = (string)($_SERVER['REMOTE_ADDR'] ?? '0.0.0.0');
    $hash = hash('sha256', $formKey . '|' . $ip);
    $dir = dirname(__DIR__) . '/storage/rate_limits';
    if (!is_dir($dir)) {
        @mkdir($dir, 0750, true);
    }
    $file = $dir . '/' . $hash . '.json';
    $now = time();
    $attempts = [];

    if (is_file($file)) {
        $raw = @file_get_contents($file);
        $decoded = $raw ? json_decode($raw, true) : [];
        if (is_array($decoded)) {
            $attempts = array_values(array_filter($decoded, static fn($ts) => is_int($ts) && ($now - $ts) < $windowSeconds));
        }
    }

    if (count($attempts) >= $maxAttempts) {
        return false;
    }

    $attempts[] = $now;
    @file_put_contents($file, json_encode($attempts), LOCK_EX);
    return true;
}
