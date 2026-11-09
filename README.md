# Óptica Infinito — Rediseño y Rebuild Corporativo Premium (`v2.0.0`)

Sitio web corporativo, clínico y empresarial (B2B/B2C) reconstruido íntegramente para **Óptica Infinito / Grupo Infinito** (`https://opticainfinito.com.mx/`), diseñado bajo una dirección de arte editorial de alto nivel e ingeniería ligera 100% compatible con **Neubox Hosting Compartido (PHP 8.2 / 8.3)**.

---

## 1. Resumen de la Auditoría del Sitio Anterior

Antes de iniciar la programación se realizó una auditoría exhaustiva del sitio en producción (`https://opticainfinito.com.mx/`):

### Hallazgos Técnicos y Debilidades Detectadas en la Versión Anterior
1. **Exposición de Debugbar / Kint en Producción**: El sitio anterior basado en CodeIgniter 4 tenía habilitado `CI_ENVIRONMENT = development` o la inyección de `kint-rich-script` y comentarios `<!-- DEBUG-VIEW START ... -->`, exponiendo rutas internas del servidor y cargando llamadas erróneas a `http://localhost:8080/index.php?debugbar`.
2. **Enlace Empresarial Roto (`404 Not Found`)**: Los botones hacia `/empresarial` devolvían un error 404 de CodeIgniter (`Controller or its method is not found: \App\Controllers\Empresarial::index`).
3. **Formularios y Accesos Desconectados**:
   - El formulario de contacto de la página principal carecía de atributo `action`, tokens CSRF y manejador backend.
   - Los accesos `/pacientes/login` y `/empresas/login` mostraban plantillas genéricas con `action=""` y textos en inglés (`Forgot Password?`, `Keep me logged in`), mientras que `/optica/login` enviaba por `GET` sin integración activa.
4. **Sobrecarga de Recursos**: 35 archivos JavaScript cargados en la portada (múltiples copias de jQuery, carruseles redundantes, librerías sin usar).

### Activos e Información Real Recuperada y Conservada Íntegramente
- **Marca y Trayectoria**: **Óptica Infinito** (`Grupo Infinito`), fundada en **2008** en Santiago de Querétaro, Qro.
- **Eslogans Oficiales**:
  - *"Más allá de tu visión"*
  - *"Quédate con quien te haga ver bien"*
  - *"En nuestras Ópticas cuidamos a tu familia"*
  - *"Los ojos son la herramienta más importante... ¡Protégelos!"*
  - *"La experiencia completa de nuestro consultorio directo en su empresa"*
- **6 Servicios Reales**:
  1. **Exámenes visuales** (evaluación optométrica en consultorio y campañas).
  2. **Lentes de contacto** (adaptación personalizada y asesoría de higiene/uso).
  3. **Lentes express** (servicio ágil con entrega el mismo día en graduaciones seleccionadas).
  4. **Salud visual empresarial** (traslado de consultorio móvil a planta u oficina, convenio nómina, paquetes empresariales).
  5. **Entregas a domicilio** (envío de lentes graduados en Querétaro o en planta empresarial).
  6. **Protección visual industrial** (lentes de seguridad graduados y neutros con certificaciones internacionales documentadas: **`ANSI Z87`**, **`CE EN`**, **`AS/NZS`**, **`CAN/CSA`** y **`MCEPS`**).
- **Condiciones Comerciales Verificadas**:
  - *"Lentes de calle desde \$490. Descuentos exclusivos"*.
  - Tarjetas aceptadas: **VISA, MasterCard, American Express, Carnet y Sí Vale** (6, 9 o 12 meses sin intereses según promoción vigente).
