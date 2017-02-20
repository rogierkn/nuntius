<?php

namespace Nuntius\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Access\Gate;


class CanUseNuntius
{
    private $gate;

    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }

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
        if($this->gate->denies(config('nuntius.gate'))) {
            throw new \Nuntius\Exceptions\AuthorizationException("You do not have sufficient permissions to access this page");
        }

        return $next($request);
    }
}
