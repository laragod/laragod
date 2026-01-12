<?php

namespace App\Contracts;

interface ContactNotifier
{
    /**
     * Send a contact form notification.
     */
    public function send(string $name, string $email, string $message): bool;

    /**
     * Get the channel name.
     */
    public function getChannel(): string;

    /**
     * Check if the notifier is properly configured.
     */
    public function isConfigured(): bool;
}
