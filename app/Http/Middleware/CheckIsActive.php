<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsActive
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
        if ($request->user()->is_active == 1) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect('/login')->with('danger', 'Akun anda belum diverifikasi oleh Admin');
        }
    }
}
