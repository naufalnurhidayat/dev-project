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
            return redirect('/accessforbidden');
        } else {
            return redirect('/login');
        }
    }
}
