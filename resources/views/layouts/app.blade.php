<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Copa de Leche')</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
{{-- navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid ms-4 me-4">
            <a class="navbar-brand" href="{{ route('escuelas.index') }}">
                {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top"> --}}
                Copa de Leche
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('escuelas.index') }}">Escuelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Solicitudes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Contenido --}}


    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    <div class="container">
        <p class="mb-1">&copy; {{ date('Y') }} Mi Proyecto de Escuelas. Todos los derechos reservados.</p>

    </div>
</footer>


</html>
