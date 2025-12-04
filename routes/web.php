<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EscuelaController;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/escuelas/{id}', [EscuelaController::class, 'show'])->name('escuelas.show');
});

// ==========================
// RUTAS SOLO ADMIN
// ==========================
Route::middleware(['auth', 'admin'])->group(function () {

    // CRUD que solo haga admin
    Route::resource('escuelas', EscuelaController::class)->except([
        'index', 'create', 'store'
    ]);

    // Aprobar / Rechazar
    Route::patch('/escuelas/{id}/aprobar', [EscuelaController::class, 'aprobar'])->name('escuelas.aprobar');
    Route::patch('/escuelas/{id}/rechazar', [EscuelaController::class, 'rechazar'])->name('escuelas.rechazar');
});
