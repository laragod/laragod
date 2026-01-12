<?php

namespace App\Services;

use App\Contracts\ContactNotifier;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class NotificationManager
{
    private Collection $notifiers;

    public function __construct()
    {
        $this->notifiers = collect();
        $this->registerChannels();
    }

    /**
     * Send a contact notification through all configured channels.
     */
    public function sendContactNotification(string $name, string $email, string $message): bool
    {
        if ($this->notifiers->isEmpty()) {
            Log::warning('No notification channels configured');
            return false;
        }

        $results = $this->notifiers
            ->filter(fn (ContactNotifier $notifier) => $notifier->isConfigured())
            ->map(function (ContactNotifier $notifier) use ($name, $email, $message) {
                try {
                    return [
                        'channel' => $notifier->getChannel(),
                        'success' => $notifier->send($name, $email, $message),
                    ];
                } catch (\Throwable $e) {
                    Log::error('Notification channel failed', [
                        'channel' => $notifier->getChannel(),
                        'error' => $e->getMessage(),
                    ]);

                    return [
                        'channel' => $notifier->getChannel(),
                        'success' => false,
                    ];
                }
            });

        $successCount = $results->where('success', true)->count();
        $totalCount = $results->count();

        if ($successCount === 0) {
            Log::error('All notification channels failed', [
                'results' => $results->toArray(),
            ]);
            return false;
        }

        if ($successCount < $totalCount) {
            Log::warning('Some notification channels failed', [
                'success' => $successCount,
                'total' => $totalCount,
                'results' => $results->toArray(),
            ]);
        }

        return true;
    }

    /**
     * Get all configured notifiers.
     */
    public function getNotifiers(): Collection
    {
        return $this->notifiers;
    }

    /**
     * Get enabled channel names.
     */
    public function getEnabledChannels(): array
    {
        return $this->notifiers
            ->filter(fn (ContactNotifier $notifier) => $notifier->isConfigured())
            ->map(fn (ContactNotifier $notifier) => $notifier->getChannel())
            ->values()
            ->toArray();
    }

    /**
     * Register notification channels based on configuration.
     */
    private function registerChannels(): void
    {
        $enabledChannels = config('notifications.enabled_channels', []);

        foreach ($enabledChannels as $channel) {
            $notifier = $this->resolveNotifier($channel);

            if ($notifier instanceof ContactNotifier) {
                $this->notifiers->push($notifier);
            }
        }
    }

    /**
     * Resolve a notifier instance by channel name.
     */
    private function resolveNotifier(string $channel): ?ContactNotifier
    {
        return match ($channel) {
            'telegram' => app(TelegramNotifier::class),
            'discord' => app(DiscordNotifier::class),
            'whatsapp' => app(WhatsappNotifier::class),
            'email' => app(EmailNotifier::class),
            default => null,
        };
    }
}
