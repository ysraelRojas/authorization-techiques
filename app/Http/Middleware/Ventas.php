<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Access\AuthorizationException;

use Closure;

class Ventas
{
   
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->ventas) {
            throw new AuthorizationException;            
        }

        return $next($request);
    }
}
