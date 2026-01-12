# High-Performance Landing Page with Multi-Channel Notifications

A production-ready Laravel 12 application demonstrating enterprise-level architecture for a stateless, cacheable landing page with multi-channel contact form notifications.

## Project Overview

This project showcases professional Laravel development with a focus on:
- **Cookie-based sessions** for CSRF protection without server-side storage
- **Multi-channel notification architecture** using Strategy pattern
- **Contract-based design** for extensibility
- **Comprehensive test coverage**
- **Modern PHP 8.4** features and best practices

## Key Features

### Architecture
- **Cookie-Based Sessions**: Sessions stored in encrypted cookies (client-side) for CSRF protection
- **Interface-Driven**: `ContactNotifier` contract for all notification channels
- **Strategy Pattern**: `NotificationManager` dynamically routes to configured channels
- **Dependency Injection**: Constructor injection throughout
- **SOLID Principles**: Clean separation of concerns, single responsibility

### Supported Notification Channels
1. **Telegram** - Telegram Bot API with HTML formatting
2. **Discord** - Webhook integration with rich embeds
3. **WhatsApp** - Compatible with Twilio/WhatsApp Business API
4. **Email** - Laravel Mail with HTML templates and reply-to support

### Performance Optimizations
- **FastCGI Cache Compatible**: GET / cacheable with cookie-based sessions
- **Client-Side Sessions**: Session data stored in encrypted cookies, not server
- **Array Cache**: In-memory rate limiting (no database)
- **Deferred JavaScript**: Non-blocking script loading
- **Rate Limiting**: 5 requests/minute per IP

### Security
- **CSRF Protection**: Full CSRF protection using cookie-based tokens
- **Input Validation**: Strict validation on all fields
- **XSS Protection**: HTML escaping in all notifiers
- **Rate Limiting**: Prevents abuse
- **Encrypted Sessions**: Session cookies are encrypted

## Technical Stack

- **PHP**: 8.4
- **Framework**: Laravel 12
- **Frontend**: Blade + Tailwind CSS 4.0
- **Build Tool**: Vite
- **Testing**: PHPUnit 11

## Installation

```bash
# Clone the repository
git clone https://github.com/laragod/laragod.git laragod
cd laragod

# Run Laravel project setup
composer setup

# Run tests
php artisan test
```

## Configuration

### Enable Notification Channels

Edit `.env` and configure your desired channels:

```env
# Comma-separated list of channels to enable
NOTIFICATION_CHANNELS=telegram,discord

# Telegram Configuration (100% FREE)
TELEGRAM_BOT_TOKEN=your_bot_token
TELEGRAM_CHAT_ID=your_chat_id

# Discord Configuration (100% FREE)
DISCORD_WEBHOOK_URL=your_webhook_url

# WhatsApp Configuration (Paid - Twilio/Business API)
WHATSAPP_API_URL=https://api.provider.com/messages
WHATSAPP_API_TOKEN=your_api_token
WHATSAPP_FROM=+1234567890
WHATSAPP_TO=+0987654321

# Email Configuration (Paid - SendGrid/SES/etc)
NOTIFICATION_EMAIL_TO=admin@example.com
```

### Cache & Sessions

```env
# Cookie-based sessions (no server-side storage, CSRF-protected)
SESSION_DRIVER=cookie

# Array cache for rate limiting (no database needed)
CACHE_STORE=array
```

## Usage

### Starting the Server

```bash
php artisan serve
```

Visit `http://localhost:8000` to see the landing page.

### Running Tests

```bash
php artisan test
```

**Test Coverage:**
- 16 tests passing
- 44 assertions
- Unit tests for each notifier
- Feature tests for controller and landing page
- Rate limiting verification
- Security tests (CSRF protection, XSS protection)

## Architecture Details

### Notification System

```
ContactController
    ↓ (dependency injection)
NotificationManager
    ↓ (strategy pattern)
[TelegramNotifier, DiscordNotifier, WhatsAppNotifier, EmailNotifier]
    ↓ (implements)
ContactNotifier Interface
```

**Adding New Channels:**

1. Create notifier class implementing `ContactNotifier`:
```php
class SlackNotifier implements ContactNotifier
{
    public function send(string $name, string $email, string $message): bool
    {
        // Implementation
    }

    public function getChannel(): string
    {
        return 'slack';
    }

    public function isConfigured(): bool
    {
        // Check configuration
    }
}
```

