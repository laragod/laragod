<?php

declare(strict_types=1);

if (! function_exists('locale_route')) {
    /**
     * Generate a URL for a named route with the current locale.
     */
    function locale_route(string $name, array $parameters = [], bool $absolute = true): string
    {
        $locale = app()->getLocale();

        return route($name, array_merge(['locale' => $locale], $parameters), $absolute);
    }
}

if (! function_exists('route_with_locale')) {
    /**
     * Generate a URL for a named route with a specific locale.
     */
    function route_with_locale(string $name, string $locale, array $parameters = [], bool $absolute = true): string
    {
        return route($name, array_merge(['locale' => $locale], $parameters), $absolute);
    }
}

if (! function_exists('available_locales')) {
    /**
     * Get all available locales.
     *
     * @return array<string, string>
     */
    function available_locales(): array
    {
        return config('localization.locales', ['en' => 'English']);
    }
}

if (! function_exists('current_locale')) {
    /**
     * Get the current locale.
     */
    function current_locale(): string
    {
        return app()->getLocale();
    }
}
