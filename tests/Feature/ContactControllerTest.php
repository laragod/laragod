<?php

namespace Tests\Feature;

use App\Services\NotificationManager;
use Mockery;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    private function validFormData(array $overrides = []): array
    {
        return array_merge([
            'services' => ['web-app'],
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message',
        ], $overrides);
    }

    public function test_contact_form_submits_successfully(): void
    {
        $manager = Mockery::mock(NotificationManager::class);
        $manager->shouldReceive('sendContactNotification')
            ->once()
            ->withArgs(function ($name, $email, $message) {
                return $name === 'John Doe'
                    && $email === 'john@example.com'
                    && str_contains($message, 'Web App')
                    && str_contains($message, 'Test message');
            })
            ->andReturn(true);

        $this->app->instance(NotificationManager::class, $manager);

        $response = $this->postJson('/contact', $this->validFormData());

        $response->assertStatus(200)
            ->assertJson(['ok' => true]);
    }

    public function test_contact_form_with_all_fields(): void
    {
        $manager = Mockery::mock(NotificationManager::class);
        $manager->shouldReceive('sendContactNotification')
            ->once()
            ->withArgs(function ($name, $email, $message) {
                return $name === 'John Doe'
                    && $email === 'john@example.com'
                    && str_contains($message, 'Web App')
                    && str_contains($message, 'Build an MVP')
                    && str_contains($message, 'Acme Inc')
                    && str_contains($message, '£10,000 - £25,000')
                    && str_contains($message, '1 - 3 months')
                    && str_contains($message, 'We need a web app');
            })
            ->andReturn(true);

        $this->app->instance(NotificationManager::class, $manager);

        $response = $this->postJson('/contact', [
            'services' => ['web-app', 'mvp'],
            'name' => 'John Doe',
            'company' => 'Acme Inc',
            'email' => 'john@example.com',
            'phone' => '+44 7XXX XXXXXX',
            'budget' => '10k-25k',
            'timeline' => '1-3-months',
            'message' => 'We need a web app',
            'tech_notes' => 'Using Laravel and Vue',
        ]);

        $response->assertStatus(200)
            ->assertJson(['ok' => true]);
    }

    public function test_services_required_validation(): void
    {
        $response = $this->postJson('/contact', $this->validFormData([
            'services' => [],
        ]));

        $response->assertStatus(422)
            ->assertJson(['ok' => false])
            ->assertJsonValidationErrors(['services']);
    }

    public function test_services_invalid_value_validation(): void
    {
        $response = $this->postJson('/contact', $this->validFormData([
            'services' => ['invalid-service'],
        ]));

        $response->assertStatus(422)
            ->assertJson(['ok' => false])
            ->assertJsonValidationErrors(['services.0']);
    }

    public function test_contact_form_validation_fails(): void
    {
        $response = $this->postJson('/contact', [
            'services' => ['web-app'],
            'name' => '',
            'email' => 'invalid-email',
            'message' => '',
        ]);

        $response->assertStatus(422)
            ->assertJson(['ok' => false])
            ->assertJsonValidationErrors(['name', 'email', 'message']);
    }

    public function test_name_max_length_validation(): void
    {
        $response = $this->postJson('/contact', $this->validFormData([
            'name' => str_repeat('a', 101),
        ]));

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
    }

    public function test_email_max_length_validation(): void
    {
        $response = $this->postJson('/contact', $this->validFormData([
            'email' => str_repeat('a', 190) . '@example.com',
        ]));

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_message_max_length_validation(): void
    {
        $response = $this->postJson('/contact', $this->validFormData([
            'message' => str_repeat('a', 2001),
        ]));

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['message']);
    }

    public function test_company_max_length_validation(): void
    {
        $response = $this->postJson('/contact', $this->validFormData([
            'company' => str_repeat('a', 101),
        ]));

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['company']);
    }

    public function test_phone_max_length_validation(): void
    {
        $response = $this->postJson('/contact', $this->validFormData([
            'phone' => str_repeat('0', 51),
        ]));

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['phone']);
    }

    public function test_tech_notes_max_length_validation(): void
    {
        $response = $this->postJson('/contact', $this->validFormData([
            'tech_notes' => str_repeat('a', 1001),
        ]));

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['tech_notes']);
    }

    public function test_budget_invalid_value_validation(): void
    {
        $response = $this->postJson('/contact', $this->validFormData([
            'budget' => 'invalid-budget',
        ]));

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['budget']);
    }

    public function test_timeline_invalid_value_validation(): void
    {
        $response = $this->postJson('/contact', $this->validFormData([
            'timeline' => 'invalid-timeline',
        ]));

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['timeline']);
    }

    public function test_notification_failure(): void
    {
        $manager = Mockery::mock(NotificationManager::class);
        $manager->shouldReceive('sendContactNotification')
            ->once()
            ->andReturn(false);

        $this->app->instance(NotificationManager::class, $manager);

        $response = $this->postJson('/contact', $this->validFormData());

        $response->assertStatus(500)
            ->assertJson(['ok' => false]);
    }

    public function test_rate_limiting_works(): void
    {
        $manager = Mockery::mock(NotificationManager::class);
        $manager->shouldReceive('sendContactNotification')
            ->times(5)
            ->andReturn(true);

        $this->app->instance(NotificationManager::class, $manager);

        for ($i = 0; $i < 5; $i++) {
            $response = $this->postJson('/contact', $this->validFormData());
            $response->assertStatus(200);
        }

        $response = $this->postJson('/contact', $this->validFormData());

        $response->assertStatus(429);
    }
}
