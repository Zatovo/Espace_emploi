<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruteurMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'recruteur') {
            return $next($request);
        }
        
        return redirect('/home')->with('error', 'Accès refusé.');
    }
}
