<?php

namespace Tests\Unit;

use App\Providers\NotificationServiceProvider;
use App\Services\DiscordNotifier;
use App\Services\EmailNotifier;
use App\Services\NotificationManager;
use App\Services\StorageNotifier;
use App\Services\TelegramNotifier;
use App\Services\WhatsappNotifier;
use Tests\TestCase;

class NotificationServiceProviderTest extends TestCase
{
    public function test_registers_telegram_notifier_as_singleton(): void
    {
        $instance1 = $this->app->make(TelegramNotifier::class);
        $instance2 = $this->app->make(TelegramNotifier::class);

        $this->assertSame($instance1, $instance2);
    }

    public function test_registers_discord_notifier_as_singleton(): void
    {
        $instance1 = $this->app->make(DiscordNotifier::class);
        $instance2 = $this->app->make(DiscordNotifier::class);

        $this->assertSame($instance1, $instance2);
    }

    public function test_registers_whatsapp_notifier_as_singleton(): void
    {
        $instance1 = $this->app->make(WhatsappNotifier::class);
        $instance2 = $this->app->make(WhatsappNotifier::class);

        $this->assertSame($instance1, $instance2);
    }

    public function test_registers_email_notifier_as_singleton(): void
    {
        $instance1 = $this->app->make(EmailNotifier::class);
        $instance2 = $this->app->make(EmailNotifier::class);

        $this->assertSame($instance1, $instance2);
    }

    public function test_registers_storage_notifier_as_singleton(): void
    {
        $instance1 = $this->app->make(StorageNotifier::class);
        $instance2 = $this->app->make(StorageNotifier::class);

        $this->assertSame($instance1, $instance2);
    }

    public function test_registers_notification_manager_as_singleton(): void
    {
        $instance1 = $this->app->make(NotificationManager::class);
        $instance2 = $this->app->make(NotificationManager::class);

        $this->assertSame($instance1, $instance2);
    }

    public function test_resolves_configured_notifiers(): void
    {
        config(['notifications.enabled_channels' => ['telegram', 'discord', 'whatsapp', 'email', 'storage']]);

        // Force re-registration
        $provider = new NotificationServiceProvider($this->app);
        $provider->register();

        $notifiers = $this->app->make('notification.notifiers');

        $this->assertCount(5, $notifiers);
    }

    public function test_ignores_unknown_channels(): void
    {
        config(['notifications.enabled_channels' => ['unknown']]);

        // Force re-registration
        $provider = new NotificationServiceProvider($this->app);
        $provider->register();

        $notifiers = $this->app->make('notification.notifiers');

        $this->assertCount(0, $notifiers);
    }
}
