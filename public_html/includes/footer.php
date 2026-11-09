<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';
$whatsappContext = $whatsappContext ?? ($activeNav ?? 'general');
$csrfToken       = csrf_token();
$minDate         = date('Y-m-d');
?>
</main>

<!-- Footer Corporativo Óptica Infinito -->
<footer class="oi-footer" role="contentinfo">
    <!-- Geometría Óptica Decorativa Superior -->
    <div class="oi-footer__lens-line" aria-hidden="true"></div>

    <div class="container py-5">
        <div class="row g-5 pb-4">
            <!-- Columna 1: Identidad e Información Institucional -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="oi-footer__emblem-wrap">
                        <img src="<?= e(site_url('assets/img/brand/emblem-infinito.svg')) ?>" alt="Emblema Óptica Infinito" width="44" height="44" loading="lazy">
                    </div>
                    <div>
                        <span class="d-block fw-bold text-white tracking-wider fs-5">ÓPTICA INFINITO<sup>®</sup></span>
                        <span class="d-block text-white-50 small">Grupo Infinito · Fundada en 2008</span>
                    </div>
                </div>
                <p class="oi-footer__desc mb-4">
                    Nacimos en 2008 en Querétaro con el propósito de brindar a nuestros clientes, pacientes y empresas la mejor atención optométrica en cada visita. Especialistas en salud visual integral, lentes express y protección visual industrial certificada.
                </p>
                <div class="oi-footer__group-badge mb-4">
                    <img src="<?= e(site_url('assets/img/brand/logo-grupo-infinito.png')) ?>"
                         alt="Grupo Infinito — Más allá de su visión"
                         width="165"
                         height="35"
                         loading="lazy"
                         class="img-fluid">
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="<?= e(SITE_DATA['social']['facebook']) ?>"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="oi-social-btn"
                       aria-label="Facebook oficial de Óptica Infinito">
                        <i data-lucide="facebook" class="oi-icon-sm"></i>
                    </a>
                    <a href="<?= e(SITE_DATA['social']['instagram']) ?>"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="oi-social-btn"
                       aria-label="Instagram oficial de Óptica Infinito">
                        <i data-lucide="instagram" class="oi-icon-sm"></i>
                    </a>
                    <a href="<?= e(whatsapp_url($whatsappContext)) ?>"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="oi-social-btn oi-social-btn--wa"
                       aria-label="WhatsApp oficial de Óptica Infinito">
                        <i data-lucide="message-circle" class="oi-icon-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Columna 2: Navegación y Accesos -->
            <div class="col-lg-2 col-md-6 col-6">
                <h3 class="oi-footer__heading">Navegación</h3>
                <ul class="oi-footer__list">
                    <li><a href="<?= e(site_url('')) ?>">Inicio</a></li>
                    <li><a href="<?= e(site_url('nosotros.php')) ?>">Nosotros</a></li>
                    <li><a href="<?= e(site_url('servicios.php')) ?>">Servicios</a></li>
                    <li><a href="<?= e(site_url('empresas.php')) ?>">Salud Empresarial</a></li>
                    <li><a href="<?= e(site_url('optica/')) ?>">Óptica y Catálogo</a></li>
                    <li><a href="<?= e(site_url('pacientes/')) ?>">Portal Pacientes</a></li>
                    <li><a href="<?= e(site_url('contacto.php')) ?>">Contacto y Citas</a></li>
                </ul>
            </div>

            <!-- Columna 3: Servicios Especializados -->
            <div class="col-lg-3 col-md-6 col-6">
                <h3 class="oi-footer__heading">Servicios</h3>
                <ul class="oi-footer__list">
                    <li><a href="<?= e(site_url('servicios.php#examenes-visuales')) ?>">Exámenes visuales</a></li>
                    <li><a href="<?= e(site_url('servicios.php#lentes-de-contacto')) ?>">Lentes de contacto</a></li>
                    <li><a href="<?= e(site_url('servicios.php#lentes-express')) ?>">Lentes express (mismo día)</a></li>
                    <li><a href="<?= e(site_url('empresas.php#salud-empresarial')) ?>">Salud visual empresarial</a></li>
                    <li><a href="<?= e(site_url('servicios.php#entregas-domicilio')) ?>">Entregas a domicilio</a></li>
                    <li><a href="<?= e(site_url('empresas.php#proteccion-industrial')) ?>">Protección visual industrial</a></li>
                </ul>

                <div class="mt-4 pt-2 border-top border-secondary border-opacity-25">
                    <span class="d-block text-uppercase text-white-50" style="font-size: 0.7rem; letter-spacing: 0.1em;">Horarios de Atención</span>
                    <p class="small text-white-50 mb-1 mt-1">Lun a Vie: <strong class="text-white">10:00 a 19:00</strong></p>
                    <p class="small text-white-50 mb-0">Sábado: <strong class="text-white">10:00 a 14:00</strong></p>
                </div>
            </div>

            <!-- Columna 4: Ubicaciones y Contacto Directo -->
            <div class="col-lg-3 col-md-6">
                <h3 class="oi-footer__heading">Sucursales Querétaro</h3>
                <div class="oi-footer__branch mb-3">
                    <div class="d-flex align-items-start gap-2">
                        <i data-lucide="map-pin" class="oi-icon-sm text-info flex-shrink-0 mt-1"></i>
                        <div>
                            <strong class="d-block text-white small">Sucursal Tecnológico (Matriz)</strong>
                            <span class="small text-white-50 d-block">Av. Tecnológico Sur, No. 6B, Col. Niños Héroes, Querétaro, Qro.</span>
                        </div>
                    </div>
                </div>
                <div class="oi-footer__branch mb-4">
                    <div class="d-flex align-items-start gap-2">
                        <i data-lucide="map-pin" class="oi-icon-sm text-info flex-shrink-0 mt-1"></i>
                        <div>
                            <strong class="d-block text-white small">Sucursal Plaza El Mirador</strong>
                            <span class="small text-white-50 d-block">Plaza Comercial El Mirador, local 45. Av. Prol. Constituyentes Ote. 5, Fracc. El Mirador, Querétaro, Qro.</span>
                        </div>
                    </div>
                </div>

                <div class="oi-footer__contact-box">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i data-lucide="phone-call" class="oi-icon-sm text-info"></i>
                        <a href="tel:<?= e(SITE_DATA['phone_raw']) ?>" class="text-white fw-semibold text-decoration-none"><?= e(SITE_DATA['phone_display']) ?></a>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i data-lucide="mail" class="oi-icon-sm text-info"></i>
                        <a href="mailto:<?= e(SITE_DATA['email']) ?>" class="text-white-50 small text-decoration-none"><?= e(SITE_DATA['email']) ?></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barra Inferior Legal y Derechos Reservados -->
        <div class="oi-footer__bottom pt-4 mt-2 border-top border-secondary border-opacity-25">
            <div class="row align-items-center gy-3">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 small text-white-50">
                        &copy; 2008–<?= date('Y') ?> <strong>Óptica Infinito</strong> · Grupo Infinito. Todos los derechos reservados.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <ul class="list-inline mb-0 small">
                        <li class="list-inline-item">
                            <a href="<?= e(site_url('legal/privacidad.php')) ?>" class="oi-footer__legal-link">Aviso de Privacidad</a>
                        </li>
                        <li class="list-inline-item text-white-50 mx-2">·</li>
                        <li class="list-inline-item">
                            <a href="<?= e(site_url('legal/terminos.php')) ?>" class="oi-footer__legal-link">Términos y Condiciones</a>
                        </li>
                        <li class="list-inline-item text-white-50 mx-2">·</li>
                        <li class="list-inline-item">
                            <a href="<?= e(site_url('sitemap.xml')) ?>" class="oi-footer__legal-link">Mapa del Sitio</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Botón Flotante de WhatsApp con Mensaje Contextual -->
