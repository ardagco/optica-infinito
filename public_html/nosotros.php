<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$pageTitle       = 'Nosotros | Óptica Infinito — Historia y Salud Visual en Querétaro desde 2008';
$pageDescription = 'Conoce la historia de Óptica Infinito (Grupo Infinito), fundada en 2008 en Querétaro. Más de 18 años dedicados al cuidado de la salud visual familiar y empresarial.';
$pageCanonical   = canonical_url('nosotros.php');
$activeNav       = 'nosotros';
$headerTheme     = 'light';
$whatsappContext = 'nosotros';

require_once __DIR__ . '/includes/header.php';
?>

<!-- ==========================================================================
     1. HERO EDITORIAL INSTITUCIONAL (6.2)
     ========================================================================== -->
<section class="oi-hero" aria-labelledby="nosotrosHeroHeading">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6 pe-xl-5" data-stagger="100">
                <span class="oi-eyebrow mb-3" data-reveal="fade-up">NUESTRA HISTORIA · FUNDADA EN 2008</span>
                <h1 id="nosotrosHeroHeading" class="oi-display-xl mb-4" data-reveal="fade-up">
                    Más allá de tu visión: <span class="oi-serif-italic fw-normal text-primary">vocación por el cuidado visual.</span>
                </h1>
                <p class="oi-lead mb-4" data-reveal="fade-up">
                    <strong>Óptica Infinito</strong> nace en <strong>2008</strong> en la ciudad de Querétaro con un propósito claro y permanente: brindar a nuestros clientes, pacientes y amigos la mejor atención en cada visita.
                </p>
                <div class="d-flex flex-wrap align-items-center gap-3" data-reveal="fade-up">
                    <button type="button"
                            class="oi-btn oi-btn--primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalAgendaCita">
                        <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                        <span>Agenda tu cita con nosotros</span>
                    </button>
                    <a href="<?= e(site_url('contacto.php#ubicaciones')) ?>" class="oi-btn oi-btn--outline">
                        <i data-lucide="map-pin" class="oi-icon-sm"></i>
                        <span>Conoce nuestras sucursales</span>
                    </a>
                </div>
            </div>

            <div class="col-lg-6" data-reveal="scale-in">
                <div class="position-relative">
                    <div class="oi-hero__visual-frame" style="aspect-ratio: 16 / 11;">
                        <img src="<?= e(site_url('assets/img/editorial/clinic-interior-aesop.jpg')) ?>"
                             alt="Espacio de atención optométrica y exhibición de Óptica Infinito en Querétaro"
                             width="1200"
                             height="825">
                    </div>
                    <div class="oi-glass-badge oi-glass-badge--bottom-left">
                        <div class="d-flex align-items-center gap-3">
                            <img src="<?= e(site_url('assets/img/brand/logo-grupo-infinito.png')) ?>" alt="Grupo Infinito" width="130" height="28">
                            <div class="border-start ps-3">
                                <div class="oi-mono-num fw-bold">DESDE 2008</div>
                                <div class="small text-muted">Querétaro, México</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     2. HISTORIA Y EVOLUCIÓN DESDE 2008 (Composición Editorial)
     ========================================================================== -->
