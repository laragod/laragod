<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthControllerTest extends TestCase
{
    public function test_ping_returns_pong(): void
    {
        $response = $this->get('/ping');

        $response->assertOk();
        $response->assertJson(['message' => 'pong']);
    }

    public function test_health_check_returns_ok(): void
    {
        $response = $this->get('/health');

        $response->assertOk();
        $response->assertSee('OK');
    }

    public function test_status_returns_available(): void
    {
        $response = $this->get('/status');

        $response->assertOk();
        $response->assertJson(['status' => 'available']);
    }
}
