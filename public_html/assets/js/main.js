/**
 * ÓPTICA INFINITO — Motor de Interacciones, Animaciones y Formularios (Vanilla JS)
 * Sin dependencias pesadas · Optimizado para 60fps · Compatible con Neubox
 */

(function () {
    'use strict';

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /**
     * 1. Inicializar Iconos Lucide
     */
    function initIcons() {
        if (window.lucide && typeof window.lucide.createIcons === 'function') {
            window.lucide.createIcons();
        }
    }

    /**
     * 2. Header Progresivo y Barra de Lectura con requestAnimationFrame
     */
    function initScrollHeader() {
        const header = document.getElementById('oiHeader');
        const progressBar = document.getElementById('oiScrollProgress');
        let ticking = false;

        function updateOnScroll() {
            const scrollY = window.scrollY || window.pageYOffset;
            if (header) {
                if (scrollY > 36) {
                    header.classList.add('is-scrolled');
                } else {
                    header.classList.remove('is-scrolled');
                }
            }

            if (progressBar) {
                const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                const progress = docHeight > 0 ? Math.min(Math.max(scrollY / docHeight, 0), 1) : 0;
                progressBar.style.transform = `scaleX(${progress.toFixed(4)})`;
            }
            ticking = false;
        }

        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(updateOnScroll);
                ticking = true;
            }
        }, { passive: true });

        updateOnScroll();
    }

    /**
     * 3. Menú Móvil Elegante y Accesible
     */
    function initMobileDrawer() {
        const toggleBtn = document.getElementById('oiMobileToggle');
        const closeBtn = document.getElementById('oiMobileClose');
        const backdrop = document.getElementById('oiMobileBackdrop');
        const drawer = document.getElementById('oiMobileDrawer');

        if (!toggleBtn || !drawer) return;

        function openDrawer() {
            drawer.classList.add('is-open');
            drawer.setAttribute('aria-hidden', 'false');
            toggleBtn.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
        }

        function closeDrawer() {
            drawer.classList.remove('is-open');
            drawer.setAttribute('aria-hidden', 'true');
            toggleBtn.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }

        toggleBtn.addEventListener('click', openDrawer);
        if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
        if (backdrop) backdrop.addEventListener('click', closeDrawer);

        drawer.querySelectorAll('a, [data-bs-toggle="modal"]').forEach(function (el) {
            el.addEventListener('click', closeDrawer);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
                closeDrawer();
            }
        });
    }

    /**
     * 4. Animaciones de Scroll con Intersection Observer (Stagger & Reveal)
     */
    function initRevealAnimations() {
        // Configurar retrasos escalonados en contenedores [data-stagger]
        document.querySelectorAll('[data-stagger]').forEach(function (container) {
            const step = parseInt(container.getAttribute('data-stagger') || '90', 10);
            const children = container.querySelectorAll('[data-reveal]');
            children.forEach(function (child, idx) {
                if (!child.style.getPropertyValue('--reveal-delay')) {
                    child.style.setProperty('--reveal-delay', `${idx * step}ms`);
                }
            });
        });

        const revealElements = document.querySelectorAll('[data-reveal]');
        if (!revealElements.length) return;

        if (prefersReducedMotion || !('IntersectionObserver' in window)) {
            revealElements.forEach(function (el) {
                el.classList.add('is-visible');
            });
            return;
        }

        const observer = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    obs.unobserve(entry.target);
                }
            });
        }, {
            root: null,
            rootMargin: '0px 0px -8% 0px',
            threshold: 0.12
        });

        revealElements.forEach(function (el) {
            observer.observe(el);
        });
    }

    /**
     * 5. Parallax Óptico Discreto
     */
    function initSubtleParallax() {
        if (prefersReducedMotion) return;
        const parallaxItems = document.querySelectorAll('[data-parallax]');
        if (!parallaxItems.length) return;

        let ticking = false;
        function updateParallax() {
            const viewportMiddle = window.innerHeight / 2;
            parallaxItems.forEach(function (item) {
                const speed = parseFloat(item.getAttribute('data-parallax') || '0.06');
                const rect = item.getBoundingClientRect();
                if (rect.bottom >= 0 && rect.top <= window.innerHeight) {
                    const offset = (rect.top + rect.height / 2 - viewportMiddle) * speed;
                    item.style.transform = `translate3d(0, ${offset.toFixed(1)}px, 0)`;
                }
            });
            ticking = false;
        }

        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }, { passive: true });
    }

    /**
     * 6. Pre-selección Contextual de Servicio o Sucursal al abrir el Modal de Citas
     */
    function initContextualAppointmentButtons() {
        const modalEl = document.getElementById('modalAgendaCita');
        if (!modalEl) return;

        document.querySelectorAll('[data-cita-servicio], [data-cita-sucursal]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const servicio = btn.getAttribute('data-cita-servicio');
                const sucursal = btn.getAttribute('data-cita-sucursal');

                if (servicio) {
                    const selectServicio = modalEl.querySelector('[name="servicio"]');
                    if (selectServicio) {
                        Array.from(selectServicio.options).forEach(function (opt) {
                            if (opt.value.toLowerCase().includes(servicio.toLowerCase())) {
                                selectServicio.value = opt.value;
                            }
                        });
                    }
                }

                if (sucursal) {
                    const selectSucursal = modalEl.querySelector('[name="sucursal"]');
                    if (selectSucursal) {
                        Array.from(selectSucursal.options).forEach(function (opt) {
                            if (opt.value.toLowerCase().includes(sucursal.toLowerCase())) {
                                selectSucursal.value = opt.value;
                            }
                        });
                    }
                }
            });
        });
    }

    /**
     * 7. Validación Frontend y Envío Asíncrono de Formularios PHP (con CSRF y Estados de Carga)
     */
    function initAjaxForms() {
        const forms = document.querySelectorAll('.oi-ajax-form');
        if (!forms.length) return;

        forms.forEach(function (form) {
            form.addEventListener('submit', async function (e) {
                e.preventDefault();

                const feedbackBox = form.querySelector('.oi-form-feedback');
                if (feedbackBox) {
                    feedbackBox.innerHTML = '';
                }

                if (!form.checkValidity()) {
                    e.stopPropagation();
                    form.classList.add('was-validated');
                    if (feedbackBox) {
                        feedbackBox.innerHTML = `
                            <div class="alert alert-warning d-flex align-items-center gap-2 py-2 px-3 mb-0 small" role="alert">
                                <span>Por favor revisa los campos obligatorios marcados en rojo antes de continuar.</span>
                            </div>`;
                    }
                    return;
                }

                form.classList.add('was-validated');
                const submitBtn = form.querySelector('button[type="submit"]');
                const spinner = submitBtn ? submitBtn.querySelector('.oi-btn__spinner') : null;
                const btnText = submitBtn ? submitBtn.querySelector('.oi-btn__text') : null;
                const originalText = btnText ? btnText.textContent : '';

                if (submitBtn) submitBtn.disabled = true;
                if (spinner) spinner.classList.remove('d-none');
                if (btnText) btnText.textContent = 'Enviando solicitud...';

                try {
                    const formData = new FormData(form);
                    const response = await fetch(form.getAttribute('action'), {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (response.ok && result.success) {
                        if (feedbackBox) {
                            feedbackBox.innerHTML = `
                                <div class="alert alert-success border-0 shadow-sm p-3 mb-0" role="alert">
                                    <div class="fw-bold mb-1">${result.title || '¡Solicitud recibida con éxito!'}</div>
                                    <div class="small">${result.message}</div>
                                    ${result.whatsapp_url ? `<div class="mt-2 pt-2 border-top border-success border-opacity-25"><a href="${result.whatsapp_url}" target="_blank" rel="noopener noreferrer" class="fw-semibold text-success text-decoration-none small">Confirmar o agilizar por WhatsApp ahora &rarr;</a></div>` : ''}
                                </div>`;
                        }
                        form.reset();
                        form.classList.remove('was-validated');
                    } else {
                        const errMsg = (result && result.message)
                            ? result.message
                            : 'Ocurrió un inconveniente al procesar tu solicitud. Por favor intenta de nuevo o contáctanos al 442 221 7851.';
                        if (feedbackBox) {
                            feedbackBox.innerHTML = `
                                <div class="alert alert-danger py-2 px-3 mb-0 small" role="alert">
                                    ${errMsg}
                                </div>`;
                        }
                    }
                } catch (err) {
                    if (feedbackBox) {
                        feedbackBox.innerHTML = `
                            <div class="alert alert-danger py-2 px-3 mb-0 small" role="alert">
                                Error de conexión. Puedes comunicarte directamente al teléfono o WhatsApp <strong>442 221 7851</strong>.
                            </div>`;
                    }
                } finally {
                    if (submitBtn) submitBtn.disabled = false;
                    if (spinner) spinner.classList.add('d-none');
                    if (btnText) btnText.textContent = originalText;
                }
            });
        });
    }

    /**
     * 8. Pop-up Promocional Automático al Iniciar la Página
     */
    function initWelcomePromoPopup() {
        const popup = document.getElementById('oiPromoPopup');
        if (!popup) return;

        const closeBtn = document.getElementById('oiPromoClose');
        const backdrop = document.getElementById('oiPromoBackdrop');
        const agendarBtn = document.getElementById('oiPromoAgendarBtn');
        const currentPage = document.body.getAttribute('data-page') || 'inicio';

        function openPromoPopup() {
            popup.classList.add('is-open');
            popup.setAttribute('aria-hidden', 'false');
        }

        function closePromoPopup() {
            popup.classList.remove('is-open');
            popup.setAttribute('aria-hidden', 'true');
        }

        if (closeBtn) closeBtn.addEventListener('click', closePromoPopup);
        if (backdrop) backdrop.addEventListener('click', closePromoPopup);
        if (agendarBtn) agendarBtn.addEventListener('click', closePromoPopup);

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && popup.classList.contains('is-open')) {
                closePromoPopup();
            }
        });

        // Mostrar automáticamente al iniciar la página principal (inicio)
        if (currentPage === 'inicio') {
            window.setTimeout(openPromoPopup, 380);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        initIcons();
        initScrollHeader();
        initMobileDrawer();
        initRevealAnimations();
        initSubtleParallax();
        initContextualAppointmentButtons();
        initAjaxForms();
        initWelcomePromoPopup();
    });
})();
