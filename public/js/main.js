/* =========================================================
   ERA JAYA - skrip umum (navbar, animasi scroll, FAQ)
   ========================================================= */
(function () {
    'use strict';

    var d = document;
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function ready(fn) {
        if (d.readyState === 'loading') d.addEventListener('DOMContentLoaded', fn);
        else fn();
    }

    /* ---------- Navbar: menu HP + mengecil saat di-scroll ---------- */
    function initNavbar() {
        var header = d.querySelector('[data-navbar]');
        if (!header) return;
        var toggle = header.querySelector('[data-nav-toggle]');
        var menu   = header.querySelector('[data-nav-menu]');

        function setOpen(open) {
            if (!toggle || !menu) return;
            menu.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        }
        if (toggle && menu) {
            toggle.addEventListener('click', function () {
                setOpen(!menu.classList.contains('is-open'));
            });
            menu.addEventListener('click', function (e) {
                if (e.target.closest('a')) setOpen(false);
            });
            d.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') setOpen(false);
            });
        }

        function onScroll() {
            header.classList.toggle('is-scrolled', window.scrollY > 24);
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    /* ---------- Bar progres scroll di paling atas ---------- */
    function initProgress() {
        var bar = d.createElement('div');
        bar.className = 'scroll-progress';
        bar.setAttribute('aria-hidden', 'true');
        d.body.appendChild(bar);

        var ticking = false;
        function update() {
            var max = d.documentElement.scrollHeight - window.innerHeight;
            var p = max > 0 ? Math.min(1, window.scrollY / max) : 0;
            bar.style.transform = 'scaleX(' + p + ')';
            ticking = false;
        }
        window.addEventListener('scroll', function () {
            if (!ticking) { ticking = true; requestAnimationFrame(update); }
        }, { passive: true });
        update();
    }

    /* ---------- Animasi muncul saat di-scroll ---------- */
    function initReveal() {
        // Elemen yang otomatis diberi animasi (tanpa perlu ubah file Blade lain)
        // [selector, animasi, jeda antar elemen (ms), jeda awal (ms)]
        var auto = [
            ['.section .eyebrow',    'fade-up', 0,   0],
            ['.section-title',       'fade-up', 0,   100],
            ['.carousel',            'fade-up', 0,   150],
            ['.footer__grid > *',    'fade-up', 120, 0],
            ['.info-item',           'fade-up', 150, 350],
            ['.faq__item',           'fade-up', 90,  120]
        ];
        auto.forEach(function (a) {
            Array.prototype.forEach.call(d.querySelectorAll(a[0]), function (el, i) {
                if (el.hasAttribute('data-animate')) return;
                el.setAttribute('data-animate', a[1]);
                el.setAttribute('data-delay', a[3] + Math.min(i, 5) * a[2]);
            });
        });

        var items = d.querySelectorAll('[data-animate]');

        function show(el) {
            el.classList.add('is-visible');
            var delay = parseInt(el.getAttribute('data-delay') || '0', 10);
            setTimeout(function () { el.classList.add('is-done'); }, delay + 1000);
        }

        Array.prototype.forEach.call(items, function (el) {
            el.style.setProperty('--delay', (el.getAttribute('data-delay') || 0) + 'ms');
        });

        if (reduce || !('IntersectionObserver' in window)) {
            Array.prototype.forEach.call(items, function (el) { el.classList.add('is-visible', 'is-done'); });
            return;
        }

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (!en.isIntersecting) return;
                show(en.target);
                io.unobserve(en.target);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });

        Array.prototype.forEach.call(items, function (el) { io.observe(el); });

        // jaga-jaga: kalau sudah di dasar halaman, tampilkan sisa elemen yang belum muncul
        window.addEventListener('scroll', function () {
            if (window.innerHeight + window.scrollY < d.documentElement.scrollHeight - 4) return;
            Array.prototype.forEach.call(items, function (el) {
                if (!el.classList.contains('is-visible')) { show(el); io.unobserve(el); }
            });
        }, { passive: true });
    }

    /* ---------- FAQ accordion ---------- */
    function initFaq() {
        var list = d.querySelector('[data-faq]');
        if (!list) return;
        var items = list.querySelectorAll('.faq__item');

        function setItem(item, open) {
            item.classList.toggle('is-open', open);
            var btn = item.querySelector('button');
            if (btn) btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        }

        Array.prototype.forEach.call(items, function (item) {
            var btn = item.querySelector('button');
            if (!btn) return;
            btn.addEventListener('click', function () {
                var willOpen = !item.classList.contains('is-open');
                Array.prototype.forEach.call(items, function (o) { setItem(o, false); }); // satu terbuka sekali waktu
                setItem(item, willOpen);
            });
        });
    }

    ready(function () {
        initNavbar();
        initProgress();
        initReveal();
        initFaq();
    });
})();