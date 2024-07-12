<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PadraoMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role === 'padrao') {
            return $next($request);
        }
        Auth::user()->role <= null;
        return redirect('/')->withErrors('Você devera estar logado como padrao...');
    }
}
