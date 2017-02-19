<?php

namespace Nuntius\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;

class CanUseNuntius
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next)
    {
        if(Gate::denies(config('nuntius.gate'))) {
            throw new AuthorizationException("You do not have sufficient permissions to access this page");
        }

        return $next($request);
    }
}
