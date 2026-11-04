<x-layouts.app :title="__('meta.title.home')" :description="__('meta.description.home')">
    <!-- Hero Section -->
    <section class="relative bg-white dark:bg-gray-900 py-24 lg:py-36 transition-colors duration-200 overflow-hidden">
        {{-- Background decorations --}}
        <div class="absolute inset-0 bg-mesh-gradient"></div>
        <div class="absolute inset-0 bg-grid opacity-50"></div>

        {{-- Floating decorative elements --}}
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>

        {{-- Code bracket decorations --}}
        <div class="hidden xl:block absolute top-32 left-[6%] text-primary/20 font-mono text-8xl font-bold select-none">{</div>
        <div class="hidden xl:block absolute bottom-32 right-[6%] text-primary/20 font-mono text-8xl font-bold select-none">}</div>

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

                <h1 class="animate-fade-in-up text-3xl min-[360px]:text-4xl sm:text-5xl lg:text-6xl font-heading font-bold text-gray-900 dark:text-white leading-[1.1] tracking-tight text-hero" style="animation-delay: 0.1s">
                    {{ __('home.hero.title_part1') }}<br>
                    <span class="text-gradient">{{ __('home.hero.title_part2') }}</span>
                </h1>
                <p class="animate-fade-in-up mt-8 text-xl lg:text-2xl text-gray-600 dark:text-gray-400 leading-relaxed max-w-3xl mx-auto" style="animation-delay: 0.2s">
                    {{ __('home.hero.description') }}
                </p>
                <div class="animate-fade-in-up mt-12 flex flex-col sm:flex-row sm:flex-wrap gap-4 justify-center" style="animation-delay: 0.3s">
                    <a href="{{ locale_route('contact.show') }}" class="group btn btn-primary btn-shimmer px-10 py-4 text-lg">
                        {{ __('home.hero.cta_call') }}
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <a href="{{ locale_route('audit') }}" class="btn btn-outline px-10 py-4 text-lg">
                        {{ __('home.hero.cta_audit') }}
                    </a>
                </div>
                <p class="animate-fade-in-up mt-6" style="animation-delay: 0.35s">
                    <a href="{{ locale_route('pricing') }}" class="inline-flex items-center font-semibold text-primary hover:underline">
                        {{ __('home.hero.cta_pricing') }}
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </p>
            </div>
        </div>
    </section>

    <!-- Pains Section -->
    <section class="relative bg-gray-50 dark:bg-gray-800 py-20 lg:py-28 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :badge="__('home.pains.badge')" :title="__('home.pains.title')" :description="__('home.pains.description')" />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 stagger-reveal">
                @foreach(__('home.pains.items') as $pain)
                    <div class="h-full p-8 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50 shadow-sm" data-reveal>
                        <h3 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-3">{{ $pain['question'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $pain['answer'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section class="relative bg-white dark:bg-gray-900 py-20 lg:py-28 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :badge="__('home.packages.badge')" :title="__('home.packages.title')" :description="__('home.packages.description')" class="!mb-8" />

            <div class="flex justify-center mb-10">
                <x-currency-switcher />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 stagger-reveal">
                @foreach(config('offer.packages') as $key => $package)
                    <a href="{{ locale_route('pricing') }}#{{ $key }}" class="group block" data-reveal>
                        <div class="flex flex-col h-full p-8 rounded-2xl bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50 shadow-sm hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                            <h3 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors">{{ __("offer.packages.{$key}.title") }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-6">{{ __("offer.packages.{$key}.tagline") }}</p>
                            <div class="mt-auto">
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('offer.from') }}</p>
                                <p class="text-3xl font-heading font-bold text-gray-900 dark:text-white whitespace-nowrap"><x-price :prices="$package['from']" /></p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __("offer.period.{$package['period']}") }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-10 text-center" data-reveal>
                <a href="{{ locale_route('pricing') }}" class="btn btn-primary btn-shimmer">{{ __('home.packages.cta') }}</a>
                <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">{{ __('offer.net_note') }}</p>
            </div>
        </div>
    </section>

    <!-- Industries Section -->
    <section class="relative bg-gray-50 dark:bg-gray-800 py-20 lg:py-28 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :badge="__('home.industries.badge')" :title="__('home.industries.title')" :description="__('home.industries.description')" />

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 stagger-reveal">
                @foreach(array_keys(config('offer.industries')) as $industrySlug)
                    <a href="{{ locale_route('industries.show', ['slug' => $industrySlug]) }}" class="group block" data-reveal>
                        <div class="flex flex-col h-full p-8 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50 shadow-sm hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                            <h3 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors">{{ __("industries.items.{$industrySlug}.title") }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">{{ __("industries.items.{$industrySlug}.excerpt") }}</p>
                            <span class="mt-auto inline-flex items-center text-primary font-medium text-sm">
                                {{ __('home.industries.cta') }}
                                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Proof Section -->
    <section class="relative bg-white dark:bg-gray-900 py-20 lg:py-28 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :badge="__('home.proof.badge')" :title="__('home.proof.title')" :description="__('home.proof.description')" />

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 stagger-reveal">
                @foreach($projects as $project)
                    <a href="{{ locale_route('work.show', ['slug' => $project['slug']]) }}" class="group block" data-reveal>
                        <div class="flex flex-col h-full p-8 rounded-2xl bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50 shadow-sm hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                            <h4 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors">{{ $project['title'] }}</h4>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">{{ $project['excerpt'] }}</p>
                            <span class="mt-auto inline-flex items-center text-primary font-medium text-sm">
                                {{ __('home.proof.view_project') }}
                                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-10 text-center" data-reveal>
                <a href="https://github.com/laragod" target="_blank" rel="noopener" class="btn btn-outline">{{ __('home.proof.view_code') }}</a>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="relative bg-gray-50 dark:bg-gray-800 py-20 lg:py-28 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :badge="__('home.process.badge')" :title="__('home.process.title')" :description="__('home.process.description')" />

            <ol class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 stagger-reveal">
                @foreach(__('process.steps') as $index => $step)
                    <li class="flex items-center gap-4 p-5 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50" data-reveal>
                        <span class="flex-shrink-0 w-10 h-10 rounded-full bg-primary text-white font-bold flex items-center justify-center">{{ $index + 1 }}</span>
                        <span>
                            <span class="block font-semibold text-gray-900 dark:text-white">{{ $step['title'] }}</span>
                            <span class="block text-sm text-gray-500 dark:text-gray-400">{{ $step['duration'] }}</span>
                        </span>
                    </li>
                @endforeach
            </ol>

            <div class="mt-10 text-center" data-reveal>
                <a href="{{ locale_route('process') }}" class="btn btn-outline">{{ __('home.process.cta') }}</a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="relative bg-white dark:bg-gray-900 py-20 lg:py-28 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :badge="__('home.faq.badge')" :title="__('home.faq.title')" />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 stagger-reveal">
                @foreach(__('faq.groups') as $group)
                    @foreach(array_slice($group['items'], 0, 2) as $item)
                        <div data-reveal>
                            <x-faq-item :question="$item['question']">{{ $item['answer'] }}</x-faq-item>
                        </div>
                    @endforeach
                @endforeach
            </div>

            <div class="mt-10 text-center" data-reveal>
                <a href="{{ locale_route('faq') }}" class="btn btn-outline">{{ __('home.faq.cta') }}</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <x-cta-section
        :heading="e(__('home.cta.heading'))"
        :description="__('home.cta.description')"
        :buttonText="__('nav.work_with_us')"
        :buttonUrl="locale_route('contact.show')"
        background="gray">
    </x-cta-section>
</x-layouts.app>
