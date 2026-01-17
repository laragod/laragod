# Laragod - Laravel Development Portfolio Site with Multi-Channel Notifications

## Project Overview

A high-performance Laravel 12 portfolio website for Laragod (Laravel development agency) with multiple static pages and a contact form that sends notifications through multiple channels (Telegram, Discord, WhatsApp, Email).

All GET routes are fully cacheable with no backend overhead. Notification system uses enterprise-level architecture with contract-based design and strategy pattern. Site features a dark theme toggle for improved accessibility.

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
GET  /        → return view('home')                        ->name('home')
GET  /work    → return view('work', compact('projects'))   ->name('work')
GET  /about   → return view('about')                       ->name('about')
GET  /contact → return view('contact')                     ->name('contact.show')
POST /contact → ContactController@store                    ->name('contact.store')
              → middleware('throttle:5,1')
```

- All GET routes return static Blade views
- POST route must NOT be cached
- POST route is CSRF-protected (requires valid CSRF token)
- All GET routes are fully cacheable
- Named routes used throughout for maintainability

## Frontend Pages & Design

### Design System

**Colors:**
- Primary: Kelly Green (#4cbb17)
- Primary Dark: #3da614
- Primary Light: #e8f8e0
- Neutrals: Gray scale + Charcoal (#111827)

**Typography:**
- Font Sans: Inter (via Bunny Fonts CDN)
- Font Heading: Manrope (via Bunny Fonts CDN)
- Font Mono: JetBrains Mono

**Dark Theme:**
- Toggle button in navbar
- localStorage persistence
- Vanilla JavaScript (no frameworks)
- Tailwind CSS dark mode utilities
- Smooth transitions between themes
- Accessible for light-sensitive users

### Layout Component

**File**: `resources/views/components/layouts/app.blade.php`

- Sticky navigation with mobile menu
- Active link highlighting
- Logo with Kelly Green accent
- Desktop & mobile navigation
- Footer with quick links, services, contact info
- CSRF token in meta tag
- Vite asset loading
- Mobile menu toggle script

### Pages

1. **Home** (`resources/views/home.blade.php`)
   - Hero section with CTA buttons
   - Philosophy section (code quality messaging)
   - 9 services cards (Custom Web Apps, API Development, Laravel + Filament, MVP Development, Legacy Modernization, Code Quality, Technical Consulting, DevOps, Team Augmentation)
   - Pricing section (£500/day transparent pricing)
   - Final CTA section

2. **Work** (`resources/views/work.blade.php`)
   - Portfolio grid (2 columns on desktop)
   - Project cards with image placeholders
   - Technologies badges
   - Challenge/Solution sections
   - GitHub and live demo links
   - Empty state for no projects
   - Projects passed as data from routes

3. **About** (`resources/views/about.blade.php`)
   - Origin story section
   - Philosophy cards (4 principles)
   - Tech stack section (Backend, Frontend, Tools & DevOps)
   - Values section (Craftsmanship, Transparency, Long-term Thinking)
   - CTA section

4. **Contact** (`resources/views/contact.blade.php`)
   - Hero section with key value propositions
   - Multi-step onboarding form (3 steps)
   - FAQ section (4 quick answers)
   - Info cards (location, pricing)

### Reusable Blade Components

Located in `resources/views/components/`:

1. **card.blade.php** - Unified card component with optional hover effect (used for services and philosophy)
2. **faq-item.blade.php** - FAQ question/answer items
3. **value-item.blade.php** - Values section items
4. **tech-list.blade.php** - Tech stack category containers
5. **tech-item.blade.php** - Individual tech stack items
6. **cta-section.blade.php** - Call-to-action sections
7. **onboarding-form.blade.php** - Multi-step contact form
8. **form-input.blade.php** - Form text input field
9. **form-select.blade.php** - Form select dropdown
10. **form-textarea.blade.php** - Form textarea field
11. **form-label.blade.php** - Form field label
12. **form-chip.blade.php** - Selectable chip/tag for services
13. **review-panel.blade.php** - Review panel for form step 3
14. **language-switcher.blade.php** - Language toggle component

### Multi-Step Onboarding Form

**Component**: `resources/views/components/onboarding-form.blade.php`

**Step 1 - Service Selection** (multiple choice):
- Web App
- Mobile App
- Internal Tool
- Automation / AI
- API / Integration
- Rescue a Legacy Project
- Fixed Contract Work
- Build an MVP
- Ongoing Support
- Audit & Code Review

**Step 2 - Contact Information**:
- Full Name (required)
- Company / Team
- Email (required)
- Phone / WhatsApp
- Budget Range (dropdown)
- Timeline (dropdown)
- Project Description (required)
- Tech Notes (optional)

**Step 3 - Review & Submit**:
- Summary of selections
- Edit buttons to go back to previous steps
- Simple math captcha for spam protection
- Submit button

### Contact Form Behavior

- Multi-step wizard with progress bar
- Service selection with visual checkboxes
- Fields validated per step before proceeding
- JavaScript fetch API submission
- Submit JSON to POST /contact with **X-CSRF-TOKEN header**
- Display success/error messages inline
- Loading spinner during submission
- Success state with confirmation message
- Handle 419 (CSRF token expired) gracefully
- Smooth scroll to form on step change

### JavaScript

- No frameworks or external libraries
- Inline in Blade templates with `<script defer>`
- Mobile menu toggle (in layout component)
- Dark theme toggle (in layout component)
- Multi-step form logic (in onboarding-form component)
- All vanilla JavaScript
- Non-blocking with defer attribute

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
- Validate input from multi-step form:
  - `services` (required array, at least 1 selection)
  - `name` (required, max 100)
  - `company` (optional, max 100)
  - `email` (required, valid email, max 200)
  - `phone` (optional, max 50)
  - `budget` (optional, from predefined list)
  - `timeline` (optional, from predefined list)
  - `message` (required, max 2000)
  - `tech_notes` (optional, max 1000)
- Format message with all details before sending
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
2. `routes/web.php` - All routes (home, work, about, contact) with rate limiting
3. `.env` and `.env.example` - Cookie sessions + all notification channel configs
4. `config/services.php` - Clean (Telegram config removed, now in notifications.php)
5. `resources/css/app.css` - Tailwind CSS 4.0 configuration with custom theme

### Created Files

**Backend:**
1. `app/Contracts/ContactNotifier.php` - Interface
2. `app/Services/NotificationManager.php` - Strategy pattern manager
3. `app/Services/TelegramNotifier.php` - Telegram implementation
4. `app/Services/DiscordNotifier.php` - Discord implementation
5. `app/Services/WhatsappNotifier.php` - WhatsApp implementation
6. `app/Services/EmailNotifier.php` - Email implementation
7. `app/Http/Controllers/ContactController.php` - Minimal controller
8. `config/notifications.php` - Notification configuration

**Frontend:**
9. `resources/views/components/layouts/app.blade.php` - Main layout component
10. `resources/views/home.blade.php` - Home page
11. `resources/views/work.blade.php` - Portfolio page
12. `resources/views/about.blade.php` - About page
13. `resources/views/contact.blade.php` - Contact page with onboarding form

**Reusable Components:**
14. `resources/views/components/card.blade.php` - Unified card component
15. `resources/views/components/faq-item.blade.php` - FAQ items
16. `resources/views/components/value-item.blade.php` - Value items
17. `resources/views/components/tech-list.blade.php` - Tech stack lists
18. `resources/views/components/tech-item.blade.php` - Tech stack items
19. `resources/views/components/cta-section.blade.php` - CTA sections
20. `resources/views/components/onboarding-form.blade.php` - Multi-step contact form
21. `resources/views/components/form-input.blade.php` - Form input field
22. `resources/views/components/form-select.blade.php` - Form select dropdown
23. `resources/views/components/form-textarea.blade.php` - Form textarea
24. `resources/views/components/form-label.blade.php` - Form label
25. `resources/views/components/form-chip.blade.php` - Selectable chip
26. `resources/views/components/review-panel.blade.php` - Review panel
27. `resources/views/components/language-switcher.blade.php` - Language switcher

**Tests:**
28. `tests/Feature/ContactControllerTest.php`
29. `tests/Feature/LandingPageTest.php`
30. `tests/Unit/TelegramNotifierTest.php`
31. `tests/Unit/DiscordNotifierTest.php`
32. `tests/Unit/WhatsappNotifierTest.php`
33. `tests/Unit/NotificationManagerTest.php`

## Success Criteria

- ✅ Comprehensive test suite passes
- ✅ All GET routes load with cookie-based session (no server storage)
- ✅ CSRF token in meta tag on all pages
- ✅ Contact form submits via fetch as JSON with CSRF token
- ✅ CSRF protection fully enabled and working
- ✅ Validation errors display properly
- ✅ Multiple notification channels work
- ✅ At least one channel succeeds = success response
- ✅ Rate limiting blocks 6th request within 1 minute
- ✅ No database queries
- ✅ XSS protection in all notifiers
- ✅ Professional architecture with contracts and dependency injection
- ✅ Responsive design (mobile-first)
- ✅ Dark theme toggle with localStorage persistence
- ✅ Accessible navigation with mobile menu
- ✅ Performance optimized (non-blocking JS, cacheable assets)

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

Professional Laravel portfolio website that behaves like a static site on GET requests (fully cacheable), with a robust contact form powered by multi-channel notifications using enterprise-level architecture patterns (Strategy, Dependency Injection, Interface Segregation). Dark theme support ensures accessibility for all users.
