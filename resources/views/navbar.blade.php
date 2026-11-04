<header class="navbar" data-navbar>
    <div class="container navbarInner">
        <a href="{{ route('home') }}" class="brand" aria-label="Era Jaya Toko Bangunan - Beranda">
            <img src="{{ asset('images/Logo.png') }}" alt="" class="brandLogo" onerror="this.remove()">
        </a>

        <button class="navbarToggle" type="button" aria-label="Buka menu" aria-expanded="false" data-nav-toggle>
            <span></span><span></span><span></span>
        </button>

        <nav class="navbarMenu" data-nav-menu>
            <a href="{{ route('home') }}"      class="{{ request()->routeIs('home') ? 'isActive' : '' }}">Home</a>
            <a href="{{ route('catalogue') }}" class="{{ request()->routeIs('catalogue*') ? 'isActive' : '' }}">Catalogue</a>
            <a href="{{ route('gallery') }}"   class="{{ request()->routeIs('gallery*') ? 'isActive' : '' }}">Gallery</a>
        </nav>
    </div>
</header>