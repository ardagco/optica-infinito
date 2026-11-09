<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

$pageTitle       = $pageTitle ?? 'Óptica Infinito | Salud Visual, Optometría y Protección Industrial en Querétaro';
$pageDescription = $pageDescription ?? 'Óptica Infinito en Querétaro (fundada en 2008). Exámenes visuales profesionales, lentes express el mismo día, lentes de contacto, entregas a domicilio y salud visual empresarial con certificaciones ANSI Z87 y CE EN.';
$pageKeywords    = $pageKeywords ?? 'ópticas en Querétaro, examen de la vista Querétaro, lentes de contacto Querétaro, salud visual empresarial, protección visual industrial, servicios ópticos empresariales, lentes express Querétaro, Óptica Infinito';
$pageCanonical   = $pageCanonical ?? canonical_url('');
$pageOgImage     = $pageOgImage ?? canonical_url('assets/img/editorial/hero-optical-studio.jpg');
$activeNav       = $activeNav ?? 'inicio';
$headerTheme     = $headerTheme ?? 'light'; // 'light' o 'dark' para contraste inicial del hero
$whatsappContext = $whatsappContext ?? $activeNav;
$csrfToken       = csrf_token();

// Datos estructurados Schema.org LocalBusiness / Optician
$schemaData = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'        => ['Optician', 'LocalBusiness', 'MedicalBusiness'],
            '@id'          => CANONICAL_DOMAIN . '/#organization',
            'name'         => SITE_DATA['name'],
            'alternateName'=> SITE_DATA['group_name'],
            'url'          => CANONICAL_DOMAIN . '/',
            'logo'         => CANONICAL_DOMAIN . '/assets/img/brand/logo-optica-infinito.png',
            'image'        => $pageOgImage,
            'description'  => $pageDescription,
            'foundingDate' => '2008',
            'slogan'       => SITE_DATA['slogan_main'],
            'telephone'    => SITE_DATA['phone_intl'],
            'email'        => SITE_DATA['email'],
            'priceRange'   => '$$',
            'currenciesAccepted' => 'MXN',
            'paymentAccepted'    => 'Efectivo, Tarjeta de Crédito, Tarjeta de Débito, VISA, MasterCard, American Express, Carnet, Sí Vale',
            'address'      => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => SITE_DATA['branches']['tecnologico']['street'],
                'addressLocality' => 'Santiago de Querétaro',
                'addressRegion'   => 'Querétaro',
                'postalCode'      => SITE_DATA['branches']['tecnologico']['postal_code'],
                'addressCountry'  => 'MX',
            ],
            'department'   => [
                [
                    '@type'     => 'Optician',
                    'name'      => 'Óptica Infinito - Sucursal Tecnológico',
                    'telephone' => SITE_DATA['phone_intl'],
                    'address'   => [
                        '@type'           => 'PostalAddress',
                        'streetAddress'   => 'Av. Tecnológico Sur, No. 6B, Col. Niños Héroes',
                        'addressLocality' => 'Santiago de Querétaro',
                        'addressRegion'   => 'Qro.',
                        'postalCode'      => '76010',
                        'addressCountry'  => 'MX',
                    ],
                ],
                [
                    '@type'     => 'Optician',
                    'name'      => 'Óptica Infinito - Sucursal Plaza El Mirador',
                    'telephone' => SITE_DATA['phone_intl'],
                    'address'   => [
                        '@type'           => 'PostalAddress',
                        'streetAddress'   => 'Plaza Comercial El Mirador, local 45. Av. Prol. Constituyentes Ote. 5, Fracc. El Mirador',
                        'addressLocality' => 'Santiago de Querétaro',
                        'addressRegion'   => 'Qro.',
                        'postalCode'      => '76040',
                        'addressCountry'  => 'MX',
                    ],
                ],
            ],
            'openingHoursSpecification' => [
                [
                    '@type'     => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens'     => '10:00',
                    'closes'    => '19:00',
                ],
                [
                    '@type'     => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Saturday'],
                    'opens'     => '10:00',
                    'closes'    => '14:00',
                ],
            ],
            'sameAs' => [
                SITE_DATA['social']['facebook'],
                SITE_DATA['social']['instagram'],
            ],
        ],
    ],
];
?>
<!DOCTYPE html>
<html lang="es-MX" class="no-js" data-theme="<?= e($headerTheme) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="keywords" content="<?= e($pageKeywords) ?>">
    <meta name="author" content="Óptica Infinito · Grupo Infinito">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="geo.region" content="MX-QUE">
    <meta name="geo.placename" content="Santiago de Querétaro">
    <meta name="theme-color" content="#0B132B">

    <link rel="canonical" href="<?= e($pageCanonical) ?>">

    <!-- Open Graph / Social -->
    <meta property="og:locale" content="es_MX">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Óptica Infinito">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:url" content="<?= e($pageCanonical) ?>">
    <meta property="og:image" content="<?= e($pageOgImage) ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle) ?>">
    <meta name="twitter:description" content="<?= e($pageDescription) ?>">
    <meta name="twitter:image" content="<?= e($pageOgImage) ?>">

    <!-- Favicons Oficiales Recuperados -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= e(site_url('assets/img/brand/apple-touch-icon.png')) ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= e(site_url('assets/img/brand/favicon-32x32.png')) ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= e(site_url('assets/img/brand/favicon-16x16.png')) ?>">

    <!-- Preconexión y Tipografías Editoriales -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,400;1,600&family=JetBrains+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS (Apoyo estructural de componentes) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Sistema de Diseño Bespoke Óptica Infinito -->
    <link rel="stylesheet" href="<?= e(site_url('assets/css/main.css')) ?>?v=<?= e(APP_VERSION) ?>">

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json"><?= json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>

    <!-- Detección temprana de JS para habilitar animaciones sin ocultar contenido cuando JS está desactivado -->
    <script>document.documentElement.classList.replace('no-js', 'js');</script>

    <?php if (APP_ENV === 'production' && !empty(SITE_DATA['gtm_id'])): ?>
    <!-- Google Tag Manager (Conservado de producción actual) -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?= e(SITE_DATA['gtm_id']) ?>');</script>
    <?php endif; ?>
