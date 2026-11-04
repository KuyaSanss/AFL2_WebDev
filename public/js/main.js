(function () {
    'use strict';

    var d = document;
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function ready(fn) {
        if (d.readyState === 'loading') d.addEventListener('DOMContentLoaded', fn);
        else fn();
    }

    function initNavbar() {
        var header = d.querySelector('[data-navbar]');
        if (!header) return;
        var toggle = header.querySelector('[data-nav-toggle]');
        var menu   = header.querySelector('[data-nav-menu]');

        function setOpen(open) {
            if (!toggle || !menu) return;
            menu.classList.toggle('isOpen', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        }
        if (toggle && menu) {
            toggle.addEventListener('click', function () {
                setOpen(!menu.classList.contains('isOpen'));
            });
            menu.addEventListener('click', function (e) {
                if (e.target.closest('a')) setOpen(false);
            });
            d.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') setOpen(false);
            });
        }

        function onScroll() {
            header.classList.toggle('isScrolled', window.scrollY > 24);
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    function initProgress() {
        var bar = d.createElement('div');
        bar.className = 'scrollProgress';
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

    function initReveal() {
        var auto = [
            ['.section .eyebrow',    'fade-up', 0,   0],
            ['.sectionTitle',       'fade-up', 0,   100],
            ['.carousel',            'fade-up', 0,   150],
            ['.footerGrid > *',    'fade-up', 120, 0],
            ['.infoItem',           'fade-up', 150, 350],
            ['.faqItem',           'fade-up', 90,  120]
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
            el.classList.add('isVisible');
            var delay = parseInt(el.getAttribute('data-delay') || '0', 10);
            setTimeout(function () { el.classList.add('isDone'); }, delay + 1000);
        }

        Array.prototype.forEach.call(items, function (el) {
            el.style.setProperty('--delay', (el.getAttribute('data-delay') || 0) + 'ms');
        });

        if (reduce || !('IntersectionObserver' in window)) {
            Array.prototype.forEach.call(items, function (el) { el.classList.add('isVisible', 'isDone'); });
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

        window.addEventListener('scroll', function () {
            if (window.innerHeight + window.scrollY < d.documentElement.scrollHeight - 4) return;
            Array.prototype.forEach.call(items, function (el) {
                if (!el.classList.contains('isVisible')) { show(el); io.unobserve(el); }
            });
        }, { passive: true });
    }

    function initFaq() {
        var list = d.querySelector('[data-faq]');
        if (!list) return;
        var items = list.querySelectorAll('.faqItem');

        function setItem(item, open) {
            item.classList.toggle('isOpen', open);
            var btn = item.querySelector('button');
            if (btn) btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        }

        Array.prototype.forEach.call(items, function (item) {
            var btn = item.querySelector('button');
            if (!btn) return;
            btn.addEventListener('click', function () {
                var willOpen = !item.classList.contains('isOpen');
                Array.prototype.forEach.call(items, function (o) { setItem(o, false); });
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