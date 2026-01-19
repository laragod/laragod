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
    <meta property="og:site_name" content="LaraGod Laravel Development">
    <meta property="og:locale" content="{{ app()->getLocale() }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? __('meta.title.default') }}">
    <meta name="twitter:description" content="{{ $description ?? __('meta.description.default') }}">

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

    <!-- Initialize theme before page renders to prevent flash -->
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    {{-- Organization Schema for entity establishment --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "Laragod Laravel Development",
        "alternateName": ["LaraGod", "Laragod", "LaraGod Laravel Development Agency"],
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
            <div class="hidden md:flex md:items-center md:space-x-1">
                <a href="{{ locale_route('home') }}" class="relative px-4 py-2 font-medium text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-200 rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-800/50 {{ request()->routeIs('home') ? 'text-primary' : '' }}">
                    {{ __('nav.home') }}
                    @if(request()->routeIs('home'))
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-primary rounded-full"></span>
                    @endif
                </a>
                <a href="{{ locale_route('work') }}" class="relative px-4 py-2 font-medium text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-200 rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-800/50 {{ request()->routeIs('work') ? 'text-primary' : '' }}">
                    {{ __('nav.work') }}
                    @if(request()->routeIs('work'))
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-primary rounded-full"></span>
                    @endif
                </a>
                <a href="{{ locale_route('about') }}" class="relative px-4 py-2 font-medium text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-200 rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-800/50 {{ request()->routeIs('about') ? 'text-primary' : '' }}">
                    {{ __('nav.about') }}
                    @if(request()->routeIs('about'))
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-primary rounded-full"></span>
                    @endif
                </a>
                <a href="{{ locale_route('contact.show') }}" class="relative px-4 py-2 font-medium text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-200 rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-800/50 {{ request()->routeIs('contact.*') ? 'text-primary' : '' }}">
                    {{ __('nav.contact') }}
                    @if(request()->routeIs('contact.*'))
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-primary rounded-full"></span>
                    @endif
                </a>

                <div class="w-px h-6 bg-gray-200 dark:bg-gray-700 mx-2"></div>

                <!-- Language Switcher -->
                <x-language-switcher />

                <!-- Dark Theme Toggle -->
                <button type="button" id="theme-toggle" class="inline-flex items-center justify-center p-2.5 rounded-xl text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-100/80 dark:hover:bg-gray-800/80 focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all duration-200" aria-label="Toggle dark mode">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <a href="{{ locale_route('contact.show') }}" class="ml-2 btn btn-primary btn-shimmer">
                    {{ __('nav.work_with_us') }}
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center space-x-2">
                <!-- Mobile Dark Theme Toggle -->
                <button type="button" id="theme-toggle-mobile" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary transition-colors" aria-label="Toggle dark mode">
                    <svg id="theme-toggle-dark-icon-mobile" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon-mobile" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary transition-colors">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 dark:border-gray-700">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ locale_route('home') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors {{ request()->routeIs('home') ? 'text-primary bg-primary-light dark:bg-gray-700' : '' }}">
                {{ __('nav.home') }}
            </a>
            <a href="{{ locale_route('work') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors {{ request()->routeIs('work') ? 'text-primary bg-primary-light dark:bg-gray-700' : '' }}">
                {{ __('nav.work') }}
            </a>
            <a href="{{ locale_route('about') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors {{ request()->routeIs('about') ? 'text-primary bg-primary-light dark:bg-gray-700' : '' }}">
                {{ __('nav.about') }}
            </a>
            <a href="{{ locale_route('contact.show') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors {{ request()->routeIs('contact.*') ? 'text-primary bg-primary-light dark:bg-gray-700' : '' }}">
                {{ __('nav.contact') }}
            </a>
            <div class="px-3 pt-4">
                <x-language-switcher class="w-full" />
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
<footer class="relative bg-gray-900 dark:bg-gray-950 text-gray-300 dark:text-gray-400 transition-colors duration-200 overflow-hidden">
    {{-- Background decoration --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-primary/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            <!-- Brand -->
            <div class="col-span-1 md:col-span-1">
                <a href="{{ locale_route('home') }}" class="inline-flex items-center space-x-2 mb-4 group">
                    <span class="text-2xl font-heading font-bold text-white tracking-tight">
                        Lara<span class="text-gradient group-hover:opacity-80 transition-opacity">god</span>
                    </span>
                </a>
                <p class="text-sm text-gray-400 dark:text-gray-500 leading-relaxed">
                    {{ __('footer.tagline') }}
                </p>
                <div class="mt-6 flex items-center gap-3">
                    <a href="https://github.com/laragod" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-gray-800 hover:bg-primary/20 flex items-center justify-center text-gray-400 hover:text-primary transition-all duration-300" aria-label="GitHub">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white font-semibold mb-5 text-sm uppercase tracking-wider">{{ __('footer.quick_links') }}</h3>
                <ul class="space-y-3">
                    <li><a href="{{ locale_route('home') }}" class="text-sm text-gray-400 hover:text-primary hover:translate-x-1 transition-all duration-200 inline-flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-primary/50"></span>{{ __('nav.home') }}</a></li>
                    <li><a href="{{ locale_route('work') }}" class="text-sm text-gray-400 hover:text-primary hover:translate-x-1 transition-all duration-200 inline-flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-primary/50"></span>{{ __('nav.work') }}</a></li>
                    <li><a href="{{ locale_route('about') }}" class="text-sm text-gray-400 hover:text-primary hover:translate-x-1 transition-all duration-200 inline-flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-primary/50"></span>{{ __('nav.about') }}</a></li>
                    <li><a href="{{ locale_route('contact.show') }}" class="text-sm text-gray-400 hover:text-primary hover:translate-x-1 transition-all duration-200 inline-flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-primary/50"></span>{{ __('nav.contact') }}</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-white font-semibold mb-5 text-sm uppercase tracking-wider">{{ __('footer.services.title') }}</h3>
                <ul class="space-y-3">
                    <li class="text-sm text-gray-400 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-gray-600"></span>{{ __('footer.services.custom_web_apps') }}</li>
                    <li class="text-sm text-gray-400 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-gray-600"></span>{{ __('footer.services.api_development') }}</li>
                    <li class="text-sm text-gray-400 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-gray-600"></span>{{ __('footer.services.laravel_filament') }}</li>
                    <li class="text-sm text-gray-400 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-gray-600"></span>{{ __('footer.services.code_modernization') }}</li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-white font-semibold mb-5 text-sm uppercase tracking-wider">{{ __('footer.get_in_touch') }}</h3>
                <ul class="space-y-4">
                    <li class="flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-gray-800 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </span>
                        <span class="text-sm text-gray-400">{{ __('footer.based_in_uk') }}</span>
                    </li>
                    <li>
                        <a href="{{ locale_route('contact.show') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-primary/10 hover:bg-primary/20 text-primary text-sm font-medium transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            {{ __('footer.start_conversation') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-800/50 flex flex-col sm:flex-row justify-between items-center gap-4">
            <p class="text-sm text-gray-500">
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

    // Theme toggle functionality
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleMobileBtn = document.getElementById('theme-toggle-mobile');
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
    const themeToggleDarkIconMobile = document.getElementById('theme-toggle-dark-icon-mobile');
    const themeToggleLightIconMobile = document.getElementById('theme-toggle-light-icon-mobile');

    // Show correct icon on page load
    function updateThemeIcons() {
        if (document.documentElement.classList.contains('dark')) {
            themeToggleLightIcon.classList.remove('hidden');
            themeToggleDarkIcon.classList.add('hidden');
            themeToggleLightIconMobile.classList.remove('hidden');
            themeToggleDarkIconMobile.classList.add('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
            themeToggleLightIcon.classList.add('hidden');
            themeToggleDarkIconMobile.classList.remove('hidden');
            themeToggleLightIconMobile.classList.add('hidden');
        }
    }

    // Toggle theme function
    function toggleTheme() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.theme = 'light';
        } else {
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark';
        }
        updateThemeIcons();
    }

    // Initialize icons
    updateThemeIcons();

    // Add click handlers
    themeToggleBtn.addEventListener('click', toggleTheme);
    themeToggleMobileBtn.addEventListener('click', toggleTheme);

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
    document.querySelectorAll('[data-reveal]').forEach((el, index) => {
        // Add staggered delay for grid children
        if (el.parentElement?.classList.contains('stagger-reveal')) {
            el.dataset.revealDelay = index * 100;
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
