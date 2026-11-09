<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$pageTitle       = 'Salud Visual Empresarial y Optometría Ocupacional en Querétaro | Óptica Infinito';
$pageDescription = 'Programas integrales de Salud Visual Empresarial, optometría ocupacional, campañas en planta y lentes de seguridad industrial certificados (ANSI Z87, CE EN, AS/NZS, CAN/CSA, MCEPS) en Querétaro.';
$pageCanonical   = canonical_url('empresas.php');
$activeNav       = 'empresas';
$headerTheme     = 'dark';
$whatsappContext = 'empresas';
$csrfToken       = csrf_token();

$flash = $_SESSION['form_flash'] ?? null;
unset($_SESSION['form_flash']);

require_once __DIR__ . '/includes/header.php';
?>

<!-- ==========================================================================
     1. HERO SALUD VISUAL EMPRESARIAL E INDUSTRIAL (6.4)
     ========================================================================== -->
<section class="oi-hero oi-hero--dark" aria-labelledby="saludEmpresarialHeroHeading">
    <div class="container position-relative" style="z-index: 2;">
        <?php if ($flash): ?>
            <div class="alert alert-<?= e($flash['type']) ?> mb-4" role="alert">
                <?= e($flash['message']) ?>
            </div>
        <?php endif; ?>

        <div class="row align-items-center gy-5">
            <div class="col-lg-6 pe-xl-5" data-stagger="100">
                <span class="oi-eyebrow text-info mb-3" data-reveal="fade-up">SALUD EMPRESARIAL · OPTOMETRÍA OCUPACIONAL</span>
                <h1 id="saludEmpresarialHeroHeading" class="oi-display-xl text-white mb-4" data-reveal="fade-up">
                    Salud Visual <span class="oi-serif-italic fw-normal text-info">Empresarial</span> y Protección Industrial.
                </h1>
                <p class="oi-lead mb-4" data-reveal="fade-up">
                    En <strong>Óptica Infinito</strong> diseñamos programas integrales de salud visual adaptados a empresas de cualquier tamaño. Llevamos nuestros consultorios y tecnología directamente a tus instalaciones para cuidar la salud, el bienestar y la productividad de tus colaboradores.
                </p>

                <div class="d-flex flex-wrap gap-3 mb-4" data-reveal="fade-up">
                    <a href="#cotizacion-empresarial" class="oi-btn oi-btn--primary px-4 py-3">
                        <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                        <span>Solicitar programa de Salud Empresarial</span>
                        <i data-lucide="arrow-right" class="oi-icon-sm oi-btn__icon"></i>
                    </a>
                    <a href="<?= e(whatsapp_url('empresas')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--outline-light px-4 py-3">
                        <i data-lucide="message-circle" class="oi-icon-sm"></i>
                        <span>Atención WhatsApp Salud Empresarial</span>
                    </a>
                </div>

                <!-- Certificaciones Documentadas -->
                <div class="pt-3 border-top border-secondary border-opacity-25" data-reveal="fade-up">
                    <div class="small font-monospace text-info text-uppercase mb-2">Normativas en armazones de protección industrial:</div>
                    <div class="d-flex flex-wrap gap-2">
                        <?php foreach (SITE_DATA['certifications'] as $cert): ?>
                            <span class="oi-cert-pill oi-cert-pill--dark"><?= e($cert) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-reveal="scale-in">
                <div class="position-relative">
                    <div class="oi-hero__visual-frame border border-secondary border-opacity-25" style="aspect-ratio: 16 / 11;">
                        <img src="<?= e(site_url('assets/img/editorial/industrial-safety-b2b.jpg')) ?>"
                             alt="Salud Visual Empresarial y lentes de protección industrial certificados en Querétaro"
                             width="1200"
                             height="825">
                    </div>
                    <div class="oi-glass-badge oi-glass-badge--dark oi-glass-badge--bottom-left">
                        <div class="d-flex align-items-center gap-3">
                            <i data-lucide="shield-check" class="oi-icon-lg text-info flex-shrink-0"></i>
                            <div>
                                <div class="font-monospace small text-info">CONSULTORIO EN TUS INSTALACIONES</div>
                                <div class="fw-semibold small text-white">La experiencia completa de nuestro consultorio directo en su empresa</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     2. EMPRESAS QUE CONFÍAN EN NOSOTROS (6.4)
     ========================================================================== -->
