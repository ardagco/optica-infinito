<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$pageTitle       = 'Contacto, Sucursales y Citas en Querétaro | Óptica Infinito';
$pageDescription = 'Comunícate con Óptica Infinito en Querétaro. Teléfono y WhatsApp 442 221 7851. Sucursal Tecnológico (Col. Niños Héroes) y Sucursal Plaza El Mirador (local 45). Agenda tu cita en línea.';
$pageCanonical   = canonical_url('contacto.php');
$activeNav       = 'contacto';
$headerTheme     = 'light';
$whatsappContext = 'contacto';
$csrfToken       = csrf_token();
$minDate         = date('Y-m-d');

$flash = $_SESSION['form_flash'] ?? null;
unset($_SESSION['form_flash']);

require_once __DIR__ . '/includes/header.php';
?>

<!-- ==========================================================================
     1. HERO DE CONTACTO Y ATENCIÓN EN QUERÉTARO (6.5)
     ========================================================================== -->
<section class="oi-hero pb-5" aria-labelledby="contactoHeroHeading">
    <div class="container">
        <?php if ($flash): ?>
            <div class="alert alert-<?= e($flash['type']) ?> mb-4" role="alert">
                <?= e($flash['message']) ?>
            </div>
        <?php endif; ?>

        <div class="row align-items-end gy-4">
            <div class="col-lg-7" data-stagger="100">
                <span class="oi-eyebrow mb-3" data-reveal="fade-up">ATENCIÓN A PACIENTES Y EMPRESAS · QUERÉTARO</span>
                <h1 id="contactoHeroHeading" class="oi-display-xl mb-3" data-reveal="fade-up">
                    Amamos escuchar y <span class="oi-serif-italic fw-normal text-primary">cuidar tu visión.</span>
                </h1>
                <p class="oi-lead mb-0" data-reveal="fade-up">
                    Agenda tu cita optométrica, escríbenos por WhatsApp o visítanos directamente en cualquiera de nuestras dos sucursales en Santiago de Querétaro.
                </p>
            </div>
            <div class="col-lg-5 text-lg-end" data-reveal="fade-up">
                <div class="d-inline-flex flex-wrap gap-3">
                    <a href="<?= e(whatsapp_url('contacto')) ?>" target="_blank" rel="noopener noreferrer" class="oi-btn oi-btn--whatsapp px-4 py-3">
                        <i data-lucide="message-circle" class="oi-icon-sm"></i>
                        <span>WhatsApp: <?= e(SITE_DATA['phone_display']) ?></span>
                    </a>
                    <a href="tel:<?= e(SITE_DATA['phone_raw']) ?>" class="oi-btn oi-btn--outline px-4 py-3">
                        <i data-lucide="phone-call" class="oi-icon-sm"></i>
                        <span>Llamar ahora</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     2. TARJETAS DE CONTACTO DIRECTO Y HORARIOS PUBLICADOS (6.5)
     ========================================================================== -->
