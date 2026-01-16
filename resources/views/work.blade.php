<x-layouts.app title="Our Work - Laragod">
    <!-- Hero Section -->
    <section class="relative bg-white dark:bg-gray-900 py-24 lg:py-36 transition-colors duration-200 overflow-hidden">
        {{-- Background decorations --}}
        <div class="absolute inset-0 bg-mesh-gradient"></div>
        <div class="absolute inset-0 bg-grid opacity-40"></div>

        {{-- Floating elements --}}
        <div class="absolute top-20 left-1/4 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-1/4 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <div class="animate-fade-in-up inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 dark:bg-primary/20 border border-primary/20 mb-8">
                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span class="text-sm font-medium text-primary">Portfolio</span>
                </div>

                <h1 class="animate-fade-in-up text-5xl lg:text-7xl font-heading font-bold text-gray-900 dark:text-white leading-[1.1] tracking-tight text-hero" style="animation-delay: 0.1s">
                    Our <span class="text-gradient">Work</span>
                </h1>
                <p class="animate-fade-in-up mt-8 text-xl lg:text-2xl text-gray-600 dark:text-gray-400 leading-relaxed max-w-2xl mx-auto" style="animation-delay: 0.2s">
                    Laravel applications built to last. Here's what we've delivered for clients who value code quality as much as we do.
                </p>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="relative bg-gray-50 dark:bg-gray-800 py-20 lg:py-28 transition-colors duration-200">
        <div class="absolute inset-0 bg-noise"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(isset($projects) && count($projects) > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 stagger-reveal">
                    @foreach($projects as $project)
                        <div class="group bg-white dark:bg-gray-900 rounded-2xl border border-gray-100 dark:border-gray-700/50 overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-1 hover:border-primary/20" data-reveal>
                            <!-- Project Image -->
                            @if(isset($project['image']) && $project['image'])
                                <div class="relative h-56 lg:h-64 bg-gray-200 dark:bg-gray-700 overflow-hidden">
                                    <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    @if(isset($project['featured']) && $project['featured'])
                                        <span class="absolute top-4 left-4 inline-flex items-center gap-1.5 px-3 py-1.5 bg-primary text-white text-xs font-semibold rounded-full shadow-lg">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            Featured
                                        </span>
                                    @endif
                                </div>
                            @else
                                <div class="relative h-56 lg:h-64 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 dark:from-gray-800 dark:via-gray-700 dark:to-gray-800 flex items-center justify-center overflow-hidden">
                                    {{-- Decorative grid pattern --}}
                                    <div class="absolute inset-0 bg-grid opacity-20"></div>
                                    {{-- Glow effect --}}
                                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 bg-primary/30 rounded-full blur-3xl group-hover:w-48 group-hover:h-48 transition-all duration-700"></div>
                                    {{-- Code icon --}}
                                    <div class="relative">
                                        <svg class="w-16 h-16 text-primary/60 group-hover:text-primary group-hover:scale-110 transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                        </svg>
                                    </div>
                                    @if(isset($project['featured']) && $project['featured'])
                                        <span class="absolute top-4 left-4 inline-flex items-center gap-1.5 px-3 py-1.5 bg-primary text-white text-xs font-semibold rounded-full shadow-lg">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            Featured
                                        </span>
                                    @endif
                                </div>
                            @endif

                            <!-- Project Content -->
                            <div class="p-6 lg:p-8">
                                <h3 class="text-2xl font-heading font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors duration-300">
                                    {{ $project['title'] }}
                                </h3>

                                <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-6">
                                    {{ $project['excerpt'] }}
                                </p>

                                <!-- Technologies -->
                                @if(isset($project['technologies']) && count($project['technologies']) > 0)
                                    <div class="flex flex-wrap gap-2 mb-6">
                                        @foreach($project['technologies'] as $tech)
                                            <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 text-xs font-medium rounded-lg border border-gray-200 dark:border-gray-700 hover:border-primary/50 hover:text-primary dark:hover:text-primary transition-colors">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Challenge & Solution -->
                                @if(isset($project['challenge']) && $project['challenge'])
                                    <div class="space-y-4 mb-6 p-4 bg-gray-50 dark:bg-gray-800/50 rounded-xl">
                                        <div>
                                            <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Challenge</h4>
                                            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $project['challenge'] }}</p>
                                        </div>
                                        @if(isset($project['solution']) && $project['solution'])
                                            <div class="pt-3 border-t border-gray-200 dark:border-gray-700">
                                                <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Solution</h4>
                                                <p class="text-sm text-gray-700 dark:text-gray-300">{{ $project['solution'] }}</p>
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                <!-- Links -->
                                <div class="flex flex-wrap items-center gap-3 pt-4 border-t border-gray-100 dark:border-gray-800">
                                    @if(isset($project['github_url']) && $project['github_url'])
                                        <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                            </svg>
                                            Code
                                        </a>
                                    @endif

                                    @if(isset($project['live_url']) && $project['live_url'])
                                        <a href="{{ $project['live_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2 bg-primary hover:bg-primary-dark text-white text-sm font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                            View Live
                                        </a>
                                    @endif

                                    @if(isset($project['completed_at']) && $project['completed_at'])
                                        <span class="ml-auto text-xs text-gray-400 dark:text-gray-500">
                                            {{ $project['completed_at'] }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20" data-reveal>
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-2xl bg-gray-100 dark:bg-gray-700 mb-6">
                        <svg class="w-12 h-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold text-gray-900 dark:text-white mb-3">Portfolio Coming Soon</h3>
                    <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-8">We're currently adding our latest projects. In the meantime, let's talk about yours.</p>
                    <a href="{{ route('contact.show') }}" class="btn btn-primary">
                        Start a Conversation
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <x-cta-section
        heading="Want your project here?"
        description="Let's build something worth showcasing. Laravel applications that scale, perform, and actually get maintained."
        buttonText="Start Your Project"
        buttonUrl="{{ route('contact.show') }}"
        background="white">
    </x-cta-section>
</x-layouts.app>
