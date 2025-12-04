<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Asegura que el usuario exista
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Asegura que tenga rol admin
        if (Auth::user()->role === 'admin') {
            return $next($request);
        }

        abort(403, 'No tienes permiso para acceder aquí.');
    }
}
