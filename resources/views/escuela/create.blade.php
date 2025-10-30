@extends('layouts.app')
@section('title', 'Crear Escuela')
@section('content')


<form action="{{url('/escuelas')}}" method="post" enctype="multipart/form-data">
@csrf

@include('escuela.form' , ['modo'=>'Crear'])
{{-- le indicamos que titulo va poner con modo en el form... en este calo le pone Crear --}}
</form>
@endsection