- **Clientes Corporativos Documentados**: **Safran, Nestlé, Eaton, Kellogg's y CFE** (logotipos reales recuperados).
- **Sucursales y Horarios Reales**:
  - **Sucursal Tecnológico (Matriz)**: `Av. Tecnológico Sur, No. 6B, Col. Niños Héroes, Querétaro, Qro.`
  - **Sucursal Plaza El Mirador**: `Plaza Comercial El Mirador, local 45. Av. Prol. Constituyentes Ote. 5, Fracc. El Mirador, Querétaro, Qro.`
  - **Sedes operativas de sistema**: `Campañas`, `Mirador`, `Tecnológico`.
  - **Horario publicado**: `Lunes a viernes: 10:00 a 19:00` | `Sábado: 10:00 a 14:00`.
- **Contacto Directo y Redes**:
  - Teléfono / WhatsApp: `442 221 7851` (`+52 442 221 7851`).
  - Correo electrónico: `contacto@opticainfinito.com.mx`.
  - Facebook: `https://www.facebook.com/opticainfinito.com.mx`
  - Instagram: `https://www.instagram.com/opticainfinito.com.mx`
- **Documentos Legales Oficiales**:
  - `Política de Privacidad` y `Términos y Condiciones` (fecha de última actualización: `31/01/2025`), conservados íntegramente en `/legal/privacidad.php` y `/legal/terminos.php` con redirecciones automáticas desde `/politica-de-privacidad` y `/terminos-y-condiciones`.

---

## 2. Dirección Visual y Experiencia Interactiva

El diseño combina precisión clínica, calidez editorial y estética contemporánea:
- **Paleta Cromática**:
  - Alabastro cálido (`#F7F5F0`), Blanco Puro (`#FFFFFF`), Piedra Cálida (`#EFECE6`).
  - Obsidiana Óptica (`#0B131E`), Grafito Clínico (`#1C2836`).
  - Azul Cobalto Infinito (`#1E56A0`) y Verde Azulado Clínico (`#0D7A6F`), con acentos sutiles en Bronce Champán (`#C5A065`).
- **Tipografía Editorial y Técnica**:
  - Encabezados con carácter editorial: `Cormorant Garamond`.
  - Cuerpo e interfaz de alta legibilidad móvil: `Plus Jakarta Sans`.
  - Especificaciones ópticas, certificaciones y folios: `JetBrains Mono`.
- **Animaciones y Microinteracciones (`prefers-reduced-motion` safe)**:
  - Motor propio en Vanilla JS con `IntersectionObserver` (`fade-up`, `fade-in`, `scale-in`, `image-reveal`, `stagger-group`), parallax geométrico ligero y header con transición progresiva a *glassmorphism*.

---

## 3. Estructura de Archivos del Proyecto

