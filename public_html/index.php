<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$pageTitle       = 'Óptica Infinito | Salud Visual, Examen de la Vista y Protección Industrial en Querétaro';
$pageDescription = 'Óptica Infinito en Querétaro, fundada en 2008. Exámenes visuales profesionales, lentes express el mismo día, lentes de contacto, entregas a domicilio y salud visual empresarial con certificaciones ANSI Z87 y CE EN.';
$pageCanonical   = canonical_url('');
$activeNav       = 'inicio';
$headerTheme     = 'light';
$whatsappContext = 'inicio';

require_once __DIR__ . '/includes/header.php';
?>

<!-- ==========================================================================
     1. HERO PRINCIPAL EDITORIAL (5.1 & 6.1)
     ========================================================================== -->
<section class="oi-hero" aria-labelledby="heroHeading">
    <!-- Geometría Óptica Inspirada en el Emblema de Marca -->
    <svg class="oi-optical-rings" viewBox="0 0 600 600" aria-hidden="true" data-parallax="0.05">
        <circle cx="300" cy="300" r="280" />
        <circle cx="300" cy="300" r="210" stroke-dasharray="2 6" />
        <circle cx="300" cy="300" r="140" />
    </svg>

    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center gy-5">
            <!-- Columna Editorial de Texto -->
            <div class="col-lg-6 pe-xl-5" data-stagger="110">
                <div class="oi-eyebrow mb-3" data-reveal="fade-up">
                    <span>ÓPTICA INFINITO · QUERÉTARO · DESDE 2008</span>
                </div>

                <h1 id="heroHeading" class="oi-display-xl mb-4" data-reveal="fade-up">
                    Más allá de tu visión: <span class="oi-serif-italic fw-normal text-primary">claridad clínica</span> para tu vida diaria.
                </h1>

                <p class="oi-lead mb-4" data-reveal="fade-up">
                    Cuidamos tu salud visual con diagnósticos optométricos precisos, adaptación personalizada de armazones y lentes de contacto, <strong>Lentes Express con entrega el mismo día</strong> y programas integrales de salud visual para empresas.
                </p>

                <!-- Botones Principales de Acción -->
                <div class="d-flex flex-wrap align-items-center gap-3 mb-4 pt-1" data-reveal="fade-up">
                    <button type="button"
                            class="oi-btn oi-btn--primary px-4 py-3"
                            data-bs-toggle="modal"
                            data-bs-target="#modalAgendaCita">
                        <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                        <span>Agenda tu cita</span>
                        <i data-lucide="arrow-right" class="oi-icon-sm oi-btn__icon"></i>
                    </button>

                    <a href="<?= e(site_url('servicios.php')) ?>" class="oi-btn oi-btn--outline px-4 py-3">
                        <span>Conoce nuestros servicios</span>
                    </a>
                </div>

                <!-- Micro-indicadores reales -->
                <div class="d-flex flex-wrap align-items-center gap-4 pt-2 text-muted small" data-reveal="fade-up">
                    <div class="d-flex align-items-center gap-2">
                        <i data-lucide="zap" class="oi-icon-xs text-primary"></i>
                        <span>Lentes Express el mismo día</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i data-lucide="map-pin" class="oi-icon-xs text-primary"></i>
                        <span>2 Sucursales en Querétaro + Unidad Empresarial</span>
                    </div>
                </div>
            </div>

            <!-- Columna Visual Asimétrica -->
            <div class="col-lg-6">
                <div class="position-relative" data-reveal="scale-in">
                    <div class="oi-hero__visual-frame" style="aspect-ratio: 16 / 11;">
                        <img src="<?= e(site_url('assets/img/editorial/hero-optical-studio.jpg')) ?>"
                             alt="Armazón oftálmico de alta precisión con refracción óptica en estudio de Óptica Infinito"
                             width="1280"
                             height="880"
                             fetchpriority="high">
                    </div>

                    <!-- Tarjeta Flotante 1: Trayectoria Real -->
                    <div class="oi-glass-badge oi-glass-badge--bottom-left" data-parallax="-0.04">
                        <div class="d-flex align-items-center gap-3">
                            <img src="<?= e(site_url('assets/img/brand/emblem-infinito.svg')) ?>" alt="" width="40" height="40">
                            <div>
                                <div class="oi-mono-num fw-bold">FUNDADA EN 2008</div>
                                <div class="small text-dark fw-semibold">Quédate con quien te haga ver bien</div>
                                <div class="text-muted" style="font-size: 0.76rem;">Atención a familias y empresas en Querétaro</div>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta Flotante 2: Contacto Directo -->
                    <div class="oi-glass-badge oi-glass-badge--dark oi-glass-badge--top-right d-none d-md-block" data-parallax="0.03">
                        <div class="d-flex align-items-center gap-2">
                            <span class="oi-status-dot"></span>
                            <span class="small fw-medium">Citas y WhatsApp: <strong><?= e(SITE_DATA['phone_display']) ?></strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     2. BARRA DE CONFIANZA CON INFORMACIÓN REAL (6.1)
     ========================================================================== -->
