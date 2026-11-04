<x-layouts.app :title="__('meta.title.about')" :description="__('meta.description.about')">
    <!-- Hero Section -->
    <section class="relative bg-white dark:bg-gray-900 py-24 lg:py-36 transition-colors duration-200 overflow-hidden">
        {{-- Background decorations --}}
        <div class="absolute inset-0 bg-mesh-gradient"></div>
        <div class="absolute inset-0 bg-grid opacity-40"></div>

        {{-- Floating elements --}}
        <div class="absolute top-32 right-20 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-80 h-80 bg-primary/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <div class="animate-fade-in-up inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 dark:bg-primary/20 border border-primary/20 mb-8">
                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="text-sm font-medium text-primary">{{ __('about.hero.badge') }}</span>
                </div>

                <h1 class="animate-fade-in-up text-5xl lg:text-7xl font-heading font-bold text-gray-900 dark:text-white leading-[1.1] tracking-tight text-hero" style="animation-delay: 0.1s">
                    {{ __('about.hero.title_part1') }}<br>
                    <span class="text-gradient">{{ __('about.hero.title_part2') }}</span>
                </h1>
                <p class="animate-fade-in-up mt-8 text-xl lg:text-2xl text-gray-600 dark:text-gray-400 leading-relaxed" style="animation-delay: 0.2s">
                    {{ __('about.hero.description') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Founder -->
    <section class="bg-white dark:bg-gray-900 pb-16 lg:pb-24 transition-colors duration-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row gap-6 bg-gray-50 dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 p-8 lg:p-12" data-reveal>
                <div class="icon-box icon-box-lg" aria-hidden="true">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-3xl font-heading font-bold text-gray-900 dark:text-white">{{ __('about.founder.title') }}</h2>
                    <p class="mt-3 font-semibold text-gray-900 dark:text-white">
                        {{ __('about.founder.name') }}
                        <span class="font-medium text-gray-500 dark:text-gray-400">&middot; {{ __('about.founder.role') }}</span>
                    </p>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 leading-relaxed">{{ __('about.founder.bio') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Origin Story -->
    <section class="bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-8 lg:p-12">
                <h2 class="text-3xl font-heading font-bold text-gray-900 dark:text-white mb-6">{{ __('about.origin.title') }}</h2>
                <div class="prose prose-lg max-w-none text-gray-600 dark:text-gray-400 space-y-4">
                    <p>
                        {{ __('about.origin.paragraph1') }}
                    </p>
                    <p>
                        {{ __('about.origin.paragraph2') }}
                    </p>
                    <p>
                        {{ __('about.origin.paragraph3') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy -->
    <section class="bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">{{ __('about.philosophy.title') }}</h2>
                <p class="mt-4 text-xl text-gray-600 dark:text-gray-400">{{ __('about.philosophy.description') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Quick Wins vs Lasting Foundations -->
                <x-card :title="__('about.philosophy.foundations.title')">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </x-slot:icon>
                    {{ __('about.philosophy.foundations.description') }}
                </x-card>

                <!-- Code Quality -->
                <x-card :title="__('about.philosophy.quality.title')">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </x-slot:icon>
                    {{ __('about.philosophy.quality.description') }}
                </x-card>

                <!-- Developer Experience -->
                <x-card :title="__('about.philosophy.dx.title')">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                        </svg>
                    </x-slot:icon>
                    {{ __('about.philosophy.dx.description') }}
                </x-card>

                <!-- Honest Communication -->
                <x-card :title="__('about.philosophy.honesty.title')">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </x-slot:icon>
                    {{ __('about.philosophy.honesty.description') }}
                </x-card>
            </div>
        </div>
    </section>

    <!-- Tech Stack -->
    <section class="bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">{{ __('about.tech_stack.title') }}</h2>
                <p class="mt-4 text-xl text-gray-600 dark:text-gray-400">{{ __('about.tech_stack.description') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Backend -->
                <x-tech-list :title="__('about.tech_stack.backend')">
                    <x-slot:icon>
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                        </svg>
                    </x-slot:icon>
                    <x-tech-item>PHP</x-tech-item>
                    <x-tech-item>Laravel</x-tech-item>
                    <x-tech-item>Filament / Laravel Nova</x-tech-item>
                    <x-tech-item>PostgreSQL / MySQL</x-tech-item>
                    <x-tech-item>Node.js / Express</x-tech-item>
                </x-tech-list>

                <!-- Frontend -->
                <x-tech-list :title="__('about.tech_stack.frontend')">
                    <x-slot:icon>
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </x-slot:icon>
                    <x-tech-item>Vue.js / Nuxt</x-tech-item>
                    <x-tech-item>TypeScript</x-tech-item>
                    <x-tech-item>Tailwind CSS</x-tech-item>
                    <x-tech-item>Alpine.js / Livewire</x-tech-item>
                    <x-tech-item>Electron (desktop apps)</x-tech-item>
                </x-tech-list>

                <!-- Tools & Infrastructure -->
                <x-tech-list :title="__('about.tech_stack.tools_devops')">
                    <x-slot:icon>
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </x-slot:icon>
                    <x-tech-item>PHPStan / Pest / Pint / Mago</x-tech-item>
                    <x-tech-item>GitHub Actions / CI/CD</x-tech-item>
                    <x-tech-item>AWS / Digital Ocean / Self-hosted</x-tech-item>
                    <x-tech-item>3rd Party Integrations</x-tech-item>
                    <x-tech-item>Jira / Trello / Asana / ADO</x-tech-item>
                </x-tech-list>
            </div>
        </div>
    </section>

    <!-- Open Source -->
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200 overflow-hidden">
        {{-- Background decorations --}}
        <div class="absolute inset-0 bg-mesh-gradient opacity-50"></div>
        <div class="absolute inset-0 bg-grid opacity-30"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-reveal>
                <h2 class="text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">{{ __('about.open_source.title') }}</h2>
                <p class="mt-4 text-xl text-gray-600 dark:text-gray-400">{{ __('about.open_source.description') }}</p>
                <p class="mt-3 text-base text-gray-500 dark:text-gray-500">{{ __('about.open_source.maintainer') }}</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
                @foreach ([
                    'phpskills' => [
                        'github' => 'https://github.com/laragod/PHPSkills',
                        'packagist' => 'https://packagist.org/packages/laragod/phpskills',
                        'facts' => ['fact_versions', 'fact_quality', 'fact_coverage', 'fact_installs'],
                        'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                    ],
                    'toolkit' => [
                        'github' => 'https://github.com/laragod/toolkit',
                        'packagist' => 'https://packagist.org/packages/laragod/toolkit',
                        'facts' => ['fact_versions', 'fact_license', 'fact_usage'],
                        'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
                    ],
                ] as $package => $meta)
                    <article class="group relative flex flex-col bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/50 shadow-sm p-8 transition-all duration-500 ease-out hover:shadow-xl hover:shadow-primary/5 hover:-translate-y-1 hover:border-primary/20 dark:hover:border-primary/30" data-reveal>
                        <div class="flex items-start justify-between gap-4 mb-6">
                            <div class="icon-box icon-box-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $meta['icon'] }}"></path>
                                </svg>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-primary/10 dark:bg-primary/20 border border-primary/20 text-xs font-semibold uppercase tracking-wider text-primary">{{ __("about.open_source.{$package}.role") }}</span>
                        </div>

                        <h3 class="font-mono text-xl font-bold text-gray-900 dark:text-white group-hover:text-primary transition-colors duration-300">{{ __("about.open_source.{$package}.name") }}</h3>
                        <p class="mt-1 text-sm font-medium text-primary">{{ __("about.open_source.{$package}.tagline") }}</p>
                        <p class="mt-4 text-gray-600 dark:text-gray-400 leading-relaxed">{{ __("about.open_source.{$package}.description") }}</p>

                        <ul class="mt-6 flex flex-wrap gap-2">
                            @foreach ($meta['facts'] as $fact)
                                <li class="inline-flex items-center px-3 py-1 rounded-lg bg-gray-100 dark:bg-gray-900/60 text-xs font-medium text-gray-700 dark:text-gray-300">{{ __("about.open_source.{$package}.{$fact}") }}</li>
                            @endforeach
                        </ul>

                        <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-700/50 flex flex-wrap items-center gap-3">
                            <a href="{{ $meta['github'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-900/60 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                                {{ __('about.open_source.github') }}
                            </a>
                            <a href="{{ $meta['packagist'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2 bg-primary hover:bg-primary-dark text-white text-sm font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                {{ __('about.open_source.packagist') }}
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Values -->
    <section class="bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">{{ __('about.values.title') }}</h2>
            </div>

            <div class="space-y-12">
                <!-- Craftsmanship -->
                <x-value-item :title="__('about.values.craftsmanship.title')">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </x-slot:icon>
                    {{ __('about.values.craftsmanship.description') }}
                </x-value-item>

                <!-- Transparency -->
                <x-value-item :title="__('about.values.transparency.title')">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </x-slot:icon>
                    {{ __('about.values.transparency.description') }}
                </x-value-item>

                <!-- Long-term Thinking -->
                <x-value-item :title="__('about.values.long_term.title')">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </x-slot:icon>
                    {{ __('about.values.long_term.description') }}
                </x-value-item>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <x-cta-section
        :heading="__('about.cta.heading')"
        :description="__('about.cta.description')"
        :buttonText="__('nav.work_with_us')"
        :buttonUrl="locale_route('contact.show')"
        background="gray">
    </x-cta-section>
</x-layouts.app>
