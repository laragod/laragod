<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ContactNotifier;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class NotificationManager
{
    private Collection $notifiers;

    public function __construct(
        private readonly Collection $injectedNotifiers = new Collection(),
    ) {
        $this->notifiers = $this->injectedNotifiers->isNotEmpty()
            ? $this->injectedNotifiers
            : $this->resolveNotifiers();
    }

    /**
     * Send a contact notification through all configured channels.
     * Each channel is independent - one failure won't affect others.
     */
    public function sendContactNotification(string $name, string $email, string $message): bool
    {
        $configuredNotifiers = $this->notifiers
            ->filter(fn (ContactNotifier $notifier) => $notifier->isConfigured());

        if ($configuredNotifiers->isEmpty()) {
            Log::warning('No notification channels are configured');
            return false;
        }

        $results = collect();

        // Process each notifier independently with try/catch
        foreach ($configuredNotifiers as $notifier) {
            $result = $this->sendToChannel($notifier, $name, $email, $message);
            $results->push($result);
        }

        $successCount = $results->where('success', true)->count();
        $totalCount = $results->count();
        $failedChannels = $results->where('success', false)->pluck('channel')->toArray();

        // Log summary based on results
        if ($successCount === 0) {
            Log::error('All notification channels failed', [
                'failed_channels' => $failedChannels,
            ]);
            return false;
        }

        if ($successCount < $totalCount) {
            Log::warning('Some notification channels failed', [
                'success' => $successCount,
                'total' => $totalCount,
                'failed_channels' => $failedChannels,
            ]);
        }

        return true;
    }

    /**
     * Send notification to a single channel with error handling.
     * Only logs failures for configured channels.
     */
    private function sendToChannel(ContactNotifier $notifier, string $name, string $email, string $message): array
    {
        $channel = $notifier->getChannel();

        try {
            $success = $notifier->send($name, $email, $message);

            if (!$success) {
                Log::error('Notification channel returned failure', [
                    'channel' => $channel,
                ]);
            }

            return [
                'channel' => $channel,
                'success' => $success,
            ];
        } catch (\Throwable $e) {
            // Only log if channel is configured (which it is, since we filtered earlier)
            Log::error('Notification channel threw exception', [
                'channel' => $channel,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return [
                'channel' => $channel,
                'success' => false,
            ];
        }
    }

    /**
     * Get all registered notifiers.
     */
    public function getNotifiers(): Collection
    {
        return $this->notifiers;
    }

    /**
     * Get names of configured (ready to use) channels.
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
     * Resolve all notifiers based on enabled_channels config.
     */
    private function resolveNotifiers(): Collection
    {
        $enabledChannels = config('notifications.enabled_channels', []);
        $notifiers = collect();

        foreach ($enabledChannels as $channel) {
            $notifier = $this->resolveNotifier($channel);

            if ($notifier instanceof ContactNotifier) {
                $notifiers->push($notifier);
            }
        }

        return $notifiers;
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
            'storage' => app(StorageNotifier::class),
            default => null,
        };
    }
}
