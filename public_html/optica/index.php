<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/config.php';

$pageTitle       = 'Óptica y Soluciones Visuales en Querétaro | Armazones, Micas y Lentes Express — Óptica Infinito';
$pageDescription = 'Descubre las soluciones ópticas de Óptica Infinito en Querétaro: armazones oftálmicos (lentes de calle desde $490), micas graduadas, Lentes Express el mismo día, lentes de contacto y protección industrial.';
$pageCanonical   = canonical_url('optica/');
$activeNav       = 'optica';
$headerTheme     = 'light';
$whatsappContext = 'optica';
$csrfToken       = csrf_token();

$opticaNotice = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action_type'] ?? '') === 'optica_login') {
    if (!verify_csrf_token((string)($_POST['csrf_token'] ?? ''))) {
        $opticaNotice = [
            'type' => 'danger',
            'text' => 'La sesión del formulario expiró por seguridad. Por favor recarga la página.',
        ];
    } elseif (!check_rate_limit('optica_login', 5, 600)) {
        $opticaNotice = [
            'type' => 'warning',
            'text' => 'Demasiados intentos de acceso. Intenta nuevamente más tarde.',
        ];
    } else {
        $sucursal = sanitize_text($_POST['login_sucursal'] ?? '', 60);
        $opticaNotice = [
            'type' => 'info',
            'text' => "Aviso del sistema: La autenticación operativa para la sucursal «{$sucursal}» requiere conexión con la base de datos interna en el servidor de producción (config.env.php). Consulta el manual DEPLOY-NEUBOX.md para enlazar las credenciales de base de datos.",
        ];
    }
}

require_once dirname(__DIR__) . '/includes/header.php';
?>

<!-- ==========================================================================
     1. HERO COMERCIAL Y EDITORIAL DE ÓPTICA (6.7)
     ========================================================================== -->
<section class="oi-hero" aria-labelledby="opticaHeroHeading">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6 pe-xl-5" data-stagger="100">
                <span class="oi-eyebrow mb-3" data-reveal="fade-up">EXPERIENCIA ÓPTICA · QUERÉTARO</span>
                <h1 id="opticaHeroHeading" class="oi-display-xl mb-4" data-reveal="fade-up">
                    Quédate con quien <span class="oi-serif-italic fw-normal text-primary">te haga ver bien.</span>
                </h1>
                <p class="oi-lead mb-4" data-reveal="fade-up">
                    En <strong>Óptica Infinito</strong> combinamos asesoría optométrica personalizada, armazones oftálmicos y solares, lentes de contacto y micas de alta precisión adaptadas a tu estilo de vida.
                </p>

                <!-- Destacado Comercial Real Recuperado de Auditoría -->
                <div class="p-3 rounded-3 bg-white border shadow-sm mb-4 d-flex align-items-center gap-3" data-reveal="fade-up">
                    <div class="p-2 rounded-3 bg-primary bg-opacity-10 text-primary">
                        <i data-lucide="sparkles" class="oi-icon-md"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark">Lentes de calle desde \$490 · Descuentos exclusivos</div>
                        <div class="small text-muted">Además de servicio de <strong>Lentes Express con entrega el mismo día</strong> en graduaciones seleccionadas.</div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3" data-reveal="fade-up">
                    <button type="button"
                            class="oi-btn oi-btn--primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalAgendaCita">
                        <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                        <span>Agendar cita en óptica</span>
                    </button>
                    <a href="<?= e(whatsapp_url('optica')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--whatsapp">
                        <i data-lucide="message-circle" class="oi-icon-sm"></i>
                        <span>Cotizar mis lentes por WhatsApp</span>
                    </a>
                </div>
            </div>

            <div class="col-lg-6" data-reveal="scale-in">
                <div class="oi-hero__visual-frame" style="aspect-ratio: 16 / 10;">
                    <img src="<?= e(site_url('assets/img/hero/eyewear-blue-editorial.jpg')) ?>"
                         alt="Diseño óptico y armazones en Óptica Infinito Querétaro"
                         width="1200"
                         height="750">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     2. LÍNEAS DE SOLUCIONES ÓPTICAS (Sin inventario ficticio ni carrito falso)
     ========================================================================== -->
