<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ContactNotifier;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DiscordNotifier implements ContactNotifier
{
    public function __construct(
        private readonly ?string $webhookUrl = null,
    ) {}

    public function send(string $name, string $email, string $message): bool
    {
        if (!$this->isConfigured()) {
            Log::error('Discord webhook not configured', [
                'channel' => $this->getChannel(),
            ]);
            return false;
        }

        $payload = $this->buildPayload($name, $email, $message);
        $webhookUrl = $this->getWebhookUrl();

        try {
            $response = Http::timeout(10)
                ->post($webhookUrl, $payload);

            if ($response->successful()) {
                Log::info('Contact notification sent successfully', [
                    'channel' => $this->getChannel(),
                ]);
                return true;
            }

            Log::error('Discord webhook error', [
                'channel' => $this->getChannel(),
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return false;
        } catch (\Exception $e) {
            Log::error('Discord notification failed', [
                'channel' => $this->getChannel(),
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }

    public function getChannel(): string
    {
        return 'discord';
    }

    public function isConfigured(): bool
    {
        return !empty($this->getWebhookUrl());
    }

    private function getWebhookUrl(): ?string
    {
        return $this->webhookUrl ?? config('notifications.channels.discord.webhook_url');
    }

    private function buildPayload(string $name, string $email, string $message): array
    {
        $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

        return [
            'embeds' => [
                [
                    'title' => '📩 New Contact Request',
                    'color' => 5814783,
                    'fields' => [
                        [
                            'name' => '👤 Name',
                            'value' => $safeName,
                            'inline' => true,
                        ],
                        [
                            'name' => '📧 Email',
                            'value' => $safeEmail,
                            'inline' => true,
                        ],
                        [
                            'name' => '💬 Message',
                            'value' => $safeMessage,
                            'inline' => false,
                        ],
                    ],
                    'timestamp' => now()->toIso8601String(),
                ],
            ],
        ];
    }
}
