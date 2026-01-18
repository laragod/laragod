<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class RedirectToLocale
{
    public function handle(Request $request): Response
    {
        $defaultLocale = config('localization.default', 'en');
        $cookieLocale = $request->cookie(config('localization.cookie_name', 'locale'));
        $locales = array_keys(config('localization.locales', ['en' => 'English']));

        $locale = $cookieLocale && in_array($cookieLocale, $locales, true) ? $cookieLocale : $defaultLocale;

        return to_route('home', ['locale' => $locale]);
    }
}
