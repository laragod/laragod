<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ContactNotifier;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramNotifier implements ContactNotifier
{
    public function __construct(
        private readonly ?string $token = null,
        private readonly ?string $chatId = null,
    ) {}

    public function send(string $name, string $email, string $message): bool
    {
        if (!$this->isConfigured()) {
            Log::error('Telegram credentials not configured', [
                'channel' => $this->getChannel(),
            ]);
            return false;
        }

        $text = $this->formatMessage($name, $email, $message);
        $token = $this->getToken();
        $chatId = $this->getChatId();

        try {
            $response = Http::timeout(10)
                ->post("https://api.telegram.org/bot{$token}/sendMessage", [
                    'chat_id' => $chatId,
                    'text' => $text,
                    'parse_mode' => 'HTML',
                ]);

            if ($response->successful()) {
                Log::info('Contact notification sent successfully', [
                    'channel' => $this->getChannel(),
                ]);
                return true;
            }

            Log::error('Telegram API error', [
                'channel' => $this->getChannel(),
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return false;
        } catch (\Exception $e) {
            Log::error('Telegram notification failed', [
                'channel' => $this->getChannel(),
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }

    public function getChannel(): string
    {
        return 'telegram';
    }

    public function isConfigured(): bool
    {
        return !empty($this->getToken()) && !empty($this->getChatId());
    }

    private function getToken(): ?string
    {
        return $this->token ?? config('notifications.channels.telegram.token');
    }

    private function getChatId(): ?string
    {
        return $this->chatId ?? config('notifications.channels.telegram.chat_id');
    }

    private function formatMessage(string $name, string $email, string $message): string
    {
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

        return "📩 <b>New contact request</b>\n\n"
             . "👤 <b>Name:</b> {$name}\n"
             . "📧 <b>Email:</b> {$email}\n\n"
             . "💬 <b>Message:</b>\n{$message}";
    }
}

