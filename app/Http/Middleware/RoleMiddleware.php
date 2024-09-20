<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if (!auth()->user() || !auth()->user()->hasRole($role)) {
            abort(403,'No tienes aceeso a esta sección.');
        }
        return $next($request);
    }
}

//AUTOMATIC VERIFICATION FOR CERTAIN ROUTES

