<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {   /**
        * Handle an incoming request.
        *
        * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
        */
        
        if (!Auth::guard('user')->check()) {
            return redirect('/login')->with('error', 'Acceso no autorizado.');
        }

        return $next($request);
    }
}
