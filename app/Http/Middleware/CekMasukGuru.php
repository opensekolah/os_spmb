<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekMasukGuru
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('login')) {
            return redirect('/')->with('error', 'Silahkan Masuk');
        }

        return $next($request);
    }
}