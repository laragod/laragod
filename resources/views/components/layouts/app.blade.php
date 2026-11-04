<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? __('meta.title.default') }}</title>

    {{-- Meta description --}}
    <meta name="description" content="{{ $description ?? __('meta.description.default') }}">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $title ?? __('meta.title.default') }}">
    <meta property="og:description" content="{{ $description ?? __('meta.description.default') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Laragod Laravel Development">
    <meta property="og:locale" content="{{ app()->getLocale() }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? __('meta.title.default') }}">
    <meta name="twitter:description" content="{{ $description ?? __('meta.description.default') }}">

    {{-- Geo tags for local SEO --}}
    <meta name="geo.region" content="GB">
    <meta name="geo.placename" content="United Kingdom">

    {{-- hreflang tags for SEO --}}
    @php
        $currentRouteName = request()->route()?->getName();
        $routeParameters = request()->route()?->parameters() ?? [];
    @endphp
    @if($currentRouteName)
        @foreach(available_locales() as $code => $name)
            <link rel="alternate" hreflang="{{ $code }}" href="{{ route_with_locale($currentRouteName, $code, collect($routeParameters)->except('locale')->toArray()) }}" />
        @endforeach
        <link rel="alternate" hreflang="x-default" href="{{ route_with_locale($currentRouteName, config('localization.default'), collect($routeParameters)->except('locale')->toArray()) }}" />
    @endif

    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|manrope:600,700,800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://api.fontshare.com">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@500,600,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Reveal-on-scroll and the currency toggle both need JS: never hide content without it --}}
    <noscript><style>[data-reveal]{opacity:1;transform:none}[data-currency-switcher]{display:none}</style></noscript>

    {{-- Currency: prices render server-side in the locale default, this only swaps the displayed amount.
         localStorage only, so GET responses stay cacheable and no cookie or session is touched. --}}
    @php
        $offerCurrencies = config('offer.currencies');
        $offerDefaultCurrency = config('offer.default_currency')[app()->getLocale()] ?? array_key_first($offerCurrencies);
    @endphp
    <script>
        window.LaragodCurrency = (function () {
            const formats = @json($offerCurrencies);
            const storageKey = 'laragod_currency';
            const isKnown = code => Object.prototype.hasOwnProperty.call(formats, code);

            function readStored() {
                try {
                    return localStorage.getItem(storageKey);
                } catch (e) {
                    return null;
                }
            }

            function store(code) {
                try {
                    localStorage.setItem(storageKey, code);
                } catch (e) {}
            }

            // Mirrors components/price.blade.php: both sides must produce the same characters.
            function format(amount, code) {
                const f = formats[code];
                const digits = String(amount).replace(/\B(?=(\d{3})+(?!\d))/g, f.group);

                return f.symbol_first ? f.symbol + digits : digits + '\u00A0' + f.symbol;
            }

            const stored = readStored();
            const requested = (new URLSearchParams(window.location.search).get('cur') || '').toUpperCase();
            let current = isKnown(stored) ? stored : @json($offerDefaultCurrency);

            if (isKnown(requested)) {
                current = requested;
                store(current);
            }

            function apply(root) {
                (root || document).querySelectorAll('[data-price]').forEach(el => {
                    const amount = JSON.parse(el.dataset.price)[current];

                    if (typeof amount === 'number') {
                        el.textContent = format(amount, current);
                    }
                });
                document.querySelectorAll('[data-currency-switch]').forEach(button => {
                    button.setAttribute('aria-pressed', String(button.dataset.currencySwitch === current));
                });
            }

            function set(code) {
                if (!isKnown(code)) {
                    return;
                }

                store(code);

                if (code === current) {
                    return;
                }

                current = code;

                // A stale ?cur= would win over this choice on the next reload.
                const url = new URL(window.location.href);
                if (url.searchParams.has('cur')) {
                    url.searchParams.set('cur', code);
                    history.replaceState(history.state, '', url);
                }

                apply();
                document.dispatchEvent(new CustomEvent('currencychange', {bubbles: true, detail: {currency: code}}));
            }

            document.addEventListener('click', event => {
                const button = event.target.closest('[data-currency-switch]');

                if (button) {
                    set(button.dataset.currencySwitch);
                }
            });
            document.addEventListener('DOMContentLoaded', () => apply());

            return {format, apply, set, get current() { return current; }};
        })();
    </script>

    {{-- Carries the audit and configurator summary to the contact form. Kept out of the URL so a
         visitor's answers never reach server logs or analytics. --}}
    <script>
        window.LaragodContactNotes = (function () {
            const storageKey = 'laragod_contact_notes';

            return {
                set(text) {
                    try {
                        sessionStorage.setItem(storageKey, text);
                    } catch (e) {}
                },
                get() {
                    try {
                        return sessionStorage.getItem(storageKey);
                    } catch (e) {
                        return null;
                    }
                },
                clear() {
                    try {
                        sessionStorage.removeItem(storageKey);
                    } catch (e) {}
                },
            };
        })();
    </script>

    <!-- Initialize theme before page renders to prevent flash. Light is the default; dark is opt-in. -->
    <script>
        try {
            document.documentElement.classList.toggle('dark', localStorage.theme === 'dark');
        } catch (e) {}
    </script>

    {{-- Organization Schema for entity establishment --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "Laragod Laravel Development",
        "alternateName": ["Laragod", "Laragod", "Laragod Laravel Development Agency"],
        "url": "https://laragod.com",
        "description": "{{ __('meta.description.default') }}",
        "foundingDate": "2024",
        "address": {
            "@@type": "PostalAddress",
            "addressCountry": "GB"
        },
        "sameAs": [
            "https://github.com/laragod",
            "https://www.linkedin.com/company/laragod"
        ]
    }
    </script>
</head>
<body class="font-sans antialiased bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-300 transition-colors duration-200">
<!-- Google Consent Mode v2 - Must be set BEFORE gtag loads -->
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}

    // Set default consent state (denied until user accepts)
    gtag('consent', 'default', {
        'analytics_storage': 'denied',
        'ad_storage': 'denied',
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
        'wait_for_update': 500
    });

    // Check for stored consent and apply immediately
    (function() {
        try {
            const stored = localStorage.getItem('laragod_analytics_consent');
            if (stored) {
                const data = JSON.parse(stored);
                if (data.version === '1' && data.consent === true) {
                    gtag('consent', 'update', {
                        'analytics_storage': 'granted'
                    });
                }
            }
        } catch (e) {}
    })();
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ config('analytics.google_tag_id') }}"></script>
<script>
    gtag('js', new Date());
    gtag('config', '{{ config('analytics.google_tag_id') }}');
