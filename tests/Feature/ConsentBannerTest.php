<?php

namespace Tests\Feature;

use Tests\TestCase;

class ConsentBannerTest extends TestCase
{
    public function test_consent_banner_is_present_on_home_page(): void
    {
        $response = $this->get('/en');

        $response->assertStatus(200);
        $response->assertSee('consent-banner', false);
        $response->assertSee('consent-accept', false);
        $response->assertSee('consent-reject', false);
    }

    public function test_consent_banner_has_google_consent_mode(): void
    {
        $response = $this->get('/en');

        $response->assertStatus(200);
        $response->assertSee("gtag('consent', 'default'", false);
        $response->assertSee('analytics_storage', false);
    }

    public function test_consent_banner_is_present_on_contact_page(): void
    {
        $response = $this->get('/en/contact');

        $response->assertStatus(200);
        $response->assertSee('consent-banner', false);
    }

    public function test_polish_translations_work(): void
    {
        $response = $this->get('/pl');

        $response->assertStatus(200);
        $response->assertSee('Ustawienia Cookies', false);
    }
}