<section class="py-5" style="background-color: var(--oi-obsidian); border-bottom: 1px solid rgba(255,255,255,0.08);" aria-label="Empresas que confían en Óptica Infinito">
    <div class="container">
        <div class="row align-items-center gy-4">
            <div class="col-lg-4" data-reveal="fade-up">
                <span class="font-monospace small text-info text-uppercase d-block mb-1">RESPALDO GRUPO INFINITO · DESDE 2008</span>
                <h2 class="h3 text-white mb-1">Empresas que confían en nosotros</h2>
                <p class="small text-white-50 mb-0">Organizaciones industriales y corporativas atendidas por nuestros programas de Salud Empresarial.</p>
            </div>
            <div class="col-lg-8" data-reveal="fade-up">
                <div class="oi-partner-grid">
                    <?php foreach (SITE_DATA['corporate_clients'] as $client): ?>
                        <div class="oi-partner-card">
                            <img src="<?= e(site_url($client['logo'])) ?>"
                                 alt="<?= e($client['name']) ?>"
                                 width="120"
                                 height="40"
                                 loading="lazy">
                            <span class="small text-white-50 mt-2" style="font-size: 0.7rem;"><?= e($client['sector']) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     3. PROGRAMA INTEGRAL DE SALUD VISUAL EMPRESARIAL (9 Servicios Especializados)
     ========================================================================== -->
<section class="oi-section oi-section--white" id="salud-empresarial" aria-labelledby="programaSaludEmpresarialHeading">
    <div class="container">
        <div class="row justify-content-between align-items-end mb-5 gy-4">
            <div class="col-lg-7" data-reveal="fade-up">
                <span class="oi-eyebrow mb-2">SALUD VISUAL EMPRESARIAL</span>
                <h2 id="programaSaludEmpresarialHeading" class="oi-display-lg mb-3">
                    Programas integrales adaptados a <span class="oi-serif-italic fw-normal text-primary">empresas de cualquier tamaño</span>
                </h2>
                <p class="oi-lead mb-0">
                    En <strong>Óptica Infinito</strong> diseñamos programas integrales de salud visual adaptados a empresas de cualquier tamaño. Llevamos nuestros consultorios y tecnología directamente a tus instalaciones para cuidar la salud, el bienestar y la productividad de tus colaboradores.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end" data-reveal="fade-up">
                <a href="#videos-salud-empresarial" class="oi-btn oi-btn--outline">
                    <i data-lucide="play-circle" class="oi-icon-sm"></i>
                    <span>Ver campañas en video</span>
                </a>
            </div>
        </div>

        <div class="mb-3" data-reveal="fade-up">
            <span class="font-monospace small text-uppercase text-primary fw-bold">Nuestros servicios de Salud Empresarial incluyen:</span>
        </div>

        <div class="row g-4" data-stagger="80">
            <!-- Servicio 1 -->
            <div class="col-lg-4 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="oi-mono-num fw-bold">01 · OPTOMETRÍA OCUPACIONAL</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="scan-eye" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Exámenes visuales ocupacionales y clínicos</h3>
                    <p class="small text-muted mb-0">
                        Evaluación optométrica completa realizada con equipo especializado directamente en su centro de trabajo para determinar con exactitud la agudeza y capacidad visual de cada colaborador.
                    </p>
                </div>
            </div>

            <!-- Servicio 2 -->
            <div class="col-lg-4 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="oi-mono-num fw-bold">02 · PREVENCIÓN Y DIAGNÓSTICO</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="monitor-smartphone" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Detección oportuna de enfermedades visuales y fatiga digital</h3>
                    <p class="small text-muted mb-0">
                        Identificación temprana de alteraciones oculares, ametropías y síndrome visual informático derivado del uso prolongado de pantallas y dispositivos digitales.
                    </p>
                </div>
            </div>

            <!-- Servicio 3 -->
            <div class="col-lg-4 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="oi-mono-num fw-bold">03 · PERFILES DE PUESTO</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="user-check" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Valoraciones especializadas para personal administrativo y operativo</h3>
                    <p class="small text-muted mb-0">
                        Protocolos de revisión adaptados a las exigencias visuales específicas de oficinas corporativas, líneas de producción, almacenes, laboratorios y trabajo en campo.
                    </p>
                </div>
            </div>

            <!-- Servicio 4 -->
            <div class="col-lg-4 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="oi-mono-num fw-bold">04 · SOLUCIONES ÓPTICAS</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="glasses" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Adaptación y entrega de lentes graduados</h3>
                    <p class="small text-muted mb-0">
                        Amplio muestrario de armazones oftálmicos y micas con tratamientos antirreflejantes, filtro de luz azul y fotocromáticos, entregados y ajustados directamente al colaborador.
                    </p>
                </div>
            </div>

            <!-- Servicio 5 -->
            <div class="col-lg-4 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="oi-mono-num fw-bold">05 · SEGURIDAD INDUSTRIAL</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="shield-check" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Suministro de lentes de seguridad graduados bajo normativas de protección</h3>
                    <p class="small text-muted mb-0">
                        Dotación de armazones y micas de seguridad industrial con certificaciones internacionales documentadas (<strong>ANSI Z87, CE EN, AS/NZS, CAN/CSA y MCEPS</strong>).
                    </p>
                </div>
            </div>

            <!-- Servicio 6 -->
            <div class="col-lg-4 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="oi-mono-num fw-bold">06 · LOGÍSTICA CORPORATIVA</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="calendar-range" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Organización e implementación de campañas de salud corporativa</h3>
                    <p class="small text-muted mb-0">
                        Planeación integral de jornadas y ferias de salud visual en sus instalaciones, coordinando horarios y turnos sin interrumpir la operación de su empresa.
                    </p>
                </div>
            </div>

            <!-- Servicio 7 -->
            <div class="col-lg-4 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="oi-mono-num fw-bold">07 · INDICADORES Y MÉTRICAS</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="bar-chart-3" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Generación de reportes estadísticos y métricas de salud visual</h3>
                    <p class="small text-muted mb-0">
                        Entrega de información ejecutiva sobre el estado visual de la plantilla evaluada para respaldar la toma de decisiones de Recursos Humanos y Salud Ocupacional.
                    </p>
                </div>
            </div>

            <!-- Servicio 8 -->
            <div class="col-lg-4 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="oi-mono-num fw-bold">08 · CONTINUIDAD CLÍNICA</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="activity" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Seguimiento clínico continuo de los colaboradores</h3>
                    <p class="small text-muted mb-0">
                        Acompañamiento periódico, garantía de satisfacción visual, ajustes y actualización de graduaciones para mantener el bienestar visual a largo plazo.
                    </p>
                </div>
            </div>

            <!-- Servicio 9 -->
            <div class="col-lg-4 col-md-12" data-reveal="fade-up">
                <div class="oi-lens-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="oi-mono-num fw-bold">09 · RECLUTAMIENTO E INDUCCIÓN</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="user-plus" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Atención y evaluación a personal de nuevo ingreso</h3>
                    <p class="small text-muted mb-0">
                        Valoraciones optométricas de admisión para validar que cada nuevo colaborador cuente con la agudeza y protección visual requeridas por su puesto desde el primer día.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     4. VIDEOS DE SALUD EMPRESARIAL EN ACCIÓN (Galería Multimedia Real)
     ========================================================================== -->
