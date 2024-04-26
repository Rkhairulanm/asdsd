<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna memiliki role_id 1 (admin)
        if ($request->user()->role_id !== 1) {
            // Jika bukan admin, maka redirect dengan pesan kesalahan
            abort (404);
        }

        // Jika pengguna adalah admin, lanjutkan permintaan
        return $next($request);
    }
}