<section class="oi-trust-bar" aria-label="Pilares de confianza de Óptica Infinito">
    <div class="container">
        <div class="row g-4 align-items-center" data-stagger="100">
            <div class="col-md-4" data-reveal="fade-up">
                <div class="oi-trust-item">
                    <div class="oi-trust-item__icon">
                        <i data-lucide="award" class="oi-icon-md"></i>
                    </div>
                    <div>
                        <h2 class="h6 fw-bold mb-1" style="font-family: var(--font-sans);">Óptica fundada en 2008</h2>
                        <p class="small text-muted mb-0">Más de 18 años cuidando la salud visual en Santiago de Querétaro con ética clínica y calidez humana.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-reveal="fade-up">
                <div class="oi-trust-item">
                    <div class="oi-trust-item__icon">
                        <i data-lucide="eye" class="oi-icon-md"></i>
                    </div>
                    <div>
                        <h2 class="h6 fw-bold mb-1" style="font-family: var(--font-sans);">Atención personalizada</h2>
                        <p class="small text-muted mb-0">Evaluación optométrica individual, asesoría en armazones y micas, Lentes Express y entrega a domicilio.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-reveal="fade-up">
                <div class="oi-trust-item">
                    <div class="oi-trust-item__icon">
                        <i data-lucide="shield-check" class="oi-icon-md"></i>
                    </div>
                    <div>
                        <h2 class="h6 fw-bold mb-1" style="font-family: var(--font-sans);">Servicios para particulares y empresas</h2>
                        <p class="small text-muted mb-0">Consultorio en sucursales, campañas in-company y protección industrial certificada (ANSI Z87, CE EN).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     3. SERVICIOS DESTACADOS — COMPOSICIÓN VISUAL DIFERENCIADA (6.1 & 6.3)
     ========================================================================== -->