<div class="oi-wa-float" role="region" aria-label="Atención directa por WhatsApp">
    <a href="<?= e(whatsapp_url($whatsappContext)) ?>"
       target="_blank"
       rel="noopener noreferrer"
       class="oi-wa-float__btn"
       title="Chatear por WhatsApp con Óptica Infinito (442 221 7851)"
       aria-label="Enviar mensaje por WhatsApp al 442 221 7851">
        <span class="oi-wa-float__pulse" aria-hidden="true"></span>
        <svg class="oi-wa-float__icon" viewBox="0 0 24 24" width="26" height="26" fill="currentColor" aria-hidden="true">
            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.625.846 5.059 2.284 7.033l-1.492 5.451 5.604-1.469c1.908 1.258 4.19 1.985 6.604 1.985 6.627 0 12-5.373 12-12s-5.373-12-12-12z"/>
        </svg>
        <span class="oi-wa-float__label d-none d-md-inline">Atención WhatsApp</span>
    </a>
</div>

<!-- Modal Global de Solicitud de Cita -->
<div class="modal fade oi-modal" id="modalAgendaCita" tabindex="-1" aria-labelledby="modalAgendaCitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content oi-modal__content">
            <div class="modal-header oi-modal__header">
                <div>
                    <span class="oi-eyebrow text-primary mb-1 d-block">ÓPTICA INFINITO · QUERÉTARO</span>
                    <h2 class="modal-title h4 fw-bold mb-0" id="modalAgendaCitaLabel">Solicita tu Cita Optométrica</h2>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar ventana"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <div class="oi-notice-banner mb-4">
                    <i data-lucide="info" class="oi-icon-sm text-primary flex-shrink-0 mt-1"></i>
                    <div class="small">
                        <strong>Importante:</strong> Tu solicitud será enviada a <strong>contacto@opticainfinito.com.mx</strong>. Recuerda que una solicitud en línea no representa una cita confirmada automáticamente; nuestro personal de Óptica Infinito se comunicará contigo para confirmar disponibilidad de fecha y horario.
                    </div>
                </div>

                <form id="modalCitaForm" action="<?= e(site_url('forms/citas.php')) ?>" method="POST" class="oi-ajax-form" novalidate>
                    <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
                    <!-- Honeypot antispam invisible para humanos -->
                    <div class="oi-hp-field" aria-hidden="true">
                        <label for="modal_website_url">No llenar este campo</label>
                        <input type="text" id="modal_website_url" name="website_url" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="modal_nombre" class="oi-label">Nombre completo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control oi-input" id="modal_nombre" name="nombre" placeholder="Ej. Mariana Gómez Hernández" required minlength="3" maxlength="120">
                            <div class="invalid-feedback">Por favor ingresa tu nombre completo.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="modal_telefono" class="oi-label">Teléfono / WhatsApp (10 dígitos) <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control oi-input" id="modal_telefono" name="telefono" placeholder="Ej. 442 221 7851" required pattern="[0-9+\-\s()]{10,18}">
                            <div class="invalid-feedback">Ingresa un número telefónico válido de al menos 10 dígitos.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="modal_correo" class="oi-label">Correo electrónico <span class="text-danger">*</span></label>
                            <input type="email" class="form-control oi-input" id="modal_correo" name="correo" placeholder="nombre@correo.com" required maxlength="150">
                            <div class="invalid-feedback">Ingresa un correo electrónico válido.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="modal_servicio" class="oi-label">Servicio de interés <span class="text-danger">*</span></label>
                            <select class="form-select oi-input" id="modal_servicio" name="servicio" required>
                                <option value="">Selecciona un servicio...</option>
                                <option value="Examen visual">Examen visual profesional</option>
                                <option value="Lentes de contacto">Adaptación de lentes de contacto</option>
                                <option value="Lentes express">Lentes express (entrega el mismo día)</option>
                                <option value="Salud visual empresarial">Salud visual empresarial (Campañas)</option>
                                <option value="Entregas a domicilio">Asesoría y entregas a domicilio</option>
                                <option value="Protección visual industrial">Protección visual industrial certificada</option>
                            </select>
                            <div class="invalid-feedback">Selecciona el servicio de tu interés.</div>
                        </div>

                        <div class="col-md-4">
                            <label for="modal_sucursal" class="oi-label">Sucursal <span class="text-danger">*</span></label>
                            <select class="form-select oi-input" id="modal_sucursal" name="sucursal" required>
                                <option value="">Elige sucursal...</option>
                                <option value="Sucursal Tecnológico (Av. Tecnológico Sur 6B)">Sucursal Tecnológico (Matriz)</option>
                                <option value="Sucursal Plaza El Mirador (Local 45)">Sucursal Plaza El Mirador</option>
                            </select>
                            <div class="invalid-feedback">Selecciona una sucursal.</div>
                        </div>

                        <div class="col-md-4">
                            <label for="modal_fecha" class="oi-label">Fecha solicitada <span class="text-danger">*</span></label>
                            <input type="date" class="form-control oi-input" id="modal_fecha" name="fecha" min="<?= e($minDate) ?>" required>
                            <div class="invalid-feedback">Selecciona una fecha válida.</div>
                        </div>

                        <div class="col-md-4">
                            <label for="modal_horario" class="oi-label">Horario preferido <span class="text-danger">*</span></label>
                            <select class="form-select oi-input" id="modal_horario" name="horario" required>
                                <option value="">Selecciona horario...</option>
                                <option value="Mañana (10:00 - 13:00 hrs)">Mañana (10:00 – 13:00 hrs)</option>
                                <option value="Mediodía (13:00 - 16:00 hrs)">Mediodía (13:00 – 16:00 hrs)</option>
                                <option value="Tarde (16:00 - 19:00 hrs, Lun-Vie)">Tarde (16:00 – 19:00 hrs, Lun–Vie)</option>
                                <option value="Sábado (10:00 - 14:00 hrs)">Sábado (10:00 – 14:00 hrs)</option>
                            </select>
                            <div class="invalid-feedback">Selecciona tu horario preferido.</div>
                        </div>

                        <div class="col-12">
                            <label for="modal_comentarios" class="oi-label">Comentarios o necesidades específicas (opcional)</label>
                            <textarea class="form-control oi-input" id="modal_comentarios" name="comentarios" rows="2" maxlength="1000" placeholder="Indícanos si utilizas lentes actualmente, si requieres lentes express el mismo día o alguna duda particular..."></textarea>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="modal_privacidad" name="privacidad" value="1" required>
                                <label class="form-check-label small text-muted" for="modal_privacidad">
                                    He leído y acepto el <a href="<?= e(site_url('legal/privacidad.php')) ?>" target="_blank">Aviso de Privacidad</a> y comprendo que el personal de Óptica Infinito confirmará mi cita.
                                </label>
                                <div class="invalid-feedback">Debes aceptar el Aviso de Privacidad para continuar.</div>
                            </div>
                        </div>
                    </div>

                    <div class="oi-form-feedback mt-3" role="status" aria-live="polite"></div>

                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4 pt-3 border-top">
                        <a href="<?= e(whatsapp_url('examen')) ?>" target="_blank" rel="noopener noreferrer" class="small text-decoration-none text-success fw-medium">
                            <i data-lucide="message-circle" class="oi-icon-xs"></i> ¿Prefieres agendar directo por WhatsApp?
                        </a>
                        <button type="submit" class="oi-btn oi-btn--primary px-4">
                            <span class="oi-btn__text">Enviar solicitud de cita</span>
                            <span class="oi-btn__spinner spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                            <i data-lucide="arrow-right" class="oi-icon-sm oi-btn__icon"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Pop-up Promocional de Bienvenida (Buen Fin. Buena Vista.) -->