</head>
<body class="oi-body" data-page="<?= e($activeNav) ?>" data-base-url="<?= e(BASE_URL) ?>">
<?php if (APP_ENV === 'production' && !empty(SITE_DATA['gtm_id'])): ?>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= e(SITE_DATA['gtm_id']) ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php endif; ?>

<!-- Barra de Progreso de Lectura Óptica -->
<div class="oi-scroll-progress" id="oiScrollProgress" aria-hidden="true"></div>

<!-- Enlace de salto accesible -->
<a href="#main-content" class="visually-hidden-focusable oi-skip-link">Saltar al contenido principal</a>

<!-- Topbar Institucional Discreta -->
<div class="oi-topbar d-none d-lg-block">
    <div class="container-fluid px-xl-5">
        <div class="d-flex align-items-center justify-content-between py-2">
            <div class="d-flex align-items-center gap-4">
                <span class="oi-topbar__item">
                    <span class="oi-status-dot" aria-hidden="true"></span>
                    <span>Fundada en 2008 · Querétaro, Qro.</span>
                </span>
                <span class="oi-topbar__divider" aria-hidden="true"></span>
                <span class="oi-topbar__item">
                    <i data-lucide="clock" class="oi-icon-xs"></i>
                    <span>Lun – Vie 10:00–19:00 · Sáb 10:00–14:00</span>
                </span>
                <span class="oi-topbar__divider" aria-hidden="true"></span>
                <a href="<?= e(site_url('contacto.php#ubicaciones')) ?>" class="oi-topbar__link">
                    <i data-lucide="map-pin" class="oi-icon-xs"></i>
                    <span>Sucursales: Tecnológico y Plaza El Mirador</span>
                </a>
            </div>
            <div class="d-flex align-items-center gap-4">
                <a href="tel:<?= e(SITE_DATA['phone_raw']) ?>" class="oi-topbar__link">
                    <i data-lucide="phone" class="oi-icon-xs"></i>
                    <span><?= e(SITE_DATA['phone_display']) ?></span>
                </a>
                <a href="mailto:<?= e(SITE_DATA['email']) ?>" class="oi-topbar__link">
                    <i data-lucide="mail" class="oi-icon-xs"></i>
                    <span><?= e(SITE_DATA['email']) ?></span>
                </a>
                <span class="oi-topbar__divider" aria-hidden="true"></span>
                <div class="d-flex align-items-center gap-3">
                    <a href="<?= e(site_url('pacientes/')) ?>" class="oi-topbar__portal <?= $activeNav === 'pacientes' ? 'is-active' : '' ?>">
                        <i data-lucide="user-check" class="oi-icon-xs"></i> Pacientes
                    </a>
                    <a href="<?= e(site_url('empresas.php#portal-empresas')) ?>" class="oi-topbar__portal">
                        <i data-lucide="building-2" class="oi-icon-xs"></i> Portal Empresas
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header Principal con Glassmorphism Progresivo -->
<header class="oi-header" id="oiHeader" data-header-theme="<?= e($headerTheme) ?>">
    <div class="container-fluid px-3 px-md-4 px-xl-5">
        <div class="oi-header__inner">
            <!-- Identidad de Marca -->
            <a href="<?= e(site_url('')) ?>" class="oi-brand" aria-label="Óptica Infinito — Inicio">
                <div class="oi-brand__emblem">
                    <img src="<?= e(site_url('assets/img/brand/emblem-infinito.svg')) ?>" alt="Emblema Óptica Infinito" width="42" height="42">
                </div>
                <div class="oi-brand__text">
                    <span class="oi-brand__name">ÓPTICA INFINITO<sup>®</sup></span>
                    <span class="oi-brand__tagline">Más allá de tu visión</span>
                </div>
            </a>

            <!-- Navegación Principal Escritorio -->
            <nav class="oi-nav d-none d-xl-flex" aria-label="Navegación principal">
                <ul class="oi-nav__list">
                    <li class="oi-nav__item">
                        <a href="<?= e(site_url('')) ?>" class="oi-nav__link <?= $activeNav === 'inicio' ? 'is-active' : '' ?>">Inicio</a>
                    </li>
                    <li class="oi-nav__item">
                        <a href="<?= e(site_url('nosotros.php')) ?>" class="oi-nav__link <?= $activeNav === 'nosotros' ? 'is-active' : '' ?>">Nosotros</a>
                    </li>
                    <li class="oi-nav__item">
                        <a href="<?= e(site_url('servicios.php')) ?>" class="oi-nav__link <?= $activeNav === 'servicios' ? 'is-active' : '' ?>">Servicios</a>
                    </li>
                    <li class="oi-nav__item">
                        <a href="<?= e(site_url('empresas.php')) ?>" class="oi-nav__link oi-nav__link--b2b <?= $activeNav === 'empresas' ? 'is-active' : '' ?>">
                            Salud Empresarial
                        </a>
                    </li>
                    <li class="oi-nav__item">
                        <a href="<?= e(site_url('optica/')) ?>" class="oi-nav__link <?= $activeNav === 'optica' ? 'is-active' : '' ?>">Óptica</a>
                    </li>
                    <li class="oi-nav__item">
                        <a href="<?= e(site_url('pacientes/')) ?>" class="oi-nav__link <?= $activeNav === 'pacientes' ? 'is-active' : '' ?>">Pacientes</a>
                    </li>
                    <li class="oi-nav__item">
                        <a href="<?= e(site_url('contacto.php')) ?>" class="oi-nav__link <?= $activeNav === 'contacto' ? 'is-active' : '' ?>">Contacto</a>
                    </li>
                </ul>
            </nav>

            <!-- Acciones Destacadas (WhatsApp + Agenda tu cita) -->
            <div class="oi-header__actions">
                <a href="<?= e(whatsapp_url($whatsappContext)) ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="oi-btn oi-btn--ghost-whatsapp d-none d-sm-inline-flex"
                   aria-label="Contactar por WhatsApp al 442 221 7851">
                    <span class="oi-whatsapp-dot" aria-hidden="true"></span>
                    <i data-lucide="message-circle" class="oi-icon-sm"></i>
                    <span class="d-none d-md-inline">WhatsApp</span>
                </a>

                <button type="button"
                        class="oi-btn oi-btn--primary"
                        data-bs-toggle="modal"
                        data-bs-target="#modalAgendaCita">
                    <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                    <span>Agenda tu cita</span>
                </button>

                <!-- Botón Menú Móvil -->
                <button type="button"
                        class="oi-burger d-xl-none"
                        id="oiMobileToggle"
                        aria-expanded="false"
                        aria-controls="oiMobileDrawer"
                        aria-label="Abrir menú de navegación">
                    <span class="oi-burger__line"></span>
                    <span class="oi-burger__line"></span>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Menú Móvil Desplegable Elegante -->
