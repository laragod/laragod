# Laravel High-Performance Landing Page with Multi-Channel Notifications

## Project Overview

Build a Laravel 12 application as a high-performance, stateless landing page with a POST-only contact form that sends notifications through multiple channels (Telegram, Discord, WhatsApp, Email).

First page load must be fully cacheable with no backend overhead. Notification system must use enterprise-level architecture with contract-based design and strategy pattern.

## Core Constraints (Non-Negotiable)

- **Framework**: Laravel 12
- **PHP**: 8.4
- **Frontend**: Blade + Tailwind CSS 4.0
- **Restrictions**:
  - No SPA, Inertia, Vue/React, Livewire, or Volt
  - No sessions
  - No auth
  - No queues
  - No events
  - No database
  - Cookies allowed (for rate limiting only)
  - Backend logic only on POST submission
  - GET / must be cache-safe and side-effect-free

## Laravel Configuration

### Sessions
- Use cookie driver: `SESSION_DRIVER=cookie` (client-side storage for CSRF protection)

### Cache
- Use array driver: `CACHE_STORE=array` (in-memory for rate limiting)

### Middleware (web group)
**All default middleware enabled:**
- EncryptCookies
- AddQueuedCookiesToResponse
- StartSession (required for CSRF)
- ShareErrorsFromSession
- ValidateCsrfToken (CSRF protection enabled)
- SubstituteBindings

Modified in `bootstrap/app.php`:
```php
->withMiddleware(function (Middleware $middleware): void {
    // All default middleware enabled for security (CSRF protection)
})
```

## Routes

```php
GET  /        → return view('landing')
POST /contact → ContactController@store with throttle:5,1
```

- GET route must return static Blade view
- POST route must NOT be cached
- POST route is CSRF-protected (requires valid CSRF token)

## Landing Page (Blade)

**File**: `resources/views/landing.blade.php`

- Pure HTML + Tailwind CSS 4.0
- No dynamic data
- **CSRF token in meta tag** for JavaScript access
- Contact form fields:
  - `name` (string, required, max 100)
  - `email` (email, required, max 200)
  - `message` (string, required, max 2000)

### Form Behavior
- Use JavaScript fetch API
- Submit JSON to POST /contact with **X-CSRF-TOKEN header**
- Prevent default browser submit
- Display success/error messages inline
- Load JS with `defer` attribute (non-blocking)
- Loading spinner during submission

## JavaScript

- No frameworks or external libraries
- Inline in Blade template with `<script defer>`
- On submit:
  - Read CSRF token from meta tag
  - POST JSON to /contact with X-CSRF-TOKEN header
  - Handle 200 vs non-200 responses
  - Display validation errors
  - Reset form on success
  - Show loading state

## Multi-Channel Notification Architecture

### Contract-Based Design

**Interface**: `app/Contracts/ContactNotifier.php`

```php
interface ContactNotifier
{
    public function send(string $name, string $email, string $message): bool;
    public function getChannel(): string;
    public function isConfigured(): bool;
}
```

### Notification Channels

All notifiers implement `ContactNotifier`:

1. **TelegramNotifier** (`app/Services/TelegramNotifier.php`)
   - Telegram Bot API integration
   - HTML formatted messages
   - Constructor injection with config fallback
   - XSS protection via `htmlspecialchars()`

2. **DiscordNotifier** (`app/Services/DiscordNotifier.php`)
   - Discord webhook integration
   - Rich embeds with timestamp
   - Color-coded messages

3. **WhatsappNotifier** (`app/Services/WhatsappNotifier.php`)
   - WhatsApp Business API / Twilio compatible
   - Markdown formatted messages
   - Configurable API endpoint

4. **EmailNotifier** (`app/Services/EmailNotifier.php`)
   - Laravel Mail integration
   - HTML email template
   - Reply-to header set to submitter
   - Only enabled if mail driver is not 'log'

### NotificationManager (Strategy Pattern)

**File**: `app/Services/NotificationManager.php`

- Reads enabled channels from `config('notifications.enabled_channels')`
- Loops through all configured channels
- Calls `send()` on each notifier
- Returns `true` if at least one channel succeeds
- Comprehensive logging of all attempts
- Graceful handling of partial failures

### Configuration

**File**: `config/notifications.php`

```php
return [
    'enabled_channels' => array_filter(
        explode(',', env('NOTIFICATION_CHANNELS', ''))
    ),

    'channels' => [
        'telegram' => [
            'token' => env('TELEGRAM_BOT_TOKEN'),
            'chat_id' => env('TELEGRAM_CHAT_ID'),
        ],
        'discord' => [
            'webhook_url' => env('DISCORD_WEBHOOK_URL'),
        ],
        'whatsapp' => [
            'api_url' => env('WHATSAPP_API_URL'),
            'api_token' => env('WHATSAPP_API_TOKEN'),
            'from' => env('WHATSAPP_FROM'),
            'to' => env('WHATSAPP_TO'),
        ],
        'email' => [
            'to' => env('NOTIFICATION_EMAIL_TO'),
        ],
    ],
];
```

### Environment Variables

**File**: `.env` and `.env.example`

```env
# Session & Cache
SESSION_DRIVER=cookie
CACHE_STORE=array

# Notification Channels (comma-separated)
NOTIFICATION_CHANNELS=telegram,discord

# Telegram Configuration (100% FREE)
TELEGRAM_BOT_TOKEN=
TELEGRAM_CHAT_ID=

# Discord Configuration (100% FREE)
DISCORD_WEBHOOK_URL=

# WhatsApp Configuration (PAID)
WHATSAPP_API_URL=
WHATSAPP_API_TOKEN=
WHATSAPP_FROM=
WHATSAPP_TO=

# Email Notification (PAID/Limited Free)
NOTIFICATION_EMAIL_TO=
```

