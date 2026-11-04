<x-layouts.app :title="__('industries.meta.title')" :description="__('industries.meta.description')">
    <x-breadcrumbs :items="[
        ['label' => __('nav.home'), 'url' => locale_route('home')],
        ['label' => __('nav.industries'), 'url' => null],
    ]" />

    <x-page-hero
        :badge="__('industries.hero.badge')"
        :title-part1="__('industries.hero.title_part1')"
        :title-part2="__('industries.hero.title_part2')"
        :description="__('industries.hero.description')" />

    {{-- Industries --}}
    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 stagger-reveal">
                @foreach(array_keys(config('offer.industries')) as $slug)
                    <a href="{{ locale_route('industries.show', ['slug' => $slug]) }}" class="group block" data-reveal>
                        <div class="flex flex-col h-full p-8 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50 shadow-sm hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                            <h2 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors">{{ __("industries.items.{$slug}.title") }}</h2>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">{{ __("industries.items.{$slug}.excerpt") }}</p>
                            <span class="mt-auto inline-flex items-center text-primary font-medium text-sm">
                                {{ __('industries.labels.see_more') }}
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

    {{-- Not listed --}}
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-reveal>
            <h2 class="text-3xl font-heading font-bold text-gray-900 dark:text-white">{{ __('industries.labels.not_listed') }}</h2>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">{{ __('industries.labels.not_listed_text') }}</p>
            <a href="{{ locale_route('contact.show') }}" class="mt-8 btn btn-primary btn-shimmer">{{ __('nav.work_with_us') }}</a>
        </div>
    </section>
</x-layouts.app>
