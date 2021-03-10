<?php

namespace App\Http\Middleware;

use Closure, Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return Auth::user()->role == '1' 
            ? $next($request)
            : redirect('/');
    }
}
