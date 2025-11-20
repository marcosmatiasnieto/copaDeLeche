@extends('layouts.app')
@section('title', 'Editar Escuela')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Editar escuela</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('escuelas.update', $escuela->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @include('escuela.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