<section class="oi-section oi-section--white" aria-labelledby="historiaHeading">
    <div class="container">
        <div class="row gy-5 align-items-center">
            <div class="col-lg-5" data-reveal="fade-up">
                <div class="p-4 p-md-5 rounded-4 border" style="background-color: var(--oi-alabaster);">
                    <div class="text-center mb-4">
                        <img src="<?= e(site_url('assets/img/brand/logo-optica-infinito.png')) ?>"
                             alt="Logotipo Oficial Óptica Infinito"
                             width="220"
                             height="220"
                             class="img-fluid"
                             loading="lazy">
                    </div>
                    <blockquote class="mb-0 text-center">
                        <p class="oi-serif fs-3 text-dark mb-2">
                            “Los ojos son la herramienta más importante... ¡Protégelos!”
                        </p>
                        <footer class="small text-muted font-monospace text-uppercase tracking-wider">
                            Filosofía Óptica Infinito · Grupo Infinito
                        </footer>
                    </blockquote>
                </div>
            </div>

            <div class="col-lg-7 ps-xl-5" data-stagger="100">
                <span class="oi-eyebrow mb-2" data-reveal="fade-up">ORIGEN Y COMPROMISO</span>
                <h2 id="historiaHeading" class="oi-display-lg mb-4" data-reveal="fade-up">
                    Una trayectoria construida sobre la <span class="oi-serif-italic fw-normal text-primary">confianza de nuestros pacientes</span>
                </h2>
                <p class="text-slate mb-3" data-reveal="fade-up">
                    Desde nuestra fundación en <strong>2008</strong> en Santiago de Querétaro, en <strong>Óptica Infinito</strong> comprendimos que la salud visual va mucho más allá de entregar un par de lentes: se trata de escuchar las necesidades de cada persona, evaluar con rigor optométrico su visión y ofrecerle una solución que mejore genuinamente su calidad de vida.
                </p>
                <p class="text-slate mb-4" data-reveal="fade-up">
                    A lo largo de los años, evolucionamos para responder al ritmo de vida de las familias y profesionales queretanos, incorporando servicios de alta respuesta como <strong>Lentes Express con entrega el mismo día</strong>, <strong>entregas a domicilio</strong> y una división especializada en <strong>Salud Visual Empresarial y Protección Visual Industrial</strong> que lleva nuestro consultorio directamente a los centros de trabajo.
                </p>

                <!-- Línea de Evolución Real -->
                <div class="row g-3 pt-2" data-reveal="fade-up">
                    <div class="col-md-4">
                        <div class="p-3 rounded-3 border h-100">
                            <span class="oi-mono-num fw-bold d-block mb-1">2008 · FUNDACIÓN</span>
                            <h3 class="h6 fw-bold mb-1" style="font-family: var(--font-sans);">Inicio en Querétaro</h3>
                            <p class="small text-muted mb-0">Apertura con el firme compromiso de ofrecer atención personalizada a clientes, pacientes y amigos.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded-3 border h-100">
                            <span class="oi-mono-num fw-bold d-block mb-1">SUCURSALES Y EXPRESS</span>
                            <h3 class="h6 fw-bold mb-1" style="font-family: var(--font-sans);">Tecnológico y El Mirador</h3>
                            <p class="small text-muted mb-0">Consolidación de atención en Av. Tecnológico Sur y Plaza Comercial El Mirador, con servicio de Lentes Express.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded-3 border h-100">
                            <span class="oi-mono-num fw-bold d-block mb-1">DIVISIÓN EMPRESARIAL</span>
                            <h3 class="h6 fw-bold mb-1" style="font-family: var(--font-sans);">Campañas e Industria</h3>
                            <p class="small text-muted mb-0">Programas de salud visual in-company y protección industrial certificada para empresas líderes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     2.5 NUESTRA MISIÓN Y NUESTRA VISIÓN (Identidad Institucional y Ocupacional)
     ========================================================================== -->
