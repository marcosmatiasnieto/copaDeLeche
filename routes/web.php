<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EscuelaController;
use Illuminate\Support\Facades\Auth;


    // Protegemos las rutas de escuelas con el middleware auth asi nos redirige al login si no estamos autenticados
Route::resource('escuelas', EscuelaController::class)->middleware('auth');

Auth::routes(['register' => false,'reset' => false]); // deshabilitamos el registro y reseteo de contraseñas

    // Definimos la ruta /home para que apunte al metodo index del EscuelaController
Route::get('/home', [EscuelaController::class, 'index'])->name('home');


    // Rutas protegidas que requieren autenticación
Route::group(['middleware' => ['auth']], function() {

    Route::get('/', [EscuelaController::class,'index'])->name('home');
});

Route::patch('/escuelas/{id}/aprobar', [EscuelaController::class, 'aprobar'])->name('escuelas.aprobar');
Route::patch('/escuelas/{id}/rechazar', [EscuelaController::class, 'rechazar'])->name('escuelas.rechazar');

