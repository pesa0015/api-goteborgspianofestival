<?php

namespace App\Http\Middleware;

use Closure;

class Locale
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
        if (!$request->cookie('locale') && !$request->has('locale')) {
            return $next($request);
        }
        
        $lang = $request->cookie('locale') ? $request->cookie('locale') : $request->locale;

        if (!in_array($lang, ['en', 'sv'])) {
            return $next($request);
        }

        \App::setLocale($lang);

        $response = $next($request);

        return $response->withCookie(cookie('locale', $lang, 15));
    }
}
