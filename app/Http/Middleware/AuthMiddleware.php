<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()) :
            Session::flash('middleware', 'false');
            Session::flash('message', 'Silahkan Login Terlebih Dahulu');
            return redirect('/login');
        endif;

        return $next($request);
    }
}