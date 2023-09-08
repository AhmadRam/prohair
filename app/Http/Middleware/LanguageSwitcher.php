<?php

namespace App\Http\Middleware;

use Closure;

class LanguageSwitcher
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
        if ($locale = request()->locale) {
            $locale = ($locale == 'ar' || $locale == 'en') ? $locale : app()->getLocale();
            app()->setLocale($locale);
            session()->put('locale', $locale);
        } else if ($locale = session()->get('locale')) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
