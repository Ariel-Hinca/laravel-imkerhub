<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    /**
     * Controleer of er iemand ingelogd is en of dit 'role' en user is, anders stuurt een error message terug.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Je hebt geen toegang tot deze pagina.');
        }
        return $next($request);
    }
}
