<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// El proposito de este middleware es proteger a las rutas para que solo puedan acceder los administradores autenticados
class AdminMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el user es adminastrador
        if (auth()->guard('admin')->check()) {
            return $next($request);
        }
        // Si no es admin, redirigir a la ruta 'admin.login'
        return redirect()->route('admin.login');
    }
}
