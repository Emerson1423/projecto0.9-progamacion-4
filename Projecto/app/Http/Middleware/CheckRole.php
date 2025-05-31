<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\usuario;
use Illuminate\Support\Facades\Auth;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle($request, Closure $next, $rol)
{
    if (!Auth::check()) {
        return redirect()->route('inicio');
    }

    // Verifica si el usuario tiene el rol requerido
    if (!$request->user() || !$request->user()->hasRole($rol)) {
        abort(403, 'Acceso Denegado');
    }

    return $next($request);
}
}

