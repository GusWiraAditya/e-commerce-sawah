<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Tambahkan use statement ini
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Gunakan Facade Auth::check() dan Auth::user()
        if (Auth::check() && Auth::user()->isAdmin) {
            return $next($request);
        }

        abort(403, 'UNAUTHORIZED ACTION.');
    }
}