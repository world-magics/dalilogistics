<?php

namespace App\Http\Middleware;

use App\Services\AdminService;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class WebLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);
        if ($locale && AdminService::checkLocale($locale)) {
            if (config('app.fallback_locale') === $locale) { // if it is default locale
                $path = Str::replaceFirst($locale, '', $request->path());
                if ($url_params = http_build_query(request()->all())) $path = "$path?$url_params";
                return redirect($path);
            }
        }
        return $next($request);
    }
}
