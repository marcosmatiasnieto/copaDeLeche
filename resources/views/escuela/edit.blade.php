@extends('layouts.app')
@section('title', 'Editar Escuela')
@section('content')


<form action="{{url('/escuelas/'.$escuela->id)}}" method="post" enctype="multipart/form-data">
@csrf

@method('PATCH')

@include('escuela.form' , ['modo'=>'Editar'])
</form>

@endsection