<section class="oi-section oi-section--navy" id="videos-salud-empresarial" aria-labelledby="videosSaludEmpresarialHeading">
    <div class="container">
        <div class="row justify-content-between align-items-end mb-5 gy-3">
            <div class="col-lg-7" data-reveal="fade-up">
                <span class="oi-eyebrow text-info mb-2">SALUD EMPRESARIAL EN ACCIÓN</span>
                <h2 id="videosSaludEmpresarialHeading" class="oi-display-lg text-white mb-2">
                    Nuestras campañas y consultorios móviles <span class="oi-serif-italic fw-normal" style="color: #7CE2D3;">directo en tu empresa</span>
                </h2>
                <p class="text-white-50 mb-0">
                    Conoce cómo acercamos tecnología especializada, exámenes visuales ocupacionales y soluciones ópticas de alta calidad a los centros de trabajo.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end" data-reveal="fade-up">
                <a href="#cotizacion-empresarial" class="oi-btn oi-btn--primary">
                    <i data-lucide="calendar-plus" class="oi-icon-sm"></i>
                    <span>Llevar campaña a mi empresa</span>
                </a>
            </div>
        </div>

        <div class="row g-4 align-items-stretch" data-stagger="120">
            <!-- Video 1: Salud Empresarial -->
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="h-100 p-3 p-md-4 rounded-4 border border-light border-opacity-10 d-flex flex-column justify-content-between" style="background: rgba(255, 255, 255, 0.04);">
                    <div>
                        <div class="rounded-3 overflow-hidden bg-black mb-3 position-relative shadow-lg" style="aspect-ratio: 16 / 10;">
                            <video class="w-100 h-100"
                                   style="object-fit: contain; background: #050A12;"
                                   controls
                                   playsinline
                                   preload="metadata"
                                   poster="<?= e(site_url('assets/img/services/campana-empresarial-real.jpg')) ?>">
                                <source src="<?= e(site_url('assets/video/salud-empresarial-1.mp4')) ?>" type="video/mp4">
                                <source src="<?= e(site_url('assets/video/salud-empresarial-1.mp4')) ?>" type="video/quicktime">
                                Tu navegador no soporta reproducción de video HTML5.
                            </video>
                        </div>
                        <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
                            <span class="badge rounded-pill font-monospace" style="background: rgba(13, 122, 111, 0.3); color: #7CE2D3;">
                                VIDEO 01 · CAMPAÑA EN INSTALACIONES
                            </span>
                            <span class="small text-white-50 font-monospace">00:36 s</span>
                        </div>
                        <h3 class="h4 text-white mb-2">Programa Integral de Salud Visual Empresarial</h3>
                        <p class="small text-white-50 mb-0">
                            Instalación de consultorios móviles, atención personalizada con equipo especializado y asesoría óptica directa para los colaboradores dentro de su centro laboral.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Video 2: Optometría Ocupacional -->
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="h-100 p-3 p-md-4 rounded-4 border border-light border-opacity-10 d-flex flex-column justify-content-between" style="background: rgba(255, 255, 255, 0.04);">
                    <div>
                        <div class="rounded-3 overflow-hidden bg-black mb-3 position-relative shadow-lg" style="aspect-ratio: 16 / 10;">
                            <video class="w-100 h-100"
                                   style="object-fit: contain; background: #050A12;"
                                   controls
                                   playsinline
                                   preload="metadata"
                                   poster="<?= e(site_url('assets/img/editorial/industrial-safety-b2b.jpg')) ?>">
                                <source src="<?= e(site_url('assets/video/salud-empresarial-2.mp4')) ?>" type="video/mp4">
                                <source src="<?= e(site_url('assets/video/salud-empresarial-2.mp4')) ?>" type="video/quicktime">
                                Tu navegador no soporta reproducción de video HTML5.
                            </video>
                        </div>
                        <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
                            <span class="badge rounded-pill font-monospace" style="background: rgba(197, 160, 101, 0.25); color: #E5C890;">
                                VIDEO 02 · OPTOMETRÍA OCUPACIONAL
                            </span>
                            <span class="small text-white-50 font-monospace">00:15 s</span>
                        </div>
                        <h3 class="h4 text-white mb-2">Evaluación Visual Ocupacional y Soluciones Ópticas</h3>
                        <p class="small text-white-50 mb-0">
                            Valoraciones clínicas especializadas para personal administrativo y operativo, detección de fatiga digital y adaptación de lentes graduados y de protección.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     5. NUESTRA MISIÓN Y NUESTRA VISIÓN EN SALUD EMPRESARIAL
     ========================================================================== -->
