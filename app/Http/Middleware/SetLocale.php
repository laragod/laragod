<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

final class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * Sets the application locale based on:
     * 1. URL prefix (e.g., /en/about, /pl/contact)
     * 2. Cookie preference (for non-localized routes like POST /contact)
     * 3. Default locale as fallback
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locales = array_keys(config('localization.locales', ['en' => 'English']));
        $defaultLocale = config('localization.default', 'en');

        // Get locale from route parameter
        $locale = $request->route('locale');

        // If locale is in URL and valid, use it
        if ($locale !== null && in_array($locale, $locales, true)) {
            App::setLocale($locale);

            // Queue cookie to remember preference
            Cookie::queue(
                config('localization.cookie_name', 'locale'),
                $locale,
                config('localization.cookie_lifetime', 43200),
            );

            return $next($request);
        }

        // For non-localized routes (like POST /contact), check cookie
        $cookieLocale = $request->cookie(config('localization.cookie_name', 'locale'));

        if ($cookieLocale !== null && in_array($cookieLocale, $locales, true)) {
            App::setLocale($cookieLocale);
        } else {
            App::setLocale($defaultLocale);
        }

        return $next($request);
    }
}
