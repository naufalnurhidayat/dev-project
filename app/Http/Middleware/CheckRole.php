<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (in_array($request->user()->role->role, $roles)) {
            return $next($request);
        } elseif (auth()->user()) {
            if (auth()->user()->role->role == "Admin") {
                return redirect('/admin');
            } elseif (auth()->user()->role->role == "Scrum Master") {
                return redirect('/sm');
            } elseif (auth()->user()->role->role == "Product Owner") {
                return redirect('/po');
            } elseif (auth()->user()->role->role == "User") {
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }
    }
}
