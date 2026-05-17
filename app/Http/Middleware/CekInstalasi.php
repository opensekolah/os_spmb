<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekInstalasi
{
    public function handle(Request $request, Closure $next)
    {
        $installed = file_exists(storage_path('installed'));

        // Jika belum install
        if (!$installed) {
            // izinkan hanya route install
            if (!$request->is('install') && !$request->is('install/*')) {
                return redirect('/install');
            }
        }

        // Jika sudah install
        if ($installed) {
            // blok akses ke installer
            if ($request->is('install') || $request->is('install/*')) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}