<section class="oi-section oi-section--alabaster" id="mision-vision-empresarial" aria-labelledby="misionVisionEmpresarialHeading">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 780px;" data-reveal="fade-up">
            <span class="oi-eyebrow mb-2">FILOSOFÍA DE SALUD EMPRESARIAL · GRUPO INFINITO</span>
            <h2 id="misionVisionEmpresarialHeading" class="oi-display-lg mb-3">
                Nuestra Misión y <span class="oi-serif-italic fw-normal text-primary">Nuestra Visión</span>
            </h2>
            <p class="text-muted mb-0">
                Más que realizar una valoración visual, buscamos convertirnos en un aliado estratégico para nuestros clientes, contribuyendo al bienestar, la seguridad y la productividad de su capital humano.
            </p>
        </div>

        <div class="row g-4 align-items-stretch" data-stagger="120">
            <!-- Nuestra Misión -->
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="oi-lens-card h-100 p-4 p-xl-5 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <span class="oi-mono-num fw-bold">01 · NUESTRA MISIÓN</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="shield-check" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h3 class="oi-serif fs-2 mb-3">Nuestra Misión</h3>
                    <p class="text-slate mb-3">
                        En <strong>Óptica Infinito</strong> tenemos la misión de proteger y mejorar la salud visual empresarial mediante programas integrales de optometría ocupacional, acercando servicios profesionales directamente a las empresas. Brindamos exámenes de la vista para empresas con tecnología especializada, atención personalizada y un equipo altamente capacitado, ofreciendo soluciones visuales de la más alta calidad para cada colaborador.
                    </p>
                    <p class="text-slate mb-3">
                        Nos comprometemos a proporcionar un servicio basado en la calidad, el trato amable, la ética profesional y la garantía de satisfacción visual, asegurándonos de que cada persona reciba la mejor alternativa para cuidar su visión. Más que realizar una valoración visual, buscamos convertirnos en un aliado estratégico para nuestros clientes, contribuyendo al bienestar, la seguridad y la productividad de su capital humano.
                    </p>
                    <p class="text-dark fw-semibold mb-0">
                        Creemos que una buena visión transforma vidas, por eso trabajamos cada día para ser parte de la solución en la prevención, detección y corrección de problemas visuales dentro del entorno laboral.
                    </p>
                </div>
            </div>

            <!-- Nuestra Visión -->
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="oi-lens-card h-100 p-4 p-xl-5 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <span class="oi-mono-num fw-bold">02 · NUESTRA VISIÓN</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="award" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h3 class="oi-serif fs-2 mb-3">Nuestra Visión</h3>
                    <p class="text-slate mb-3">
                        Ser la empresa líder en <strong>Salud Visual Empresarial y Optometría Ocupacional en México</strong>, reconocida por la excelencia de nuestros programas de salud visual para empresas, la innovación en nuestros procesos y el compromiso con la satisfacción de nuestros clientes.
                    </p>
                    <p class="text-slate mb-3">
                        Aspiramos a que cada organización cuente con un programa preventivo de cuidado visual que contribuya a mejorar la calidad de vida, la seguridad y el desempeño de sus colaboradores. Queremos ser el socio de confianza de las empresas, ofreciendo campañas de salud visual, exámenes visuales ocupacionales, soluciones ópticas de alta calidad y un servicio respaldado por la experiencia de <strong>Grupo Infinito</strong>.
                    </p>
                    <p class="text-dark fw-semibold mb-0">
                        Nuestra visión es construir relaciones duraderas con cada empresa, distinguiéndonos por la calidez en el servicio, la mejora continua, la innovación y la garantía de satisfacción visual, consolidándonos como un referente nacional en el cuidado de la salud visual en el ámbito laboral.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     6. PROTECCIÓN VISUAL INDUSTRIAL Y SOLUCIONES POR ÁREA (6.4)
     ========================================================================== -->
