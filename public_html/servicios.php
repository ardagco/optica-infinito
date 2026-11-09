<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$pageTitle       = 'Servicios Ópticos en Querétaro | Exámenes Visuales, Lentes Express y Salud Empresarial';
$pageDescription = 'Catálogo de servicios de Óptica Infinito en Querétaro: exámenes visuales profesionales, lentes de contacto, lentes express el mismo día, entregas a domicilio, salud visual empresarial y protección industrial certificada.';
$pageCanonical   = canonical_url('servicios.php');
$activeNav       = 'servicios';
$headerTheme     = 'light';
$whatsappContext = 'servicios';

require_once __DIR__ . '/includes/header.php';
?>

<!-- ==========================================================================
     1. HERO DE CATÁLOGO DE SERVICIOS (6.3)
     ========================================================================== -->
<section class="oi-hero pb-5" aria-labelledby="serviciosPageHeading">
    <div class="container">
        <div class="row align-items-end gy-4">
            <div class="col-lg-8" data-stagger="100">
                <span class="oi-eyebrow mb-3" data-reveal="fade-up">CATÁLOGO DE SOLUCIONES VISUALES · QUERÉTARO</span>
                <h1 id="serviciosPageHeading" class="oi-display-xl mb-3" data-reveal="fade-up">
                    Servicios diseñados para la <span class="oi-serif-italic fw-normal text-primary">precisión de tu mirada.</span>
                </h1>
                <p class="oi-lead mb-0" data-reveal="fade-up">
                    Desde evaluaciones optométricas integrales y entrega de lentes el mismo día hasta programas corporativos in-company y protección visual industrial certificada.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end" data-reveal="fade-up">
                <div class="d-inline-flex flex-wrap gap-2">
                    <button type="button"
                            class="oi-btn oi-btn--primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalAgendaCita">
                        <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                        <span>Agendar cita ahora</span>
                    </button>
                    <a href="<?= e(whatsapp_url('servicios')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--ghost-whatsapp">
                        <i data-lucide="message-circle" class="oi-icon-sm"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Índice Rápido de Navegación por Servicio -->
        <div class="d-flex flex-wrap gap-2 mt-5 pt-3 border-top" data-reveal="fade-up">
            <a href="#examenes-visuales" class="btn btn-sm btn-outline-dark rounded-pill px-3">01 · Exámenes visuales</a>
            <a href="#lentes-express" class="btn btn-sm btn-outline-dark rounded-pill px-3">02 · Lentes express</a>
            <a href="#lentes-de-contacto" class="btn btn-sm btn-outline-dark rounded-pill px-3">03 · Lentes de contacto</a>
            <a href="#salud-empresarial" class="btn btn-sm btn-outline-dark rounded-pill px-3">04 · Salud visual empresarial</a>
            <a href="#proteccion-industrial" class="btn btn-sm btn-outline-dark rounded-pill px-3">05 · Protección visual industrial</a>
            <a href="#entregas-domicilio" class="btn btn-sm btn-outline-dark rounded-pill px-3">06 · Entregas a domicilio</a>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SERVICIO 01: EXÁMENES VISUALES (Presentación Editorial Destacada)
     ========================================================================== -->