</script>
<!-- Navigation -->
@php
    $navItems = [
        ['route' => 'services', 'label' => __('nav.services'), 'active' => request()->routeIs('services', 'services.show')],
        ['route' => 'pricing', 'label' => __('nav.pricing'), 'active' => request()->routeIs('pricing')],
        ['route' => 'industries', 'label' => __('nav.industries'), 'active' => request()->routeIs('industries', 'industries.show')],
        ['route' => 'work', 'label' => __('nav.work'), 'active' => request()->routeIs('work', 'work.show')],
        ['route' => 'about', 'label' => __('nav.about'), 'active' => request()->routeIs('about')],
        ['route' => 'contact.show', 'label' => __('nav.contact'), 'active' => request()->routeIs('contact.*')],
    ];
@endphp
<nav class="bg-white/80 dark:bg-gray-900/80 border-b border-gray-200/50 dark:border-gray-700/50 sticky top-0 z-50 backdrop-blur-lg transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-18">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ locale_route('home') }}" class="group flex items-center space-x-2">
                    <span class="text-2xl font-heading font-bold text-gray-900 dark:text-white tracking-tight">
                        Lara<span class="text-gradient group-hover:opacity-80 transition-opacity">god</span>
                    </span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex lg:items-center lg:space-x-1">
                @foreach($navItems as $navItem)
                    <a href="{{ locale_route($navItem['route']) }}" class="relative px-3 xl:px-4 py-2 font-medium whitespace-nowrap text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-200 rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-800/50 {{ $navItem['active'] ? 'text-primary' : '' }}">
                        {{ $navItem['label'] }}
                        @if($navItem['active'])
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-primary rounded-full"></span>
                        @endif
                    </a>
                @endforeach

                <div class="w-px h-6 bg-gray-200 dark:bg-gray-700 mx-2"></div>

                <!-- Language Switcher -->
                <x-language-switcher />

                <!-- Theme Toggle: icon at lg, icon and label from xl -->
                <x-theme-toggle class="ml-1" label-class="sr-only xl:not-sr-only" />

                <a href="{{ locale_route('contact.show') }}" class="ml-2 btn btn-primary btn-shimmer whitespace-nowrap">
                    {{ __('nav.work_with_us') }}
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden flex items-center space-x-2">
                <!-- Mobile Theme Toggle -->
                <x-theme-toggle label-class="sr-only" />

                <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary transition-colors">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-200 dark:border-gray-700">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @foreach($navItems as $navItem)
                <a href="{{ locale_route($navItem['route']) }}" class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors {{ $navItem['active'] ? 'text-primary bg-primary-light dark:bg-gray-700' : '' }}">
                    {{ $navItem['label'] }}
                </a>
            @endforeach
            <div class="px-3 pt-4">
                <x-language-switcher class="w-full" />
            </div>
            <div class="px-3 pt-3">
                <x-theme-toggle class="w-full" />
            </div>
            <a href="{{ locale_route('contact.show') }}" class="btn btn-primary block mx-3 mt-4 text-center">
                {{ __('nav.work_with_us') }}
            </a>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main>
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="relative bg-primary-light dark:bg-gray-950 text-gray-700 dark:text-gray-400 transition-colors duration-200 overflow-hidden">
    {{-- Background decoration --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-primary/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Brand -->
        <div class="max-w-xl mb-12">
            <a href="{{ locale_route('home') }}" class="inline-flex items-center space-x-2 mb-4 group">
                <span class="text-2xl font-heading font-bold text-gray-900 dark:text-white tracking-tight">
                    Lara<span class="text-gradient group-hover:opacity-80 transition-opacity">god</span>
                </span>
            </a>
            <p class="text-sm text-gray-700 dark:text-gray-500 leading-relaxed">
                {{ __('footer.tagline') }}
            </p>
            <div class="mt-6 flex items-center gap-3">
                <a href="https://github.com/laragod" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-white dark:bg-gray-800 hover:bg-primary/20 flex items-center justify-center text-gray-700 dark:text-gray-400 hover:text-primary transition-all duration-300" aria-label="GitHub">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        @php
            $footerColumns = [
                __('footer.quick_links') => [
                    [locale_route('work'), __('nav.work')],
                    [locale_route('about'), __('nav.about')],
                    [locale_route('process'), __('nav.how_we_work')],
                    [locale_route('faq'), __('nav.faq')],
                    [locale_route('contact.show'), __('nav.contact')],
                ],
                __('footer.working_together') => [
                    [locale_route('pricing'), __('nav.pricing')],
                    [locale_route('audit'), __('nav.audit')],
                    [locale_route('agencies'), __('nav.agencies')],
                    [locale_route('industries'), __('nav.industries')],
                ],
                __('footer.services.title') => [
                    [locale_route('services.show', ['slug' => 'custom-web-applications']), __('footer.services.custom_web_apps')],
                    [locale_route('services.show', ['slug' => 'api-development']), __('footer.services.api_development')],
                    [locale_route('services.show', ['slug' => 'automation-integrations']), __('footer.services.automation')],
                    [locale_route('services.show', ['slug' => 'filament-admin-panels']), __('footer.services.laravel_filament')],
                    [locale_route('services.show', ['slug' => 'legacy-modernization']), __('footer.services.code_modernization')],
                    [locale_route('services.show', ['slug' => 'technical-consulting']), __('footer.services.consulting')],
                ],
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            @foreach($footerColumns as $footerTitle => $footerLinks)
                <div>
                    <h3 class="text-gray-900 dark:text-white font-semibold mb-5 text-sm uppercase tracking-wider">{{ $footerTitle }}</h3>
                    <ul class="space-y-3">
                        @foreach($footerLinks as [$footerUrl, $footerLabel])
                            <li><a href="{{ $footerUrl }}" class="text-sm text-gray-700 dark:text-gray-400 hover:text-primary-darker dark:hover:text-primary hover:translate-x-1 transition-all duration-200 inline-flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-primary/50"></span>{{ $footerLabel }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <!-- Contact Info -->
            <div>
                <h3 class="text-gray-900 dark:text-white font-semibold mb-5 text-sm uppercase tracking-wider">{{ __('footer.get_in_touch') }}</h3>
                <ul class="space-y-4">
                    <li class="flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-white dark:bg-gray-800 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </span>
                        <span class="text-sm text-gray-700 dark:text-gray-400">{{ __('footer.based_in_uk') }}</span>
                    </li>
                    <li>
                        <a href="{{ locale_route('contact.show') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white dark:bg-primary/10 hover:bg-primary/20 text-primary-darker dark:text-primary text-sm font-medium transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            {{ __('footer.start_conversation') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-primary/20 dark:border-gray-800/50 flex flex-col sm:flex-row justify-between items-center gap-4">
            <p class="text-sm text-gray-600 dark:text-gray-500">
                &copy; {{ date('Y') }} {{ __('footer.copyright') }}
            </p>
            <p class="text-xs text-gray-600 font-mono">
                <span class="text-primary">&lt;</span>{{ __('footer.code_with_care') }}<span class="text-primary">/&gt;</span>
            </p>
        </div>
    </div>
</footer>

<!-- Mobile Menu & Theme Toggle Scripts -->
<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    // Theme toggle: every button shares one state, and its icon and label follow the .dark class through CSS
    document.querySelectorAll('[data-theme-toggle]').forEach(function (button) {
        button.addEventListener('click', function () {
            const isDark = document.documentElement.classList.toggle('dark');

            try {
                localStorage.theme = isDark ? 'dark' : 'light';
            } catch (e) {}
        });
    });

    // Scroll Reveal Observer
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Add staggered delay based on element position in viewport
                const delay = entry.target.dataset.revealDelay || 0;
                setTimeout(() => {
                    entry.target.classList.add('revealed');
                }, delay);
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    // Observe all elements with data-reveal attribute
    document.querySelectorAll('[data-reveal]').forEach(el => {
        // Add staggered delay for grid children, counted within their own grid
        if (el.parentElement?.classList.contains('stagger-reveal')) {
            el.dataset.revealDelay = Math.min([...el.parentElement.children].indexOf(el), 8) * 100;
        }
        revealObserver.observe(el);
    });

    // Page load animations
    document.querySelectorAll('.animate-on-load').forEach((el, index) => {
        el.style.animationDelay = `${index * 0.1}s`;
    });
</script>

{{-- GDPR Consent Banner --}}
<x-consent-banner />
</body>
</html>
