<x-layouts.app :title="__('faq.meta.title')" :description="__('faq.meta.description')">
    @php
        $groups = __('faq.groups');
        $schemaItems = [];

        foreach ($groups as $group) {
            $schemaItems = [...$schemaItems, ...$group['items']];
        }

        foreach ($services as $service) {
            $schemaItems = [...$schemaItems, ...__("services.{$service['key']}.faq")];
        }
    @endphp

    <x-faq-schema :items="$schemaItems" />

    <x-page-hero
        :badge="__('faq.hero.badge')"
        :title-part1="__('faq.hero.title_part1')"
        :title-part2="__('faq.hero.title_part2')"
        :description="__('faq.hero.description')">
        <nav class="flex flex-wrap justify-center gap-2" aria-label="{{ __('faq.hero.badge') }}">
            @foreach($groups as $key => $group)
                <a href="#faq-{{ $key }}" class="px-4 py-2 rounded-full border border-gray-200 dark:border-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-primary hover:text-primary transition-colors">{{ $group['title'] }}</a>
            @endforeach
            <a href="#faq-services" class="px-4 py-2 rounded-full border border-gray-200 dark:border-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-primary hover:text-primary transition-colors">{{ __('faq.services_group') }}</a>
        </nav>
    </x-page-hero>

    {{-- General groups --}}
    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            @foreach($groups as $key => $group)
                <div id="faq-{{ $key }}" class="scroll-mt-24">
                    <h2 class="mb-6 text-3xl font-heading font-bold text-gray-900 dark:text-white">{{ $group['title'] }}</h2>
                    <div class="space-y-4">
                        @foreach($group['items'] as $item)
                            <div data-reveal>
                                <x-faq-item :question="$item['question']" :raised="true">{{ $item['answer'] }}</x-faq-item>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Per-service questions --}}
    <section id="faq-services" class="scroll-mt-20 relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="mb-10 text-3xl lg:text-4xl font-heading font-bold text-gray-900 dark:text-white">{{ __('faq.services_group') }}</h2>

            <div class="space-y-12">
                @foreach($services as $slug => $service)
                    <div>
                        <h3 class="mb-4 text-xl font-heading font-bold text-gray-900 dark:text-white">
                            <a href="{{ locale_route('services.show', ['slug' => $slug]) }}" class="hover:text-primary transition-colors">{{ __("services.{$service['key']}.title") }}</a>
                        </h3>
                        <div class="space-y-4">
                            @foreach(__("services.{$service['key']}.faq") as $item)
                                <div data-reveal>
                                    <x-faq-item :question="$item['question']">{{ $item['answer'] }}</x-faq-item>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <x-cta-section
        :heading="e(__('faq.cta.heading'))"
        :description="__('faq.cta.description')"
        :buttonText="__('nav.work_with_us')"
        :buttonUrl="locale_route('contact.show')"
        background="gray">
    </x-cta-section>
</x-layouts.app>