<section class="py-5 bg-white border-top border-bottom" aria-label="Medios de contacto directo">
    <div class="container">
        <div class="row g-4" data-stagger="90">
            <!-- Teléfono y WhatsApp -->
            <div class="col-lg-4 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="oi-mono-num fw-bold">01 · LÍNEA DIRECTA Y WHATSAPP</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="phone-call" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h2 class="h4 mb-1">Teléfono y WhatsApp</h2>
                    <a href="tel:<?= e(SITE_DATA['phone_raw']) ?>" class="d-block fs-3 fw-bold text-primary text-decoration-none mb-2">
                        4422217851
                    </a>
                    <p class="small text-muted mb-3">
                        Atención directa para citas, seguimiento de Lentes Express, entregas a domicilio y campañas empresariales.
                    </p>
                    <a href="<?= e(whatsapp_url('contacto')) ?>" target="_blank" rel="noopener noreferrer" class="oi-link-arrow">
                        <span>Enviar mensaje por WhatsApp</span>
                        <i data-lucide="arrow-up-right" class="oi-icon-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Correo Electrónico -->
            <div class="col-lg-4 col-md-6" data-reveal="fade-up">
                <div class="oi-lens-card">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="oi-mono-num fw-bold">02 · CORREO ELECTRÓNICO</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="mail" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h2 class="h4 mb-1">Correo Oficial</h2>
                    <a href="mailto:<?= e(SITE_DATA['email']) ?>" class="d-block fs-5 fw-bold text-primary text-decoration-none mb-2 text-break">
                        <?= e(SITE_DATA['email']) ?>
                    </a>
                    <p class="small text-muted mb-3">
                        Escríbenos para dudas generales, solicitud de información de servicios, facturación o programas de Salud Empresarial.
                    </p>
                    <a href="mailto:<?= e(SITE_DATA['email']) ?>" class="oi-link-arrow">
                        <span>Redactar correo electrónico</span>
                        <i data-lucide="arrow-up-right" class="oi-icon-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Horarios Publicados -->
            <div class="col-lg-4 col-md-12" data-reveal="fade-up">
                <div class="oi-lens-card" style="background-color: var(--oi-alabaster);">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="oi-mono-num fw-bold">03 · HORARIOS PUBLICADOS</span>
                        <div class="oi-lens-card__icon mb-0">
                            <i data-lucide="clock" class="oi-icon-md"></i>
                        </div>
                    </div>
                    <h2 class="h4 mb-3">Horarios de Atención</h2>
                    <div class="p-3 rounded-3 bg-white border mb-2 d-flex justify-content-between align-items-center">
                        <span class="fw-medium text-dark small">Lunes a viernes:</span>
                        <strong class="text-primary font-monospace small">10:00 a 19:00</strong>
                    </div>
                    <div class="p-3 rounded-3 bg-white border mb-2 d-flex justify-content-between align-items-center">
                        <span class="fw-medium text-dark small">Sábado:</span>
                        <strong class="text-primary font-monospace small">10:00 a 14:00</strong>
                    </div>
                    <p class="small text-muted mb-0 mt-2">
                        Horarios vigentes en Sucursal Tecnológico y Sucursal Plaza Comercial El Mirador.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     3. UBICACIONES FÍSICAS Y ENLACES A GOOGLE MAPS (6.5)
     ========================================================================== -->
