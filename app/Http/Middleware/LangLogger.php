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
        LangLog::create([
            'lang' => \App::getLocale(),
            'http_accept_lang' => substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2)
        ]);

        return $next($request);
    }
}
