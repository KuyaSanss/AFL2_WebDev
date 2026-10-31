<header class="navbar" data-navbar>
    <div class="container navbar__inner">
        <a href="{{ route('home') }}" class="brand" aria-label="Era Jaya Toko Bangunan - Beranda">
            <img src="{{ asset('images/Logo.png') }}" alt="" class="brand__logo" onerror="this.remove()">
        </a>

        <button class="navbar__toggle" type="button" aria-label="Buka menu" aria-expanded="false" data-nav-toggle>
            <span></span><span></span><span></span>
        </button>

        <nav class="navbar__menu" data-nav-menu>
            <a href="{{ route('home') }}"      class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
            <a href="{{ route('catalogue') }}" class="{{ request()->routeIs('catalogue*') ? 'is-active' : '' }}">Catalogue</a>
            <a href="{{ route('gallery') }}"   class="{{ request()->routeIs('gallery*') ? 'is-active' : '' }}">Gallery</a>
        </nav>
    </div>
</header>