<section class="oi-section oi-section--alabaster" id="servicios-destacados" aria-labelledby="serviciosHeading">
    <div class="container">
        <div class="row align-items-end justify-content-between mb-5 gy-3">
            <div class="col-lg-7" data-reveal="fade-up">
                <span class="oi-eyebrow mb-2">SOLUCIONES INTEGRALES DE SALUD VISUAL</span>
                <h2 id="serviciosHeading" class="oi-display-lg mb-0">
                    Nuestros Servicios <span class="oi-serif-italic fw-normal text-primary">Especializados</span>
                </h2>
            </div>
            <div class="col-lg-4 text-lg-end" data-reveal="fade-up">
                <a href="<?= e(site_url('servicios.php')) ?>" class="oi-link-arrow">
                    <span>Explorar catálogo completo de servicios</span>
                    <i data-lucide="arrow-up-right" class="oi-icon-sm"></i>
                </a>
            </div>
        </div>

        <!-- Fila 1: 2 Bloques Editoriales de Gran Formato (Exámenes Visuales + Lentes Express) -->
        <div class="row g-4 mb-4">
            <!-- Servicio 01: Exámenes Visuales -->
            <div class="col-lg-7" data-reveal="fade-up">
                <article class="oi-bento-feature h-100">
                    <div class="oi-bento-feature__bg">
                        <img src="<?= e(site_url('assets/img/services/foroptero-examen-visual.jpg')) ?>"
                             alt="Equipo optométrico profesional para examen de la vista en Óptica Infinito Querétaro"
                             width="800"
                             height="560"
                             loading="lazy">
                    </div>
                    <div class="oi-bento-feature__overlay"></div>
                    <div class="oi-bento-feature__content">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge bg-primary bg-opacity-75 text-white font-monospace px-3 py-2">01 · OPTOMETRÍA CLÍNICA</span>
                            <span class="text-white-50 small">Sucursal Tecnológico y El Mirador</span>
                        </div>
                        <h3 class="oi-display-md text-white mb-2">Exámenes visuales profesionales</h3>
                        <p class="text-white-50 mb-4" style="max-width: 560px;">
                            La salud visual es fundamental para nuestra calidad de vida. Un examen visual regular permite detectar oportunamente problemas oculares potenciales, determinar tu graduación exacta y prevenir complicaciones.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <button type="button"
                                    class="oi-btn oi-btn--primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalAgendaCita"
                                    data-cita-servicio="Examen visual">
                                <i data-lucide="calendar" class="oi-icon-sm"></i>
                                <span>Agendar examen visual</span>
                            </button>
                            <a href="<?= e(site_url('servicios.php#examenes-visuales')) ?>" class="oi-btn oi-btn--outline-light">
                                <span>Ver detalles</span>
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Servicio 02: Lentes Express (Entrega el mismo día) -->
            <div class="col-lg-5" data-reveal="fade-up">
                <article class="oi-bento-feature h-100">
                    <div class="oi-bento-feature__bg">
                        <img src="<?= e(site_url('assets/img/editorial/lens-precision-macro.jpg')) ?>"
                             alt="Elaboración de lentes oftálmicos con servicio Lentes Express el mismo día"
                             width="680"
                             height="560"
                             loading="lazy">
                    </div>
                    <div class="oi-bento-feature__overlay"></div>
                    <div class="oi-bento-feature__content">
                        <div class="mb-3">
                            <span class="badge bg-info text-dark font-monospace px-3 py-2">02 · ENTREGA EL MISMO DÍA</span>
                        </div>
                        <h3 class="oi-display-md text-white mb-2">Lentes Express</h3>
                        <p class="text-white-50 mb-4">
                            Sabemos que no puedes detener tus actividades. Contamos con servicio de elaboración y entrega de lentes el mismo día para graduaciones seleccionadas.
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button"
                                    class="oi-btn oi-btn--primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalAgendaCita"
                                    data-cita-servicio="Lentes express">
                                <span>Solicitar Lentes Express</span>
                            </button>
                            <a href="<?= e(whatsapp_url('express')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--outline-light">
                                <i data-lucide="message-circle" class="oi-icon-sm"></i>
                                <span>Consultar disponibilidad</span>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <!-- Fila 2: 4 Bloques Especializados con Diseño Diferenciado -->
        <div class="row g-4" data-stagger="90">
            <!-- Servicio 03: Lentes de Contacto -->
            <div class="col-xl-3 col-md-6" data-reveal="fade-up">
                <article class="oi-lens-card d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="oi-mono-num">03 / CONTACTOLOGÍA</span>
                            <i data-lucide="disc" class="oi-icon-sm text-primary"></i>
                        </div>
                        <div class="oi-img-reveal mb-3" style="height: 165px;">
                            <img src="<?= e(site_url('assets/img/services/lentes-de-contacto.jpg')) ?>"
                                 alt="Adaptación profesional de lentes de contacto en Óptica Infinito"
                                 width="400"
                                 height="260"
                                 loading="lazy">
                        </div>
                        <h3 class="h4 mb-2">Lentes de contacto</h3>
                        <p class="small text-muted mb-3">
                            ¿Tienes problemas de visión y buscas una solución cómoda y práctica? Los lentes de contacto son la opción ideal con adaptación profesional y seguimiento personalizado.
                        </p>
                    </div>
                    <div class="pt-2 border-top d-flex align-items-center justify-content-between">
                        <button type="button"
                                class="btn btn-link p-0 text-decoration-none fw-semibold small text-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalAgendaCita"
                                data-cita-servicio="Lentes de contacto">
                            Agendar adaptación &rarr;
                        </button>
                        <a href="<?= e(site_url('servicios.php#lentes-de-contacto')) ?>" class="small text-muted text-decoration-none">Más info</a>
                    </div>
                </article>
            </div>

            <!-- Servicio 04: Salud Visual Empresarial -->
            <div class="col-xl-3 col-md-6" data-reveal="fade-up">
                <article class="oi-lens-card d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="oi-mono-num">04 / SALUD EMPRESARIAL</span>
                            <i data-lucide="building-2" class="oi-icon-sm text-primary"></i>
                        </div>
                        <div class="oi-img-reveal mb-3" style="height: 165px;">
                            <img src="<?= e(site_url('assets/img/services/campana-empresarial-real.jpg')) ?>"
                                 alt="Campaña de Salud Visual Empresarial de Óptica Infinito en instalaciones corporativas"
                                 width="400"
                                 height="260"
                                 loading="lazy">
                        </div>
                        <h3 class="h4 mb-2">Salud visual empresarial</h3>
                        <p class="small text-muted mb-3">
                            Diseñamos programas integrales de salud visual adaptados a empresas de cualquier tamaño. Llevamos nuestros consultorios y tecnología directamente a tus instalaciones.
                        </p>
                    </div>
                    <div class="pt-2 border-top d-flex align-items-center justify-content-between">
                        <a href="<?= e(site_url('empresas.php')) ?>" class="fw-semibold small text-primary text-decoration-none">
                            Salud Empresarial &rarr;
                        </a>
                        <a href="<?= e(whatsapp_url('empresas')) ?>" target="_blank" rel="noopener noreferrer" class="small text-success text-decoration-none fw-medium">Cotizar</a>
                    </div>
                </article>
            </div>

            <!-- Servicio 05: Entregas a Domicilio -->
            <div class="col-xl-3 col-md-6" data-reveal="fade-up">
                <article class="oi-lens-card d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="oi-mono-num">05 / COMODIDAD TOTAL</span>
                            <i data-lucide="truck" class="oi-icon-sm text-primary"></i>
                        </div>
                        <div class="oi-lens-card__icon mt-1 mb-3">
                            <i data-lucide="package-check" class="oi-icon-md"></i>
                        </div>
                        <h3 class="h4 mb-2">Entregas a domicilio</h3>
                        <p class="small text-muted mb-3">
                            Puedes recibir tus lentes terminados directamente en la comodidad de tu hogar u oficina. Cuidamos cada detalle de ajuste y estuche protector en el envío.
                        </p>
                    </div>
                    <div class="pt-2 border-top d-flex align-items-center justify-content-between">
                        <a href="<?= e(whatsapp_url('domicilio')) ?>" target="_blank" rel="noopener noreferrer" class="fw-semibold small text-primary text-decoration-none">
                            Solicitar por WhatsApp &rarr;
                        </a>
                        <a href="<?= e(site_url('servicios.php#entregas-domicilio')) ?>" class="small text-muted text-decoration-none">Detalles</a>
                    </div>
                </article>
            </div>

            <!-- Servicio 06: Protección Visual Industrial -->
            <div class="col-xl-3 col-md-6" data-reveal="fade-up">
                <article class="oi-lens-card oi-lens-card--dark bg-dark d-flex flex-column justify-content-between" style="background-color: var(--oi-navy) !important;">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="oi-mono-num text-info">06 / SEGURIDAD INDUSTRIAL</span>
                            <i data-lucide="hard-hat" class="oi-icon-sm text-info"></i>
                        </div>
                        <div class="oi-img-reveal mb-3" style="height: 150px;">
                            <img src="<?= e(site_url('assets/img/editorial/industrial-safety-b2b.jpg')) ?>"
                                 alt="Armazones de protección visual industrial con certificación ANSI Z87 y CE EN"
                                 width="400"
                                 height="240"
                                 loading="lazy">
                        </div>
                        <h3 class="h4 text-white mb-2">Protección visual industrial</h3>
                        <p class="small text-white-50 mb-3">
                            Protección contra riesgos mecánicos, químicos, térmicos, eléctricos o de radiación. Armazones certificados bajo normas <strong>ANSI Z87, CE EN, AS/NZS, CAN/CSA y MCEPS</strong>.
                        </p>
                    </div>
                    <div class="pt-2 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-between">
                        <a href="<?= e(site_url('empresas.php#proteccion-industrial')) ?>" class="fw-semibold small text-info text-decoration-none">
                            Ver certificaciones &rarr;
                        </a>
                        <a href="<?= e(site_url('empresas.php#cotizacion-empresarial')) ?>" class="small text-white-50 text-decoration-none">Cotizar</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     4. PRESENTACIÓN INSTITUCIONAL Y TRAYECTORIA DESDE 2008 (6.1)
     ========================================================================== -->
