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
                    <form action="{{ url('/escuelas') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('escuela.form', ['modo'=>'Crear'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
