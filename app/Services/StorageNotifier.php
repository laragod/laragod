<?php

namespace App\Services;

use App\Contracts\ContactNotifier;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class StorageNotifier implements ContactNotifier
{
    public function __construct(
        private readonly ?string $disk = null,
        private readonly ?string $path = null,
    ) {}

    public function send(string $name, string $email, string $message): bool
    {
        $disk = $this->getDisk();
        $path = $this->getPath();

        $entry = $this->formatEntry($name, $email, $message);

        try {
            $storage = Storage::disk($disk);

            // Append to existing file or create new one
            $existing = $storage->exists($path) ? $storage->get($path) : '';
            $storage->put($path, $existing . $entry);

            Log::info('Contact submission logged to storage', [
                'channel' => $this->getChannel(),
                'disk' => $disk,
                'path' => $path,
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Storage notification failed', [
                'channel' => $this->getChannel(),
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }

    public function getChannel(): string
    {
        return 'storage';
    }

    public function isConfigured(): bool
    {
        // Storage is always available as a backup
        return true;
    }

    private function getDisk(): string
    {
        return $this->disk ?? config('notifications.channels.storage.disk', 'local');
    }

    private function getPath(): string
    {
        return $this->path ?? config('notifications.channels.storage.path', 'contact_submissions.log');
    }

    private function formatEntry(string $name, string $email, string $message): string
    {
        $timestamp = now()->toIso8601String();
        $separator = str_repeat('=', 80);

        // Escape for safe storage (no HTML needed here, just clean text)
        $name = $this->sanitize($name);
        $email = $this->sanitize($email);
        $message = $this->sanitize($message);

        return <<<ENTRY
{$separator}
CONTACT SUBMISSION
{$separator}
Timestamp: {$timestamp}
Name: {$name}
Email: {$email}

Message:
{$message}

ENTRY;
    }

    private function sanitize(string $value): string
    {
        // Remove any control characters except newlines
        return preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $value);
    }
}
