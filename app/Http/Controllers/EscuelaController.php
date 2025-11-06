<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // obtenemos todas las escuelas de la base de datos y las paginamos de 5 en 5
        $escuelas = Escuela::paginate(5);
        return view('escuela.index', compact('escuelas'));
        // dato importante compact('escuelas')=> ['escuelas' => $escuelas]
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('escuela.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //aqui va la logica para guardar una nueva escuela y validacion de datos en el create
        $campos=[
            'Escuela'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'matricula'=>'required|string|max:15',
            'numCUE'=>'required|string|max:15',
            'archivo'=>'required|max:10000|mimes:pdf,doc,docx',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'archivo.required'=>'El archivo es requerido',
        ];

        $request->validate($campos, $mensaje);
        $datosEscuela = request()->except('_token');

        //verificamos si hay un archivo subido
        if($request->hasFile('archivo')) {
    $archivo = $request->file('archivo');

    // Obtenemos el nombre original
    $nombreOriginal = $archivo->getClientOriginalName();

    // Guardamos el archivo con su nombre original dentro de "uploads"
    $ruta = $archivo->storeAs('uploads', $nombreOriginal, 'public');

    // Guardamos en la base solo la ruta con el nombre original
    $datosEscuela['archivo'] = $ruta;
}

        Escuela::insert($datosEscuela);

        return redirect()->route('escuelas.index')->with('mensaje', 'Escuela creada exitosamente.');
    }

    public function show(Escuela $escuela)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Escuela $escuela)
    {
        // buscamos la escuela por su id
        $escuela = Escuela::findOrFail($escuela->id);
        return view('escuela.edit', compact('escuela'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Escuela $escuela)
    {
        // validacion de datos en el edit
            $campos=[
            'Escuela'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'matricula'=>'required|string|max:15',
            'numCUE'=>'required|string|max:15',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        if($request->hasFile('archivo')) {
            // Solo si se sube un archivo, validar tipo y tamaño
            $campos['archivo'] = 'required|max:10000|mimes:pdf,doc,docx';
            $mensaje['archivo.required'] = 'El archivo es requerido';

        }
        $request->validate($campos, $mensaje);

        // datos que no queremos que guarde
        $datosEscuela = request()->except(['_token', '_method']);

        // aqui vemos que el archivo que se edite se elimine el atiguo
        if($request->hasFile('archivo')) {
            $escuela = Escuela::findOrFail($escuela->id);
            Storage::delete('public/'.$escuela->archivo);
            $datosEscuela['archivo'] = $request->file('archivo')->store('uploads', 'public');
        }

        Escuela::where('id', '=', $escuela->id)->update($datosEscuela);

        // redireccionamos a la vista principal con un mensaje

        return redirect()->route('escuelas.index')->with('mensaje', 'Escuela actualizada exitosamente.');
    }

public function destroy(Escuela $escuela)
{
        // se elimina la escuela y su archivo
    $escuela = Escuela::findOrFail($escuela->id);
        // eliminar el archivo asociado
    if (Storage::delete('public/uploads' . $escuela->archivo)) {
        Escuela::destroy($escuela->id);
    }

// redireccionamos a la vista principal con un mensaje
    return redirect()->route('escuelas.index')->with('success', 'Escuela eliminada exitosamente.');
}
}
