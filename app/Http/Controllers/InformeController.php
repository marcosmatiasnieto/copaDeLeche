<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    /**
     * Informe general (estadísticas)
     */
    public function index()
    {
        $totalEscuelas = Escuela::count();

        $aprobadas = Escuela::where('estado', 'aprobado')->count();
        $rechazadas = Escuela::where('estado', 'rechazado')->count();
        $pendientes = Escuela::where('estado', 'pendiente')->count();

        return view('informes.index', compact(
            'totalEscuelas',
            'aprobadas',
            'rechazadas',
            'pendientes'
        ));
    }

    /**
     * Listado de escuelas (detalle)
     */
    public function escuelas(Request $request)
{
    $query = Escuela::query();

    if ($request->filled('departamento')) {
        $query->where('departamento', $request->departamento);
    }

    if ($request->filled('zona')) {
        $query->where('zona', $request->zona);
    }

    if ($request->filled('estado')) {
        $query->where('estado', $request->estado);
    }

    $escuelas = $query->orderBy('id', 'desc')->get();

    // Listados reales desde la BD
    $departamentos = Escuela::select('departamento')->distinct()->orderBy('departamento')->pluck('departamento');
    $zonas = Escuela::select('zona')->distinct()->orderBy('zona')->pluck('zona');
    $estados = ['aprobado', 'rechazado', 'pendiente'];

    return view('informes.escuelas', compact(
        'escuelas',
        'departamentos',
        'zonas',
        'estados'
    ));
}
public function pdfEscuelas(Request $request)
{
    $query = Escuela::query();

    if ($request->filled('departamento')) {
        $query->where('departamento', $request->departamento);
    }

    if ($request->filled('zona')) {
        $query->where('zona', $request->zona);
    }

    if ($request->filled('estado')) {
        $query->where('estado', $request->estado);
    }

    $escuelas = $query->orderBy('id', 'desc')->get();

    $pdf = Pdf::loadView('informes.pdf.escuelas', compact('escuelas'));

    return $pdf->stream('informe_escuelas.pdf');
}

public function pdfEstado()
{
    $totalEscuelas = Escuela::count();
    $aprobadas = Escuela::where('estado', 'aprobado')->count();
    $rechazadas = Escuela::where('estado', 'rechazado')->count();
    $pendientes = Escuela::where('estado', 'pendiente')->count();

    $pdf = Pdf::loadView('informes.pdf.estado', compact(
        'totalEscuelas',
        'aprobadas',
        'rechazadas',
        'pendientes'
    ));

    return $pdf->stream('informe_por_estado.pdf');
}

}
