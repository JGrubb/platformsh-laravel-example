<?php

namespace App\Http\Middleware;

use Closure;

class RemoveTrailingSlashes
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
        $path = $request->getPathInfo();
        $has_slash = (substr($path, -1) == '/');
        if($has_slash && strlen($path) > 1) {
            return redirect(rtrim($path, '/'), 301);
        }
        return $next($request);
    }
}
