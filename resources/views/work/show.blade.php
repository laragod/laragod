<x-layouts.app
    :title="$project['title'] . ' | ' . __('nav.work') . ' | Laragod'"
    :description="$project['excerpt']">

    {{-- Breadcrumbs --}}
    <x-breadcrumbs :items="[
        ['label' => __('nav.home'), 'url' => locale_route('home')],
        ['label' => __('nav.work'), 'url' => locale_route('work')],
        ['label' => $project['title'], 'url' => null],
    ]" />

    {{-- Hero Section --}}
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200 overflow-hidden">
        {{-- Background decorations --}}
        <div class="absolute inset-0 bg-mesh-gradient"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl">
                @if($project['featured'])
                    <div class="animate-fade-in-up inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 dark:bg-primary/20 border border-primary/20 mb-6">
                        <span class="text-sm font-medium text-primary">{{ __('work.featured') }}</span>
                    </div>
                @endif

                <h1 class="animate-fade-in-up text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white leading-tight" style="animation-delay: 0.1s">
                    {{ $project['title'] }}
                </h1>
                <p class="animate-fade-in-up mt-6 text-xl text-gray-600 dark:text-gray-400 leading-relaxed" style="animation-delay: 0.2s">
                    {{ $project['description'] }}
                </p>

                {{-- Technologies --}}
                <div class="animate-fade-in-up mt-8 flex flex-wrap gap-2" style="animation-delay: 0.3s">
                    @foreach($project['technologies'] as $tech)
                        <span class="px-3 py-1 text-sm font-medium rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>

                {{-- Action buttons --}}
                <div class="animate-fade-in-up mt-8 flex flex-wrap gap-4" style="animation-delay: 0.4s">
                    @if($project['github_url'])
                        <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline px-6 py-3">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                            </svg>
                            {{ __('work.code') }}
                        </a>
                    @endif
                    @if($project['live_url'])
                        <a href="{{ $project['live_url'] }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-shimmer px-6 py-3">
                            {{ __('work.view_live') }}
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Project Image --}}
    @if($project['image'])
    <section class="relative bg-gray-50 dark:bg-gray-800 py-8 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl overflow-hidden shadow-2xl">
                <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="w-full h-auto">
            </div>
        </div>
    </section>
    @endif

    {{-- Challenge & Solution --}}
    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="absolute inset-0 bg-noise"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                {{-- Challenge --}}
                <div class="p-8 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50" data-reveal>
                    <div class="flex items-center gap-4 mb-6">
                        <span class="w-12 h-12 rounded-xl bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </span>
                        <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white">{{ __('work.challenge') }}</h2>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        {{ $project['challenge'] }}
                    </p>
                </div>

                {{-- Solution --}}
                <div class="p-8 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50" data-reveal>
                    <div class="flex items-center gap-4 mb-6">
                        <span class="w-12 h-12 rounded-xl bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                        <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white">{{ __('work.solution') }}</h2>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        {{ $project['solution'] }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Other Projects --}}
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl lg:text-4xl font-heading font-bold text-gray-900 dark:text-white mb-8 text-center" data-reveal>
                {{ __('work.other_projects') }}
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 stagger-reveal">
                @php
                    $count = 0;
                @endphp
                @foreach($allProjects as $otherSlug => $otherProject)
                    @if($otherSlug !== $slug && $count < 3)
                        @php
                            $count++;
                        @endphp
                        <a href="{{ locale_route('work.show', ['slug' => $otherSlug]) }}" class="group block p-6 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50 hover:border-primary/20 transition-all" data-reveal>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 group-hover:text-primary transition-colors">
                                {{ __("work.projects.{$otherProject['key']}.title") }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-2 mb-4">
                                {{ __("work.projects.{$otherProject['key']}.excerpt") }}
                            </p>
                            <div class="flex flex-wrap gap-1">
                                @foreach(array_slice($otherProject['technologies'], 0, 3) as $tech)
                                    <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-400">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>

            <div class="mt-12 text-center" data-reveal>
                <a href="{{ locale_route('work') }}" class="btn btn-outline px-8 py-4">
                    {{ __('work.view_all_projects') }}
                </a>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <x-cta-section
        :heading="__('work.cta.heading')"
        :description="__('work.cta.description')"
        :buttonText="__('work.cta.button')"
        :buttonUrl="locale_route('contact.show')"
        background="gray">
    </x-cta-section>
</x-layouts.app>
