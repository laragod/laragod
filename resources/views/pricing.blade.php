<x-layouts.app :title="__('meta.title.pricing')" :description="__('meta.description.pricing')">
    <x-page-hero
        :badge="__('offer.hero.badge')"
        :title-part1="__('offer.hero.title_part1')"
        :title-part2="__('offer.hero.title_part2')"
        :description="__('offer.hero.description')">
        <x-currency-switcher />
    </x-page-hero>

    {{-- Packages --}}
    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                @foreach(config('offer.packages') as $key => $package)
                    <article id="{{ $key }}" class="scroll-mt-24 flex flex-col p-8 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50 shadow-sm" data-reveal>
                        <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white">{{ __("offer.packages.{$key}.title") }}</h2>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">{{ __("offer.packages.{$key}.tagline") }}</p>

                        <p class="mt-6 flex flex-wrap items-baseline gap-x-2">
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ __('offer.from') }}</span>
                            <span class="text-4xl font-heading font-bold text-gray-900 dark:text-white whitespace-nowrap"><x-price :prices="$package['from']" /></span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ __("offer.period.{$package['period']}") }}</span>
                        </p>

                        <p class="mt-6 text-sm text-gray-700 dark:text-gray-300">
                            <span class="font-semibold text-gray-900 dark:text-white">{{ __('offer.best_for') }}:</span>
                            {{ __("offer.packages.{$key}.for") }}
                        </p>
                        <p class="mt-4 text-gray-600 dark:text-gray-400 leading-relaxed">{{ __("offer.packages.{$key}.description") }}</p>

                        <ul class="mt-6 mb-6 space-y-3">
                            @foreach(__("offer.packages.{$key}.includes") as $include)
                                <li class="flex items-start gap-3 text-sm text-gray-700 dark:text-gray-300">
                                    <svg class="w-5 h-5 text-primary flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    {{ $include }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-auto">
                            <p class="mb-6 pt-6 border-t border-gray-100 dark:border-gray-700/50 text-sm text-gray-700 dark:text-gray-300">
                                <span class="font-semibold text-gray-900 dark:text-white">{{ __('offer.measured_by') }}:</span>
                                {{ __("offer.packages.{$key}.measure") }}
                            </p>
                            <a href="{{ $key === 'care' ? '#configurator' : locale_route('contact.show', ['services' => $package['service']]) }}" class="btn btn-primary btn-shimmer w-full">
                                {{ __("offer.packages.{$key}.cta") }}
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <p class="mt-8 text-center text-sm text-gray-500 dark:text-gray-400">{{ __('offer.net_note') }}</p>
        </div>
    </section>

    {{-- Included on every project --}}
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :title="__('offer.included.title')" :description="__('offer.included.description')" />

            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4" data-reveal>
                @foreach(__('offer.included.items') as $item)
                    <li class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50 text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 mt-0.5 text-primary flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        {{ $item }}
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Configurator. No overflow-hidden on this section: the summary is sticky. --}}
    <section id="configurator" class="scroll-mt-20 relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :badge="__('offer.configurator.badge')" :title="__('offer.configurator.title')" :description="__('offer.configurator.description')" class="!mb-8" />

            <div class="flex justify-center mb-10">
                <x-currency-switcher />
            </div>

            <x-configurator />

            <p class="mt-10 text-center">
                <a href="{{ locale_route('faq') }}#faq-pricing" class="inline-flex items-center font-semibold text-primary hover:underline">{{ __('offer.faq_cta') }}</a>
            </p>
        </div>
    </section>

    {{-- CTA --}}
    <x-cta-section
        :heading="e(__('offer.cta.heading'))"
        :description="__('offer.cta.description')"
        :buttonText="__('offer.cta.audit')"
        :buttonUrl="locale_route('audit')"
        background="white">
        <a href="{{ locale_route('contact.show') }}" class="btn btn-outline text-lg">{{ __('nav.work_with_us') }}</a>
    </x-cta-section>
</x-layouts.app>
