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
    public function handle($request, Closure $next, $id_role)
    {
        if ($request->user()->role->role != $id_role) {
            return redirect('/accessforbidden');
        }
        return $next($request);
    }
}
