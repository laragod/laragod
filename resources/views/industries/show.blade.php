<x-layouts.app :title="__('industries.items.' . $slug . '.meta_title')" :description="__('industries.items.' . $slug . '.meta_description')">
    <x-breadcrumbs :items="[
        ['label' => __('nav.home'), 'url' => locale_route('home')],
        ['label' => __('nav.industries'), 'url' => locale_route('industries')],
        ['label' => __('industries.items.' . $slug . '.title'), 'url' => null],
    ]" />

    {{-- Hero --}}
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200 overflow-hidden">
        <div class="absolute inset-0 bg-mesh-gradient"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl">
                <h1 class="animate-fade-in-up text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white leading-tight">
                    {{ __("industries.items.{$slug}.hero_heading") }}
                </h1>
                <p class="animate-fade-in-up mt-6 text-xl text-gray-600 dark:text-gray-400 leading-relaxed" style="animation-delay: 0.1s">
                    {{ __("industries.items.{$slug}.hero_description") }}
                </p>
                <div class="animate-fade-in-up mt-8" style="animation-delay: 0.2s">
                    <a href="{{ locale_route('contact.show') }}" class="btn btn-primary btn-shimmer px-8 py-4">{{ __('nav.work_with_us') }}</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Pains --}}
    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl lg:text-4xl font-heading font-bold text-gray-900 dark:text-white mb-8 text-center" data-reveal>
                    {{ __('industries.labels.pains') }}
                </h2>

                <div class="space-y-4" data-reveal>
                    @foreach(__("industries.items.{$slug}.pains") as $pain)
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50">
                            <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                                <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </span>
                            <p class="text-gray-700 dark:text-gray-300">{{ $pain }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Solutions --}}
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :title="__('industries.labels.solutions')" />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 stagger-reveal">
                @foreach(__("industries.items.{$slug}.solutions") as $solution)
                    <div class="h-full p-8 rounded-2xl bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50" data-reveal>
                        <h3 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-3">{{ $solution['title'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $solution['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Project --}}
    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-8 lg:p-12 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50 shadow-sm" data-reveal>
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wide uppercase mb-4">{{ __('industries.labels.project') }}</span>
                <h2 class="text-3xl font-heading font-bold text-gray-900 dark:text-white">{{ $project['title'] }}</h2>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 leading-relaxed">{{ $project['excerpt'] }}</p>
                <ul class="mt-6 flex flex-wrap gap-2">
                    @foreach($project['technologies'] as $technology)
                        <li class="px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $technology }}</li>
                    @endforeach
                </ul>
                <a href="{{ locale_route('work.show', ['slug' => $project['slug']]) }}" class="mt-8 btn btn-outline">{{ __('industries.labels.view_project') }}</a>
            </div>
        </div>
    </section>

    {{-- Other industries --}}
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl lg:text-4xl font-heading font-bold text-gray-900 dark:text-white mb-8 text-center" data-reveal>
                {{ __('industries.labels.other_industries') }}
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 stagger-reveal">
                @foreach($otherSlugs as $otherSlug)
                    <a href="{{ locale_route('industries.show', ['slug' => $otherSlug]) }}" class="group block p-6 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50 hover:border-primary/20 transition-all" data-reveal>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 group-hover:text-primary transition-colors">{{ __("industries.items.{$otherSlug}.title") }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">{{ __("industries.items.{$otherSlug}.excerpt") }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <x-cta-section
        :heading="e(__('home.cta.heading'))"
        :description="__('home.cta.description')"
        :buttonText="__('nav.work_with_us')"
        :buttonUrl="locale_route('contact.show')"
        background="gray">
    </x-cta-section>
</x-layouts.app>