<section class="oi-section oi-section--stone" id="ubicaciones" aria-labelledby="sucursalesContactoHeading">
    <div class="container">
        <div class="mb-5" data-reveal="fade-up">
            <span class="oi-eyebrow mb-2">NUESTRAS UBICACIONES EN QUERÉTARO</span>
            <h2 id="sucursalesContactoHeading" class="oi-display-lg mb-0">
                Sucursales <span class="oi-serif-italic fw-normal text-primary">Óptica Infinito</span>
            </h2>
        </div>

        <div class="row g-4">
            <!-- Ubicación 1: Sucursal Tecnológico -->
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="oi-lens-card d-flex flex-column justify-content-between">
                    <div>
                        <span class="badge bg-primary bg-opacity-10 text-primary font-monospace px-3 py-2 mb-3">UBICACIÓN 1 · MATRIZ TECNOLÓGICO</span>
                        <h3 class="oi-display-md mb-3">Sucursal Tecnológico</h3>
                        <p class="fs-5 text-dark fw-semibold mb-2">
                            Av. Tecnológico Sur, No. 6B,<br>
                            Col. Niños Héroes,<br>
                            Querétaro, Qro.
                        </p>
                        <div class="small text-muted mb-4">
                            <div><strong>Teléfono y WhatsApp:</strong> 4422217851</div>
                            <div><strong>Lunes a viernes:</strong> 10:00 a 19:00 · <strong>Sábado:</strong> 10:00 a 14:00</div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-3 pt-3 border-top">
                        <a href="<?= e(SITE_DATA['branches']['tecnologico']['maps_url']) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="oi-btn oi-btn--primary">
                            <i data-lucide="map-pin" class="oi-icon-sm"></i>
                            <span>Abrir en Google Maps</span>
                        </a>
                        <button type="button"
                                class="oi-btn oi-btn--outline"
                                data-bs-toggle="modal"
                                data-bs-target="#modalAgendaCita"
                                data-cita-sucursal="Tecnológico">
                            <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                            <span>Agendar en esta sucursal</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Ubicación 2: Sucursal Plaza Comercial El Mirador -->
            <div class="col-lg-6" data-reveal="fade-up">
                <div class="oi-lens-card d-flex flex-column justify-content-between">
                    <div>
                        <span class="badge bg-primary bg-opacity-10 text-primary font-monospace px-3 py-2 mb-3">UBICACIÓN 2 · EL MIRADOR</span>
                        <h3 class="oi-display-md mb-3">Sucursal Plaza El Mirador</h3>
                        <p class="fs-5 text-dark fw-semibold mb-2">
                            Plaza Comercial El Mirador, local 45.<br>
                            Av. Prol. Constituyentes Ote. 5,<br>
                            Fracc. El Mirador,<br>
                            Querétaro, Qro.
                        </p>
                        <div class="small text-muted mb-4">
                            <div><strong>Teléfono y WhatsApp:</strong> 4422217851</div>
                            <div><strong>Lunes a viernes:</strong> 10:00 a 19:00 · <strong>Sábado:</strong> 10:00 a 14:00</div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-3 pt-3 border-top">
                        <a href="<?= e(SITE_DATA['branches']['mirador']['maps_url']) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="oi-btn oi-btn--primary">
                            <i data-lucide="map-pin" class="oi-icon-sm"></i>
                            <span>Abrir en Google Maps</span>
                        </a>
                        <button type="button"
                                class="oi-btn oi-btn--outline"
                                data-bs-toggle="modal"
                                data-bs-target="#modalAgendaCita"
                                data-cita-sucursal="Mirador">
                            <i data-lucide="calendar-check" class="oi-icon-sm"></i>
                            <span>Agendar en esta sucursal</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     4. FORMULARIO DE AGENDA DE CITAS Y FORMULARIO DE CONTACTO (6.5 & 7)
     ========================================================================== -->
