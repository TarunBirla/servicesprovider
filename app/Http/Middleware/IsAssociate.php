<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAssociate
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'associate') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