```text
optica-infinito/
├── config.env.example.php          # Plantilla de configuración privada (colocar fuera de public_html)
├── database.optional.sql           # Esquema SQL opcional para MariaDB/MySQL
├── README.md                       # Documentación general del proyecto
├── DEPLOY-NEUBOX.md                # Guía paso a paso de despliegue y rollback en Neubox
└── public_html/                    # Raíz pública del dominio en Neubox
    ├── index.php                   # 6.1 INICIO (Hero editorial, barra de confianza, 6 servicios, historia, empresas, sucursales, CTA)
    ├── nosotros.php                # 6.2 NOSOTROS (Historia desde 2008, filosofía, enfoque dual familiar e industrial)
    ├── servicios.php               # 6.3 SERVICIOS (Catálogo detallado de los 6 servicios y certificaciones ANSI Z87 / CE EN)
    ├── empresas.php                # 6.4 EMPRESAS (Landing B2B para RRHH/EHS, proceso de 4 etapas, formulario empresarial)
    ├── contacto.php                # 6.5 CONTACTO (Sucursales Tecnológico y El Mirador, horarios, formulario con pestañas)
    ├── pacientes/
    │   ├── index.php               # 6.6 PACIENTES (Centro de atención al paciente + acceso por sucursal documentado)
    │   └── login.php               # Alias de compatibilidad para /pacientes/login
    ├── optica/
    │   ├── index.php               # 6.7 ÓPTICA (Lentes desde $490, pagos MSI, marcas y acceso operativo por sucursal)
    │   └── login.php               # Alias de compatibilidad para /optica/login
    ├── legal/
    │   ├── privacidad.php          # Política de Privacidad íntegra (actualizada 31/01/2025)
    │   └── terminos.php            # Términos y Condiciones íntegros (actualizados 31/01/2025)
    ├── includes/
    │   ├── config.php              # Configuración central, datos verificados, CSRF, rate-limit y sanitización
    │   ├── header.php              # Meta SEO, Open Graph, Schema.org JSON-LD, Topbar, Navbar y Drawer móvil
    │   ├── footer.php              # Footer corporativo, botón flotante WhatsApp contextual y Modal de Cita
    │   └── mailer.php              # Cliente SMTP nativo (SSL/TLS) + fallback mail() + bitácora de respaldo
    ├── forms/
    │   ├── citas.php               # Endpoint de solicitudes de cita (aclara que requiere confirmación del personal)
    │   ├── contacto.php            # Endpoint de contacto general
    │   └── empresas.php            # Endpoint de cotizaciones y campañas empresariales B2B
    ├── storage/
    │   ├── .htaccess               # Bloqueo total de acceso HTTP directo (Require all denied)
    │   ├── logs/                   # Bitácora local privada de envíos y errores PHP
    │   └── ratelimit/              # Control anti-abuso por hash de IP
    ├── assets/
    │   ├── css/
    │   │   └── main.css            # Sistema de diseño completo, componentes, animaciones y responsive
    │   ├── js/
    │   │   └── main.js             # Interacciones, IntersectionObserver, validación y envío AJAX
    │   └── img/
    │       ├── brand/              # Logotipos oficiales Óptica Infinito, Grupo Infinito, emblema SVG y favicons
    │       ├── hero/               # Fotografía principal recuperada
    │       ├── editorial/          # Fotografía clínica, óptica e industrial de alta resolución
    │       ├── services/           # Fotografías reales de campañas, foróptero y lentes de contacto
    │       └── partners/           # Logotipos reales de clientes: Safran, Nestlé, Eaton, Kellogg's, CFE
    ├── .htaccess                   # Reglas Apache/LiteSpeed: HTTPS, URLs limpias, redirecciones 301, caché y seguridad
    ├── robots.txt                  # Directivas de rastreo para buscadores
    └── sitemap.xml                 # Mapa XML del sitio
```

---

## 4. Seguridad, Privacidad y Limitaciones Documentadas

1. **Protección de Formularios**: Todos los formularios (`citas.php`, `contacto.php`, `empresas.php`) validan token CSRF de sesión, campo *honeypot* oculto contra bots, límite de peticiones por IP (rate limiting), validación de formato en cliente y servidor, y sanitización contra inyección de cabeceras SMTP.
2. **Claridad en Solicitudes de Cita**: Tanto la interfaz de usuario como la respuesta del servidor y el correo electrónico notifican explícitamente que **la solicitud en línea no representa una cita confirmada** hasta que el personal de Óptica Infinito verifique disponibilidad y confirme con el paciente.
3. **Módulos de Acceso (`/pacientes/`, `/optica/`, `/empresas/login`)**:
   - En el sitio anterior, estos formularios estaban desconectados (`action=""`) porque el sistema ERP interno de sucursales (`Campañas`, `Mirador`, `Tecnológico`) requiere credenciales e infraestructura privada no expuesta públicamente.
   - Conforme a las reglas de integridad del proyecto, **no se simula un portal médico falso ni acceso a expedientes clínicos**. Se conserva la interfaz de selección de sucursal (`Campañas`, `Mirador`, `Tecnológico`) y, al intentar autenticar sin el backend ERP vinculado, se informa de manera transparente y se canaliza de inmediato vía WhatsApp o teléfono con la sucursal seleccionada.