<section class="oi-section oi-section--white" id="proteccion-industrial" aria-labelledby="proteccionHeading">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6" data-reveal="scale-in">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="oi-img-reveal shadow" style="aspect-ratio: 16 / 10;">
                            <img src="<?= e(site_url('assets/img/services/campana-empresarial-real.jpg')) ?>"
                                 alt="Módulo de campaña de Salud Visual Empresarial de Óptica Infinito en empresa"
                                 width="800"
                                 height="500"
                                 loading="lazy">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-4 rounded-4 bg-dark text-white" style="background-color: var(--oi-navy) !important;">
                            <div class="font-monospace small text-info mb-2">CERTIFICACIONES DOCUMENTADAS EN ARMAZONES DE SEGURIDAD</div>
                            <div class="d-flex flex-wrap gap-2 mb-2">
                                <?php foreach (SITE_DATA['certifications'] as $cert): ?>
                                    <span class="oi-cert-pill oi-cert-pill--dark"><?= e($cert) ?></span>
                                <?php endforeach; ?>
                            </div>
                            <p class="small text-white-50 mb-0">
                                Nuestras armazones de seguridad industrial cuentan con las certificaciones <strong>ANSI Z87, CE EN, AS/NZS, CAN/CSA y MCEPS</strong> aplicables a entornos de manufactura, energía, aeroespacial y laboratorios.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ps-xl-5" data-stagger="100">
                <span class="oi-eyebrow mb-2" data-reveal="fade-up">PROTECCIÓN Y RENDIMIENTO LABORAL</span>
                <h2 id="proteccionHeading" class="oi-display-lg mb-3" data-reveal="fade-up">
                    Protección Visual Industrial y <span class="oi-serif-italic fw-normal text-primary">Atención Multidepartamental</span>
                </h2>
                <p class="text-slate mb-3" data-reveal="fade-up">
                    En la mayoría de las industrias, el uso de protección visual es indispensable para proteger al trabajador contra peligros <strong>mecánicos, químicos, térmicos, eléctricos o de luz artificial</strong>.
                </p>
                <p class="text-slate mb-4" data-reveal="fade-up">
                    Trabajamos de la mano con áreas de <strong>Recursos Humanos, Seguridad e Higiene (EHS), Salud Ocupacional, Compras y Dirección Empresarial</strong> para implementar campañas llave en mano y dotación de lentes de seguridad graduados.
                </p>

                <!-- Beneficios Empresariales -->
                <div class="d-grid gap-3 mb-4" data-reveal="fade-up">
                    <div class="p-3 rounded-3 border bg-light bg-opacity-50 d-flex align-items-start gap-3">
                        <i data-lucide="building" class="oi-icon-md text-primary flex-shrink-0 mt-1"></i>
                        <div>
                            <strong class="d-block text-dark">Consultorio móvil en sus instalaciones</strong>
                            <span class="small text-muted">Instalamos nuestro equipamiento optométrico y exhibición de armazones directamente en su planta u oficinas.</span>
                        </div>
                    </div>
                    <div class="p-3 rounded-3 border bg-light bg-opacity-50 d-flex align-items-start gap-3">
                        <i data-lucide="bar-chart-3" class="oi-icon-md text-primary flex-shrink-0 mt-1"></i>
                        <div>
                            <strong class="d-block text-dark">Reportes estadísticos y seguimiento clínico</strong>
                            <span class="small text-muted">Entregamos métricas de salud visual de su plantilla y damos seguimiento continuo tanto a colaboradores activos como a personal de nuevo ingreso.</span>
                        </div>
                    </div>
                    <div class="p-3 rounded-3 border bg-light bg-opacity-50 d-flex align-items-start gap-3">
                        <i data-lucide="credit-card" class="oi-icon-md text-primary flex-shrink-0 mt-1"></i>
                        <div>
                            <strong class="d-block text-dark">Esquemas flexibles para empresa y colaborador</strong>
                            <span class="small text-muted">Facturación corporativa, convenios de descuento y aceptación de tarjetas (VISA, MasterCard, Amex, Carnet, Sí Vale y meses sin intereses aplicables).</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     7. PROCESO DE SOLICITUD E IMPLEMENTACIÓN DE SALUD EMPRESARIAL (6.4)
     ========================================================================== -->
