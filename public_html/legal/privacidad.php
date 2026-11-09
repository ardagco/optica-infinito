<?php
declare(strict_types=1);

$pageTitle       = 'Política de Privacidad | Óptica Infinito';
$pageDescription = 'Política de Privacidad de Óptica Infinito (Grupo Infinito). Conozca cómo recopilamos, utilizamos y protegemos sus datos personales conforme a la legislación vigente en México.';
$pageCanonical   = 'https://opticainfinito.com.mx/legal/privacidad.php';
$activeNav       = 'privacidad';
$headerTheme     = 'light';
$whatsappContext = 'default';

require_once __DIR__ . '/../includes/header.php';
?>

<!-- ==========================================================================
     HERO EDITORIAL LEGAL: POLÍTICA DE PRIVACIDAD
     ========================================================================== -->
<section class="page-hero page-hero--editorial bg-alabaster border-bottom">
    <div class="container">
        <div class="row align-items-end g-4">
            <div class="col-lg-8">
                <div class="eyebrow-tag mb-3" data-reveal="fade-up">
                    <span class="eyebrow-dot"></span> Marco Normativo y Protección de Datos
                </div>
                <h1 class="display-title mb-3" data-reveal="fade-up" data-reveal-delay="100">
                    Política de <em class="serif-italic">Privacidad</em>
                </h1>
                <p class="lead-editorial text-graphite mb-0" data-reveal="fade-up" data-reveal-delay="150">
                    Son un acuerdo legal entre el propietario del sitio y sus usuarios. Informa sobre cómo se recopilan, utilizan y protegen sus datos personales.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end" data-reveal="fade-up" data-reveal-delay="200">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-white border shadow-xs">
                    <i data-lucide="calendar-check" class="icon-xs text-teal"></i>
                    <span class="font-mono small text-secondary">Última actualización: 31/01/2025</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     DOCUMENTO ÍNTEGRO DE POLÍTICA DE PRIVACIDAD
     ========================================================================== -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row g-5">
            <!-- Navegación lateral de documentos legales -->
            <div class="col-lg-4" data-reveal="fade-up">
                <div class="sticky-top" style="top: 110px;">
                    <div class="card-editorial p-4 bg-alabaster mb-4">
                        <span class="font-mono text-uppercase small text-teal d-block mb-2">Documentos Legales</span>
                        <h2 class="h5 font-serif mb-3">Centro de Transparencia</h2>
                        <p class="small text-secondary mb-4">
                            Es importante leer estos documentos antes de utilizar el sitio web <a href="https://opticainfinito.com.mx" class="text-teal text-decoration-underline">opticainfinito.com.mx</a>.
                        </p>
                        <div class="d-grid gap-2">
                            <a href="<?= e(base_url('legal/privacidad.php')) ?>" class="btn btn-primary-editorial justify-content-between text-start">
                                <span>Política de Privacidad</span>
                                <i data-lucide="shield-check" class="icon-sm"></i>
                            </a>
                            <a href="<?= e(base_url('legal/terminos.php')) ?>" class="btn btn-outline-editorial justify-content-between text-start">
                                <span>Términos y Condiciones</span>
                                <i data-lucide="file-text" class="icon-sm"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-editorial p-4 border">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="icon-box-sm bg-teal-subtle text-teal rounded-circle d-flex align-items-center justify-content-center">
                                <i data-lucide="mail" class="icon-sm"></i>
                            </div>
                            <div>
                                <h3 class="h6 mb-0">Derechos ARCO y Privacidad</h3>
                                <span class="small text-secondary">Atención oficial al Usuario</span>
                            </div>
                        </div>
                        <p class="small text-secondary mb-3">
                            Para ejercer sus derechos de acceso, rectificación, cancelación u oposición, comuníquese directamente a nuestro correo oficial:
                        </p>
                        <a href="mailto:<?= e(SITE_DATA['email']) ?>" class="font-mono small text-teal text-decoration-none d-inline-flex align-items-center gap-2">
                            <i data-lucide="send" class="icon-xs"></i>
                            <?= e(SITE_DATA['email']) ?>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contenido legal íntegro -->
            <div class="col-lg-8" data-reveal="fade-up" data-reveal-delay="100">
                <article class="legal-document card-editorial p-4 p-md-5 bg-white border">
                    <div class="border-bottom pb-4 mb-4">
                        <span class="badge bg-teal-subtle text-teal font-mono mb-2">Vigente</span>
                        <h2 class="h3 font-serif mb-1">Política de privacidad</h2>
                        <p class="small text-secondary mb-0">Fecha de última actualización: 31/01/2025.</p>
                    </div>

                    <div class="legal-section mb-4">
                        <h3 class="h5 font-serif mb-3">Introducción.</h3>
                        <p class="text-secondary">
                            Bienvenido a <a href="https://www.opticainfinito.com.mx/" class="text-teal">opticainfinito.com.mx</a> (en adelante, "la Página"), nos comprometemos a proteger la privacidad de nuestros usuarios (en adelante, "el Usuario"). Esta Política de Privacidad explica cómo recopilamos, utilizamos y protegemos la información personal del Usuario.
                        </p>
                    </div>

                    <ol class="legal-ordered-list ps-3">
                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Información que Recopilamos</h3>
                            <p class="text-secondary mb-2">Podemos recopilar la siguiente información personal del Usuario:</p>
                            <ul class="text-secondary mb-0">
                                <li class="mb-1">Nombre y apellidos</li>
                                <li class="mb-1">Dirección de correo electrónico</li>
                                <li class="mb-1">Número de teléfono</li>
                                <li class="mb-1">Información demográfica (edad, sexo, ubicación)</li>
                                <li class="mb-1">Historial de consultas y servicios</li>
                                <li class="mb-1">Información sobre el uso de la Página (páginas visitadas, tiempo de navegación, etc.)</li>
                            </ul>
                        </li>

                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Uso de la Información</h3>
                            <p class="text-secondary mb-2">Utilizamos la información personal del Usuario para los siguientes fines:</p>
                            <ul class="text-secondary mb-0">
                                <li class="mb-1">Proporcionar y mejorar nuestros servicios</li>
                                <li class="mb-1">Personalizar la experiencia del Usuario en la Página</li>
                                <li class="mb-1">Comunicarnos con el Usuario sobre sus consultas y servicios</li>
                                <li class="mb-1">Enviar información sobre nuestros productos y promociones (si el Usuario lo consiente)</li>
                                <li class="mb-1">Realizar análisis estadísticos y estudios de mercado</li>
                                <li class="mb-1">Cumplir con obligaciones legales</li>
                            </ul>
                        </li>

                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Protección de la Información</h3>
                            <p class="text-secondary mb-0">
                                Implementamos medidas de seguridad técnicas y organizativas para proteger la información personal del Usuario contra accesos no autorizados, uso indebido o divulgación.
                            </p>
                        </li>

                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Compartir Información con Terceros</h3>
                            <p class="text-secondary mb-2">Podemos compartir la información personal del Usuario con terceros en los siguientes casos:</p>
                            <ul class="text-secondary mb-0">
                                <li class="mb-1">Con proveedores de servicios que nos ayudan a operar la Página y nuestros servicios (por ejemplo, empresas de alojamiento web, marketing o análisis)</li>
                                <li class="mb-1">Cuando sea requerido por ley o autoridad competente</li>
                                <li class="mb-1">Con el consentimiento del Usuario</li>
                            </ul>
                        </li>

                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Derechos del Usuario</h3>
                            <p class="text-secondary mb-0">
                                El Usuario tiene derecho a acceder, rectificar, cancelar y oponerse al tratamiento de su información personal. Para ejercer estos derechos, el Usuario puede contactarnos a través de <a href="mailto:<?= e(SITE_DATA['email']) ?>" class="text-teal"><?= e(SITE_DATA['email']) ?></a>.
                            </p>
                        </li>

                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Cambios en la Política de Privacidad</h3>
                            <p class="text-secondary mb-0">
                                Nos reservamos el derecho de modificar esta Política de Privacidad en cualquier momento. Los cambios serán publicados en la Página y entrarán en vigor a partir de su publicación.
                            </p>
                        </li>

                        <li class="mb-2">
                            <h3 class="h5 font-serif mb-2">Contacto</h3>
                            <p class="text-secondary mb-0">
                                Si tiene alguna pregunta o comentario sobre esta Política de Privacidad, puede contactarnos a través de <a href="mailto:<?= e(SITE_DATA['email']) ?>" class="text-teal"><?= e(SITE_DATA['email']) ?></a>.
                            </p>
                        </li>
                    </ol>
                </article>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
