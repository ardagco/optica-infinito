<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/config.php';

$pageTitle       = 'Pacientes | Atención, Citas y Acceso de Pacientes — Óptica Infinito Querétaro';
$pageDescription = 'Sección de Pacientes de Óptica Infinito en Querétaro. Agenda tu examen de la vista, consulta el seguimiento de tus lentes por sucursal (Tecnológico, Mirador, Campañas) o ingresa a tu cuenta.';
$pageCanonical   = canonical_url('pacientes/');
$activeNav       = 'pacientes';
$headerTheme     = 'light';
$whatsappContext = 'pacientes';
$csrfToken       = csrf_token();

$loginNotice = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action_type'] ?? '') === 'patient_login') {
    if (!verify_csrf_token((string)($_POST['csrf_token'] ?? ''))) {
        $loginNotice = [
            'type' => 'danger',
            'text' => 'La sesión del formulario expiró por seguridad. Por favor recarga la página e inténtalo nuevamente.',
        ];
    } elseif (!check_rate_limit('patient_login', 5, 600)) {
        $loginNotice = [
            'type' => 'warning',
            'text' => 'Demasiados intentos de acceso. Por favor espera unos minutos o comunícate al 442 221 7851.',
        ];
    } else {
        $sucursalElegida = sanitize_text($_POST['login_sucursal'] ?? '', 60);
        $usuarioIngresado = sanitize_text($_POST['login_credencial'] ?? '', 120);
        $loginNotice = [
            'type' => 'info',
            'text' => "Aviso de seguridad: La consulta de cuenta en línea para la sucursal «{$sucursalElegida}» requiere sincronización con el servidor interno de sucursal o activación de tu clave en mostrador. Para brindarte atención inmediata sobre tu orden o graduación, comunícate por WhatsApp o teléfono al 442 221 7851.",
        ];
    }
}

require_once dirname(__DIR__) . '/includes/header.php';
?>

<!-- ==========================================================================
     1. HERO DE ATENCIÓN AL PACIENTE (6.6)
     ========================================================================== -->
<section class="oi-hero pb-5" aria-labelledby="pacientesHeroHeading">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-7 pe-xl-5" data-stagger="100">
                <span class="oi-eyebrow mb-3" data-reveal="fade-up">ESPACIO DEL PACIENTE · ÓPTICA INFINITO</span>
                <h1 id="pacientesHeroHeading" class="oi-display-xl mb-3" data-reveal="fade-up">
                    No subestimes el poder de una <span class="oi-serif-italic fw-normal text-primary">mirada sana.</span>
                </h1>
                <p class="oi-lead mb-4" data-reveal="fade-up">
                    ¿Cuándo fue la última vez que te hiciste un examen de la vista? Te ofrecemos servicios de salud visual eficientes y personalizados en Querétaro para que cuides tus ojos sin sacrificar tu agenda.
                </p>
                <div class="d-flex flex-wrap gap-3" data-reveal="fade-up">
                    <button type="button"
                            class="oi-btn oi-btn--primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalAgendaCita">
                        <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                        <span>Agendar examen de la vista</span>
                    </button>
                    <a href="<?= e(whatsapp_url('pacientes')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--whatsapp">
                        <i data-lucide="message-circle" class="oi-icon-sm"></i>
                        <span>Consultar estado de mi pedido</span>
                    </a>
                </div>
            </div>

            <!-- Módulo de Acceso a Cuenta de Pacientes (Conservado y Asegurado) -->
            <div class="col-lg-5" id="login-pacientes" data-reveal="scale-in">
                <div class="oi-form-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="oi-mono-num fw-bold">MI CUENTA · PACIENTES</span>
                        <span class="badge bg-primary bg-opacity-10 text-primary">Conexión Segura</span>
                    </div>
                    <h2 class="h4 fw-bold mb-1" style="font-family: var(--font-sans);">Acceso de Pacientes</h2>
                    <p class="small text-muted mb-4">
                        Capture sus datos de acceso registrados en sucursal o campaña.
                    </p>

                    <?php if ($loginNotice): ?>
                        <div class="alert alert-<?= e($loginNotice['type']) ?> small py-2 px-3 mb-3" role="alert">
                            <?= e($loginNotice['text']) ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= e(site_url('pacientes/#login-pacientes')) ?>" method="POST" novalidate>
                        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
                        <input type="hidden" name="action_type" value="patient_login">

                        <div class="mb-3">
                            <label for="pac_sucursal" class="oi-label">Sucursal o modalidad <span class="text-danger">*</span></label>
                            <select class="form-select oi-input" id="pac_sucursal" name="login_sucursal" required>
                                <option value="">-- Selecciona tu sucursal --</option>
                                <option value="Tecnológico">Sucursal Tecnológico (Av. Tecnológico Sur 6B)</option>
                                <option value="Mirador">Sucursal Plaza El Mirador (Local 45)</option>
                                <option value="Campañas">Campañas Empresariales</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pac_credencial" class="oi-label">Usuario / Correo / Móvil <span class="text-danger">*</span></label>
                            <input type="text" class="form-control oi-input" id="pac_credencial" name="login_credencial" placeholder="Ingresa tu usuario, correo o celular" required autocomplete="username">
                        </div>

                        <div class="mb-3">
                            <label for="pac_contrasena" class="oi-label">Contraseña <span class="text-danger">*</span></label>
                            <input type="password" class="form-control oi-input" id="pac_contrasena" name="login_contrasena" placeholder="••••••••" required autocomplete="current-password">
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="pac_remember" name="recordarme" value="1">
                                <label class="form-check-label small text-muted" for="pac_remember">Recordarme</label>
                            </div>
                            <a href="<?= e(whatsapp_url('pacientes', 'Hola Óptica Infinito, soy paciente y solicito apoyo con mis datos de acceso o consulta de mi pedido.')) ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="small text-primary text-decoration-none">
                                ¿Necesitas ayuda con tu acceso?
                            </a>
                        </div>

                        <button type="submit" class="oi-btn oi-btn--dark w-100 justify-content-center py-3">
                            <i data-lucide="log-in" class="oi-icon-sm"></i>
                            <span>Ingresar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     2. COMPROMISOS CON EL PACIENTE (Recuperados de la sección Pacientes original)
     ========================================================================== -->
