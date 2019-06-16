<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\UnauthorizedException;

class AllowIfContributor
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

        if (Auth::check() && Auth::user()->isActiveStatus()) {

            if (Auth::user()->isContributor()) {

                return $next($request);
            }

        }

        throw new UnauthorizedException;
        return $next($request);
    }
}
