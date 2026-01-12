<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageTest extends TestCase
{
    public function test_landing_page_loads(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_landing_page_has_csrf_token(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('csrf-token', false);
    }

    public function test_landing_page_has_contact_form(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee('contact-form')
            ->assertSee('name')
            ->assertSee('email')
            ->assertSee('message');
    }

}
