<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruteurMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) { // Vérifie juste si l'utilisateur est connecté
            return $next($request);
        }
        
        return redirect('/home')->with('error', 'Vous devez être connecté pour accéder à cette page.');
    }
}
