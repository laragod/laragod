<?php

namespace Tests\Feature;

use App\Services\NotificationManager;
use Mockery;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    public function test_contact_form_submits_successfully(): void
    {
        $manager = Mockery::mock(NotificationManager::class);
        $manager->shouldReceive('sendContactNotification')
            ->once()
            ->with('John Doe', 'john@example.com', 'Test message')
            ->andReturn(true);

        $this->app->instance(NotificationManager::class, $manager);

        $response = $this->postJson('/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message',
        ]);

        $response->assertStatus(200)
            ->assertJson(['ok' => true]);
    }

    public function test_contact_form_validation_fails(): void
    {
        $response = $this->postJson('/contact', [
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
        $response = $this->postJson('/contact', [
            'name' => str_repeat('a', 101),
            'email' => 'test@example.com',
            'message' => 'Test',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
    }

    public function test_email_max_length_validation(): void
    {
        $response = $this->postJson('/contact', [
            'name' => 'John',
            'email' => str_repeat('a', 190) . '@example.com',
            'message' => 'Test',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_message_max_length_validation(): void
    {
        $response = $this->postJson('/contact', [
            'name' => 'John',
            'email' => 'test@example.com',
            'message' => str_repeat('a', 2001),
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['message']);
    }

    public function test_notification_failure(): void
    {
        $manager = Mockery::mock(NotificationManager::class);
        $manager->shouldReceive('sendContactNotification')
            ->once()
            ->andReturn(false);

        $this->app->instance(NotificationManager::class, $manager);

        $response = $this->postJson('/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message',
        ]);

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
            $response = $this->postJson('/contact', [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'message' => 'Test message',
            ]);
            $response->assertStatus(200);
        }

        $response = $this->postJson('/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message',
        ]);

        $response->assertStatus(429);
    }
}
