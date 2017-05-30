<?php

namespace Dannymcc\Redirect;

use Closure;

class RedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $redirect = app(Redirector::class)->redirectFor($request);

        return $redirect ?? $next($request);
    }
}
