@extends('layouts.app')

@section('title', 'Detalle de Escuela')

@section('content')
<div class="container mt-4">

    <h2 class="fw-bold mb-3">{{ $escuela->escuela }}</h2>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>N° CUE:</strong> {{ $escuela->n_cue }}</p>
            <p><strong>Matrícula:</strong> {{ $escuela->matricula }}</p>
            <p><strong>Expediente:</strong> {{ $escuela->expediente }}</p>
            <p><strong>Zona:</strong> {{ $escuela->zona }}</p>
            <p><strong>Departamento:</strong> {{ $escuela->departamento }}</p>
            <p><strong>Localidad:</strong> {{ $escuela->localidad }}</p>
            <p><strong>Teléfono:</strong> {{ $escuela->telefono ?? '—' }}</p>
            <p><strong>Email:</strong> {{ $escuela->email ?? '—' }}</p>
            <p><strong>Dirección:</strong> {{ $escuela->direccion ?? '—' }}</p>

            <p>
                <strong>Archivo:</strong>
                <a href="{{ asset('storage/' . $escuela->archivo) }}" target="_blank">
                    {{ basename($escuela->archivo) }}
                    Ver archivo
                </a>
            </p>

            <p>
                <strong>Estado:</strong>
                @if ($escuela->estado == 'pendiente')
                    <span class="badge bg-warning text-dark">Pendiente</span>
                @elseif ($escuela->estado == 'aprobado')
                    <span class="badge bg-success">Aprobado</span>
                @else
                    <span class="badge bg-danger">Rechazado</span>
                @endif
            </p>

            <a href="{{ route('escuelas.index') }}" class="btn btn-secondary mt-3">
                Volver al listado
            </a>

        </div>
    </div>

</div>
@endsection
