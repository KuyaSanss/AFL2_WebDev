<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Era Jaya - Toko Bangunan')</title>
    <meta name="description" content="@yield('description', 'Era Jaya, toko bangunan dengan material lengkap dan harga bersaing.')">
    <link rel="icon" href="{{ asset('images/logo.png') }}">

    <script>document.documentElement.classList.add('jsAnim');</script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('mydesign/global.css') }}?v={{ filemtime(public_path('mydesign/global.css')) }}">    @stack('styles')
</head>
<body>
    @include('navbar')

    <main>
        @yield('content')
    </main>

    @include('footer')

    @stack('scripts')
    <script src="{{ asset('js/main.js') }}?v={{ filemtime(public_path('js/main.js')) }}" defer></script>
</body>
</html>