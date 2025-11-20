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



    <h1>Listado de Escuelas</h1>
    <a href="{{ route('escuelas.create') }}" class="btn btn-primary mb-3">Nueva Escuela</a>
    <table class="table table-bordered">
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
            @foreach($escuelas as $escuela)
                <tr>
                    <td>{{ $escuela->id }}</td>
                    <td>{{ $escuela->Escuela }}</td>
                    <td>{{ $escuela->n_cue }}</td>
                    <td>{{ $escuela->matricula }}</td>
                    <td>{{ $escuela->telefono }}</td>
                    <td>{{ $escuela->direccion }}</td>
                    <td>{{ $escuela->localidad }}</td>
                    <td>{{ $escuela->provincia }}</td>

                    <td><a href="{{ asset('storage/' . $escuela->archivo) }}" target="_blank">
        {{ basename($escuela->archivo) }}
    </a></td>
                    {{-- Estado + Botones --}}
                    <td>
                        {{-- Badge del estado --}}
                        @if($escuela->estado == 'pendiente')
                            <span class="badge bg-warning text-dark">Pendiente</span>
                        @elseif($escuela->estado == 'aprobado')
                            <span class="badge bg-success">Aprobado</span>
                        @else
                            <span class="badge bg-danger">Rechazado</span>
                        @endif
                        <br>

                        {{-- Botones --}}
                        @if($escuela->estado == 'pendiente')
                            <form action="{{ route('escuelas.aprobar', $escuela->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success btn-sm mt-1">Aprobar</button>
                            </form>

                            <form action="{{ route('escuelas.rechazar', $escuela->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-danger btn-sm mt-1">Rechazar</button>
                            </form>
                        @endif
                    </td>

                    {{-- Editar-Eliminar --}}
                    <td>
                        <a href="{{ route('escuelas.edit', $escuela) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('escuelas.destroy', $escuela) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta escuela?')" >Eliminar</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $escuelas->links() !!}
</div>
@endsection