<section class="oi-section oi-section--white" aria-labelledby="institucionalHeading">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <div class="row g-3 align-items-center" data-reveal="fade-up">
                    <div class="col-7">
                        <div class="oi-img-reveal shadow-sm" style="aspect-ratio: 4 / 5;">
                            <img src="<?= e(site_url('assets/img/editorial/clinic-interior-aesop.jpg')) ?>"
                                 alt="Instalaciones de consulta optométrica y exhibición de Óptica Infinito"
                                 width="640"
                                 height="800"
                                 loading="lazy">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="oi-img-reveal shadow-sm mb-3" style="aspect-ratio: 1 / 1;">
                            <img src="<?= e(site_url('assets/img/editorial/family-optometry.jpg')) ?>"
                                 alt="En nuestras ópticas cuidamos a tu familia — Óptica Infinito"
                                 width="420"
                                 height="420"
                                 loading="lazy">
                        </div>
                        <div class="p-4 rounded-4" style="background-color: var(--oi-navy); color: var(--oi-white);">
                            <div class="font-monospace small text-info mb-1">TRAYECTORIA</div>
                            <div class="oi-display-md text-white mb-1">2008</div>
                            <p class="small text-white-50 mb-0">Año de fundación en la ciudad de Querétaro, Qro.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ps-xl-5" data-stagger="100">
                <span class="oi-eyebrow mb-2" data-reveal="fade-up">NUESTRA ESENCIA · GRUPO INFINITO</span>
                <h2 id="institucionalHeading" class="oi-display-lg mb-4" data-reveal="fade-up">
                    En nuestras Ópticas <span class="oi-serif-italic fw-normal text-primary">cuidamos a tu familia</span> y a tu equipo de trabajo.
                </h2>
                <p class="oi-lead mb-3" data-reveal="fade-up">
                    Fundada en 2008, <strong>Óptica Infinito</strong> nace con el propósito de brindar a nuestros clientes, pacientes y amigos la mejor atención en cada visita.
                </p>
                <p class="text-muted mb-4" data-reveal="fade-up">
                    Para nosotros, los ojos son la herramienta más importante para conectar con el mundo, aprender y trabajar con seguridad. Por ello integramos evaluación optométrica rigurosa, calidez en el trato y soluciones ágiles —desde lentes de calle y solares hasta lentes oftálmicos graduados el mismo día y equipamiento de seguridad industrial—.
                </p>

                <div class="row g-3 mb-4 pt-2" data-reveal="fade-up">
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border bg-light bg-opacity-50 h-100">
                            <div class="small font-monospace text-primary fw-bold mb-1">NUESTRA MISIÓN</div>
                            <div class="small text-muted">Proteger y mejorar la salud visual empresarial y familiar mediante programas integrales de optometría ocupacional, tecnología especializada y garantía de satisfacción visual.</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border bg-light bg-opacity-50 h-100">
                            <div class="small font-monospace text-primary fw-bold mb-1">NUESTRA VISIÓN</div>
                            <div class="small text-muted">Ser la empresa líder en Salud Visual Empresarial y Optometría Ocupacional en México, reconocida por la excelencia, innovación y respaldo de Grupo Infinito.</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-3" data-reveal="fade-up">
                    <a href="<?= e(site_url('nosotros.php#mision-vision')) ?>" class="oi-btn oi-btn--dark">
                        <span>Conoce nuestra Misión y Visión</span>
                        <i data-lucide="arrow-right" class="oi-icon-sm oi-btn__icon"></i>
                    </a>
                    <a href="<?= e(site_url('optica/')) ?>" class="oi-link-arrow ms-2">
                        <span>Ver sección de Óptica</span>
                        <i data-lucide="chevron-right" class="oi-icon-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     5. SECCIÓN DE SALUD VISUAL EMPRESARIAL + VIDEOS + EMPRESAS QUE CONFÍAN EN NOSOTROS
     ========================================================================== -->
