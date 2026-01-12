<?php

namespace Tests\Unit;

use App\Contracts\ContactNotifier;
use App\Services\NotificationManager;
use Illuminate\Support\Facades\Config;
use Mockery;
use Tests\TestCase;

class NotificationManagerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Reset notification channels config for each test
        Config::set('notifications.enabled_channels', []);
    }

    public function test_returns_false_when_no_channels_configured(): void
    {
        Config::set('notifications.enabled_channels', []);

        $manager = new NotificationManager();

        $result = $manager->sendContactNotification('John Doe', 'john@example.com', 'Test message');

        $this->assertFalse($result);
    }

    public function test_returns_true_when_all_channels_succeed(): void
    {
        $notifier1 = Mockery::mock(ContactNotifier::class);
        $notifier1->shouldReceive('isConfigured')->andReturn(true);
        $notifier1->shouldReceive('send')->once()->andReturn(true);
        $notifier1->shouldReceive('getChannel')->andReturn('telegram');

        $notifier2 = Mockery::mock(ContactNotifier::class);
        $notifier2->shouldReceive('isConfigured')->andReturn(true);
        $notifier2->shouldReceive('send')->once()->andReturn(true);
        $notifier2->shouldReceive('getChannel')->andReturn('discord');

        Config::set('notifications.enabled_channels', ['telegram', 'discord']);

        $this->app->bind(\App\Services\TelegramNotifier::class, fn() => $notifier1);
        $this->app->bind(\App\Services\DiscordNotifier::class, fn() => $notifier2);

        $manager = new NotificationManager();

        $result = $manager->sendContactNotification('John Doe', 'john@example.com', 'Test message');

        $this->assertTrue($result);
    }

    public function test_returns_true_when_at_least_one_channel_succeeds(): void
    {
        $notifier1 = Mockery::mock(ContactNotifier::class);
        $notifier1->shouldReceive('isConfigured')->andReturn(true);
        $notifier1->shouldReceive('send')->once()->andReturn(true);
        $notifier1->shouldReceive('getChannel')->andReturn('telegram');

        $notifier2 = Mockery::mock(ContactNotifier::class);
        $notifier2->shouldReceive('isConfigured')->andReturn(true);
        $notifier2->shouldReceive('send')->once()->andReturn(false);
        $notifier2->shouldReceive('getChannel')->andReturn('discord');

        Config::set('notifications.enabled_channels', ['telegram', 'discord']);

        $this->app->bind(\App\Services\TelegramNotifier::class, fn() => $notifier1);
        $this->app->bind(\App\Services\DiscordNotifier::class, fn() => $notifier2);

        $manager = new NotificationManager();

        $result = $manager->sendContactNotification('John Doe', 'john@example.com', 'Test message');

        $this->assertTrue($result);
    }

    public function test_returns_false_when_all_channels_fail(): void
    {
        $notifier1 = Mockery::mock(ContactNotifier::class);
        $notifier1->shouldReceive('isConfigured')->andReturn(true);
        $notifier1->shouldReceive('send')->once()->andReturn(false);
        $notifier1->shouldReceive('getChannel')->andReturn('telegram');

        $notifier2 = Mockery::mock(ContactNotifier::class);
        $notifier2->shouldReceive('isConfigured')->andReturn(true);
        $notifier2->shouldReceive('send')->once()->andReturn(false);
        $notifier2->shouldReceive('getChannel')->andReturn('discord');

        Config::set('notifications.enabled_channels', ['telegram', 'discord']);

        $this->app->bind(\App\Services\TelegramNotifier::class, fn() => $notifier1);
        $this->app->bind(\App\Services\DiscordNotifier::class, fn() => $notifier2);

        $manager = new NotificationManager();

        $result = $manager->sendContactNotification('John Doe', 'john@example.com', 'Test message');

        $this->assertFalse($result);
    }

    public function test_handles_exception_in_channel_gracefully(): void
    {
        $notifier1 = Mockery::mock(ContactNotifier::class);
        $notifier1->shouldReceive('isConfigured')->andReturn(true);
        $notifier1->shouldReceive('send')->once()->andThrow(new \Exception('API Error'));
        $notifier1->shouldReceive('getChannel')->andReturn('telegram');

        $notifier2 = Mockery::mock(ContactNotifier::class);
        $notifier2->shouldReceive('isConfigured')->andReturn(true);
        $notifier2->shouldReceive('send')->once()->andReturn(true);
        $notifier2->shouldReceive('getChannel')->andReturn('discord');

        Config::set('notifications.enabled_channels', ['telegram', 'discord']);

        $this->app->bind(\App\Services\TelegramNotifier::class, fn() => $notifier1);
        $this->app->bind(\App\Services\DiscordNotifier::class, fn() => $notifier2);

        $manager = new NotificationManager();

        $result = $manager->sendContactNotification('John Doe', 'john@example.com', 'Test message');

        $this->assertTrue($result); // Discord succeeded, so overall result is true
    }

    public function test_skips_unconfigured_channels(): void
    {
        $notifier1 = Mockery::mock(ContactNotifier::class);
        $notifier1->shouldReceive('isConfigured')->andReturn(false);
        $notifier1->shouldNotReceive('send');
        $notifier1->shouldReceive('getChannel')->andReturn('telegram');

        $notifier2 = Mockery::mock(ContactNotifier::class);
        $notifier2->shouldReceive('isConfigured')->andReturn(true);
        $notifier2->shouldReceive('send')->once()->andReturn(true);
        $notifier2->shouldReceive('getChannel')->andReturn('discord');

        Config::set('notifications.enabled_channels', ['telegram', 'discord']);

        $this->app->bind(\App\Services\TelegramNotifier::class, fn() => $notifier1);
        $this->app->bind(\App\Services\DiscordNotifier::class, fn() => $notifier2);

        $manager = new NotificationManager();

        $result = $manager->sendContactNotification('John Doe', 'john@example.com', 'Test message');

        $this->assertTrue($result);
    }

    public function test_get_enabled_channels_returns_only_configured_channels(): void
    {
        $notifier1 = Mockery::mock(ContactNotifier::class);
        $notifier1->shouldReceive('isConfigured')->andReturn(true);
        $notifier1->shouldReceive('getChannel')->andReturn('telegram');

        $notifier2 = Mockery::mock(ContactNotifier::class);
        $notifier2->shouldReceive('isConfigured')->andReturn(false);
        $notifier2->shouldReceive('getChannel')->andReturn('discord');

        Config::set('notifications.enabled_channels', ['telegram', 'discord']);

        $this->app->bind(\App\Services\TelegramNotifier::class, fn() => $notifier1);
        $this->app->bind(\App\Services\DiscordNotifier::class, fn() => $notifier2);

        $manager = new NotificationManager();

        $enabledChannels = $manager->getEnabledChannels();

        $this->assertEquals(['telegram'], $enabledChannels);
    }
}
