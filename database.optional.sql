-- =============================================================================
-- ÓPTICA INFINITO — Esquema SQL Opcional para MariaDB / MySQL en Neubox
-- Nota: El sitio web funciona al 100% sin requerir base de datos activa gracias
-- a su arquitectura ligera con despacho SMTP + bitácora protegida en /storage/logs/.
-- Este esquema es opcional por si el administrador desea almacenar también un
-- respaldo relacional de las solicitudes de citas, contacto y empresas.
-- =============================================================================

SET NAMES utf8mb4;
SET time_zone = '-06:00';

CREATE TABLE IF NOT EXISTS `web_citas_solicitudes` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `folio` VARCHAR(32) NOT NULL,
    `nombre` VARCHAR(120) NOT NULL,
    `telefono` VARCHAR(30) NOT NULL,
    `email` VARCHAR(160) DEFAULT NULL,
    `sucursal` VARCHAR(60) NOT NULL,
    `servicio` VARCHAR(100) NOT NULL,
    `fecha_preferida` DATE NOT NULL,
    `horario_preferido` VARCHAR(60) NOT NULL,
    `comentarios` TEXT DEFAULT NULL,
    `ip_hash` CHAR(64) DEFAULT NULL,
    `estado` ENUM('pendiente_confirmacion','confirmada','atendida','cancelada') NOT NULL DEFAULT 'pendiente_confirmacion',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_folio_cita` (`folio`),
    KEY `idx_sucursal_fecha` (`sucursal`, `fecha_preferida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `web_empresas_cotizaciones` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `folio` VARCHAR(32) NOT NULL,
    `empresa` VARCHAR(150) NOT NULL,
    `contacto_nombre` VARCHAR(120) NOT NULL,
    `cargo` VARCHAR(100) DEFAULT NULL,
    `telefono` VARCHAR(30) NOT NULL,
    `email` VARCHAR(160) NOT NULL,
    `ciudad_planta` VARCHAR(120) NOT NULL,
    `colaboradores_rango` VARCHAR(60) NOT NULL,
    `modalidad_interes` VARCHAR(120) NOT NULL,
    `certificaciones_requeridas` VARCHAR(255) DEFAULT NULL,
    `mensaje` TEXT DEFAULT NULL,
    `ip_hash` CHAR(64) DEFAULT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_folio_empresa` (`folio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `web_contacto_mensajes` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `folio` VARCHAR(32) NOT NULL,
    `nombre` VARCHAR(120) NOT NULL,
    `telefono` VARCHAR(30) NOT NULL,
    `email` VARCHAR(160) NOT NULL,
    `asunto` VARCHAR(120) NOT NULL,
    `sucursal_interes` VARCHAR(60) DEFAULT NULL,
    `mensaje` TEXT NOT NULL,
    `ip_hash` CHAR(64) DEFAULT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_folio_contacto` (`folio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
