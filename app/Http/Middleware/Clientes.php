<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Access\AuthorizationException;

use Closure;

class Clientes
{
    
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->cliente) {
            throw new AuthorizationException;
        }

        return $next($request);
    }
}
