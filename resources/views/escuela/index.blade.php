@extends('layouts.app')

@section('title', 'Listado de Escuelas')

@section('content')
    <h1>Listado de Escuelas</h1>
    <a href="{{ route('escuelas.create') }}" class="btn btn-primary mb-3">Nueva Escuela</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Escuela</th>
                <th>direccion</th>
                <th>matricula</th>
                <th>numCUE</th>
                <th>archivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($escuelas as $escuela)
                <tr>
                    <td>{{ $escuela->id }}</td>
                    <td>{{ $escuela->Escuela }}</td>
                    <td>{{ $escuela->direccion }}</td>
                    <td>{{ $escuela->matricula }}</td>
                    <td>{{ $escuela->numCUE }}</td>
                    <td>{{ $escuela->archivo }}</td>
                    <td>
                        {{-- //editar --}}
                        <a href="{{ route('escuelas.edit', $escuela) }}" class="btn btn-warning btn-sm">Editar</a>
                        {{-- //eliminar --}}
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
@endsection
