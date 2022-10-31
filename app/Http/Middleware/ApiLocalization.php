<?php

namespace App\Http\Middleware;

use Closure;

class ApiLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $available_locales = collect(['ru', 'uz-Cyrl']); //collect(config('translatable.locales'));
        $locale = ($request->hasHeader('Accept-Language')) ? $request->header('Accept-Language') : 'ru';
        if (in_array($locale, $available_locales->toArray())) {
            app()->setLocale($locale);
        } else {
            app()->setLocale('ru');
        }
        return $next($request);
    }
}