<section class="oi-section oi-section--stone" aria-labelledby="procesoSaludEmpresarialHeading">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;" data-reveal="fade-up">
            <span class="oi-eyebrow mb-2">METODOLOGÍA DE SALUD EMPRESARIAL</span>
            <h2 id="procesoSaludEmpresarialHeading" class="oi-display-lg mb-2">
                Proceso de solicitud e <span class="oi-serif-italic fw-normal text-primary">implementación</span>
            </h2>
            <p class="text-muted mb-0">Un flujo ágil y ordenado para implementar su campaña de Salud Visual Empresarial o dotación de lentes industriales sin fricciones operativas.</p>
        </div>

        <div class="row g-4" data-stagger="100">
            <div class="col-lg-3 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <span class="oi-mono-num fw-bold d-block mb-2">PASO 01</span>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Solicitud y diagnóstico</h3>
                    <p class="small text-muted mb-0">Completa el formulario de Salud Empresarial o contáctanos por WhatsApp indicando el giro de tu empresa, número de colaboradores y requerimiento.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <span class="oi-mono-num fw-bold d-block mb-2">PASO 02</span>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Programa a medida</h3>
                    <p class="small text-muted mb-0">Definimos el alcance clínico (administrativo, operativo o nuevo ingreso), catálogo de armazones oftálmicos o industriales certificados y fechas de campaña.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <span class="oi-mono-num fw-bold d-block mb-2">PASO 03</span>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Jornada optométrica</h3>
                    <p class="small text-muted mb-0">Acudimos a sus instalaciones con nuestros consultorios móviles y tecnología especializada, o recibimos a su personal en nuestras sucursales en Querétaro.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <span class="oi-mono-num fw-bold d-block mb-2">PASO 04</span>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Entrega, reportes y seguimiento</h3>
                    <p class="small text-muted mb-0">Entregamos los lentes graduados o de seguridad, generamos reportes estadísticos de salud visual y brindamos seguimiento clínico continuo.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     8. FORMULARIO DE SALUD EMPRESARIAL + PORTAL EMPRESAS (6.4 & 7)
     ========================================================================== -->