<section class="oi-section oi-section--navy" id="mision-vision" aria-labelledby="misionVisionHeading">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 760px;" data-reveal="fade-up">
            <span class="oi-eyebrow text-info mb-2">PROPÓSITO Y RUMBO INSTITUCIONAL</span>
            <h2 id="misionVisionHeading" class="oi-display-lg text-white mb-3">
                Nuestra Misión y <span class="oi-serif-italic fw-normal" style="color: #7CE2D3;">Nuestra Visión</span>
            </h2>
            <p class="text-white-50 mb-0">
                El compromiso de Óptica Infinito y Grupo Infinito con la salud visual empresarial, la optometría ocupacional y el bienestar integral de cada paciente y colaborador.
            </p>
        </div>

        <div class="row g-4 align-items-stretch" data-stagger="120">
            <!-- NUESTRA MISIÓN -->
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="h-100 p-4 p-xl-5 rounded-4 border border-light border-opacity-10 d-flex flex-column justify-content-between" style="background: rgba(255, 255, 255, 0.04); backdrop-filter: blur(10px);">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <span class="badge rounded-pill px-3 py-2 font-monospace text-uppercase" style="background: rgba(13, 122, 111, 0.25); color: #7CE2D3; border: 1px solid rgba(124, 226, 211, 0.3);">
                                01 · Nuestro Propósito
                            </span>
                            <div class="oi-lens-card__icon mb-0" style="background: rgba(255,255,255,0.08); color: #7CE2D3;">
                                <i data-lucide="shield-check" class="oi-icon-md"></i>
                            </div>
                        </div>

                        <h3 class="oi-serif fs-2 text-white mb-3">Nuestra Misión</h3>

                        <p class="text-white-50 mb-3" style="line-height: 1.75;">
                            En <strong class="text-white">Óptica Infinito</strong> tenemos la misión de proteger y mejorar la salud visual empresarial mediante programas integrales de optometría ocupacional, acercando servicios profesionales directamente a las empresas. Brindamos exámenes de la vista para empresas con tecnología especializada, atención personalizada y un equipo altamente capacitado, ofreciendo soluciones visuales de la más alta calidad para cada colaborador.
                        </p>
                        <p class="text-white-50 mb-3" style="line-height: 1.75;">
                            Nos comprometemos a proporcionar un servicio basado en la calidad, el trato amable, la ética profesional y la garantía de satisfacción visual, asegurándonos de que cada persona reciba la mejor alternativa para cuidar su visión. Más que realizar una valoración visual, buscamos convertirnos en un aliado estratégico para nuestros clientes, contribuyendo al bienestar, la seguridad y la productividad de su capital humano.
                        </p>
                        <p class="text-white mb-0 fw-medium" style="line-height: 1.75;">
                            Creemos que una buena visión transforma vidas, por eso trabajamos cada día para ser parte de la solución en la prevención, detección y corrección de problemas visuales dentro del entorno laboral.
                        </p>
                    </div>
                </div>
            </div>

            <!-- NUESTRA VISIÓN -->
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="h-100 p-4 p-xl-5 rounded-4 border border-light border-opacity-10 d-flex flex-column justify-content-between" style="background: rgba(255, 255, 255, 0.04); backdrop-filter: blur(10px);">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <span class="badge rounded-pill px-3 py-2 font-monospace text-uppercase" style="background: rgba(197, 160, 101, 0.2); color: #E5C890; border: 1px solid rgba(197, 160, 101, 0.4);">
                                02 · Nuestro Horizonte
                            </span>
                            <div class="oi-lens-card__icon mb-0" style="background: rgba(255,255,255,0.08); color: #E5C890;">
                                <i data-lucide="eye" class="oi-icon-md"></i>
                            </div>
                        </div>

                        <h3 class="oi-serif fs-2 text-white mb-3">Nuestra Visión</h3>

                        <p class="text-white-50 mb-3" style="line-height: 1.75;">
                            Ser la empresa líder en <strong class="text-white">Salud Visual Empresarial y Optometría Ocupacional en México</strong>, reconocida por la excelencia de nuestros programas de salud visual para empresas, la innovación en nuestros procesos y el compromiso con la satisfacción de nuestros clientes.
                        </p>
                        <p class="text-white-50 mb-3" style="line-height: 1.75;">
                            Aspiramos a que cada organización cuente con un programa preventivo de cuidado visual que contribuya a mejorar la calidad de vida, la seguridad y el desempeño de sus colaboradores. Queremos ser el socio de confianza de las empresas, ofreciendo campañas de salud visual, exámenes visuales ocupacionales, soluciones ópticas de alta calidad y un servicio respaldado por la experiencia de <strong class="text-white">Grupo Infinito</strong>.
                        </p>
                        <p class="text-white mb-0 fw-medium" style="line-height: 1.75;">
                            Nuestra visión es construir relaciones duraderas con cada empresa, distinguiéndonos por la calidez en el servicio, la mejora continua, la innovación y la garantía de satisfacción visual, consolidándonos como un referente nacional en el cuidado de la salud visual en el ámbito laboral.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     3. FILOSOFÍA DE SERVICIO Y PILARES DE ATENCIÓN (6.2)
     ========================================================================== -->
