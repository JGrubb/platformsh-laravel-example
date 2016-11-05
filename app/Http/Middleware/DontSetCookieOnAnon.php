<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DontSetCookieOnAnon
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
        $user = Auth::check();
        if(!$user) {
            \Config::set('session.driver', 'array');
            \Config::set('cookie.driver', 'array');
        }
        return $next($request);
    }
}