<section class="oi-section oi-section--white" aria-labelledby="beneficiosPacienteHeading">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 720px;" data-reveal="fade-up">
            <span class="oi-eyebrow mb-2">NUESTRO COMPROMISO CONTIGO</span>
            <h2 id="beneficiosPacienteHeading" class="oi-display-lg mb-2">
                Cuidamos tu visión, <span class="oi-serif-italic fw-normal text-primary">tu tiempo y tu economía</span>
            </h2>
            <p class="text-muted mb-0">
                Diseñamos cada etapa de nuestra atención para que tu experiencia en sucursal o a domicilio sea clara, cómoda y confiable.
            </p>
        </div>

        <div class="row g-4" data-stagger="100">
            <div class="col-lg-4" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <div class="oi-lens-card__icon">
                        <i data-lucide="smile" class="oi-icon-md"></i>
                    </div>
                    <h3 class="h4 mb-2">No subestimes el poder de una mirada sana</h3>
                    <p class="small text-muted mb-0">
                        Un examen visual periódico permite actualizar tu graduación y detectar a tiempo cualquier cambio en tu agudeza visual, mejorando tu confort diario al leer, conducir o trabajar en computadora.
                    </p>
                </div>
            </div>

            <div class="col-lg-4" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <div class="oi-lens-card__icon">
                        <i data-lucide="clock" class="oi-icon-md"></i>
                    </div>
                    <h3 class="h4 mb-2">Ahorra tiempo y cuida tu visión</h3>
                    <p class="small text-muted mb-0">
                        Te ofrecemos servicios de salud visual eficientes y personalizados —incluyendo <strong>Lentes Express con entrega el mismo día</strong> y <strong>Entregas a Domicilio</strong>— para que cuides tus ojos sin sacrificar tu agenda.
                    </p>
                </div>
            </div>

            <div class="col-lg-4" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <div class="oi-lens-card__icon">
                        <i data-lucide="wallet" class="oi-icon-md"></i>
                    </div>
                    <h3 class="h4 mb-2">Cuida tu visión y tu bolsillo</h3>
                    <p class="small text-muted mb-0">
                        Ofrecemos soluciones ópticas de alta calidad a precios accesibles (con líneas de lentes de calle desde \$490 y facilidades de pago con tarjetas participantes VISA, MasterCard, Amex, Carnet y Sí Vale).
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     3. GUÍA PRÁCTICA PARA TU CONSULTA Y SEGUIMIENTO POR SUCURSAL
     ========================================================================== -->