<section class="oi-section oi-section--stone" aria-labelledby="filosofiaHeading">
    <div class="container">
        <div class="text-center max-w-700 mx-auto mb-5" style="max-width: 720px;" data-reveal="fade-up">
            <span class="oi-eyebrow mb-2">FILOSOFÍA DE SERVICIO</span>
            <h2 id="filosofiaHeading" class="oi-display-lg mb-3">
                Nuestros pilares de <span class="oi-serif-italic fw-normal text-primary">atención visual</span>
            </h2>
            <p class="text-muted mb-0">
                Cada consulta y cada adaptación óptica se rige por principios orientados a proteger tu visión y brindarte tranquilidad.
            </p>
        </div>

        <div class="row g-4" data-stagger="100">
            <div class="col-lg-4 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <div class="oi-lens-card__icon">
                        <i data-lucide="scan-eye" class="oi-icon-md"></i>
                    </div>
                    <h3 class="h4 mb-2">Compromiso con la salud visual</h3>
                    <p class="small text-muted mb-0">
                        Promovemos la prevención mediante exámenes visuales completos para detectar oportunamente ametropías y alteraciones visuales antes de que afecten tu desempeño diario.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <div class="oi-lens-card__icon">
                        <i data-lucide="heart-handshake" class="oi-icon-md"></i>
                    </div>
                    <h3 class="h4 mb-2">Atención personalizada y familiar</h3>
                    <p class="small text-muted mb-0">
                        En nuestras ópticas cuidamos a tu familia. Te asesoramos de manera honesta en la elección de micas, tratamientos y armazones acordes a tu rostro, graduación y presupuesto.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-12" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <div class="oi-lens-card__icon">
                        <i data-lucide="clock-4" class="oi-icon-md"></i>
                    </div>
                    <h3 class="h4 mb-2">Agilidad y respaldo real</h3>
                    <p class="small text-muted mb-0">
                        Respetamos tu tiempo ofreciendo opciones de Lentes Express con entrega el mismo día y entregas a domicilio, respaldados por nuestras sucursales físicas en Querétaro.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     4. ENFOQUE EMPRESARIAL E INDUSTRIAL (6.2 & 6.4)
     ========================================================================== -->
<section class="oi-section oi-section--white" aria-labelledby="enfoqueEmpresarialHeading">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6 order-lg-2" data-reveal="scale-in">
                <div class="oi-img-reveal shadow" style="aspect-ratio: 16 / 11;">
                    <img src="<?= e(site_url('assets/img/services/campana-empresarial-real.jpg')) ?>"
                         alt="Módulo de atención de Óptica Infinito durante campaña de salud visual empresarial"
                         width="800"
                         height="550"
                         loading="lazy">
                </div>
                <p class="small text-muted mt-2 mb-0 fst-italic">
                    Fotografía real de módulo operativo de Óptica Infinito en campaña de salud visual corporativa.
                </p>
            </div>

            <div class="col-lg-6 order-lg-1 pe-xl-5" data-stagger="100">
                <span class="oi-eyebrow mb-2" data-reveal="fade-up">ENFOQUE EMPRESARIAL</span>
                <h2 id="enfoqueEmpresarialHeading" class="oi-display-lg mb-3" data-reveal="fade-up">
                    Aliados estratégicos en <span class="oi-serif-italic fw-normal text-primary">salud ocupacional</span>
                </h2>
                <p class="text-slate mb-3" data-reveal="fade-up">
                    Además de nuestra atención a pacientes particulares en sucursal, en <strong>Óptica Infinito</strong> contamos con una sólida división corporativa dedicada a llevar la experiencia completa de nuestro consultorio directamente a las instalaciones de las empresas.
                </p>
                <p class="text-slate mb-4" data-reveal="fade-up">
                    Colaboramos con departamentos de Recursos Humanos, Seguridad e Higiene y Salud Ocupacional de organizaciones de primer nivel en el Bajío, proveyendo programas de diagnóstico visual y armazones de seguridad con certificaciones internacionales (<strong>ANSI Z87, CE EN, AS/NZS, CAN/CSA, MCEPS</strong>).
                </p>

                <div class="d-flex flex-wrap gap-3" data-reveal="fade-up">
                    <a href="<?= e(site_url('empresas.php')) ?>" class="oi-btn oi-btn--primary">
                        <i data-lucide="building-2" class="oi-icon-sm"></i>
                        <span>Conocer división Empresas</span>
                    </a>
                    <a href="<?= e(whatsapp_url('empresas')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--outline">
                        <i data-lucide="message-circle" class="oi-icon-sm"></i>
                        <span>Contactar asesor empresarial</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
