@extends('layouts.app')
@section('title', 'Crear Escuela')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Crear Escuela</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('escuelas.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('escuelas.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
