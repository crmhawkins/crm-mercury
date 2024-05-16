<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;

class IsAdmin
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            if ($request->session()->has('inmobiliaria')) {

            }else{
                $request->session()->put('inmobiliaria', 'sayco');
            }
                return $next($request);
        } else{
            return redirect()->route('login');
        }
    }
}
