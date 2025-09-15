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

        $camopos=[
            'nombre'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'telefono'=>'required|string|max:15',
            'archivo'=>'required|max:10000|mimes:pdf,doc,docx',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'archivo.required'=>'El archivo es requerido',
        ];

        $request->validate($camopos, $mensaje);




        $datosEscuela = request()->except('_token');
        // return response()->json($datosEscuela);
        if($request->hasFile('archivo')) {
            $datosEscuela['archivo'] = $request->file('archivo')->store('uploads', 'public');
        }

        Escuela::insert($datosEscuela);

        return redirect()->route('escuelas.index')->with('success', 'Escuela creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Escuela $escuela)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Escuela $escuela)
    {
        $escuela = Escuela::findOrFail($escuela->id);
        return view('escuela.edit', compact('escuela'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Escuela $escuela)
    {
        $datosEscuela = request()->except(['_token', '_method']);

        if($request->hasFile('archivo')) {
            $escuela = Escuela::findOrFail($escuela->id);
            Storage::delete('public/'.$escuela->archivo);
            $datosEscuela['archivo'] = $request->file('archivo')->store('uploads', 'public');
        }

        Escuela::where('id', '=', $escuela->id)->update($datosEscuela);
        return redirect()->route('escuelas.index')->with('success', 'Escuela actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Escuela $escuela)
{
    $escuela = Escuela::findOrFail($escuela->id);

    if (Storage::delete('public/uploads' . $escuela->archivo)) {
        Escuela::destroy($escuela->id);
    }


    return redirect()->route('escuelas.index')->with('success', 'Escuela eliminada exitosamente.');
}
}
