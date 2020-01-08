<?php

namespace App\Http\Middleware;

use Closure;

class CheckSubscribed
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
        if ($request->user() && ! $request->user()->subscribed('default')) {
            return redirect('/upgrade/plans');
        }
        return $next($request);
    }
}