<section class="oi-section oi-section--navy" aria-labelledby="saludEmpresarialHomeHeading">
    <div class="container">
        <div class="row align-items-center gy-5 mb-5">
            <div class="col-lg-6" data-stagger="100">
                <span class="oi-eyebrow text-info mb-2" data-reveal="fade-up">SALUD VISUAL EMPRESARIAL · OPTOMETRÍA OCUPACIONAL</span>
                <h2 id="saludEmpresarialHomeHeading" class="oi-display-lg text-white mb-3" data-reveal="fade-up">
                    Llevamos nuestros consultorios y tecnología <span class="oi-serif-italic fw-normal text-info">directamente a tus instalaciones.</span>
                </h2>
                <p class="text-white-50 fs-5 mb-4" data-reveal="fade-up">
                    En <strong class="text-white">Óptica Infinito</strong> diseñamos programas integrales de salud visual adaptados a empresas de cualquier tamaño para cuidar la salud, el bienestar y la productividad de tus colaboradores.
                </p>

                <!-- 9 Servicios de Salud Visual Empresarial -->
                <div class="p-4 rounded-4 mb-4" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1);" data-reveal="fade-up">
                    <div class="small text-uppercase font-monospace text-info mb-3">Nuestros servicios de Salud Empresarial incluyen:</div>
                    <div class="row g-2 small text-white-50">
                        <div class="col-md-6 d-flex align-items-start gap-2">
                            <i data-lucide="check-circle-2" class="oi-icon-xs text-info flex-shrink-0 mt-1"></i>
                            <span>Exámenes visuales ocupacionales y clínicos</span>
                        </div>
                        <div class="col-md-6 d-flex align-items-start gap-2">
                            <i data-lucide="check-circle-2" class="oi-icon-xs text-info flex-shrink-0 mt-1"></i>
                            <span>Detección de enfermedades visuales y fatiga digital</span>
                        </div>
                        <div class="col-md-6 d-flex align-items-start gap-2">
                            <i data-lucide="check-circle-2" class="oi-icon-xs text-info flex-shrink-0 mt-1"></i>
                            <span>Valoraciones para personal administrativo y operativo</span>
                        </div>
                        <div class="col-md-6 d-flex align-items-start gap-2">
                            <i data-lucide="check-circle-2" class="oi-icon-xs text-info flex-shrink-0 mt-1"></i>
                            <span>Adaptación y entrega de lentes graduados</span>
                        </div>
                        <div class="col-md-6 d-flex align-items-start gap-2">
                            <i data-lucide="check-circle-2" class="oi-icon-xs text-info flex-shrink-0 mt-1"></i>
                            <span>Lentes de seguridad graduados bajo normativas</span>
                        </div>
                        <div class="col-md-6 d-flex align-items-start gap-2">
                            <i data-lucide="check-circle-2" class="oi-icon-xs text-info flex-shrink-0 mt-1"></i>
                            <span>Campañas de salud corporativa en planta</span>
                        </div>
                        <div class="col-md-6 d-flex align-items-start gap-2">
                            <i data-lucide="check-circle-2" class="oi-icon-xs text-info flex-shrink-0 mt-1"></i>
                            <span>Reportes estadísticos y métricas de salud visual</span>
                        </div>
                        <div class="col-md-6 d-flex align-items-start gap-2">
                            <i data-lucide="check-circle-2" class="oi-icon-xs text-info flex-shrink-0 mt-1"></i>
                            <span>Seguimiento clínico continuo y nuevo ingreso</span>
                        </div>
                    </div>
                </div>

                <!-- Certificaciones documentadas aplicables a armazones de seguridad -->
                <div class="mb-4" data-reveal="fade-up">
                    <div class="small text-uppercase font-monospace text-info mb-2">Armazones de seguridad con certificaciones internacionales:</div>
                    <div class="d-flex flex-wrap gap-2">
                        <?php foreach (SITE_DATA['certifications'] as $cert): ?>
                            <span class="oi-cert-pill oi-cert-pill--dark">
                                <i data-lucide="shield" class="oi-icon-xs"></i> <?= e($cert) ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3 pt-2" data-reveal="fade-up">
                    <a href="<?= e(site_url('empresas.php')) ?>" class="oi-btn oi-btn--primary px-4 py-3">
                        <i data-lucide="briefcase" class="oi-icon-sm"></i>
                        <span>Ver Salud Empresarial</span>
                        <i data-lucide="arrow-right" class="oi-icon-sm oi-btn__icon"></i>
                    </a>
                    <a href="<?= e(site_url('empresas.php#cotizacion-empresarial')) ?>" class="oi-btn oi-btn--outline-light px-4 py-3">
                        <span>Solicitar propuesta empresarial</span>
                    </a>
                </div>
            </div>

            <div class="col-lg-6" data-reveal="scale-in">
                <div class="row g-3">
                    <!-- Video 1 en Portada -->
                    <div class="col-sm-6">
                        <div class="p-3 rounded-4 h-100 border border-secondary border-opacity-25" style="background: rgba(255,255,255,0.04);">
                            <div class="rounded-3 overflow-hidden bg-black mb-2" style="aspect-ratio: 9 / 14;">
                                <video class="w-100 h-100"
                                       style="object-fit: cover; background: #050A12;"
                                       controls
                                       playsinline
                                       preload="metadata"
                                       poster="<?= e(site_url('assets/img/services/campana-empresarial-real.jpg')) ?>">
                                    <source src="<?= e(site_url('assets/video/salud-empresarial-1.mp4')) ?>" type="video/mp4">
                                    <source src="<?= e(site_url('assets/video/salud-empresarial-1.mp4')) ?>" type="video/quicktime">
                                </video>
                            </div>
                            <span class="badge rounded-pill font-monospace mb-1" style="background: rgba(13, 122, 111, 0.3); color: #7CE2D3; font-size: 0.68rem;">
                                VIDEO 01 · CAMPAÑA EN PLANTA
                            </span>
                            <div class="fw-semibold text-white small">Consultorio móvil en tus instalaciones</div>
                        </div>
                    </div>

                    <!-- Video 2 en Portada -->
                    <div class="col-sm-6">
                        <div class="p-3 rounded-4 h-100 border border-secondary border-opacity-25" style="background: rgba(255,255,255,0.04);">
                            <div class="rounded-3 overflow-hidden bg-black mb-2" style="aspect-ratio: 9 / 14;">
                                <video class="w-100 h-100"
                                       style="object-fit: cover; background: #050A12;"
                                       controls
                                       playsinline
                                       preload="metadata"
                                       poster="<?= e(site_url('assets/img/editorial/industrial-safety-b2b.jpg')) ?>">
                                    <source src="<?= e(site_url('assets/video/salud-empresarial-2.mp4')) ?>" type="video/mp4">
                                    <source src="<?= e(site_url('assets/video/salud-empresarial-2.mp4')) ?>" type="video/quicktime">
                                </video>
                            </div>
                            <span class="badge rounded-pill font-monospace mb-1" style="background: rgba(197, 160, 101, 0.25); color: #E5C890; font-size: 0.68rem;">
                                VIDEO 02 · OPTOMETRÍA OCUPACIONAL
                            </span>
                            <div class="fw-semibold text-white small">Valoraciones clínicas y lentes graduados</div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="p-3 rounded-4" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12);">
                            <div class="row align-items-center g-3">
                                <div class="col-sm-8">
                                    <div class="fw-bold text-white small">Atención a Recursos Humanos, EHS y Salud Ocupacional</div>
                                    <div class="small text-white-50">Coordinamos campañas de diagnóstico visual, reportes estadísticos y lentes de seguridad graduados.</div>
                                </div>
                                <div class="col-sm-4 text-sm-end">
                                    <a href="<?= e(whatsapp_url('empresas')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--whatsapp btn-sm">
                                        <i data-lucide="message-circle" class="oi-icon-xs"></i> WhatsApp Salud Empresarial
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empresas Reales que Confían en Nosotros (Recuperadas de la Auditoría) -->
        <div class="pt-4 border-top border-secondary border-opacity-25" data-reveal="fade-up">
            <div class="text-center mb-4">
                <span class="font-monospace small text-uppercase tracking-wider text-info d-block mb-1">RESPALDO CORPORATIVO COMPROBADO</span>
                <h3 class="h4 text-white mb-0">Empresas que confían en nosotros</h3>
            </div>
            <div class="oi-partner-grid">
                <?php foreach (SITE_DATA['corporate_clients'] as $client): ?>
                    <div class="oi-partner-card">
                        <img src="<?= e(site_url($client['logo'])) ?>"
                             alt="Logotipo de <?= e($client['name']) ?> — Cliente corporativo de Óptica Infinito"
                             width="130"
                             height="44"
                             loading="lazy">
                        <span class="small text-white-50 mt-2" style="font-size: 0.72rem;"><?= e($client['sector']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     6. UBICACIONES Y SUCURSALES EN QUERÉTARO (6.1 & 6.5)
     ========================================================================== -->
<section class="oi-section oi-section--stone" id="ubicaciones" aria-labelledby="ubicacionesHeading">
    <div class="container">
        <div class="row justify-content-between align-items-end mb-5 gy-3">
            <div class="col-lg-7" data-reveal="fade-up">
                <span class="oi-eyebrow mb-2">PRESENCIA EN SANTIAGO DE QUERÉTARO</span>
                <h2 id="ubicacionesHeading" class="oi-display-lg mb-0">
                    Visítanos en nuestras <span class="oi-serif-italic fw-normal text-primary">Sucursales</span>
                </h2>
            </div>
            <div class="col-lg-5 text-lg-end" data-reveal="fade-up">
                <p class="small text-muted mb-0">
                    Horarios de atención en ambas sucursales:<br>
                    <strong class="text-dark">Lunes a viernes: 10:00 a 19:00 · Sábado: 10:00 a 14:00</strong>
                </p>
            </div>
        </div>

        <div class="row g-4" data-stagger="120">
            <?php foreach (SITE_DATA['branches'] as $key => $branch): ?>
                <div class="col-lg-6" data-reveal="fade-up">
                    <div class="oi-lens-card d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                                <span class="badge bg-primary bg-opacity-10 text-primary font-monospace px-3 py-2"><?= e($branch['badge']) ?></span>
                                <span class="small text-muted d-inline-flex align-items-center gap-1">
                                    <i data-lucide="phone" class="oi-icon-xs text-primary"></i> <?= e($branch['phone']) ?>
                                </span>
                            </div>

                            <h3 class="oi-display-md mb-3"><?= e($branch['name']) ?></h3>

                            <div class="d-flex align-items-start gap-3 mb-3 p-3 rounded-3" style="background-color: var(--oi-alabaster);">
                                <i data-lucide="map-pin" class="oi-icon-md text-primary flex-shrink-0 mt-1"></i>
                                <div>
                                    <div class="fw-semibold text-dark"><?= e($branch['address']) ?></div>
                                    <div class="small text-muted mt-1"><?= e($branch['hours_mf']) ?> · <?= e($branch['hours_sat']) ?></div>
                                </div>
                            </div>

                            <ul class="list-unstyled row g-2 mb-4 small text-slate">
                                <?php foreach ($branch['features'] as $feat): ?>
                                    <li class="col-sm-6 d-flex align-items-center gap-2">
                                        <i data-lucide="check-circle-2" class="oi-icon-xs text-primary flex-shrink-0"></i>
                                        <span><?= e($feat) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="d-flex flex-wrap align-items-center gap-3 pt-3 border-top">
                            <button type="button"
                                    class="oi-btn oi-btn--primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalAgendaCita"
                                    data-cita-sucursal="<?= e($branch['id']) ?>">
                                <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                                <span>Agendar en <?= e($branch['id']) ?></span>
                            </button>

                            <a href="<?= e($branch['maps_url']) ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="oi-btn oi-btn--outline">
                                <i data-lucide="navigation" class="oi-icon-sm"></i>
                                <span>Cómo llegar (Google Maps)</span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ==========================================================================
     7. CTA FINAL EDITORIAL (6.1)
     ========================================================================== -->
<section class="oi-section oi-section--white" aria-labelledby="ctaFinalHeading">
    <div class="container">
        <div class="p-4 p-md-5 rounded-4 position-relative overflow-hidden shadow-lg"
             style="background: linear-gradient(135deg, var(--oi-navy) 0%, #172B5C 100%); color: var(--oi-white);"
             data-reveal="scale-in">
            <div class="row align-items-center gy-4 position-relative" style="z-index: 2;">
                <div class="col-lg-7">
                    <span class="oi-eyebrow text-info mb-2">ATENCIÓN INMEDIATA EN QUERÉTARO</span>
                    <h2 id="ctaFinalHeading" class="oi-display-md text-white mb-3">
                        ¿Cuándo fue la última vez que realizaste tu examen visual?
                    </h2>
                    <p class="text-white-50 mb-0 fs-5">
                        Solicita tu cita en línea en menos de un minuto o escríbenos directamente por WhatsApp al <strong><?= e(SITE_DATA['phone_display']) ?></strong> para recibir atención personalizada.
                    </p>
                </div>
                <div class="col-lg-5 text-lg-end">
                    <div class="d-flex flex-wrap justify-content-lg-end gap-3">
                        <button type="button"
                                class="oi-btn oi-btn--primary px-4 py-3"
                                data-bs-toggle="modal"
                                data-bs-target="#modalAgendaCita">
                            <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                            <span>Solicitar cita ahora</span>
                        </button>
                        <a href="<?= e(whatsapp_url('inicio')) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="oi-btn oi-btn--whatsapp px-4 py-3">
                            <i data-lucide="message-circle" class="oi-icon-sm"></i>
                            <span>WhatsApp <?= e(SITE_DATA['phone_display']) ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
