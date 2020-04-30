<?php

namespace App\Http\Middleware;

use App\Trending;
use Closure;

class LoadCommonData
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
        view()->share('channels', \App\Channel::all());
        view()->share('trending', app(Trending::class)->get());

        return $next($request);
    }
}