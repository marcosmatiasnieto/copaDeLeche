<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EscuelaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InformeController;

// ==========================
// AUTENTICACIÓN
// ==========================
Auth::routes(['register' => false, 'reset' => false]);

// ==========================
// RUTAS VISIBLES PARA TODOS LOS USUARIOS LOGUEADOS
// ==========================
Route::middleware(['auth'])->group(function () {

    Route::get('/', [EscuelaController::class, 'index'])->name('home');
    Route::get('/home', [EscuelaController::class, 'index'])->name('home');


    // LAS ESCUELAS PUEDEN VER Y CREAR
    Route::get('/escuelas', [EscuelaController::class, 'index'])->name('escuelas.index');
    Route::get('/escuelas/create', [EscuelaController::class, 'create'])->name('escuelas.create');
    Route::post('/escuelas', [EscuelaController::class, 'store'])->name('escuelas.store');

    // Ver detalles
    Route::get('/escuelas/{escuela}', [EscuelaController::class, 'show'])
        ->name('escuelas.show');
});

// ==========================
// RUTAS SOLO ADMIN
// ==========================
Route::middleware(['auth', 'admin'])->group(function () {

    // CRUD que solo haga admin
    Route::resource('escuelas', EscuelaController::class)->except([
        'index',
        'create',
        'store',
        'show'
    ]);

    // Aprobar / Rechazar
    Route::patch('/escuelas/{id}/aprobar', [EscuelaController::class, 'aprobar'])->name('escuelas.aprobar');
    Route::patch('/escuelas/{id}/rechazar', [EscuelaController::class, 'rechazar'])->name('escuelas.rechazar');

    // Informes
    Route::get('/informes/escuelas', [InformeController::class, 'escuelas'])
        ->name('informes.escuelas');

    Route::get('/informes', [InformeController::class, 'index'])
        ->name('informes.index');
    Route::get('/informes/pdf/escuelas', [InformeController::class, 'pdfEscuelas'])
        ->name('informes.pdf.escuelas');
    Route::get('/informes/pdf/estado', [InformeController::class, 'pdfEstado'])
        ->name('informes.pdf.estado');
});
