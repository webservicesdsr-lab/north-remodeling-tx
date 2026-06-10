/**
 * Remodel North Texas homepage interactions.
 */

(function () {
    'use strict';

    const root = document.querySelector('[data-rntx-home]');

    if (!root) {
        return;
    }

    const qs = (selector, scope = root) => scope.querySelector(selector);
    const qsa = (selector, scope = root) => Array.from(scope.querySelectorAll(selector));

    const modal = qs('[data-rntx-modal]');
    const modalTitle = qs('[data-rntx-modal-title]');
    const modalText = qs('[data-rntx-modal-text]');
    const modalKicker = qs('[data-rntx-modal-kicker]');
    const stickyCta = qs('[data-rntx-mobile-cta]');

    function openModal(options = {}) {
        if (!modal) {
            return;
        }

        if (modalKicker && options.kicker) {
            modalKicker.textContent = options.kicker;
        }

        if (modalTitle && options.title) {
            modalTitle.textContent = options.title;
        }

        if (modalText && options.text) {
            modalText.textContent = options.text;
        }

        modal.hidden = false;
        document.documentElement.classList.add('rntx-modal-open');

        const close = qs('[data-rntx-close-modal]', modal);
        if (close) {
            close.focus({ preventScroll: true });
        }
    }

    function closeModal() {
        if (!modal) {
            return;
        }

        modal.hidden = true;
        document.documentElement.classList.remove('rntx-modal-open');
    }

    function scrollToTarget(selector) {
        const target = document.querySelector(selector);

        if (!target) {
            return;
        }

        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    function selectProjectType(type) {
        if (!type) {
            return;
        }

        qsa('[data-rntx-chip]').forEach((chip) => {
            chip.classList.toggle('is-active', chip.getAttribute('data-rntx-chip') === type);
        });

        const input = qs('#rntx-project-search');
        if (input) {
            input.value = type;
        }
    }

    function initReveal() {
        const items = qsa('[data-rntx-reveal]');

        if (!items.length) {
            return;
        }

        if (!('IntersectionObserver' in window)) {
            items.forEach((item) => item.classList.add('is-visible'));
            return;
        }

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                });
            },
            {
                rootMargin: '0px 0px -10% 0px',
                threshold: 0.08
            }
        );

        items.forEach((item, index) => {
            item.style.transitionDelay = `${Math.min(index * 30, 220)}ms`;
            observer.observe(item);
        });
    }

    function initStickyCta() {
        if (!stickyCta) {
            return;
        }

        function update() {
            stickyCta.classList.toggle('is-visible', window.scrollY > 440);
        }

        update();
        window.addEventListener('scroll', update, { passive: true });
    }

    function initProjectChips() {
        qsa('[data-rntx-chip]').forEach((chip) => {
            chip.addEventListener('click', () => {
                const type = chip.getAttribute('data-rntx-chip');

                if (!type) {
                    return;
                }

                selectProjectType(type);
                scrollToTarget('#rntx-estimate');
            });
        });

        qsa('[data-rntx-scroll-target]').forEach((button) => {
            button.addEventListener('click', () => {
                const target = button.getAttribute('data-rntx-scroll-target');
                scrollToTarget(target);
            });
        });
    }

    function initEstimateEntry() {
        qsa('[data-rntx-estimate-entry]').forEach((form) => {
            form.addEventListener('submit', (event) => {
                event.preventDefault();

                const input = qs('#rntx-project-search');

                if (input && input.value.trim()) {
                    selectProjectType(input.value.trim());
                }

                scrollToTarget('#rntx-estimate');
            });
        });

        qsa('[data-rntx-open-estimate]').forEach((button) => {
            button.addEventListener('click', () => {
                scrollToTarget('#rntx-estimate');
            });
        });
    }

    function initLockedPrompts() {
        qsa('[data-rntx-save-locked]').forEach((button) => {
            button.addEventListener('click', () => {
                openModal({
                    kicker: 'Save your progress',
                    title: 'Create a free account to save this.',
                    text: 'Save contractors, ideas, materials, and estimates so you can continue planning anytime.'
                });
            });
        });

        qsa('[data-rntx-create-account]').forEach((button) => {
            button.addEventListener('click', () => {
                openModal({
                    kicker: 'Unlock your project hub',
                    title: 'Create your account to manage your remodel.',
                    text: 'Save estimates, compare pros, track quotes, message contractors, and keep everything in one place.'
                });
            });
        });
    }

    function initSizeOptions() {
        qsa('[data-rntx-size-options]').forEach((group) => {
            qsa('button', group).forEach((button) => {
                button.addEventListener('click', () => {
                    qsa('button', group).forEach((item) => item.classList.remove('is-active'));
                    button.classList.add('is-active');
                });
            });
        });
    }

    function initScrollRows() {
        qsa('[data-rntx-scroll-row-next]').forEach((button) => {
            button.addEventListener('click', () => {
                const section = button.closest('.rntx-section');
                const row = section ? qs('[data-rntx-scroll-row]', section) : null;

                if (!row) {
                    return;
                }

                row.scrollBy({
                    left: Math.max(260, row.clientWidth * 0.75),
                    behavior: 'smooth'
                });
            });
        });

        qsa('[data-rntx-scroll-row]').forEach((row) => {
            let isDown = false;
            let startX = 0;
            let scrollLeft = 0;

            row.addEventListener('pointerdown', (event) => {
                if (event.pointerType === 'mouse' && event.button !== 0) {
                    return;
                }

                isDown = true;
                startX = event.pageX - row.offsetLeft;
                scrollLeft = row.scrollLeft;
                row.setPointerCapture(event.pointerId);
            });

            row.addEventListener('pointermove', (event) => {
                if (!isDown) {
                    return;
                }

                const x = event.pageX - row.offsetLeft;
                const walk = (x - startX) * 1.1;
                row.scrollLeft = scrollLeft - walk;
            });

            row.addEventListener('pointerup', () => {
                isDown = false;
            });

            row.addEventListener('pointercancel', () => {
                isDown = false;
            });
        });
    }

    function initModal() {
        if (!modal) {
            return;
        }

        qsa('[data-rntx-close-modal]', modal).forEach((button) => {
            button.addEventListener('click', closeModal);
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !modal.hidden) {
                closeModal();
            }
        });
    }

    function init() {
        initReveal();
        initStickyCta();
        initProjectChips();
        initEstimateEntry();
        initLockedPrompts();
        initSizeOptions();
        initScrollRows();
        initModal();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();