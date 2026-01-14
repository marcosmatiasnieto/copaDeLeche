{{-- aqui va la plantilla base de la aplicacion que usamos para todas las vistas con el nav, el main y el footer --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body.fondo-copa {
            background-image: url('{{ asset('img/fondo-copa-leche.png') }}');
            background-size: 350px;
            /* ajusta el tamaño del patrón */
            background-repeat: repeat;
            /* patrón repetido */
            background-attachment: fixed;
            background-position: center;
        }
    </style>

</head>

<body class="d-flex flex-column min-vh-100 fondo-copa">
    <div id="app" class="flex-grow-1 d-flex flex-column">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-2">
            <div class="container">

                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('img/Desarrollo.jpg') }}" alt="Logo La Rioja"
                        style="height: 45px; object-fit: contain;">
                </a>

                <a class="navbar-brand ms-3 fw-bold" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Lado derecho del Navbar -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- Enlace Escuela -->
                        <li class="nav-item me-3">
                            <a class="nav-link" href="{{ route('escuelas.index') }}">{{ __('Escuelas') }}</a>
                        </li>

                        @auth
                            @if (auth()->user()->role === 'admin')
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        📊 Informes
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item"href="{{ route('informes.escuelas') }}" >
                                                Informe General
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('informes.index') }}">
                                                Informe por Estado
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        @endauth

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- Dropdown del Usuario -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fw-semibold" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    {{-- <span class="text-muted">
                                        ({{ Auth::user()->is_admin ? 'Administrador' : 'Escuela' }})
                                    </span> --}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="flex-grow-1 py-4">
            @yield('content')
        </main>
    </div>
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-1">&copy; {{ date('Y') }} Mi Proyecto de Escuelas. Todos los derechos reservados.</p>
        </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@stack('scripts')
</body>

</html>
