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

<form method="GET" action="{{ route('informes.escuelas') }}" class="row g-2 mb-4">

    <div class="col-md-3">
        <select name="departamento" class="form-select">
            <option value="">Todos los departamentos</option>
            @foreach ($departamentos as $dpto)
                <option value="{{ $dpto }}" {{ request('departamento') == $dpto ? 'selected' : '' }}>
                    {{ $dpto }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <select name="zona" class="form-select">
            <option value="">Todas las zonas</option>
            @foreach ($zonas as $zona)
                <option value="{{ $zona }}" {{ request('zona') == $zona ? 'selected' : '' }}>
                    {{ $zona }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <select name="estado" class="form-select">
            <option value="">Todos los estados</option>
            @foreach ($estados as $estado)
                <option value="{{ $estado }}" {{ request('estado') == $estado ? 'selected' : '' }}>
                    {{ ucfirst($estado) }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <button class="btn btn-primary w-100">
            🔍 Filtrar
        </button>
    </div>

</form>

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
        <a href="{{ route('informes.pdf.escuelas', request()->query()) }}" class="btn btn-danger mb-3" target="_blank">
            📄 Descargar PDF
        </a>
    </div>
@endsection