<section class="oi-section oi-section--white" id="examenes-visuales" aria-labelledby="srv01Heading">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6" data-reveal="scale-in">
                <div class="oi-img-reveal shadow-lg" style="aspect-ratio: 4 / 3;">
                    <img src="<?= e(site_url('assets/img/services/foroptero-examen-visual.jpg')) ?>"
                         alt="Foróptero y equipamiento optométrico para examen visual en Óptica Infinito"
                         width="800"
                         height="600"
                         loading="lazy">
                </div>
            </div>
            <div class="col-lg-6 ps-xl-5" data-stagger="90">
                <div class="d-flex align-items-center gap-3 mb-2" data-reveal="fade-up">
                    <span class="oi-mono-num fw-bold">SERVICIO 01</span>
                    <span class="badge bg-primary bg-opacity-10 text-primary">Atención en Sucursal y Campañas</span>
                </div>
                <h2 id="srv01Heading" class="oi-display-lg mb-3" data-reveal="fade-up">
                    Exámenes visuales profesionales
                </h2>
                <p class="oi-lead mb-3" data-reveal="fade-up">
                    ¿Por qué es importante realizarse un examen visual? La salud visual es fundamental para nuestra calidad de vida. Un examen visual regular puede detectar problemas oculares potenciales y prevenir complicaciones graves.
                </p>
                <p class="text-muted mb-4" data-reveal="fade-up">
                    En <strong>Óptica Infinito</strong> realizamos evaluaciones optométricas detalladas para conocer el estado refractivo y funcional de tus ojos, recomendando la graduación y el tratamiento óptico exacto para tus actividades cotidianas, de estudio o frente a pantallas.
                </p>

                <!-- Beneficios e Información Relevante -->
                <div class="row g-3 mb-4" data-reveal="fade-up">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-2">
                            <i data-lucide="check-circle-2" class="oi-icon-sm text-primary flex-shrink-0 mt-1"></i>
                            <span class="small"><strong>Detección oportuna:</strong> Identificación de miopía, hipermetropía, astigmatismo y presbicia.</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-2">
                            <i data-lucide="check-circle-2" class="oi-icon-sm text-primary flex-shrink-0 mt-1"></i>
                            <span class="small"><strong>Prevención visual:</strong> Reducción de fatiga ocular digital, cefaleas y esfuerzo visual.</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-2">
                            <i data-lucide="check-circle-2" class="oi-icon-sm text-primary flex-shrink-0 mt-1"></i>
                            <span class="small"><strong>Atención integral:</strong> Consulta para niños, jóvenes, adultos y adultos mayores.</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-2">
                            <i data-lucide="map-pin" class="oi-icon-sm text-primary flex-shrink-0 mt-1"></i>
                            <span class="small"><strong>Disponibilidad:</strong> Sucursal Tecnológico y Sucursal Plaza El Mirador.</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3 pt-2" data-reveal="fade-up">
                    <button type="button"
                            class="oi-btn oi-btn--primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalAgendaCita"
                            data-cita-servicio="Examen visual">
                        <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                        <span>Agendar examen visual</span>
                    </button>
                    <a href="<?= e(whatsapp_url('examen')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--outline">
                        <i data-lucide="message-circle" class="oi-icon-sm"></i>
                        <span>Contactar por WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SERVICIO 02: LENTES EXPRESS (Bloque Diferenciado de Alto Contraste)
     ========================================================================== -->
<section class="oi-section oi-section--stone" id="lentes-express" aria-labelledby="srv02Heading">
    <div class="container">
        <div class="p-4 p-md-5 rounded-4 shadow-sm bg-white border">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6 order-lg-2" data-reveal="scale-in">
                    <div class="oi-img-reveal" style="aspect-ratio: 16 / 10;">
                        <img src="<?= e(site_url('assets/img/editorial/lens-precision-macro.jpg')) ?>"
                             alt="Laboratorio y precisión óptica para Lentes Express el mismo día en Óptica Infinito"
                             width="800"
                             height="500"
                             loading="lazy">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1 pe-xl-4" data-stagger="90">
                    <div class="d-flex align-items-center gap-3 mb-2" data-reveal="fade-up">
                        <span class="oi-mono-num fw-bold">SERVICIO 02</span>
                        <span class="badge bg-info bg-opacity-15 text-dark font-monospace">ENTREGA EL MISMO DÍA</span>
                    </div>
                    <h2 id="srv02Heading" class="oi-display-lg mb-3" data-reveal="fade-up">
                        Lentes Express: <span class="oi-serif-italic fw-normal text-primary">tus lentes el mismo día</span>
                    </h2>
                    <p class="oi-lead mb-3" data-reveal="fade-up">
                        Entrega de lentes el mismo día para quienes necesitan recuperar su nitidez visual de forma inmediata sin comprometer la calidad óptica.
                    </p>
                    <ul class="list-unstyled d-grid gap-2 mb-4 small text-slate" data-reveal="fade-up">
                        <li class="d-flex align-items-center gap-2">
                            <i data-lucide="zap" class="oi-icon-sm text-primary flex-shrink-0"></i>
                            <span><strong>Respuesta inmediata:</strong> Ideal en caso de ruptura o extravío de tus lentes de uso diario.</span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i data-lucide="shield-check" class="oi-icon-sm text-primary flex-shrink-0"></i>
                            <span><strong>Precisión garantizada:</strong> Montaje y verificación optométrica de centros ópticos.</span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i data-lucide="info" class="oi-icon-sm text-primary flex-shrink-0"></i>
                            <span><strong>Información relevante:</strong> Aplicable de acuerdo con graduación y disponibilidad de micas en sucursal.</span>
                        </li>
                    </ul>
                    <div class="d-flex flex-wrap gap-3" data-reveal="fade-up">
                        <button type="button"
                                class="oi-btn oi-btn--primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalAgendaCita"
                                data-cita-servicio="Lentes express">
                            <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                            <span>Solicitar Lentes Express</span>
                        </button>
                        <a href="<?= e(whatsapp_url('express')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--outline">
                            <i data-lucide="message-circle" class="oi-icon-sm"></i>
                            <span>Consultar mi graduación por WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SERVICIO 03 & 06: LENTES DE CONTACTO + ENTREGAS A DOMICILIO (Asimétrico)
     ========================================================================== -->
