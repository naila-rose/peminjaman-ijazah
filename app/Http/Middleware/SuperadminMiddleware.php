<?php

namespace App\Http\Middleware;

use Alert;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SuperadminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role != 'superadmin' || !Auth::user()->role) :
            
            Alert::error('Maaf', 'Diluar hak akses anda');
            return redirect()->back();
        endif;

        return $next($request);
    }
}