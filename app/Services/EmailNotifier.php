<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ContactNotifier;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailNotifier implements ContactNotifier
{
    public function __construct(
        private readonly ?string $to = null,
    ) {}

    public function send(string $name, string $email, string $message): bool
    {
        if (!$this->isConfigured()) {
            Log::error('Email recipient not configured', [
                'channel' => $this->getChannel(),
            ]);
            return false;
        }

        $recipientEmail = $this->getTo();

        try {
            Mail::send([], [], function ($mail) use ($name, $email, $message, $recipientEmail): void {
                $mail
                    ->to($recipientEmail)
                    ->subject('New Contact Form Submission')
                    ->html($this->buildHtml($name, $email, $message))
                    ->replyTo($email, $name);
            });

            Log::info('Contact notification sent successfully', [
                'channel' => $this->getChannel(),
            ]);

            return true;
        } catch (\Exception $exception) {
            Log::error('Email notification failed', [
                'channel' => $this->getChannel(),
                'error' => $exception->getMessage(),
            ]);

            return false;
        }
    }

    public function getChannel(): string
    {
        return 'email';
    }

    public function isConfigured(): bool
    {
        return !in_array($this->getTo(), [null, '', '0'], true) && config('mail.mailer') !== 'log';
    }

    private function getTo(): ?string
    {
        return $this->to ?? config('notifications.channels.email.to');
    }

    private function buildHtml(string $name, string $email, string $message): string
    {
        $escapedName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $escapedEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $escapedMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

        return <<<HTML
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #4F46E5; color: white; padding: 20px; border-radius: 5px 5px 0 0; }
                .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 0 0 5px 5px; }
                .field { margin-bottom: 15px; }
                .label { font-weight: bold; color: #4F46E5; }
                .value { margin-top: 5px; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2>📩 New Contact Request</h2>
                </div>
                <div class="content">
                    <div class="field">
                        <div class="label">👤 Name:</div>
                        <div class="value">{$escapedName}</div>
                    </div>
                    <div class="field">
                        <div class="label">📧 Email:</div>
                        <div class="value">{$escapedEmail}</div>
                    </div>
                    <div class="field">
                        <div class="label">💬 Message:</div>
                        <div class="value">{$escapedMessage}</div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        HTML;
    }
}
