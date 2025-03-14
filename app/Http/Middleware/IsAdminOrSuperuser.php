<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdminOrSuperuser
{
    public function handle($request, Closure $next)
    {
        // Verifica si el usuario tiene el rol de admin o es superusuario (isadmin)
        if (Auth::check() && (Auth::user()->isadmin || Auth::user()->role == 'admin')) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}
