<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Era Jaya - Toko Bangunan')</title>
    <meta name="description" content="@yield('description', 'Era Jaya, toko bangunan dengan material lengkap dan harga bersaing.')">
    <link rel="icon" href="{{ asset('images/logo.png') }}">

    <script>document.documentElement.classList.add('js-anim');</script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('mydesign/style.css') }}">
    @stack('styles')
</head>
<body>
    @include('navbar')

    <main>
        @yield('content')
    </main>

    @include('footer')

    <a href="https://wa.me/{{ config('app.wa_number', '628123456789') }}"
       class="wa-float" target="_blank" rel="noopener">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 20.5l1.7-5.4A8.5 8.5 0 1 1 21 11.5Z"/>
            <path d="M9 8.5c.2 2.6 3.4 5.8 6 6l1.3-1.3-2.2-1.3-.9.8c-.8-.4-1.8-1.4-2.2-2.2l.8-.9L10.5 7.5 9 8.5Z" fill="currentColor" stroke="none"/>
        </svg>
        <span>Tanya Kami</span>
    </a>

    @stack('scripts')
    <script src="{{ asset('js/main.js') }}" defer></script>
</body>
</html>