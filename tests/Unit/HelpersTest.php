<?php

namespace Tests\Unit;

use Tests\TestCase;

class HelpersTest extends TestCase
{
    public function test_locale_route_generates_url_with_current_locale(): void
    {
        app()->setLocale('pl');

        $url = locale_route('home');

        $this->assertStringContainsString('/pl', $url);
    }

    public function test_route_with_locale_generates_url_with_specific_locale(): void
    {
        $url = route_with_locale('home', 'de');

        $this->assertStringContainsString('/de', $url);
    }

    public function test_available_locales_returns_config_values(): void
    {
        config(['localization.locales' => ['en' => 'English', 'pl' => 'Polski']]);

        $locales = available_locales();

        $this->assertEquals(['en' => 'English', 'pl' => 'Polski'], $locales);
    }

    public function test_available_locales_returns_default_when_config_not_array(): void
    {
        config(['localization.locales' => null]);

        $locales = available_locales();

        $this->assertEquals(['en' => 'English'], $locales);
    }

    public function test_available_locales_skips_non_string_keys_and_values(): void
    {
        config(['localization.locales' => [
            'en' => 'English',
            123 => 'Number Key',
            'pl' => 456,
            'de' => 'German',
        ]]);

        $locales = available_locales();

        $this->assertEquals(['en' => 'English', 'de' => 'German'], $locales);
    }

    public function test_available_locales_returns_default_when_all_entries_invalid(): void
    {
        config(['localization.locales' => [
            123 => 456,
            789 => 'invalid',
        ]]);

        $locales = available_locales();

        $this->assertEquals(['en' => 'English'], $locales);
    }

    public function test_current_locale_returns_app_locale(): void
    {
        app()->setLocale('fr');

        $this->assertEquals('fr', current_locale());
    }
}
