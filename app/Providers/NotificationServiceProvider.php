<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\ContactNotifier;
use App\Services\DiscordNotifier;
use App\Services\EmailNotifier;
use App\Services\NotificationManager;
use App\Services\StorageNotifier;
use App\Services\TelegramNotifier;
use App\Services\WhatsappNotifier;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register notification services.
     */
    #[\Override]
    public function register(): void
    {
        // Bind individual notifiers as singletons
        $this->app->singleton(TelegramNotifier::class);
        $this->app->singleton(DiscordNotifier::class);
        $this->app->singleton(WhatsappNotifier::class);
        $this->app->singleton(EmailNotifier::class);
        $this->app->singleton(StorageNotifier::class);

        // Bind the NotificationManager with configured notifiers
        $this->app->singleton(fn ($app): \App\Services\NotificationManager => new NotificationManager(
            injectedNotifiers: $this->resolveConfiguredNotifiers(),
        ));

        // Bind a collection of all available notifiers (for testing/inspection)
        $this->app->bind('notification.notifiers', fn ($app): \Illuminate\Support\Collection => $this->resolveConfiguredNotifiers());
    }

    /**
     * Resolve all notifiers that are enabled in configuration.
     * Returns only notifiers for channels listed in NOTIFICATION_CHANNELS.
     *
     * @return Collection<int, ContactNotifier>
     */
    private function resolveConfiguredNotifiers(): Collection
    {
        $notifiers = [];

        foreach ($this->getEnabledChannels() as $channel) {
            $notifier = $this->resolveNotifier($channel);

            if ($notifier instanceof ContactNotifier) {
                $notifiers[] = $notifier;
            }
        }

        return new Collection($notifiers);
    }

    /**
     * @return list<string>
     */
    private function getEnabledChannels(): array
    {
        $channels = config('notifications.enabled_channels');

        if (!is_array($channels)) {
            return [];
        }

        return array_values(array_filter($channels, is_string(...)));
    }

    /**
     * Resolve a notifier instance by channel name.
     */
    private function resolveNotifier(string $channel): ?ContactNotifier
    {
        return match ($channel) {
            'telegram' => $this->app->make(TelegramNotifier::class),
            'discord' => $this->app->make(DiscordNotifier::class),
            'whatsapp' => $this->app->make(WhatsappNotifier::class),
            'email' => $this->app->make(EmailNotifier::class),
            'storage' => $this->app->make(StorageNotifier::class),
            default => null,
        };
    }

    /**
     * Bootstrap notification services.
     */
    public function boot(): void
    {
    }
}