<section class="oi-section oi-section--white" id="cotizacion-empresarial" aria-labelledby="cotizacionHeading">
    <div class="container">
        <div class="row g-5 align-items-start">
            <!-- Formulario Especializado de Salud Empresarial -->
            <div class="col-lg-7" data-reveal="fade-up">
                <div class="oi-form-card">
                    <span class="oi-eyebrow mb-2">SOLICITUD Y CAMPAÑAS DE SALUD EMPRESARIAL</span>
                    <h2 id="cotizacionHeading" class="oi-display-md mb-2">Solicita un programa de Salud Visual para tu empresa</h2>
                    <p class="text-muted small mb-4">
                        Tu solicitud llegará directamente a nuestra coordinación de Salud Visual Empresarial en <strong><?= e(SITE_DATA['email']) ?></strong>.
                    </p>

                    <form action="<?= e(site_url('forms/empresas.php')) ?>" method="POST" class="oi-ajax-form" novalidate>
                        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
                        <div class="oi-hp-field" aria-hidden="true">
                            <label for="emp_website_url">No llenar</label>
                            <input type="text" id="emp_website_url" name="website_url" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="emp_nombre" class="oi-label">Nombre de empresa <span class="text-danger">*</span></label>
                                <input type="text" class="form-control oi-input" id="emp_nombre" name="empresa" placeholder="Ej. Industrias del Bajío S.A. de C.V." required minlength="2" maxlength="150">
                                <div class="invalid-feedback">Ingresa el nombre de tu empresa.</div>
                            </div>

                            <div class="col-md-6">
                                <label for="emp_contacto" class="oi-label">Nombre del contacto <span class="text-danger">*</span></label>
                                <input type="text" class="form-control oi-input" id="emp_contacto" name="contacto" placeholder="Nombre y cargo / área" required minlength="3" maxlength="120">
                                <div class="invalid-feedback">Ingresa el nombre de la persona de contacto.</div>
                            </div>

                            <div class="col-md-6">
                                <label for="emp_correo" class="oi-label">Correo empresarial <span class="text-danger">*</span></label>
                                <input type="email" class="form-control oi-input" id="emp_correo" name="correo" placeholder="contacto@empresa.com.mx" required maxlength="150">
                                <div class="invalid-feedback">Ingresa un correo electrónico válido.</div>
                            </div>

                            <div class="col-md-6">
                                <label for="emp_telefono" class="oi-label">Teléfono / Extensión <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control oi-input" id="emp_telefono" name="telefono" placeholder="Ej. 442 221 7851" required pattern="[0-9+\-\s()extEXT.]{10,25}">
                                <div class="invalid-feedback">Ingresa un teléfono válido de al menos 10 dígitos.</div>
                            </div>

                            <div class="col-md-6">
                                <label for="emp_colaboradores" class="oi-label">Número aproximado de colaboradores <span class="text-danger">*</span></label>
                                <select class="form-select oi-input" id="emp_colaboradores" name="colaboradores" required>
                                    <option value="">Selecciona un rango...</option>
                                    <option value="1 a 25 colaboradores">1 a 25 colaboradores</option>
                                    <option value="26 a 100 colaboradores">26 a 100 colaboradores</option>
                                    <option value="101 a 300 colaboradores">101 a 300 colaboradores</option>
                                    <option value="301 a 1,000 colaboradores">301 a 1,000 colaboradores</option>
                                    <option value="Más de 1,000 colaboradores">Más de 1,000 colaboradores</option>
                                </select>
                                <div class="invalid-feedback">Selecciona el número aproximado de colaboradores.</div>
                            </div>

                            <div class="col-md-6">
                                <label for="emp_servicio" class="oi-label">Servicio de Salud Empresarial requerido <span class="text-danger">*</span></label>
                                <select class="form-select oi-input" id="emp_servicio" name="servicio" required>
                                    <option value="">Selecciona el servicio...</option>
                                    <option value="Campaña de Salud Visual Empresarial en instalaciones">Campaña de Salud Visual Empresarial en instalaciones</option>
                                    <option value="Exámenes visuales ocupacionales y evaluación de nuevo ingreso">Exámenes visuales ocupacionales y evaluación de nuevo ingreso</option>
                                    <option value="Suministro de Lentes de Seguridad Graduados (ANSI Z87 / CE EN)">Suministro de Lentes de Seguridad Graduados (ANSI Z87 / CE EN)</option>
                                    <option value="Programa integral (Campaña + Reportes Estadísticos + Seguridad Industrial)">Programa integral (Campaña + Reportes Estadísticos + Seguridad Industrial)</option>
                                    <option value="Convenio corporativo de beneficios en sucursal">Convenio corporativo de beneficios en sucursal</option>
                                </select>
                                <div class="invalid-feedback">Selecciona el servicio empresarial requerido.</div>
                            </div>

                            <div class="col-12">
                                <label for="emp_mensaje" class="oi-label">Mensaje y requerimientos específicos <span class="text-danger">*</span></label>
                                <textarea class="form-control oi-input" id="emp_mensaje" name="mensaje" rows="3" required minlength="5" maxlength="2500" placeholder="Indícanos ubicación de la planta/oficinas, fechas tentativas o normativas de seguridad requeridas..."></textarea>
                                <div class="invalid-feedback">Describe brevemente los requerimientos de tu empresa.</div>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="emp_privacidad" name="privacidad" value="1" required>
                                    <label class="form-check-label small text-muted" for="emp_privacidad">
                                        Acepto el <a href="<?= e(site_url('legal/privacidad.php')) ?>" target="_blank">Aviso de Privacidad</a> de Óptica Infinito.
                                    </label>
                                    <div class="invalid-feedback">Debes aceptar el Aviso de Privacidad.</div>
                                </div>
                            </div>
                        </div>

                        <div class="oi-form-feedback mt-3" role="status" aria-live="polite"></div>

                        <div class="mt-4 pt-2">
                            <button type="submit" class="oi-btn oi-btn--primary w-100 justify-content-center py-3">
                                <span class="oi-btn__text">Enviar solicitud de Salud Empresarial</span>
                                <span class="oi-btn__spinner spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                                <i data-lucide="send" class="oi-icon-sm oi-btn__icon"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Columna Lateral: Contacto Directo Salud Empresarial + Acceso Portal Empresas Existente -->
            <div class="col-lg-5" data-reveal="fade-up">
                <!-- Tarjeta de Contacto Directo Salud Empresarial -->
                <div class="p-4 rounded-4 mb-4 text-white" style="background-color: var(--oi-navy);">
                    <span class="font-monospace small text-info text-uppercase d-block mb-1">ATENCIÓN DIRECTA · SALUD EMPRESARIAL</span>
                    <h3 class="h4 text-white mb-3">¿Deseas atención inmediata para tu planta o corporativo?</h3>
                    <p class="small text-white-50 mb-4">
                        Comunícate con nuestra coordinación de Salud Visual Empresarial y Optometría Ocupacional en Querétaro.
                    </p>
                    <div class="d-grid gap-3 mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-2 rounded-3 bg-white bg-opacity-10 text-info">
                                <i data-lucide="phone-call" class="oi-icon-sm"></i>
                            </div>
                            <div>
                                <div class="small text-white-50">Teléfono y WhatsApp Salud Empresarial</div>
                                <a href="tel:<?= e(SITE_DATA['phone_raw']) ?>" class="text-white fw-bold text-decoration-none"><?= e(SITE_DATA['phone_display']) ?></a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-2 rounded-3 bg-white bg-opacity-10 text-info">
                                <i data-lucide="mail" class="oi-icon-sm"></i>
                            </div>
                            <div>
                                <div class="small text-white-50">Correo Electrónico Oficial</div>
                                <a href="mailto:<?= e(SITE_DATA['email']) ?>" class="text-white fw-semibold text-decoration-none small"><?= e(SITE_DATA['email']) ?></a>
                            </div>
                        </div>
                    </div>
                    <a href="<?= e(whatsapp_url('empresas')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--whatsapp w-100 justify-content-center">
                        <i data-lucide="message-circle" class="oi-icon-sm"></i>
                        <span>Iniciar conversación por WhatsApp</span>
                    </a>
                </div>

                <!-- Módulo de Acceso a Cuenta de Empresas (Conservado de /empresas/login) -->
                <div class="oi-lens-card" id="portal-empresas">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="oi-mono-num fw-bold">MI CUENTA · SALUD EMPRESARIAL</span>
                        <i data-lucide="lock" class="oi-icon-sm text-primary"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-2" style="font-family: var(--font-sans);">Acceso a Convenios Empresariales</h3>
                    <p class="small text-muted mb-3">
                        Si su empresa cuenta con credenciales activas del sistema de convenios de Grupo Infinito, ingrese sus datos de acceso.
                    </p>

                    <form action="<?= e(site_url('empresas.php#portal-empresas')) ?>" method="POST" class="needs-validation" novalidate>
                        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
                        <input type="hidden" name="portal_login_attempt" value="empresas">
                        <div class="mb-3">
                            <label for="emp_login_user" class="oi-label">Usuario / Correo corporativo</label>
                            <input type="text" class="form-control oi-input" id="emp_login_user" name="login_user" placeholder="Usuario o correo registrado" required>
                        </div>
                        <div class="mb-3">
                            <label for="emp_login_pass" class="oi-label">Contraseña</label>
                            <input type="password" class="form-control oi-input" id="emp_login_pass" name="login_password" placeholder="••••••••" required>
                        </div>
                        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['portal_login_attempt'] ?? '') === 'empresas'): ?>
                            <div class="alert alert-info small py-2 px-3 mb-3" role="alert">
                                <strong>Aviso del sistema:</strong> La validación de cuentas corporativas requiere conexión activa con la base de datos interna de convenios en el servidor de producción o confirmación de credenciales. Por favor contacte a su ejecutivo en <a href="mailto:<?= e(SITE_DATA['email']) ?>" class="alert-link"><?= e(SITE_DATA['email']) ?></a> o al <strong><?= e(SITE_DATA['phone_display']) ?></strong>.
                            </div>
                        <?php endif; ?>
                        <button type="submit" class="oi-btn oi-btn--dark w-100 justify-content-center">
                            <i data-lucide="log-in" class="oi-icon-sm"></i>
                            <span>Ingresar al portal empresarial</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
