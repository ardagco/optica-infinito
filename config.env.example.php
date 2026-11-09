<?php
declare(strict_types=1);

/**
 * ÓPTICA INFINITO — Plantilla de Configuración Privada de Servidor (Neubox)
 *
 * INSTRUCCIONES DE SEGURIDAD:
 * 1. Copie este archivo fuera de `public_html/` con el nombre exacto:
 *    /home/usuario_neubox/config.env.php
 * 2. Nunca suba `config.env.php` con contraseñas reales a repositorios públicos.
 * 3. Permisos recomendados en Neubox (cPanel / DirectAdmin): 0600 o 0640.
 */

return [
    // Entorno: 'production' en Neubox (oculta errores en pantalla y desactiva trazas)
    'APP_ENV'        => 'production',

    // URL base opcional (dejar vacío '' para autodetección automática en dominio raíz)
    'BASE_URL'       => '',

    // Configuración SMTP de Neubox para envío autenticado de Citas, Contacto y Empresas
    // Si se deja 'SMTP_ENABLED' => false, el sistema utilizará mail() nativo del servidor como respaldo.
    'SMTP_ENABLED'   => true,
    'SMTP_HOST'      => 'mail.opticainfinito.com.mx',
    'SMTP_PORT'      => 465, // 465 para SSL implícito (recomendado en Neubox) o 587 para STARTTLS
    'SMTP_ENCRYPTION'=> 'ssl', // 'ssl' | 'tls' | 'none'
    'SMTP_USER'      => 'contacto@opticainfinito.com.mx',
    'SMTP_PASS'      => 'REEMPLAZAR_CON_PASSWORD_DE_CORREO_NEUBOX',
    'SMTP_FROM'           => 'contacto@opticainfinito.com.mx',
    'SMTP_FROM_NAME'      => 'Óptica Infinito · Sitio Web Oficial',
    'SMTP_TO_EMAIL'       => 'contacto@opticainfinito.com.mx',
    'SMTP_TO_CITAS_EMAIL' => 'contacto@opticainfinito.com.mx',

    // Conexión opcional a MariaDB / MySQL (solo requerida si se vincula el ERP interno de sucursales)
    'DB_ENABLED'     => false,
    'DB_HOST'        => 'localhost',
    'DB_PORT'        => 3306,
    'DB_NAME'        => 'opticain_portal',
    'DB_USER'        => 'opticain_webuser',
    'DB_PASS'        => 'REEMPLAZAR_CON_PASSWORD_MARIADB',
    'DB_CHARSET'     => 'utf8mb4',
];