<div class="oi-promo-popup" id="oiPromoPopup" role="dialog" aria-modal="true" aria-labelledby="oiPromoPopupTitle" aria-hidden="true">
    <div class="oi-promo-popup__backdrop" id="oiPromoBackdrop"></div>
    <div class="oi-promo-popup__dialog" role="document">
        <button type="button" class="oi-promo-popup__close" id="oiPromoClose" aria-label="Cerrar promoción">
            <span aria-hidden="true">&times;</span>
        </button>

        <div class="oi-promo-popup__media">
            <img src="<?= e(site_url('assets/img/promos/popup-buen-fin.jpg')) ?>?v=2.2"
                 alt="Buen Fin. Buena Vista. Del 13 al 17 de noviembre, descuentos del 40% al 60% en armazones y lentes en Óptica Infinito"
                 id="oiPromoPopupTitle"
                 class="oi-promo-popup__img"
                 width="820"
                 height="1024">
        </div>

        <div class="oi-promo-popup__footer">
            <button type="button"
                    class="oi-btn oi-btn--primary btn-sm flex-grow-1 justify-content-center"
                    id="oiPromoAgendarBtn"
                    data-bs-toggle="modal"
                    data-bs-target="#modalAgendaCita">
                <i data-lucide="calendar-check" class="oi-icon-xs"></i>
                <span>Agendar mi cita ahora</span>
            </button>
            <a href="<?= e(whatsapp_url('inicio', 'Hola Óptica Infinito, vi la promoción de Buen Fin (40% al 60% en armazones y lentes) y me gustaría agendar una cita.')) ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="oi-btn oi-btn--whatsapp btn-sm justify-content-center">
                <i data-lucide="message-circle" class="oi-icon-xs"></i>
                <span>WhatsApp</span>
            </a>
        </div>
    </div>
</div>

<!-- Scripts de Producción (Sin requerir Node.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" defer></script>
<script src="https://unpkg.com/lucide@0.469.0/dist/umd/lucide.min.js" crossorigin="anonymous" defer></script>
<script src="<?= e(site_url('assets/js/main.js')) ?>?v=<?= e(APP_VERSION) ?>" defer></script>
</body>
</html>
