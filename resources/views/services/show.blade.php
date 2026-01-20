<x-layouts.app
    :title="__('services.' . $service['key'] . '.meta_title', ['default' => __('services.' . $service['key'] . '.title') . ' | Laragod'])"
    :description="__('services.' . $service['key'] . '.meta_description', ['default' => __('services.' . $service['key'] . '.description')])">

    {{-- Service Schema Markup --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Service",
        "name": "{{ __('services.' . $service['key'] . '.title') }}",
        "description": "{{ __('services.' . $service['key'] . '.description') }}",
        "provider": {
            "@@type": "Organization",
            "name": "Laragod Laravel Development",
            "url": "https://laragod.com"
        },
        "areaServed": {
            "@@type": "Country",
            "name": "United Kingdom"
        },
        "serviceType": "Laravel Development"
    }
    </script>

    {{-- Breadcrumbs --}}
    <x-breadcrumbs :items="[
        ['label' => __('nav.home'), 'url' => locale_route('home')],
        ['label' => __('nav.services'), 'url' => locale_route('services')],
        ['label' => __('services.' . $service['key'] . '.title'), 'url' => null],
    ]" />

    {{-- Hero Section --}}
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200 overflow-hidden">
        {{-- Background decorations --}}
        <div class="absolute inset-0 bg-mesh-gradient"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl">
                {{-- Icon --}}
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center mb-8 animate-fade-in-up">
                    @switch($service['icon'])
                        @case('code')
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                            @break
                        @case('terminal')
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            @break
                        @case('layout')
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            @break
                        @case('rocket')
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            @break
                        @case('refresh')
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            @break
                        @case('shield')
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            @break
                        @case('users')
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            @break
                        @case('server')
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                            </svg>
                            @break
                        @case('user-plus')
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            @break
                    @endswitch
                </div>

                <h1 class="animate-fade-in-up text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white leading-tight" style="animation-delay: 0.1s">
                    {{ __('services.' . $service['key'] . '.hero_heading', ['default' => __('services.' . $service['key'] . '.title')]) }}
                </h1>
                <p class="animate-fade-in-up mt-6 text-xl text-gray-600 dark:text-gray-400 leading-relaxed" style="animation-delay: 0.2s">
                    {{ __('services.' . $service['key'] . '.hero_description', ['default' => __('services.' . $service['key'] . '.description')]) }}
                </p>

                <div class="animate-fade-in-up mt-8 flex flex-wrap gap-4" style="animation-delay: 0.3s">
                    <a href="{{ locale_route('contact.show') }}" class="btn btn-primary btn-shimmer px-8 py-4">
                        {{ __('services.get_started') }}
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Problems Section --}}
    @if(__('services.' . $service['key'] . '.problems') !== 'services.' . $service['key'] . '.problems')
    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="absolute inset-0 bg-noise"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl lg:text-4xl font-heading font-bold text-gray-900 dark:text-white mb-8 text-center" data-reveal>
                    {{ __('services.problems_title') }}
                </h2>

                <div class="space-y-4" data-reveal>
                    @foreach(__('services.' . $service['key'] . '.problems') as $problem)
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50">
                            <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                                <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </span>
                            <p class="text-gray-700 dark:text-gray-300">{{ $problem }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- Approach Section --}}
    @if(__('services.' . $service['key'] . '.approach.title') !== 'services.' . $service['key'] . '.approach.title')
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl lg:text-4xl font-heading font-bold text-gray-900 dark:text-white mb-8 text-center" data-reveal>
                    {{ __('services.' . $service['key'] . '.approach.title') }}
                </h2>

                <div class="space-y-6" data-reveal>
                    @foreach(__('services.' . $service['key'] . '.approach.steps') as $index => $step)
                        <div class="flex gap-6 p-6 rounded-2xl bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50">
                            <span class="flex-shrink-0 w-10 h-10 rounded-full bg-primary text-white font-bold flex items-center justify-center">
                                {{ $index + 1 }}
                            </span>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $step['title'] }}</h3>
                                <p class="text-gray-600 dark:text-gray-400">{{ $step['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- FAQ Section --}}
    @if(__('services.' . $service['key'] . '.faq') !== 'services.' . $service['key'] . '.faq')
    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="absolute inset-0 bg-noise"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl lg:text-4xl font-heading font-bold text-gray-900 dark:text-white mb-8 text-center" data-reveal>
                    {{ __('services.faq_title') }}
                </h2>

                <div class="space-y-4" data-reveal>
                    @foreach(__('services.' . $service['key'] . '.faq') as $faq)
                        <x-faq-item :question="$faq['question']">
                            {{ $faq['answer'] }}
                        </x-faq-item>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Schema --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "FAQPage",
        "mainEntity": [
            @foreach(__('services.' . $service['key'] . '.faq') as $index => $faq)
            {
                "@@type": "Question",
                "name": "{{ $faq['question'] }}",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "{{ $faq['answer'] }}"
                }
            }@if(!$loop->last),@endif
            @endforeach
        ]
    }
    </script>
    @endif

    {{-- Other Services --}}
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl lg:text-4xl font-heading font-bold text-gray-900 dark:text-white mb-8 text-center" data-reveal>
                {{ __('services.other_services') }}
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 stagger-reveal">
                @foreach($allServices as $otherSlug => $otherService)
                    @if($otherSlug !== $slug)
                        <a href="{{ locale_route('services.show', ['slug' => $otherSlug]) }}" class="group block p-6 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50 hover:border-primary/20 transition-all" data-reveal>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 group-hover:text-primary transition-colors">
                                {{ __("services.{$otherService['key']}.title") }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-2">
                                {{ __("services.{$otherService['key']}.description") }}
                            </p>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <x-cta-section
        :heading="__('services.cta.heading')"
        :description="__('services.cta.description')"
        :buttonText="__('nav.work_with_us')"
        :buttonUrl="locale_route('contact.show')"
        background="gray">
    </x-cta-section>
</x-layouts.app>