<section class="oi-section oi-section--white" id="formularios" aria-labelledby="formsSectionHeading">
    <div class="container">
        <div class="row g-5">
            <!-- Columna Izquierda: Agenda de Citas en Página -->
            <div class="col-lg-7" id="agenda-tu-cita" data-reveal="fade-up">
                <div class="oi-form-card">
                    <span class="oi-eyebrow mb-2">SOLICITUD DE CITA EN LÍNEA</span>
                    <h2 id="formsSectionHeading" class="oi-display-md mb-2">Agenda tu cita optométrica</h2>
                    <div class="oi-notice-banner mb-4">
                        <i data-lucide="info" class="oi-icon-sm text-primary flex-shrink-0 mt-1"></i>
                        <div class="small">
                            <strong>Aviso importante:</strong> Una solicitud en línea no representa una cita confirmada. La confirmación será realizada por el personal de Óptica Infinito al contactarte.
                        </div>
                    </div>

                    <form action="<?= e(site_url('forms/citas.php')) ?>" method="POST" class="oi-ajax-form" novalidate>
                        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
                        <div class="oi-hp-field" aria-hidden="true">
                            <label for="cita_page_hp">No llenar</label>
                            <input type="text" id="cita_page_hp" name="website_url" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="cita_nombre" class="oi-label">Nombre completo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control oi-input" id="cita_nombre" name="nombre" placeholder="Tu nombre y apellidos" required minlength="3" maxlength="120">
                                <div class="invalid-feedback">Ingresa tu nombre completo.</div>
                            </div>

                            <div class="col-md-6">
                                <label for="cita_telefono" class="oi-label">Teléfono / WhatsApp <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control oi-input" id="cita_telefono" name="telefono" placeholder="10 dígitos (ej. 442 221 7851)" required pattern="[0-9+\-\s()]{10,18}">
                                <div class="invalid-feedback">Ingresa un teléfono válido de al menos 10 dígitos.</div>
                            </div>

                            <div class="col-md-6">
                                <label for="cita_correo" class="oi-label">Correo electrónico <span class="text-danger">*</span></label>
                                <input type="email" class="form-control oi-input" id="cita_correo" name="correo" placeholder="tucorreo@ejemplo.com" required maxlength="150">
                                <div class="invalid-feedback">Ingresa un correo electrónico válido.</div>
                            </div>

                            <div class="col-md-6">
                                <label for="cita_servicio" class="oi-label">Servicio de interés <span class="text-danger">*</span></label>
                                <select class="form-select oi-input" id="cita_servicio" name="servicio" required>
                                    <option value="">Selecciona un servicio...</option>
                                    <option value="Examen visual">Examen visual</option>
                                    <option value="Lentes de contacto">Lentes de contacto</option>
                                    <option value="Lentes express">Lentes express (entrega el mismo día)</option>
                                    <option value="Salud visual empresarial">Salud visual empresarial</option>
                                    <option value="Entregas a domicilio">Entregas a domicilio</option>
                                    <option value="Protección visual industrial">Protección visual industrial</option>
                                </select>
                                <div class="invalid-feedback">Selecciona el servicio de tu interés.</div>
                            </div>

                            <div class="col-md-4">
                                <label for="cita_sucursal" class="oi-label">Sucursal <span class="text-danger">*</span></label>
                                <select class="form-select oi-input" id="cita_sucursal" name="sucursal" required>
                                    <option value="">Elige sucursal...</option>
                                    <option value="Sucursal Tecnológico (Av. Tecnológico Sur 6B)">Sucursal Tecnológico</option>
                                    <option value="Sucursal Plaza El Mirador (Local 45)">Sucursal Plaza El Mirador</option>
                                </select>
                                <div class="invalid-feedback">Selecciona una sucursal.</div>
                            </div>

                            <div class="col-md-4">
                                <label for="cita_fecha" class="oi-label">Fecha solicitada <span class="text-danger">*</span></label>
                                <input type="date" class="form-control oi-input" id="cita_fecha" name="fecha" min="<?= e($minDate) ?>" required>
                                <div class="invalid-feedback">Selecciona una fecha válida.</div>
                            </div>

                            <div class="col-md-4">
                                <label for="cita_horario" class="oi-label">Horario preferido <span class="text-danger">*</span></label>
                                <select class="form-select oi-input" id="cita_horario" name="horario" required>
                                    <option value="">Elige horario...</option>
                                    <option value="Mañana (10:00 - 13:00 hrs)">Mañana (10:00 – 13:00 hrs)</option>
                                    <option value="Mediodía (13:00 - 16:00 hrs)">Mediodía (13:00 – 16:00 hrs)</option>
                                    <option value="Tarde (16:00 - 19:00 hrs, Lun-Vie)">Tarde (16:00 – 19:00 hrs, Lun–Vie)</option>
                                    <option value="Sábado (10:00 - 14:00 hrs)">Sábado (10:00 – 14:00 hrs)</option>
                                </select>
                                <div class="invalid-feedback">Selecciona tu horario preferido.</div>
                            </div>

                            <div class="col-12">
                                <label for="cita_comentarios" class="oi-label">Comentarios (opcional)</label>
                                <textarea class="form-control oi-input" id="cita_comentarios" name="comentarios" rows="2" maxlength="1000" placeholder="Cuéntanos si requieres Lentes Express el mismo día o alguna indicación especial..."></textarea>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cita_priv" name="privacidad" value="1" required>
                                    <label class="form-check-label small text-muted" for="cita_priv">
                                        Acepto el <a href="<?= e(site_url('legal/privacidad.php')) ?>" target="_blank">Aviso de Privacidad</a>.
                                    </label>
                                    <div class="invalid-feedback">Debes aceptar el Aviso de Privacidad.</div>
                                </div>
                            </div>
                        </div>

                        <div class="oi-form-feedback mt-3" role="status" aria-live="polite"></div>

                        <div class="mt-4">
                            <button type="submit" class="oi-btn oi-btn--primary w-100 justify-content-center py-3">
                                <span class="oi-btn__text">Registrar solicitud de cita</span>
                                <span class="oi-btn__spinner spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                                <i data-lucide="calendar-check" class="oi-icon-sm oi-btn__icon"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Columna Derecha: Formulario de Mensaje General -->
            <div class="col-lg-5" data-reveal="fade-up">
                <div class="oi-form-card" style="background-color: var(--oi-alabaster);">
                    <span class="oi-eyebrow mb-2">MENSAJE O DUDA GENERAL</span>
                    <h2 class="oi-display-md mb-2">Escríbenos un mensaje</h2>
                    <p class="small text-muted mb-4">
                        ¿Tienes alguna consulta sobre armazones, micas, entregas a domicilio o facturación? Envíanos un mensaje directo.
                    </p>

                    <form action="<?= e(site_url('forms/contacto.php')) ?>" method="POST" class="oi-ajax-form" novalidate>
                        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
                        <div class="oi-hp-field" aria-hidden="true">
                            <label for="contacto_page_hp">No llenar</label>
                            <input type="text" id="contacto_page_hp" name="website_url" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label for="cont_nombre" class="oi-label">Nombre completo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control oi-input bg-white" id="cont_nombre" name="nombre" required minlength="3" maxlength="120" placeholder="Tu nombre completo">
                            <div class="invalid-feedback">Ingresa tu nombre completo.</div>
                        </div>

                        <div class="mb-3">
                            <label for="cont_telefono" class="oi-label">Teléfono / Celular <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control oi-input bg-white" id="cont_telefono" name="telefono" required pattern="[0-9+\-\s()]{10,18}" placeholder="Ej. 442 221 7851">
                            <div class="invalid-feedback">Ingresa un teléfono válido.</div>
                        </div>

                        <div class="mb-3">
                            <label for="cont_correo" class="oi-label">Correo electrónico <span class="text-danger">*</span></label>
                            <input type="email" class="form-control oi-input bg-white" id="cont_correo" name="correo" required maxlength="150" placeholder="correo@ejemplo.com">
                            <div class="invalid-feedback">Ingresa un correo válido.</div>
                        </div>

                        <div class="mb-3">
                            <label for="cont_asunto" class="oi-label">Asunto <span class="text-danger">*</span></label>
                            <input type="text" class="form-control oi-input bg-white" id="cont_asunto" name="asunto" required minlength="3" maxlength="150" placeholder="Ej. Cotización de micas / Duda de sucursal">
                            <div class="invalid-feedback">Indica el asunto de tu mensaje.</div>
                        </div>

                        <div class="mb-3">
                            <label for="cont_mensaje" class="oi-label">Mensaje <span class="text-danger">*</span></label>
                            <textarea class="form-control oi-input bg-white" id="cont_mensaje" name="mensaje" rows="3" required minlength="8" maxlength="2000" placeholder="Escribe tu consulta..."></textarea>
                            <div class="invalid-feedback">Escribe tu mensaje (mínimo 8 caracteres).</div>
                        </div>

                        <div class="oi-form-feedback mt-3" role="status" aria-live="polite"></div>

                        <div class="mt-3">
                            <button type="submit" class="oi-btn oi-btn--dark w-100 justify-content-center py-3">
                                <span class="oi-btn__text">Enviar mensaje</span>
                                <span class="oi-btn__spinner spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                                <i data-lucide="send" class="oi-icon-sm oi-btn__icon"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
