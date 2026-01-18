<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageTest extends TestCase
{
    public function test_root_redirects_to_default_locale(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertRedirect('/en');
    }

    public function test_landing_page_loads(): void
    {
        $response = $this->get('/en');

        $response->assertStatus(200);
    }

    public function test_landing_page_has_csrf_token(): void
    {
        $response = $this->get('/en');

        $response->assertStatus(200);
        $response->assertSee('csrf-token', false);
    }

    public function test_landing_page_has_contact_form(): void
    {
        $response = $this->get('/en/contact');

        $response->assertStatus(200)
            ->assertSee('onboarding-form')
            ->assertSee('name')
            ->assertSee('email')
            ->assertSee('message');
    }

    public function test_work_page_loads(): void
    {
        $response = $this->get('/en/work');

        $response->assertStatus(200);
    }

    public function test_about_page_loads(): void
    {
        $response = $this->get('/en/about');

        $response->assertStatus(200);
    }

    public function test_contact_page_loads(): void
    {
        $response = $this->get('/en/contact');

        $response->assertStatus(200);
    }
}
