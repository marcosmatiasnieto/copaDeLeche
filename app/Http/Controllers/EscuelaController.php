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
    public function index(Request $request)
    {
        // Tomamos el texto que escribió el usuario en el buscador
        $busqueda = $request->get('busqueda');

        // Consulta con filtros
        $escuelas = Escuela::query()
            ->when($busqueda, function ($query) use ($busqueda) {
                $query->where('n_cue', 'like', "%{$busqueda}%")
                    ->orWhere('escuela', 'like', "%{$busqueda}%");
            })
            ->orderBy('id')
            ->paginate(5);

        return view('escuelas.index', compact('escuelas', 'busqueda'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('escuelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //aqui va la logica para guardar una nueva escuela y validacion de datos en el create
        $campos = [
            'escuela' => 'required|string|max:100',
            'n_cue' => 'required|string|max:15',
            'matricula' => 'required|string|max:15',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:100',
            'localidad' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',

            'archivo' => 'required|max:10000|mimes:pdf,doc,docx',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'archivo.required' => 'El archivo es requerido',
        ];

        $request->validate($campos, $mensaje);
        $datosEscuela = request()->except('_token');

        //verificamos si hay un archivo subido
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');

            // Obtenemos el nombre original
            $nombreOriginal = $archivo->getClientOriginalName();

            // Guardamos el archivo con su nombre original dentro de "uploads"
            $ruta = $archivo->storeAs('uploads', $nombreOriginal, 'public');

            // Guardamos en la base solo la ruta con el nombre original
            $datosEscuela['archivo'] = $ruta;
        }

        Escuela::insert($datosEscuela);

        return redirect()->route('home')
            ->with('success', 'Escuela creada correctamente');
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
        return view('escuelas.edit', compact('escuela'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Escuela $escuela)
    {
        // validacion de datos en el edit
        $campos = [
            'escuela' => 'required|string|max:100',
            'n_cue' => 'required|string|max:15',
            'matricula' => 'required|string|max:15',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:100',
            'localidad' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        if ($request->hasFile('archivo')) {
            // Solo si se sube un archivo, validar tipo y tamaño
            $campos['archivo'] = 'max:10000|mimes:pdf,doc,docx';
        }
        $request->validate($campos, $mensaje);

        // datos que no queremos que guarde
        $datosEscuela = request()->except(['_token', '_method']);

        // aqui vemos que el archivo que se edite se elimine el atiguo
        if ($request->hasFile('archivo')) {
            $escuela = Escuela::findOrFail($escuela->id);
            Storage::delete('public/' . $escuela->archivo);
            $archivo = $request->file('archivo');
            $nombreOriginal = $archivo->getClientOriginalName();
            $ruta = $archivo->storeAs('uploads', $nombreOriginal, 'public');
            $datosEscuela['archivo'] = $ruta;
        }

        Escuela::where('id', '=', $escuela->id)->update($datosEscuela);
        // redireccionamos a la vista principal con un mensaje
        return redirect()->route('escuelas.index')->with('mensaje', 'Escuela actualizada exitosamente.');
    }

    public function destroy(Escuela $escuela)
    {
        // se elimina la escuela y su archivo
        // 1. obtenemos la escuela
        $escuela = Escuela::findOrFail($escuela->id);
        // eliminar el archivo asociado
        if ($escuela->archivo && Storage::exists('public/' . $escuela->archivo)) {
            Storage::delete('public/' . $escuela->archivo);
        }
        // eliminar la escuela de la base de datos
        $escuela->delete();

        // redireccionamos a la vista principal con un mensaje
        return redirect()->route('escuelas.index')->with('success', 'Escuela eliminada exitosamente.');
    }

    //agregamos un metodo para aprobar y rechazar escuelas
    public function aprobar($id)
    {
        $escuela = Escuela::findOrFail($id);
        $escuela->estado = 'aprobado';
        $escuela->save();

        return redirect()->back()->with('success', 'Escuela aprobada correctamente.');
    }
    public function rechazar($id)
    {
        $escuela = Escuela::findOrFail($id);
        $escuela->estado = 'rechazado';
        $escuela->save();

        return redirect()->back()->with('success', 'Escuela rechazada correctamente.');
    }
}
