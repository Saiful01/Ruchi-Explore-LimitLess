<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       // dump(Auth::user()->is_admin);
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);

        }
        return redirect('/login');

    }
}