<div class="oi-mobile-drawer" id="oiMobileDrawer" aria-hidden="true">
    <div class="oi-mobile-drawer__backdrop" id="oiMobileBackdrop"></div>
    <div class="oi-mobile-drawer__panel">
        <div class="oi-mobile-drawer__header">
            <div class="d-flex align-items-center gap-2">
                <img src="<?= e(site_url('assets/img/brand/emblem-infinito.svg')) ?>" alt="" width="34" height="34">
                <div>
                    <div class="fw-bold text-white small tracking-wider">ÓPTICA INFINITO®</div>
                    <div class="text-white-50" style="font-size: 0.72rem;">Fundada en 2008 · Querétaro</div>
                </div>
            </div>
            <button type="button" class="oi-mobile-drawer__close" id="oiMobileClose" aria-label="Cerrar menú">
                <i data-lucide="x"></i>
            </button>
        </div>

        <nav class="oi-mobile-drawer__nav" aria-label="Navegación móvil">
            <ul class="oi-mobile-nav-list">
                <li><a href="<?= e(site_url('')) ?>" class="<?= $activeNav === 'inicio' ? 'is-active' : '' ?>"><span class="oi-mono-num">01</span> Inicio</a></li>
                <li><a href="<?= e(site_url('nosotros.php')) ?>" class="<?= $activeNav === 'nosotros' ? 'is-active' : '' ?>"><span class="oi-mono-num">02</span> Nosotros</a></li>
                <li><a href="<?= e(site_url('servicios.php')) ?>" class="<?= $activeNav === 'servicios' ? 'is-active' : '' ?>"><span class="oi-mono-num">03</span> Servicios</a></li>
                <li><a href="<?= e(site_url('empresas.php')) ?>" class="<?= $activeNav === 'empresas' ? 'is-active' : '' ?>"><span class="oi-mono-num">04</span> Salud Empresarial</a></li>
                <li><a href="<?= e(site_url('optica/')) ?>" class="<?= $activeNav === 'optica' ? 'is-active' : '' ?>"><span class="oi-mono-num">05</span> Óptica</a></li>
                <li><a href="<?= e(site_url('pacientes/')) ?>" class="<?= $activeNav === 'pacientes' ? 'is-active' : '' ?>"><span class="oi-mono-num">06</span> Pacientes</a></li>
                <li><a href="<?= e(site_url('contacto.php')) ?>" class="<?= $activeNav === 'contacto' ? 'is-active' : '' ?>"><span class="oi-mono-num">07</span> Contacto</a></li>
            </ul>
        </nav>

        <div class="oi-mobile-drawer__footer">
            <div class="oi-mobile-contact-card">
                <div class="small text-uppercase tracking-wider text-info mb-1">Atención y Citas Querétaro</div>
                <a href="tel:<?= e(SITE_DATA['phone_raw']) ?>" class="d-block text-white fw-semibold fs-5 text-decoration-none mb-1">
                    <?= e(SITE_DATA['phone_display']) ?>
                </a>
                <div class="text-white-50 small mb-3">Lun–Vie 10:00 a 19:00 · Sáb 10:00 a 14:00</div>
                <div class="d-grid gap-2">
                    <button type="button" class="oi-btn oi-btn--primary w-100 justify-content-center" data-bs-toggle="modal" data-bs-target="#modalAgendaCita">
                        <i data-lucide="calendar-check" class="oi-icon-sm"></i> Solicitar cita en línea
                    </button>
                    <a href="<?= e(whatsapp_url($whatsappContext)) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--whatsapp w-100 justify-content-center">
                        <i data-lucide="message-circle" class="oi-icon-sm"></i> Escribir por WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<main id="main-content" class="oi-main">
