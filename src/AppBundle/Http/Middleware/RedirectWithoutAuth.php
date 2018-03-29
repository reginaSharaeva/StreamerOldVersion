<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
class RedirectWithoutAuth
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
