<header class="navbar">
    <div class="container navbar__inner">
        <a href="{{ route('home') }}" class="brand">
            <span class="brand__name"><span class="brand__era">ERA</span> JAYA</span>
            <span class="brand__sub">TOKO BANGUNAN</span>
        </a>

        <button class="navbar__toggle" type="button" aria-label="Buka menu" aria-expanded="false" data-nav-toggle>
            <span></span><span></span><span></span>
        </button>

        <nav class="navbar__menu" data-nav-menu>
            <a href="{{ route('home') }}"      class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Beranda</a>
            <a href="{{ route('catalogue') }}" class="{{ request()->routeIs('catalogue*') ? 'is-active' : '' }}">Katalog</a>
            <a href="{{ route('gallery') }}"   class="{{ request()->routeIs('gallery*') ? 'is-active' : '' }}">Galeri</a>
        </nav>
    </div>
</header>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toggle = document.querySelector('[data-nav-toggle]');
        var menu = document.querySelector('[data-nav-menu]');
        if (!toggle || !menu) return;
        toggle.addEventListener('click', function () {
            var open = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', open);
        });
    });
</script>
@endpush