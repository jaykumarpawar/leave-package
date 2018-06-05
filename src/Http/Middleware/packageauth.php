<?php

namespace Crazyboy\Leave\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class packageauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guest()) {
            return redirect('/signin');
        }
        return $next($request);
    }
}
