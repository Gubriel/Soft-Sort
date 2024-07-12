<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role === 'user') {
            return $next($request);
        }
        return redirect('/');
    }
}
