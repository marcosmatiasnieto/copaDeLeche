<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsEscuela
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Asegura que el usuario exista
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Asegura que tenga rol escuela
        if (Auth::user()->role === 'escuela') {
            return $next($request);
        }

        abort(403, 'No tienes permiso para acceder aquí.');
    }
}
