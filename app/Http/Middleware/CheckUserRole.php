<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role !== 'utilisateur') {
            abort(403, 'Accès interdit');
        }

        return $next($request);
    }
}
