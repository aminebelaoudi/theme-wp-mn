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
