{{-- aqui va el formulario que se usa tanto para crear como para editar una escuela --}}
{{-- <h1>{{$modo}} escuela</h1> --}}
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
    <label for="escuela">Escuela</label>
    <input type="text" class="form-control mb-3 " name="escuela" id="escuela"
        value="{{ isset($escuela->escuela) ? $escuela->escuela : old('escuela') }}">
</div>

<div class="form-group">
    <label for="n_cue">NumCUE</label>
    <input type="number" class="form-control mb-3 " name="n_cue" id="n_cue"
        value="{{ isset($escuela->n_cue) ? $escuela->n_cue : old('n_cue') }}">
</div>

<div class="form-group">
    <label for="matricula">Matricula</label>
    <input type="number" class="form-control mb-3 " name="matricula" id="matricula"
        value="{{ isset($escuela->matricula) ? $escuela->matricula : old('matricula') }}">
</div>

<div class="form-group">
    <label for="expediente">Expediente</label>
    <input type="text" class="form-control mb-3" name="expediente" id="expediente"
        value="{{ isset($escuela->expediente) ? $escuela->expediente : old('expediente') }}">
</div>

<div class="form-group">
    <label for="telefono">Telefono</label>
    <input type="number" class="form-control mb-3 " name="telefono" id="telefono"
        value="{{ isset($escuela->telefono) ? $escuela->telefono : old('telefono') }}">
</div>

<div class="form-group">
    <label for="direccion">Direccion</label>
    <input type="text" class="form-control mb-3 " name="direccion" id="direccion"
        value="{{ isset($escuela->direccion) ? $escuela->direccion : old('direccion') }}">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control mb-3" name="email" id="email"
        value="{{ isset($escuela->email) ? $escuela->email : old('email') }}">
</div>

<div class="form-group">
    <label for="localidad">Localidad</label>
    <input type="text" class="form-control mb-3 " name="localidad" id="localidad"
        value="{{ isset($escuela->localidad) ? $escuela->localidad : old('localidad') }}">
</div>

<div class="form-group">
    <label for="departamento">Departamento</label>
    <select name="departamento" id="departamento" class="form-control mb-3">
        <option value="">Seleccione un departamento</option>
        @foreach ($departamentos as $depto)
            <option value="{{ $depto }}"
                {{ (isset($escuela->departamento) && $escuela->departamento == $depto) || old('departamento') == $depto ? 'selected' : '' }}>
                {{ $depto }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="zona">Zona</label>
    <select name="zona" id="zona" class="form-control mb-3">
        <option value="">Seleccione una zona</option>
        @foreach ($zonas as $zona)
            <option value="{{ $zona }}"
                {{ (isset($escuela->zona) && $escuela->zona == $zona) || old('zona') == $zona ? 'selected' : '' }}>
                {{ $zona }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="archivo">Archivo</label>
    @if (isset($escuela->archivo))
        <a href="{{ asset('storage') . '/' . $escuela->archivo }}" target="_blank">Ver archivo actual</a>
    @endif
    <input type="file" class="form-control mb-3 " name="archivo" id="archivo">
</div>


<input class="btn btn-success btn-sm" type="submit">
<a href="{{ route('escuelas.index') }}" class="btn btn-primary btn-sm">Volver a Inicio</a>