<section class="oi-section oi-section--white" aria-label="Lentes de contacto y entregas a domicilio">
    <div class="container">
        <div class="row g-5">
            <!-- Servicio 03: Lentes de Contacto -->
            <div class="col-lg-7" id="lentes-de-contacto" data-reveal="fade-up">
                <div class="oi-lens-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="row g-4 align-items-center mb-4">
                            <div class="col-md-5">
                                <div class="oi-img-reveal" style="aspect-ratio: 1 / 1;">
                                    <img src="<?= e(site_url('assets/img/services/lentes-de-contacto.jpg')) ?>"
                                         alt="Adaptación de lentes de contacto en Óptica Infinito Querétaro"
                                         width="420"
                                         height="420"
                                         loading="lazy">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <span class="oi-mono-num fw-bold d-block mb-1">SERVICIO 03 · CONTACTOLOGÍA</span>
                                <h2 class="oi-display-md mb-2">Lentes de contacto</h2>
                                <p class="text-slate small mb-3">
                                    Descubre los beneficios de usar lentes de contacto. ¿Tienes problemas de visión y buscas una solución cómoda y práctica? Los lentes de contacto son la opción perfecta para ti.
                                </p>
                                <ul class="list-unstyled small text-muted d-grid gap-2 mb-0">
                                    <li class="d-flex align-items-center gap-2">
                                        <i data-lucide="check" class="oi-icon-xs text-primary"></i> Campo visual periférico completo y natural
                                    </li>
                                    <li class="d-flex align-items-center gap-2">
                                        <i data-lucide="check" class="oi-icon-xs text-primary"></i> Libertad de movimiento para actividades deportivas y laborales
                                    </li>
                                    <li class="d-flex align-items-center gap-2">
                                        <i data-lucide="check" class="oi-icon-xs text-primary"></i> Asesoría en uso, higiene y reemplazo seguro
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="pt-3 border-top d-flex flex-wrap gap-3">
                        <button type="button"
                                class="oi-btn oi-btn--primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalAgendaCita"
                                data-cita-servicio="Lentes de contacto">
                            <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                            <span>Agendar adaptación</span>
                        </button>
                        <a href="<?= e(whatsapp_url('contacto_lentes')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--outline">
                            <i data-lucide="message-circle" class="oi-icon-sm"></i>
                            <span>Solicitar información</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Servicio 06: Entregas a Domicilio -->
            <div class="col-lg-5" id="entregas-domicilio" data-reveal="fade-up">
                <div class="oi-lens-card h-100 d-flex flex-column justify-content-between" style="background-color: var(--oi-alabaster);">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="oi-mono-num fw-bold">SERVICIO 06 · LOGÍSTICA AL PACIENTE</span>
                            <div class="oi-lens-card__icon mb-0">
                                <i data-lucide="truck" class="oi-icon-md"></i>
                            </div>
                        </div>
                        <h2 class="oi-display-md mb-3">Entregas a domicilio</h2>
                        <p class="text-slate mb-3">
                            Puedes recibir tus lentes directamente en tu hogar u oficina. Pensado para pacientes que desean ahorrar tiempo tras su consulta o que solicitan reposición de sus lentes.
                        </p>
                        <div class="p-3 rounded-3 bg-white border mb-4 small">
                            <div class="fw-semibold text-dark mb-1">Beneficios del servicio:</div>
                            <ul class="mb-0 ps-3 text-muted">
                                <li>Coordinación personalizada de horario y dirección en Querétaro.</li>
                                <li>Revisión previa de graduación y control de calidad antes del envío.</li>
                                <li>Seguimiento directo vía WhatsApp con nuestro equipo.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-3 border-top d-flex flex-wrap gap-2">
                        <button type="button"
                                class="oi-btn oi-btn--dark"
                                data-bs-toggle="modal"
                                data-bs-target="#modalAgendaCita"
                                data-cita-servicio="Entregas a domicilio">
                            <span>Solicitar entrega a domicilio</span>
                        </button>
                        <a href="<?= e(whatsapp_url('domicilio')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--ghost-whatsapp">
                            <i data-lucide="message-circle" class="oi-icon-sm"></i>
                            <span>WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SERVICIOS 04 & 05: SALUD VISUAL EMPRESARIAL + PROTECCIÓN INDUSTRIAL (6.3)
     ========================================================================== -->
