<?php

namespace App\Http\Middleware;

use Closure;
use App\LangLog;

class LangLogger
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
        LangLog::create(['lang' => \App::getLocale()]);

        return $next($request);
    }
}