<section class="oi-section oi-section--stone" aria-labelledby="guiaPacienteHeading">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6" data-stagger="100">
                <span class="oi-eyebrow mb-2" data-reveal="fade-up">PREPARACIÓN PARA TU CITA</span>
                <h2 id="guiaPacienteHeading" class="oi-display-lg mb-3" data-reveal="fade-up">
                    Recomendaciones antes de acudir a tu <span class="oi-serif-italic fw-normal text-primary">examen visual</span>
                </h2>
                <div class="d-grid gap-3" data-reveal="fade-up">
                    <div class="p-3 rounded-3 bg-white border d-flex align-items-start gap-3">
                        <span class="oi-mono-num fw-bold mt-1">01</span>
                        <div>
                            <strong class="d-block text-dark">Trae tus lentes actuales</strong>
                            <span class="small text-muted">Si ya utilizas lentes de armazón o lentes de contacto, tráelos a tu cita para comparar tu graduación previa con tu evaluación actual.</span>
                        </div>
                    </div>
                    <div class="p-3 rounded-3 bg-white border d-flex align-items-start gap-3">
                        <span class="oi-mono-num fw-bold mt-1">02</span>
                        <div>
                            <strong class="d-block text-dark">Descanso previo si usas lentes de contacto</strong>
                            <span class="small text-muted">Para obtener una medición corneal y refractiva aún más exacta, te sugerimos retirar tus lentes de contacto antes de la evaluación optométrica.</span>
                        </div>
                    </div>
                    <div class="p-3 rounded-3 bg-white border d-flex align-items-start gap-3">
                        <span class="oi-mono-num fw-bold mt-1">03</span>
                        <div>
                            <strong class="d-block text-dark">Coméntanos tus hábitos visuales</strong>
                            <span class="small text-muted">Indica a nuestro optometrista cuántas horas pasas frente a monitores, si conduces de noche o si trabajas en entornos industriales.</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <span class="oi-eyebrow mb-2">ATENCIÓN DIRECTA POR SUCURSAL</span>
                    <h3 class="oi-display-md mb-3">Seguimiento de pedidos y garantías</h3>
                    <p class="small text-muted mb-4">
                        Selecciona la sucursal o modalidad donde realizaste tu pedido para comunicarte directamente con nuestro equipo por WhatsApp:
                    </p>

                    <div class="d-grid gap-3">
                        <a href="<?= e(whatsapp_url('pacientes', 'Hola Óptica Infinito, deseo consultar el estado de mis lentes en Sucursal Tecnológico.')) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="p-3 rounded-3 border text-decoration-none d-flex align-items-center justify-content-between bg-light bg-opacity-50">
                            <div>
                                <strong class="d-block text-dark">Sucursal Tecnológico (Matriz)</strong>
                                <span class="small text-muted">Av. Tecnológico Sur, No. 6B, Col. Niños Héroes</span>
                            </div>
                            <span class="oi-btn oi-btn--ghost-whatsapp btn-sm">WhatsApp &rarr;</span>
                        </a>

                        <a href="<?= e(whatsapp_url('pacientes', 'Hola Óptica Infinito, deseo consultar el estado de mis lentes en Sucursal Plaza El Mirador.')) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="p-3 rounded-3 border text-decoration-none d-flex align-items-center justify-content-between bg-light bg-opacity-50">
                            <div>
                                <strong class="d-block text-dark">Sucursal Plaza El Mirador</strong>
                                <span class="small text-muted">Plaza Comercial El Mirador, local 45. Av. Prol. Constituyentes Ote. 5</span>
                            </div>
                            <span class="oi-btn oi-btn--ghost-whatsapp btn-sm">WhatsApp &rarr;</span>
                        </a>

                        <a href="<?= e(whatsapp_url('pacientes', 'Hola Óptica Infinito, deseo consultar el estado de mis lentes solicitados en Campaña Empresarial.')) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="p-3 rounded-3 border text-decoration-none d-flex align-items-center justify-content-between bg-light bg-opacity-50">
                            <div>
                                <strong class="d-block text-dark">Campañas Empresariales</strong>
                                <span class="small text-muted">Seguimiento de pedidos realizados en tu empresa</span>
                            </div>
                            <span class="oi-btn oi-btn--ghost-whatsapp btn-sm">WhatsApp &rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
