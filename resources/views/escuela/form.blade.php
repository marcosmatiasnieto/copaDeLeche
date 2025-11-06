{{-- aqui va el formulario que se usa tanto para crear como para editar una escuela --}}
<h1>{{$modo}} escuela</h1>
{{-- aqui recepcionamos el modo que viene del create o edit --}}

@if ($errors->any())
{{-- es el método oficial de Laravel para saber si hay al menos un error --}}

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group ">
<label for="Escuela">Escuela</label>
<input type="text" class="form-control mb-3 " name="Escuela"  id="Escuela" value="{{isset($escuela->Escuela)?$escuela->Escuela:old('Escuela')}}">
</div>
<div class="form-group">
<label for="direccion">Direccion</label>
<input type="text" class="form-control mb-3 " name="direccion" id="direccion" value="{{isset($escuela->direccion)?$escuela->direccion:old('direccion')}}">
</div>
<div class="form-group">
<label for="matricula">Matricula</label>
<input type="number" class="form-control mb-3 " name="matricula" id="matricula"  value="{{ isset($escuela->matricula)?$escuela->matricula:old('matricula')}}">
</div>
<div class="form-group">
<label for="numCUE">NumCUE</label>
<input type="number" class="form-control mb-3 " name="numCUE" id="numCUE" value="{{isset($escuela->numCUE)?$escuela->numCUE:old('numCUE')}}">
</div>
<div class="form-group">
<label for="archivo">Archivo</label>
@if(@isset($escuela->archivo))
<a href="{{ asset('storage').'/'.$escuela->archivo}}" target="_blank">Ver archivo actual</a>
@endif
<input type="file" class="form-control mb-3 " name="archivo" id="archivo" value="">
</div>
<input class="btn btn-success btn-sm" type="submit"  value="{{$modo}} datos">
<a href="{{ route('escuelas.index') }}" class="btn btn-primary btn-sm">Volver a Inicio</a>

