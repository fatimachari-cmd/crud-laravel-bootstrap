<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4">🎓 Gestió d'Alumnes</span>
            </a>
            <ul class="nav nav-pills">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item px-1">
                            <a href="{{ url('/home') }}" class="btn btn-outline-danger">Dashboard</a>
                        </li>
                    @else
                    <li class="nav-item px-1">
                        <a href="{{ route('login') }}" class="btn btn-outline-danger">Log in</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item px-1">
                            <a href="{{ route('register') }}" class="btn btn-outline-danger">Register</a>
                        </li>
                    @endif
                    @endauth
                @endif
            </ul>
        </header>
    </div>

    <div class="container">
        <div class="p-5 text-center rounded-3 text-white" style="background: linear-gradient(135deg, #ff6b6b, #ffa600, #ff6b6b); border-radius: 15px;">
            <h1 class="display-4 fw-bold mb-3">🎓 Benvingut</h1>
            <p class="fs-5 mb-4">Aquesta aplicació permet gestionar alumnes, centres i ensenyaments de forma fàcil i ràpida.</p>
            @auth
                <a href="{{ url('/home') }}" class="btn btn-light btn-lg fw-bold">Anar al Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-light btn-lg fw-bold me-2">Iniciar sessió</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg fw-bold">Registrar-se</a>
            @endauth
        </div>
    </div>
</body>
</html>