<section class="oi-section oi-section--white" aria-labelledby="lineasOpticasHeading">
    <div class="container">
        <div class="row justify-content-between align-items-end mb-5 gy-3">
            <div class="col-lg-7" data-reveal="fade-up">
                <span class="oi-eyebrow mb-2">SOLUCIONES A LA MEDIDA DE TU GRADUACIÓN</span>
                <h2 id="lineasOpticasHeading" class="oi-display-lg mb-0">
                    Especialidades de nuestra <span class="oi-serif-italic fw-normal text-primary">Óptica</span>
                </h2>
            </div>
            <div class="col-lg-5 text-lg-end" data-reveal="fade-up">
                <p class="small text-muted mb-0">
                    Cada lente se adapta de forma individual tras tu evaluación optométrica o con tu receta vigente.
                </p>
            </div>
        </div>

        <div class="row g-4" data-stagger="100">
            <!-- Categoría 1: Armazones Oftálmicos y Solares -->
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="oi-lens-card d-flex flex-column justify-content-between">
                    <div>
                        <div class="row g-4 align-items-center mb-3">
                            <div class="col-sm-5">
                                <div class="oi-img-reveal" style="aspect-ratio: 4 / 3;">
                                    <img src="<?= e(site_url('assets/img/editorial/portrait-monochrome.jpg')) ?>"
                                         alt="Armazones oftálmicos y solares en Óptica Infinito"
                                         width="400"
                                         height="300"
                                         loading="lazy">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <span class="oi-mono-num fw-bold d-block mb-1">01 · ARMAZONES Y ESTILO</span>
                                <h3 class="h4 mb-2">Armazones oftálmicos y de calle</h3>
                                <p class="small text-muted mb-0">
                                    Selección de armazones ligeros, resistentes y estéticos para dama, caballero y niños. Contamos con opciones de lentes de calle desde <strong>\$490</strong> hasta líneas oftálmicas especializadas.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3 border-top d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <span class="small text-muted">Exhibición física en Sucursal Tecnológico y El Mirador</span>
                        <a href="<?= e(whatsapp_url('optica', 'Hola Óptica Infinito, me gustaría recibir asesoría y cotización de armazones y micas.')) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="oi-link-arrow">
                            <span>Solicitar asesoría</span>
                            <i data-lucide="arrow-right" class="oi-icon-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Categoría 2: Micas Oftálmicas y Lentes Express -->
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="oi-lens-card d-flex flex-column justify-content-between">
                    <div>
                        <div class="row g-4 align-items-center mb-3">
                            <div class="col-sm-5">
                                <div class="oi-img-reveal" style="aspect-ratio: 4 / 3;">
                                    <img src="<?= e(site_url('assets/img/editorial/lens-precision-macro.jpg')) ?>"
                                         alt="Micas oftálmicas de precisión y Lentes Express"
                                         width="400"
                                         height="300"
                                         loading="lazy">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <span class="oi-mono-num fw-bold d-block mb-1">02 · TECNOLOGÍA EN MICAS</span>
                                <h3 class="h4 mb-2">Micas graduadas y Lentes Express</h3>
                                <p class="small text-muted mb-0">
                                    Adaptación de micas monofocales, bifocales y progresivas con tratamientos antirreflejantes, filtro para luz azul de pantallas y fotocromáticos. Servicio de <strong>entrega el mismo día</strong> en Lentes Express.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3 border-top d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <span class="small text-muted">Cotiza con tu receta o agenda tu examen visual</span>
                        <button type="button"
                                class="btn btn-link p-0 oi-link-arrow"
                                data-bs-toggle="modal"
                                data-bs-target="#modalAgendaCita"
                                data-cita-servicio="Lentes express">
                            <span>Solicitar Lentes Express</span>
                            <i data-lucide="arrow-right" class="oi-icon-xs"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Categoría 3: Lentes de Contacto -->
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="oi-lens-card d-flex flex-column justify-content-between">
                    <div>
                        <div class="row g-4 align-items-center mb-3">
                            <div class="col-sm-5">
                                <div class="oi-img-reveal" style="aspect-ratio: 4 / 3;">
                                    <img src="<?= e(site_url('assets/img/services/lentes-de-contacto.jpg')) ?>"
                                         alt="Lentes de contacto graduados en Óptica Infinito"
                                         width="400"
                                         height="300"
                                         loading="lazy">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <span class="oi-mono-num fw-bold d-block mb-1">03 · CONTACTOLOGÍA</span>
                                <h3 class="h4 mb-2">Lentes de contacto</h3>
                                <p class="small text-muted mb-0">
                                    Solución cómoda, práctica y discreta para corregir tu visión con total libertad de movimiento. Adaptación optométrica personalizada y envío disponible mediante Entregas a Domicilio.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3 border-top d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <span class="small text-muted">Evaluación de curvatura y graduación en sucursal</span>
                        <button type="button"
                                class="btn btn-link p-0 oi-link-arrow"
                                data-bs-toggle="modal"
                                data-bs-target="#modalAgendaCita"
                                data-cita-servicio="Lentes de contacto">
                            <span>Agendar adaptación</span>
                            <i data-lucide="arrow-right" class="oi-icon-xs"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Categoría 4: Armazones de Seguridad Industrial -->
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="oi-lens-card d-flex flex-column justify-content-between" style="background-color: var(--oi-navy); color: var(--oi-white);">
                    <div>
                        <div class="row g-4 align-items-center mb-3">
                            <div class="col-sm-5">
                                <div class="oi-img-reveal" style="aspect-ratio: 4 / 3;">
                                    <img src="<?= e(site_url('assets/img/editorial/industrial-safety-b2b.jpg')) ?>"
                                         alt="Armazones de seguridad industrial certificados ANSI Z87 y CE EN"
                                         width="400"
                                         height="300"
                                         loading="lazy">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <span class="oi-mono-num text-info fw-bold d-block mb-1">04 · SEGURIDAD INDUSTRIAL</span>
                                <h3 class="h4 text-white mb-2">Protección visual certificada</h3>
                                <p class="small text-white-50 mb-2">
                                    Armazones de protección industrial graduables que cumplen con las certificaciones internacionales documentadas:
                                </p>
                                <div class="d-flex flex-wrap gap-1">
                                    <?php foreach (SITE_DATA['certifications'] as $cert): ?>
                                        <span class="badge bg-primary bg-opacity-50 text-white font-monospace"><?= e($cert) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3 border-top border-secondary border-opacity-25 d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <span class="small text-white-50">Para particulares en planta y convenios de Salud Empresarial</span>
                        <a href="<?= e(site_url('empresas.php#proteccion-industrial')) ?>" class="text-info fw-semibold small text-decoration-none">
                            Ver línea industrial &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Métodos de Pago Reales Documentados -->
        <div class="p-4 rounded-4 mt-5 border" style="background-color: var(--oi-alabaster);" data-reveal="fade-up">
            <div class="row align-items-center gy-3">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <i data-lucide="credit-card" class="oi-icon-sm text-primary"></i>
                        <strong class="text-dark">Medios de pago aceptados en nuestras ópticas y campañas:</strong>
                    </div>
                    <p class="small text-muted mb-0">
                        Aceptamos efectivo, tarjetas <strong><?= e(implode(', ', SITE_DATA['payment_methods']['cards'])) ?></strong> y esquemas de <strong><?= e(SITE_DATA['payment_methods']['msi']) ?></strong>.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="<?= e(whatsapp_url('optica')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--primary">
                        <i data-lucide="message-circle" class="oi-icon-sm"></i>
                        <span>Solicitar cotización</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     3. ACCESO OPERATIVO DE ÓPTICA / SUCURSALES (Conservado de /optica/login)
     ========================================================================== -->
