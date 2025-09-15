@extends('layouts.app')
@section('title', 'Crear Escuela')
@section('content')


<form action="{{url('/escuelas')}}" method="post" enctype="multipart/form-data">

@csrf
@include('escuela.form' , ['modo'=>'Crear'])
</form>
@endsection

