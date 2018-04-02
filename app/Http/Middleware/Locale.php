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
        if (!$request->header('locale')) {
            return $next($request);
        }
        
        $lang = $request->header('locale');

        if (!in_array($lang, ['en', 'sv'])) {
            return $next($request);
        }

        \App::setLocale($lang);

        return $next($request);
    }
}
