@extends('layouts.app')

@section('title', 'Listado de Escuelas')

@section('content')


    <div class="container mt-3">
        @if (session('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('mensaje') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="mb-4">
            <h1 class="fw-bold display-6">Listado de Escuelas</h1>
            <p class="text-muted">Administrá solicitudes, estados y registros.</p>
        </div>

        <a href="{{ route('escuelas.create') }}" class="btn btn-primary shadow-sm mb-3">
            ➕ Nueva Escuela
        </a>

        <form method="GET" action="{{ route('escuelas.index') }}" class="mb-3">
            <div class="input-group mb-3 shadow-sm">
                <input type="text" name="busqueda" class="form-control" placeholder="Buscar por CUE o nombre..."
                    value="{{ $busqueda ?? '' }}">

                <button class="btn btn-primary" type="submit">
                    Buscar
                </button>

                @if (request('busqueda'))
                    <a href="{{ route('escuelas.index') }}" class="btn btn-secondary">
                        Limpiar
                    </a>
                @endif
            </div>
        </form>


        <table class="table table-hover align-middle table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Escuela</th>
                    <th>N°cue</th>
                    <th>Matricula</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Localidad</th>
                    <th>Provincia</th>
                    <th>Archivo</th>
                    <th>Estado</th>

                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- recorre la bd trayendo los datos de cada elemento --}}
                @foreach ($escuelas as $escuela)
                    <tr>
                        <td>{{ $escuela->id }}</td>
                        <td>{{ $escuela->escuela }}</td>
                        <td>{{ $escuela->n_cue }}</td>
                        <td>{{ $escuela->matricula }}</td>
                        <td>{{ $escuela->telefono }}</td>
                        <td>{{ $escuela->direccion }}</td>
                        <td>{{ $escuela->localidad }}</td>
                        <td>{{ $escuela->provincia }}</td>

                        <td><a href="{{ asset('storage/' . $escuela->archivo) }}" target="_blank">
                                {{ basename($escuela->archivo) }}
                            </a>
                        </td>
                        <td>

                            {{-- Estado + Botones --}}
                            {{-- Badge del estado --}}
                            @if ($escuela->estado == 'pendiente')
                                <span class="badge rounded-pill bg-warning text-dark">Pendiente</span>
                            @elseif($escuela->estado == 'aprobado')
                                <span class="badge rounded-pill bg-success">Aprobado</span>
                            @else
                                <span class="badge rounded-pill bg-danger">Rechazado</span>
                            @endif

                            <br>

                            @auth
                                @if (auth()->user()->role === 'admin')
                                    {{-- Botones --}}
                                    @if ($escuela->estado == 'pendiente')
                                        <form action="{{ route('escuelas.aprobar', $escuela->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-success btn-sm mt-1">Aprobar</button>
                                        </form>

                                        <form action="{{ route('escuelas.rechazar', $escuela->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-danger btn-sm mt-1">Rechazar</button>
                                        </form>
                                    @endif
                                @endif
                            @endauth
                        </td>

                        {{-- Editar-Eliminar --}}
                        <td>
                            @auth
                                @if (auth()->user()->role === 'admin')
                                    <a href="{{ route('escuelas.edit', $escuela) }}" class="btn btn-sm btn-warning me-1">Editar</a>

                                    <form action="{{ route('escuelas.destroy', $escuela) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Estás seguro de eliminar esta escuela?')">Eliminar</button>
                                    </form>
                                @endif
                            @endauth
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $escuelas->links() !!}
        </div>
    @endsection
