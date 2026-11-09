<?php
declare(strict_types=1);

$pageTitle       = 'Términos y Condiciones | Óptica Infinito';
$pageDescription = 'Términos y Condiciones de uso del sitio web opticainfinito.com.mx (Óptica Infinito / Grupo Infinito). Jurisdicción en Santiago de Querétaro, Qro.';
$pageCanonical   = 'https://opticainfinito.com.mx/legal/terminos.php';
$activeNav       = 'terminos';
$headerTheme     = 'light';
$whatsappContext = 'default';

require_once __DIR__ . '/../includes/header.php';
?>

<!-- ==========================================================================
     HERO EDITORIAL LEGAL: TÉRMINOS Y CONDICIONES
     ========================================================================== -->
<section class="page-hero page-hero--editorial bg-alabaster border-bottom">
    <div class="container">
        <div class="row align-items-end g-4">
            <div class="col-lg-8">
                <div class="eyebrow-tag mb-3" data-reveal="fade-up">
                    <span class="eyebrow-dot"></span> Marco Legal y Condiciones de Uso
                </div>
                <h1 class="display-title mb-3" data-reveal="fade-up" data-reveal-delay="100">
                    Términos y <em class="serif-italic">Condiciones</em>
                </h1>
                <p class="lead-editorial text-graphite mb-0" data-reveal="fade-up" data-reveal-delay="150">
                    Son un acuerdo legal entre el propietario del sitio y sus usuarios. Cubren aspectos como el uso aceptable del sitio, la propiedad intelectual de los contenidos, las responsabilidades de cada parte y las leyes aplicables.
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
     DOCUMENTO ÍNTEGRO DE TÉRMINOS Y CONDICIONES
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
                            <a href="<?= e(base_url('legal/privacidad.php')) ?>" class="btn btn-outline-editorial justify-content-between text-start">
                                <span>Política de Privacidad</span>
                                <i data-lucide="shield-check" class="icon-sm"></i>
                            </a>
                            <a href="<?= e(base_url('legal/terminos.php')) ?>" class="btn btn-primary-editorial justify-content-between text-start">
                                <span>Términos y Condiciones</span>
                                <i data-lucide="file-text" class="icon-sm"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-editorial p-4 border">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="icon-box-sm bg-teal-subtle text-teal rounded-circle d-flex align-items-center justify-content-center">
                                <i data-lucide="scale" class="icon-sm"></i>
                            </div>
                            <div>
                                <h3 class="h6 mb-0">Jurisdicción Aplicable</h3>
                                <span class="small text-secondary">Santiago de Querétaro, Qro.</span>
                            </div>
                        </div>
                        <p class="small text-secondary mb-3">
                            Para cualquier consulta sobre estos Términos y Condiciones, escríbanos a nuestro correo electrónico oficial:
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
                        <h2 class="h3 font-serif mb-1">Términos y condiciones</h2>
                        <p class="small text-secondary mb-0">Fecha de última actualización: 31/01/2025.</p>
                    </div>

                    <div class="legal-section mb-4">
                        <h3 class="h5 font-serif mb-3">Introducción.</h3>
                        <p class="text-secondary">
                            Bienvenido a <a href="https://www.opticainfinito.com.mx/" class="text-teal">opticainfinito.com.mx</a> (en adelante, "la Página"), un sitio web dedicado a ofrecer servicios de salud visual. Al acceder y utilizar la Página, usted (en adelante, "el Usuario") acepta los siguientes términos y condiciones (en adelante, "los Términos y Condiciones"), junto con nuestra Política de Privacidad. Le recomendamos leer atentamente estos Términos y Condiciones antes de utilizar la Página.
                        </p>
                    </div>

                    <ol class="legal-ordered-list ps-3">
                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Servicios.</h3>
                            <p class="text-secondary mb-2">La Página ofrece información y recursos relacionados con la salud visual, incluyendo, pero no limitado a:</p>
                            <ul class="text-secondary mb-0">
                                <li class="mb-1">Información sobre diversas condiciones y enfermedades oculares.</li>
                                <li class="mb-1">Artículos y consejos sobre cuidado de la visión.</li>
                                <li class="mb-1">Directorio de profesionales de la salud visual (si aplica).</li>
                                <li class="mb-1">Servicios de teleconsulta o citas en línea (si aplica).</li>
                                <li class="mb-1">Venta de productos relacionados con la salud visual (si aplica).</li>
                            </ul>
                        </li>

                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Uso de la Página.</h3>
                            <p class="text-secondary mb-2">El Usuario se compromete a utilizar la Página de acuerdo con estos Términos y Condiciones, la ley aplicable y la moral y las buenas costumbres. El Usuario se abstendrá de:</p>
                            <ul class="text-secondary mb-0">
                                <li class="mb-1">Utilizar la Página para fines ilegales o no autorizados.</li>
                                <li class="mb-1">Intentar acceder a áreas restringidas de la Página sin autorización.</li>
                                <li class="mb-1">Interferir o interrumpir el funcionamiento de la Página.</li>
                                <li class="mb-1">Utilizar la Página para enviar spam o comunicaciones no solicitadas.</li>
                                <li class="mb-1">Infringir los derechos de propiedad intelectual de la Página o de terceros.</li>
                            </ul>
                        </li>

                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Información Proporcionada.</h3>
                            <p class="text-secondary mb-0">
                                La información proporcionada en la Página es solo para fines informativos y no constituye asesoramiento médico. El Usuario debe consultar con un profesional de la salud visual calificado para obtener diagnóstico y tratamiento para cualquier condición o enfermedad ocular.
                            </p>
                        </li>

                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Responsabilidad.</h3>
                            <p class="text-secondary mb-0">
                                La Página no se hace responsable por la exactitud, integridad o actualidad de la información proporcionada. La Página tampoco se hace responsable por los daños y perjuicios que puedan derivarse del uso de la Página o de la información proporcionada en ella.
                            </p>
                        </li>

                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Propiedad Intelectual.</h3>
                            <p class="text-secondary mb-0">
                                Todos los contenidos de la Página, incluyendo, pero no limitado a textos, gráficos, logotipos, imágenes y software, son propiedad de la Página o de sus licenciantes y están protegidos por las leyes de propiedad intelectual.
                            </p>
                        </li>

                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Enlaces a Terceros.</h3>
                            <p class="text-secondary mb-0">
                                La Página puede contener enlaces a sitios web de terceros. La Página no se hace responsable por el contenido o las políticas de privacidad de dichos sitios web.
                            </p>
                        </li>

                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Modificaciones.</h3>
                            <p class="text-secondary mb-0">
                                La Página se reserva el derecho de modificar estos Términos y Condiciones en cualquier momento. Las modificaciones serán publicadas en la Página y entrarán en vigor a partir de su publicación. Se recomienda al Usuario revisar periódicamente estos Términos y Condiciones para estar al tanto de cualquier cambio.
                            </p>
                        </li>

                        <li class="mb-4">
                            <h3 class="h5 font-serif mb-2">Ley Aplicable.</h3>
                            <p class="text-secondary mb-0">
                                Estos Términos y Condiciones se rigen por las leyes de los Estados Unidos Mexicanos (México). Cualquier controversia relacionada con estos Términos y Condiciones se someterá a la jurisdicción exclusiva de los tribunales de Santiago de Querétaro, Qro.
                            </p>
                        </li>

                        <li class="mb-2">
                            <h3 class="h5 font-serif mb-2">Contacto.</h3>
                            <p class="text-secondary mb-0">
                                Si tiene alguna pregunta o comentario sobre estos Términos y Condiciones, puede contactarnos a través de <a href="mailto:<?= e(SITE_DATA['email']) ?>" class="text-teal"><?= e(SITE_DATA['email']) ?></a>.
                            </p>
                        </li>
                    </ol>
                </article>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
