<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::check()) {
            return redirect('/login')->withErrors('You are not logged in.');
        } else if(Auth::user()->role == $role) {
            return $next($request);
        } else {
            abort(403, 'Unauthorized');
        }
        
    }
}
