// ─── Drawer Logic — data-modal-open="{id}" ou <a href="#{id}"> ────────────────
(function () {
    function openModal(modal) {
        modal.classList.add('is-open');
        document.body.style.overflow = 'hidden';
        var closeBtn = modal.querySelector('.mbnl-modal-close');
        if (closeBtn) { setTimeout(function () { closeBtn.focus(); }, 50); }
    }

    function closeModal(modal) {
        modal.classList.remove('is-open');
        document.body.style.overflow = '';
    }

    function openByHash(hash) {
        if (!hash) return;
        var id = hash.replace(/^#/, '');
        var modal = document.getElementById(id);
        if (modal && modal.classList.contains('mbnl-modal')) openModal(modal);
    }

    // Ouvrir via data-modal-open ou <a href="#id">
    document.addEventListener('click', function (e) {
        // data-modal-open
        var trigger = e.target.closest('[data-modal-open]');
        if (trigger) {
            e.preventDefault();
            var modal = document.getElementById(trigger.getAttribute('data-modal-open'));
            if (modal) openModal(modal);
            return;
        }

        // <a href="#id"> pointant vers un .mbnl-modal
        var link = e.target.closest('a[href^="#"]');
        if (link) {
            var target = document.getElementById(link.getAttribute('href').slice(1));
            if (target && target.classList.contains('mbnl-modal')) {
                e.preventDefault();
                openModal(target);
                return;
            }
        }

        // Fermer — bouton close ou overlay
        if (e.target.closest('.mbnl-modal-close') || e.target.classList.contains('mbnl-modal-overlay')) {
            var modal = e.target.closest('.mbnl-modal');
            if (modal) closeModal(modal);
        }
    });

    // Fermer avec Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.mbnl-modal.is-open').forEach(closeModal);
        }
    });

    // Ouvrir automatiquement si l'URL contient le hash au chargement
    document.addEventListener('DOMContentLoaded', function () {
        openByHash(window.location.hash);
    });

    // Ouvrir si le hash change en cours de navigation
    window.addEventListener('hashchange', function () {
        openByHash(window.location.hash);
    });
}());
/**
 * MBNL Theme — Main JavaScript
 */
document.addEventListener('DOMContentLoaded', function () {

    // ─── Init Lucide icons ────────────────────────────────
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // ─── Init AOS (scroll reveal) ─────────────────────────
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 700,
            easing: 'ease-out-cubic',
            once: true,
            offset: 80,
        });
    }

    // ─── Navbar scroll state ──────────────────────────────
    var header = document.getElementById('site-header');
    if (header) {
        function onScroll() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // ─── Mobile menu toggle ───────────────────────────────
    var toggle = document.getElementById('nav-toggle');
    var mobileMenu = document.getElementById('nav-mobile');
    if (toggle && mobileMenu) {
        toggle.addEventListener('click', function () {
            toggle.classList.toggle('active');
            mobileMenu.classList.toggle('open');
        });

        // Close on link click
        var mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                toggle.classList.remove('active');
                mobileMenu.classList.remove('open');
            });
        });
    }

    // ─── Smooth scroll for anchor links ───────────────────
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                var headerHeight = header ? header.offsetHeight : 0;
                var top = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                window.scrollTo({ top: top, behavior: 'smooth' });
            }
        });
    });

    // ─── FAQ accordion ────────────────────────────────────
    var faqTriggers = document.querySelectorAll('.faq-trigger');
    faqTriggers.forEach(function (trigger) {
        trigger.addEventListener('click', function () {
            var item = this.closest('.faq-item');
            var isOpen = item.classList.contains('active');

            // Close all
            document.querySelectorAll('.faq-item').forEach(function (el) {
                el.classList.remove('active');
                el.querySelector('.faq-trigger').setAttribute('aria-expanded', 'false');
            });

            // Open clicked (if was closed)
            if (!isOpen) {
                item.classList.add('active');
                this.setAttribute('aria-expanded', 'true');
            }
        });
    });

});
