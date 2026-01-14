<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function escuelas()
    {
        $escuelas = Escuela::orderBy('escuela')->get();

        return view('informes.escuelas', compact('escuelas'));
    }

    public function pdfEscuelas()
{
    $escuelas = Escuela::orderBy('escuela')->get();

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
