<?php

namespace Tests\Unit;

use App\Services\WhatsappNotifier;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class WhatsappNotifierTest extends TestCase
{
    public function test_sends_contact_message_successfully(): void
    {
        Http::fake([
            'api.whatsapp.com/*' => Http::response(['success' => true], 200),
        ]);

        $notifier = new WhatsappNotifier(
            'https://api.whatsapp.com/send',
            'test-token',
            '+1234567890',
            '+0987654321'
        );

        $result = $notifier->send('John Doe', 'john@example.com', 'Test message');

        $this->assertTrue($result);

        Http::assertSent(function ($request) {
            return $request->hasHeader('Authorization', 'Bearer test-token')
                && isset($request['from'])
                && isset($request['to'])
                && isset($request['body']);
        });
    }

    public function test_returns_false_when_not_configured(): void
    {
        $notifier = new WhatsappNotifier(null, null, null, null);

        $result = $notifier->send('John Doe', 'john@example.com', 'Test message');

        $this->assertFalse($result);
    }

    public function test_returns_false_on_api_error(): void
    {
        Http::fake([
            'api.whatsapp.com/*' => Http::response(['error' => 'Invalid credentials'], 401),
        ]);

        $notifier = new WhatsappNotifier(
            'https://api.whatsapp.com/send',
            'test-token',
            '+1234567890',
            '+0987654321'
        );

        $result = $notifier->send('John Doe', 'john@example.com', 'Test message');

        $this->assertFalse($result);
    }

    public function test_escapes_html_in_messages(): void
    {
        Http::fake([
            'api.whatsapp.com/*' => Http::response(['success' => true], 200),
        ]);

        $notifier = new WhatsappNotifier(
            'https://api.whatsapp.com/send',
            'test-token',
            '+1234567890',
            '+0987654321'
        );

        $notifier->send('<script>alert("xss")</script>', 'test@example.com', '<b>Bold</b>');

        Http::assertSent(function ($request) {
            $body = $request['body'];

            return !str_contains($body, '<script>')
                && str_contains($body, '&lt;script&gt;')
                && !str_contains($body, '<b>')
                && str_contains($body, '&lt;b&gt;');
        });
    }

    public function test_is_configured_returns_true_with_all_credentials(): void
    {
        $notifier = new WhatsappNotifier(
            'https://api.whatsapp.com/send',
            'test-token',
            '+1234567890',
            '+0987654321'
        );

        $this->assertTrue($notifier->isConfigured());
    }

    public function test_is_configured_returns_false_with_missing_credentials(): void
    {
        $notifier = new WhatsappNotifier('https://api.whatsapp.com/send', null, null, null);

        $this->assertFalse($notifier->isConfigured());
    }

    public function test_get_channel_returns_whatsapp(): void
    {
        $notifier = new WhatsappNotifier(
            'https://api.whatsapp.com/send',
            'test-token',
            '+1234567890',
            '+0987654321'
        );

        $this->assertEquals('whatsapp', $notifier->getChannel());
    }
}
