<x-layouts.app :title="__('agencies.meta.title')" :description="__('agencies.meta.description')">
    <x-faq-schema :items="__('agencies.faq.items')" />

    @php $partnerUrl = locale_route('contact.show', ['services' => 'agency-partner']); @endphp

    <x-page-hero
        :badge="__('agencies.hero.badge')"
        :title-part1="__('agencies.hero.title_part1')"
        :title-part2="__('agencies.hero.title_part2')"
        :description="__('agencies.hero.description')">
        <a href="{{ $partnerUrl }}" class="btn btn-primary btn-shimmer px-8 py-4">{{ __('agencies.hero.cta') }}</a>
    </x-page-hero>

    {{-- Audience --}}
    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :title="__('agencies.audience.title')" />

            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4" data-reveal>
                @foreach(__('agencies.audience.items') as $audience)
                    <li class="flex items-start gap-3 p-4 rounded-xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50 text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 mt-0.5 text-primary flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        {{ $audience }}
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Scope --}}
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :title="__('agencies.scope.title')" />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 stagger-reveal">
                @foreach(__('agencies.scope.items') as $item)
                    <div class="h-full p-8 rounded-2xl bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50" data-reveal>
                        <h3 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-3">{{ $item['title'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $item['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Model --}}
    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :title="__('agencies.model.title')" />

            <ol class="space-y-4">
                @foreach(__('agencies.model.steps') as $index => $step)
                    <li class="flex gap-6 p-6 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50" data-reveal>
                        <span class="flex-shrink-0 w-10 h-10 rounded-full bg-primary text-white font-bold flex items-center justify-center">{{ $index + 1 }}</span>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">{{ $step['title'] }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $step['description'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- Promises --}}
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :title="__('agencies.promises.title')" />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 stagger-reveal">
                @foreach(__('agencies.promises.items') as $promise)
                    <div class="h-full p-8 rounded-2xl bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50" data-reveal>
                        <h3 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-3">{{ $promise['title'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $promise['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :title="__('agencies.faq.title')" />

            <div class="space-y-4" data-reveal>
                @foreach(__('agencies.faq.items') as $faq)
                    <x-faq-item :question="$faq['question']" :raised="true">{{ $faq['answer'] }}</x-faq-item>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <x-cta-section
        :heading="e(__('agencies.cta.heading'))"
        :description="__('agencies.cta.description')"
        :buttonText="__('agencies.cta.button')"
        :buttonUrl="$partnerUrl"
        background="white">
    </x-cta-section>
</x-layouts.app>
