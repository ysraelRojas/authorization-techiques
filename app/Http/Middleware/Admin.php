<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Access\AuthorizationException;

use Closure;

class Admin
{
    
    public function handle($request, Closure $next)
    {
        if (! auth()->user()->admin) {
            throw new AuthorizationException;            
        } 

        return $next($request);
    }
}
