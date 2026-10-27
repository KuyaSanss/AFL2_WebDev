<!DOCTYPE html>
<html lang="@yield('lang', 'id')">
<head>
    <meta charset="UTF-8">
    @yield('viewport')
    <title>@yield('title')</title>
    @yield('styles')
</head>
<body>
    @include('navbar')
    @yield('content')
</body>
</html>