<section class="oi-section oi-section--navy" id="salud-empresarial" aria-labelledby="srvSaludEmpresarialHeading">
    <div class="container">
        <div class="row gy-5 align-items-center mb-5">
            <div class="col-lg-6" data-stagger="100">
                <span class="oi-eyebrow text-info mb-2" data-reveal="fade-up">SERVICIO 04 · SALUD EMPRESARIAL Y OPTOMETRÍA OCUPACIONAL</span>
                <h2 id="srvSaludEmpresarialHeading" class="oi-display-lg text-white mb-3" data-reveal="fade-up">
                    Salud Visual Empresarial
                </h2>
                <p class="text-white-50 fs-5 mb-3" data-reveal="fade-up">
                    En <strong class="text-white">Óptica Infinito</strong> diseñamos programas integrales de salud visual adaptados a empresas de cualquier tamaño. Llevamos nuestros consultorios y tecnología directamente a tus instalaciones para cuidar la salud, el bienestar y la productividad de tus colaboradores.
                </p>
                <div class="small font-monospace text-info text-uppercase mb-2" data-reveal="fade-up">Nuestros servicios incluyen:</div>
                <ul class="list-unstyled d-grid gap-2 text-white-50 small mb-4" data-reveal="fade-up">
                    <li class="d-flex align-items-center gap-2">
                        <i data-lucide="check-circle-2" class="oi-icon-sm text-info flex-shrink-0"></i>
                        <span>Exámenes visuales ocupacionales y clínicos</span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i data-lucide="check-circle-2" class="oi-icon-sm text-info flex-shrink-0"></i>
                        <span>Detección oportuna de enfermedades visuales y fatiga digital</span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i data-lucide="check-circle-2" class="oi-icon-sm text-info flex-shrink-0"></i>
                        <span>Valoraciones especializadas para personal administrativo y operativo</span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i data-lucide="check-circle-2" class="oi-icon-sm text-info flex-shrink-0"></i>
                        <span>Adaptación y entrega de lentes graduados</span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i data-lucide="check-circle-2" class="oi-icon-sm text-info flex-shrink-0"></i>
                        <span>Suministro de lentes de seguridad graduados bajo normativas de protección</span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i data-lucide="check-circle-2" class="oi-icon-sm text-info flex-shrink-0"></i>
                        <span>Organización e implementación de campañas de salud corporativa</span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i data-lucide="check-circle-2" class="oi-icon-sm text-info flex-shrink-0"></i>
                        <span>Generación de reportes estadísticos y métricas de salud visual</span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i data-lucide="check-circle-2" class="oi-icon-sm text-info flex-shrink-0"></i>
                        <span>Seguimiento clínico continuo de los colaboradores</span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i data-lucide="check-circle-2" class="oi-icon-sm text-info flex-shrink-0"></i>
                        <span>Atención y evaluación a personal de nuevo ingreso</span>
                    </li>
                </ul>
                <div class="d-flex flex-wrap gap-3" data-reveal="fade-up">
                    <a href="<?= e(site_url('empresas.php#cotizacion-empresarial')) ?>" class="oi-btn oi-btn--primary">
                        <i data-lucide="file-text" class="oi-icon-sm"></i>
                        <span>Solicitar programa de Salud Empresarial</span>
                    </a>
                    <a href="<?= e(whatsapp_url('empresas')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--outline-light">
                        <i data-lucide="message-circle" class="oi-icon-sm"></i>
                        <span>Contactar asesor de Salud Empresarial</span>
                    </a>
                </div>
            </div>

            <div class="col-lg-6" data-reveal="scale-in">
                <div class="oi-img-reveal rounded-4 border border-secondary border-opacity-25">
                    <img src="<?= e(site_url('assets/img/services/campana-empresarial-real.jpg')) ?>"
                         alt="Campaña de salud visual empresarial realizada por Óptica Infinito"
                         width="800"
                         height="540"
                         loading="lazy">
                </div>
            </div>
        </div>

        <!-- Servicio 05: Protección Visual Industrial (Con certificaciones aplicables documentadas) -->
        <div class="pt-5 border-top border-secondary border-opacity-25" id="proteccion-industrial">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-5" data-reveal="scale-in">
                    <div class="oi-img-reveal rounded-4 border border-secondary border-opacity-25">
                        <img src="<?= e(site_url('assets/img/editorial/industrial-safety-b2b.jpg')) ?>"
                             alt="Armazones de protección visual industrial con certificaciones ANSI Z87 y CE EN"
                             width="700"
                             height="480"
                             loading="lazy">
                    </div>
                </div>
                <div class="col-lg-7 ps-xl-5" data-stagger="100">
                    <span class="oi-eyebrow text-info mb-2" data-reveal="fade-up">SERVICIO 05 · SEGURIDAD E HIGIENE INDUSTRIAL</span>
                    <h2 class="oi-display-lg text-white mb-3" data-reveal="fade-up">
                        Protección Visual Industrial Certificada
                    </h2>
                    <p class="text-white-50 mb-4" data-reveal="fade-up">
                        En la mayoría de las industrias, el uso de protección visual es indispensable para proteger al trabajador contra peligros mecánicos, químicos, térmicos, eléctricos o de luz artificial. Proveemos lentes de seguridad graduados y neutros adaptados a los requerimientos de cada planta industrial.
                    </p>

                    <div class="p-4 rounded-4 mb-4" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.12);" data-reveal="fade-up">
                        <div class="small font-monospace text-info text-uppercase mb-2">
                            Certificaciones aplicables a nuestros armazones de seguridad industrial:
                        </div>
                        <div class="d-flex flex-wrap gap-2 mb-2">
                            <?php foreach (SITE_DATA['certifications'] as $cert): ?>
                                <span class="oi-cert-pill oi-cert-pill--dark">
                                    <i data-lucide="shield-check" class="oi-icon-xs"></i> <?= e($cert) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                        <p class="small text-white-50 mb-0">
                            Nuestros armazones de seguridad industrial cuentan con las certificaciones internacionales documentadas <strong>ANSI Z87, CE EN, AS/NZS, CAN/CSA y MCEPS</strong> según el modelo y especificación técnica requerida por su área de Seguridad e Higiene.
                        </p>
                    </div>

                    <div class="d-flex flex-wrap gap-3" data-reveal="fade-up">
                        <a href="<?= e(site_url('empresas.php#cotizacion-empresarial')) ?>" class="oi-btn oi-btn--primary">
                            <i data-lucide="hard-hat" class="oi-icon-sm"></i>
                            <span>Cotizar lentes de seguridad industrial</span>
                        </a>
                        <a href="<?= e(whatsapp_url('industrial')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--whatsapp">
                            <i data-lucide="message-circle" class="oi-icon-sm"></i>
                            <span>Atención WhatsApp Industrial</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
