<x-layouts.app :title="__('process.meta.title')" :description="__('process.meta.description')">
    <x-page-hero
        :badge="__('process.hero.badge')"
        :title-part1="__('process.hero.title_part1')"
        :title-part2="__('process.hero.title_part2')"
        :description="__('process.hero.description')" />

    {{-- Steps --}}
    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <ol class="space-y-6">
                @foreach(__('process.steps') as $index => $step)
                    <li class="flex gap-6 p-6 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50" data-reveal>
                        <span class="flex-shrink-0 w-10 h-10 rounded-full bg-primary text-white font-bold flex items-center justify-center">{{ $index + 1 }}</span>
                        <div>
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-2 mb-2">
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $step['title'] }}</h2>
                                <span class="px-3 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-semibold">{{ $step['duration'] }}</span>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $step['description'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- Principles --}}
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading :title="__('process.principles.title')" />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 stagger-reveal">
                @foreach(__('process.principles.items') as $principle)
                    <div class="h-full p-8 rounded-2xl bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50" data-reveal>
                        <h3 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-3">{{ $principle['title'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $principle['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <x-cta-section
        :heading="e(__('process.cta.heading'))"
        :description="__('process.cta.description')"
        :buttonText="__('nav.work_with_us')"
        :buttonUrl="locale_route('contact.show')"
        background="gray">
    </x-cta-section>
</x-layouts.app>
