<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Access\AuthorizationException;

use Closure;

class Admin
{
    
    public function handle($request, Closure $next)
    {
        if (! optional(auth()->user()->isAdmin())) {
            throw new AuthorizationException;            
        } 

        return $next($request);
    }
}