2. Register in `NotificationManager::resolveNotifier()`:
```php
return match ($channel) {
    // ... existing channels
    'slack' => app(SlackNotifier::class),
    default => null,
};
```

3. Add configuration in `config/notifications.php`

### Directory Structure

```
app/
├── Contracts/
│   └── ContactNotifier.php          # Interface for all notifiers
├── Http/Controllers/
│   └── ContactController.php         # Minimal controller with validation
└── Services/
    ├── NotificationManager.php       # Strategy pattern manager
    ├── TelegramNotifier.php          # Telegram Bot API integration
    ├── DiscordNotifier.php           # Discord webhook integration
    ├── WhatsappNotifier.php          # WhatsApp API integration
    └── EmailNotifier.php             # Laravel Mail integration

config/
└── notifications.php                 # Notification configuration

tests/
├── Feature/
│   ├── ContactControllerTest.php     # Integration tests
│   └── LandingPageTest.php           # No CSRF, no sessions tests
└── Unit/
    └── TelegramNotifierTest.php      # Notifier unit tests
```

## Performance Benchmarks

- **GET / Response**: Fully cacheable with cookie-based sessions
- **Client-Side Sessions**: No server-side session storage required
- **No Database Queries**: Contact form doesn't require database
- **Nginx FastCGI Compatible**: Can be cached at web server level with cookie sessions

## Code Quality

- **PHP 8.4 Features**: Readonly properties, constructor property promotion
- **Type Safety**: Strict types throughout
- **Clean Code**: Single responsibility, descriptive naming
- **Error Handling**: Comprehensive try-catch with logging
- **Logging**: Contextual logs for all notification attempts

## Free Channels

For 100% free operation, use Telegram and Discord:

```env
NOTIFICATION_CHANNELS=telegram,discord
```

Both channels:
- Are completely free
- Have no message limits
- Require no credit card
- Are production-ready
- Support rich formatting

## Security Best Practices

### Production Configuration

When deploying to production, ensure these security settings in `.env`:

```env
# Session encryption (REQUIRED for production)
SESSION_ENCRYPT=true

# Secure cookie settings (REQUIRED for HTTPS production sites)
SESSION_SECURE_COOKIE=true
SESSION_HTTP_ONLY=true
SESSION_SAME_SITE=lax

# Cache driver (REQUIRED for production with multiple workers)
# Use 'file', 'redis', or 'memcached' instead of 'array'
CACHE_STORE=file
```

### Security Features

- **CSRF Protection**: Full CSRF protection enabled using cookie-based tokens
- **Session Encryption**: Session cookies are encrypted (when `SESSION_ENCRYPT=true`)
- **XSS Protection**: All user input is escaped with `htmlspecialchars()` before sending to notification channels
- **Rate Limiting**: 5 requests per minute per IP to prevent abuse
- **Input Validation**: Strict validation on all form fields (name max 100, email max 200, message max 2000)
- **Secure Cookies**: HTTP-only and SameSite protection for session cookies
- **Error Handling**: Graceful degradation with comprehensive logging

### Important Production Notes

1. **Session Encryption**: Always set `SESSION_ENCRYPT=true` in production to encrypt session cookies
2. **Secure Cookies**: Set `SESSION_SECURE_COOKIE=true` when using HTTPS in production
3. **Cache Driver**: Never use `CACHE_STORE=array` in production - it doesn't persist across PHP-FPM workers. Use `file`, `redis`, or `memcached` instead for proper rate limiting
4. **CSRF Token Expiry**: Sessions expire after 120 minutes by default. Users will see a clear error message if their CSRF token expires

## License

This project is open-source and available for portfolio demonstration purposes.

## What's the point in building this project if you're using AI?

Has most of this project been generated by an AI tool like ChatGPT or Claude?

Yes, AI is a tool, just like a hammer or a screwdriver. What makes a difference is the person's skill in using it, not harming themselves as well as all other skills that are not replaceable by AI.

AI replaces junior-level workload, but it still requires senior supervision, design and control. My job here is to specify infrastructure, patterns and make sure it can scale nicely, both performance-wise, and from the Developer Experience perspective.

