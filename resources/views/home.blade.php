<x-layouts.app :title="__('meta.title.home')" :description="__('meta.description.home')">
    <!-- Hero Section -->
    <section class="relative bg-white dark:bg-gray-900 py-24 lg:py-40 transition-colors duration-200 overflow-hidden">
        {{-- Background decorations --}}
        <div class="absolute inset-0 bg-mesh-gradient"></div>
        <div class="absolute inset-0 bg-grid opacity-50"></div>

        {{-- Floating decorative elements --}}
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>

        {{-- Code bracket decorations --}}
        <div class="hidden lg:block absolute top-32 left-[10%] text-primary/20 font-mono text-8xl font-bold select-none">{</div>
        <div class="hidden lg:block absolute bottom-32 right-[10%] text-primary/20 font-mono text-8xl font-bold select-none">}</div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-5xl mx-auto">
                {{-- Brand tagline for entity establishment --}}
                <p class="text-sm font-semibold text-gray-500 dark:text-gray-400 tracking-widest uppercase mb-4">
                    {{ __('home.hero.brand_tagline') }}
                </p>

                {{-- Badge --}}
                <div class="animate-fade-in-up inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 dark:bg-primary/20 border border-primary/20 mb-8">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                    </span>
                    <span class="text-sm font-medium text-primary">{{ __('home.hero.badge') }}</span>
                </div>

                <h1 class="animate-fade-in-up text-5xl lg:text-7xl font-heading font-bold text-gray-900 dark:text-white leading-[1.1] tracking-tight text-hero" style="animation-delay: 0.1s">
                    {{ __('home.hero.title_part1') }}<br>
                    <span class="text-gradient">{{ __('home.hero.title_part2') }}</span>
                </h1>
                <p class="animate-fade-in-up mt-8 text-xl lg:text-2xl text-gray-600 dark:text-gray-400 leading-relaxed max-w-3xl mx-auto" style="animation-delay: 0.2s">
                    {{ __('home.hero.description') }}
                </p>
                <div class="animate-fade-in-up mt-12 flex flex-col sm:flex-row gap-4 justify-center" style="animation-delay: 0.3s">
                    <a href="{{ locale_route('contact.show') }}" class="btn btn-primary btn-shimmer px-10 py-4 text-lg">
                        {{ __('nav.work_with_us') }}
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <a href="{{ locale_route('work') }}" class="btn btn-outline px-10 py-4 text-lg">
                        {{ __('home.hero.view_our_work') }}
                    </a>
                </div>
                <p class="animate-fade-in-up mt-8 text-sm text-gray-500 dark:text-gray-500 flex items-center justify-center gap-3" style="animation-delay: 0.4s">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        {{ __('home.hero.experience_years') }}
                    </span>
                    <span class="w-1 h-1 rounded-full bg-gray-400"></span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        {{ __('home.hero.laravel_years') }}
                    </span>
                </p>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="relative bg-gray-50 dark:bg-gray-800 py-20 lg:py-32 transition-colors duration-200 overflow-hidden">
        {{-- Subtle texture --}}
        <div class="absolute inset-0 bg-noise"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <div data-reveal>
                    <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wide uppercase mb-6">{{ __('home.philosophy.badge') }}</span>
                    <h2 class="text-3xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white leading-tight">
                        {{ __('home.philosophy.title_part1') }} <span class="text-gradient">{{ __('home.philosophy.title_part2') }}</span> {{ __('home.philosophy.title_part3') }}
                    </h2>
                </div>
                <div class="mt-8 text-lg lg:text-xl text-gray-600 dark:text-gray-400 space-y-6" data-reveal style="--reveal-delay: 0.1s">
                    <p class="leading-relaxed">
                        {{ __('home.philosophy.paragraph1') }}
                    </p>
                    <p class="leading-relaxed">
                        {{ __('home.philosophy.paragraph2') }}
                    </p>
                    <p class="font-semibold text-gray-900 dark:text-white text-xl lg:text-2xl pt-4 border-l-4 border-primary pl-6 text-left">
                        {{ __('home.philosophy.quote') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="relative bg-white dark:bg-gray-900 py-20 lg:py-32 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20" data-reveal>
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wide uppercase mb-4">{{ __('home.services.badge') }}</span>
                <h2 class="mt-2 text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">{{ __('home.services.title') }}</h2>
                <p class="mt-6 text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">{{ __('home.services.description') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 stagger-reveal">
                <!-- Service 1 -->
                <div data-reveal>
                    <x-card :hover="true" :title="__('services.custom_web_apps.title')">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </x-slot:icon>
                        {{ __('services.custom_web_apps.description') }}
                    </x-card>
                </div>

                <!-- Service 2 -->
                <div data-reveal>
                    <x-card :hover="true" :title="__('services.api_development.title')">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </x-slot:icon>
                        {{ __('services.api_development.description') }}
                    </x-card>
                </div>

                <!-- Service 3 -->
                <div data-reveal>
                    <x-card :hover="true" :title="__('services.laravel_filament.title')">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </x-slot:icon>
                        {{ __('services.laravel_filament.description') }}
                    </x-card>
                </div>

                <!-- Service 4 -->
                <div data-reveal>
                    <x-card :hover="true" :title="__('services.mvp_development.title')">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </x-slot:icon>
                        {{ __('services.mvp_development.description') }}
                    </x-card>
                </div>

                <!-- Service 5 -->
                <div data-reveal>
                    <x-card :hover="true" :title="__('services.legacy_modernization.title')">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </x-slot:icon>
                        {{ __('services.legacy_modernization.description') }}
                    </x-card>
                </div>

                <!-- Service 6 -->
                <div data-reveal>
                    <x-card :hover="true" :title="__('services.code_quality.title')">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </x-slot:icon>
                        {{ __('services.code_quality.description') }}
                    </x-card>
                </div>

                <!-- Service 7 -->
                <div data-reveal>
                    <x-card :hover="true" :title="__('services.consulting.title')">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </x-slot:icon>
                        {{ __('services.consulting.description') }}
                    </x-card>
                </div>

                <!-- Service 8 -->
                <div data-reveal>
                    <x-card :hover="true" :title="__('services.devops.title')">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                            </svg>
                        </x-slot:icon>
                        {{ __('services.devops.description') }}
                    </x-card>
                </div>

                <!-- Service 9 -->
                <div data-reveal>
                    <x-card :hover="true" :title="__('services.team_augmentation.title')">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </x-slot:icon>
                        {{ __('services.team_augmentation.description') }}
                    </x-card>
                </div>
            </div>
        </div>
    </section>

    <!-- How We Work Section -->
    <section class="relative bg-gray-50 dark:bg-gray-800 py-20 lg:py-32 transition-colors duration-200 overflow-hidden">
        {{-- Background texture --}}
        <div class="absolute inset-0 bg-noise"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-reveal>
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wide uppercase mb-4">{{ __('home.pricing.badge') }}</span>
                <h2 class="mt-2 text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">{{ __('home.pricing.title') }}</h2>
                <p class="mt-6 text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    {{ __('home.pricing.description') }}
                </p>
            </div>

            <div class="max-w-5xl mx-auto">
                {{-- Primary: Engagement Models --}}
                <div class="relative bg-white dark:bg-gray-900 rounded-3xl shadow-2xl shadow-primary/5 border border-gray-100 dark:border-gray-700/50 p-8 lg:p-12 overflow-hidden mb-8" data-reveal="scale">
                    {{-- Decorative gradient corner --}}
                    <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-bl from-primary/10 via-transparent to-transparent"></div>

                    <h3 class="relative text-2xl font-bold text-gray-900 dark:text-white mb-8 flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </span>
                        {{ __('home.pricing.engagements_title') }}
                    </h3>

                    <div class="space-y-6">
                        @foreach(__('home.pricing.engagements') as $engagement)
                            <div class="group p-6 rounded-2xl bg-gray-50 dark:bg-gray-800/50 border border-gray-100 dark:border-gray-700/50 hover:border-primary/20 transition-colors">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 group-hover:text-primary transition-colors">
                                    {{ $engagement['title'] }}
                                </h4>
                                <p class="text-gray-600 dark:text-gray-400">
                                    {{ $engagement['description'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-10 pt-8 border-t border-gray-200 dark:border-gray-700/50">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                            <div>
                                <p class="text-gray-500 dark:text-gray-400 text-sm mb-1">{{ __('home.pricing.starting_from') }}</p>
                                <p class="text-2xl font-heading font-bold text-gray-900 dark:text-white">{{ __('home.pricing.starting_amount') }}</p>
                            </div>
                            <a href="{{ locale_route('contact.show') }}" class="btn btn-primary btn-shimmer px-8 py-4 text-lg">
                                {{ __('home.pricing.start_conversation') }}
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Secondary: Hands-on Engineering (subordinated) --}}
                <div class="relative bg-white/50 dark:bg-gray-900/50 rounded-2xl border border-gray-200 dark:border-gray-700/50 p-6 lg:p-8" data-reveal>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-1">
                                {{ __('home.pricing.hands_on_title') }}
                            </h4>
                            <p class="text-gray-500 dark:text-gray-400 text-sm">
                                {{ __('home.pricing.hands_on_description') }}
                            </p>
                        </div>
                        <div class="text-right flex-shrink-0">
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('home.pricing.hands_on_rate') }}</p>
                            <p class="text-xl font-semibold text-gray-700 dark:text-gray-300">{{ __('home.pricing.hands_on_amount') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <x-cta-section
        :heading="__('home.cta.heading')"
        :description="__('home.cta.description')"
        :buttonText="__('nav.work_with_us')"
        :buttonUrl="locale_route('contact.show')"
        background="white">
    </x-cta-section>
</x-layouts.app>
