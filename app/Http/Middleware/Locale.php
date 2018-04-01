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
        if ($request->cookie('locale')) {
            $lang = $request->cookie('locale');
            \App::setLocale($lang);

            $response = $next($request);

            return $response->withCookie(cookie('locale', $lang, 15));
        }

        return $next($request);
    }
}
