@extends('layouts.app')

@section('title', 'Informe de Escuelas')

@section('content')
    <div class="container mt-4">

        <div class="mb-4">
            <h1 class="fw-bold">Informe de Escuelas</h1>
            <p class="text-muted mb-0">
                Fecha de emisión: {{ now()->format('d/m/Y') }}
            </p>
            <p class="text-muted">
                Total de escuelas: {{ $escuelas->count() }}
            </p>
        </div>

        <table class="table table-bordered table-sm">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Escuela</th>
                    <th>CUE</th>
                    <th>Expediente</th>
                    <th>Departamento</th>
                    <th>Zona</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($escuelas as $escuela)
                    <tr>
                        <td>{{ $escuela->id }}</td>
                        <td>{{ $escuela->escuela }}</td>
                        <td>{{ $escuela->n_cue }}</td>
                        <td>{{ $escuela->expediente }}</td>
                        <td>{{ $escuela->departamento }}</td>
                        <td>{{ $escuela->zona }}</td>
                        <td>{{ ucfirst($escuela->estado) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('informes.pdf.escuelas') }}" class="btn btn-danger mb-3" target="_blank">
            📄 Descargar PDF
        </a>
    </div>
@endsection