## Contact Endpoint

**Controller**: `app/Http/Controllers/ContactController.php`

- Constructor injection of `NotificationManager`
- Validate input (name, email, message)
- Call `$notificationManager->sendContactNotification()`
- Return JSON `{ ok: true }` on success
- Return JSON `{ ok: false, errors: {} }` on validation failure (422)
- Return JSON `{ ok: false, message: '' }` on notification failure (500)
- No redirects
- No view rendering
- No database writes

## Message Formatting

### Telegram (HTML)
```
📩 <b>New contact request</b>

👤 <b>Name:</b> {name}
📧 <b>Email:</b> {email}

💬 <b>Message:</b>
{message}
```

### Discord (Embed)
```json
{
  "embeds": [{
    "title": "📩 New Contact Request",
    "color": 5814783,
    "fields": [
      {"name": "👤 Name", "value": "{name}", "inline": true},
      {"name": "📧 Email", "value": "{email}", "inline": true},
      {"name": "💬 Message", "value": "{message}", "inline": false}
    ],
    "timestamp": "ISO8601"
  }]
}
```

### WhatsApp (Markdown)
```
📩 *New Contact Request*

👤 *Name:* {name}
📧 *Email:* {email}

💬 *Message:*
{message}
```

### Email (HTML)
- Professional HTML email template
- Styled with inline CSS
- Reply-to header set to submitter's email

## Implementation Rules

**Prohibited:**
- Jobs
- Queues
- Events
- Listeners
- Custom Service Providers
- Database models

**Required:**
- Contract interface (`ContactNotifier`)
- Multiple notifier implementations
- `NotificationManager` service with Strategy pattern
- Dependency injection
- Constructor property promotion (PHP 8.4)
- Readonly properties where applicable
- Comprehensive error handling
- Contextual logging

## Performance Guarantees

- **GET /**: Fully compatible with Nginx `fastcgi_cache` with cookie sessions
- **Cookie-Based Sessions**: No server-side session storage (client-side only)
- **CSRF Protection**: Full CSRF protection using cookie-based tokens
- **JavaScript non-blocking**: `defer` attribute
- **No database overhead**: Array cache for rate limiting

## Testing Requirements

**Comprehensive test coverage required:**

1. **Feature Tests**
   - `ContactControllerTest.php`: Validation, success/failure, rate limiting
   - `LandingPageTest.php`: No CSRF token, no session cookie, form presence

2. **Unit Tests**
   - `TelegramNotifierTest.php`: Message sending, API errors, HTML escaping, configuration

**Test Strategy:**
- Mock `NotificationManager` in controller tests
- Use `Http::fake()` for API calls in notifier tests
- Mock external dependencies
- No database required
- Compact, focused tests (test only what's necessary)

## Deliverables

### Modified Files
1. `bootstrap/app.php` - Default middleware (all enabled for CSRF protection)
2. `routes/web.php` - Routes with rate limiting
3. `.env` and `.env.example` - Cookie sessions + all notification channel configs
4. `config/services.php` - Clean (Telegram config removed, now in notifications.php)

### Created Files
1. `app/Contracts/ContactNotifier.php` - Interface
2. `app/Services/NotificationManager.php` - Strategy pattern manager
3. `app/Services/TelegramNotifier.php` - Telegram implementation
4. `app/Services/DiscordNotifier.php` - Discord implementation
5. `app/Services/WhatsappNotifier.php` - WhatsApp implementation
6. `app/Services/EmailNotifier.php` - Email implementation
7. `app/Http/Controllers/ContactController.php` - Minimal controller
8. `resources/views/landing.blade.php` - Landing page
9. `config/notifications.php` - Notification configuration
10. `tests/Feature/ContactControllerTest.php`
11. `tests/Feature/LandingPageTest.php`
12. `tests/Unit/TelegramNotifierTest.php`

## Success Criteria

- ✅ All 16 tests pass (44 assertions)
- ✅ GET / loads with cookie-based session (no server storage)
- ✅ GET / contains CSRF token in meta tag
- ✅ Form submits via fetch as JSON with CSRF token
- ✅ CSRF protection fully enabled and working
- ✅ Validation errors display properly
- ✅ Multiple notification channels work
- ✅ At least one channel succeeds = success response
- ✅ Rate limiting blocks 6th request within 1 minute
- ✅ No database queries
- ✅ XSS protection in all notifiers
- ✅ Professional architecture with contracts and dependency injection

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
- **XSS Protection**: All user input is escaped with `htmlspecialchars()` in all notifiers
- **Rate Limiting**: 5 requests per minute per IP to prevent abuse
- **Input Validation**: Strict validation on all form fields
- **Secure Cookies**: HTTP-only and SameSite protection for session cookies
- **Error Handling**: Graceful degradation with comprehensive logging
- **419 Error Handling**: JavaScript displays user-friendly message for expired CSRF tokens

### Important Production Notes

1. **Session Encryption**: Always set `SESSION_ENCRYPT=true` in production
2. **Secure Cookies**: Set `SESSION_SECURE_COOKIE=true` when using HTTPS
3. **Cache Driver**: Never use `CACHE_STORE=array` in production - use `file`, `redis`, or `memcached`
4. **XSS Protection**: All notifiers use `htmlspecialchars(ENT_QUOTES, 'UTF-8')` on user input

## Goal

Laravel-based landing page that behaves like a static site on first load, with a fast, backend-powered multi-channel notification system using enterprise-level architecture patterns (Strategy, Dependency Injection, Interface Segregation).