<section class="oi-section oi-section--stone" id="acceso-optica" aria-labelledby="accesoOpticaHeading">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="oi-form-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="oi-mono-num fw-bold">MI CUENTA · ÓPTICA</span>
                        <i data-lucide="building" class="oi-icon-sm text-primary"></i>
                    </div>
                    <h2 id="accesoOpticaHeading" class="h4 fw-bold mb-1" style="font-family: var(--font-sans);">Acceso Operativo de Sucursal</h2>
                    <p class="small text-muted mb-4">
                        Acceso para personal de Óptica Infinito (Sucursales Tecnológico, Mirador y Campañas).
                    </p>

                    <?php if ($opticaNotice): ?>
                        <div class="alert alert-<?= e($opticaNotice['type']) ?> small py-2 px-3 mb-3" role="alert">
                            <?= e($opticaNotice['text']) ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= e(site_url('optica/#acceso-optica')) ?>" method="POST" novalidate>
                        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
                        <input type="hidden" name="action_type" value="optica_login">

                        <div class="mb-3">
                            <label for="opt_credencial" class="oi-label">Usuario / Correo / Móvil <span class="text-danger">*</span></label>
                            <input type="text" class="form-control oi-input" id="opt_credencial" name="login_credencial" placeholder="Usuario/Correo/Móvil" required>
                        </div>

                        <div class="mb-3">
                            <label for="opt_contrasena" class="oi-label">Contraseña <span class="text-danger">*</span></label>
                            <input type="password" class="form-control oi-input" id="opt_contrasena" name="login_contrasena" placeholder="••••••••" required>
                        </div>

                        <div class="mb-3">
                            <label for="opt_sucursal" class="oi-label">Elige una sucursal <span class="text-danger">*</span></label>
                            <select class="form-select oi-input" id="opt_sucursal" name="login_sucursal" required>
                                <option value="">-- Sucursales --</option>
                                <option value="Campañas">Campañas</option>
                                <option value="Mirador">Mirador</option>
                                <option value="Tecnologico">Tecnológico</option>
                            </select>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="opt_remember" name="recordarme" value="1">
                            <label class="form-check-label small text-muted" for="opt_remember">Recordarme</label>
                        </div>

                        <button type="submit" class="oi-btn oi-btn--dark w-100 justify-content-center py-3">
                            <i data-lucide="log-in" class="oi-icon-sm"></i>
                            <span>Ingresar a sucursal</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
