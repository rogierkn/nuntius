<?php


namespace Nuntius\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class CanAdminNuntius
{



    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws \Nuntius\Exceptions\AuthorizationException
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->canAdminNuntius()) {
            throw new \Nuntius\Exceptions\AuthorizationException("You do not have permission to administrate the blog");
        }

        return $next($request);
    }
}