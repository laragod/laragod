<x-layouts.app title="Our Work - Laragod">
    <!-- Hero Section -->
    <section class="bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-5xl lg:text-6xl font-heading font-bold text-gray-900 dark:text-white leading-tight">
                    Our <span class="text-primary">Work</span>
                </h1>
                <p class="mt-6 text-xl text-gray-600 dark:text-gray-400">
                    Laravel applications built to last. Here's what we've delivered for clients who value code quality as much as we do.
                </p>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="bg-gray-50 dark:bg-gray-800 py-16 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(isset($projects) && count($projects) > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @foreach($projects as $project)
                        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm hover:shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-300 group">
                            <!-- Project Image -->
                            @if(isset($project['image']) && $project['image'])
                                <div class="relative h-64 bg-gray-200 dark:bg-gray-700 overflow-hidden">
                                    <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-primary opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                                </div>
                            @else
                                <div class="relative h-64 bg-gradient-to-br from-primary to-primary-dark dark:from-primary-dark dark:to-primary flex items-center justify-center">
                                    <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Project Content -->
                            <div class="p-8">
                                <!-- Featured Badge -->
                                @if(isset($project['featured']) && $project['featured'])
                                    <span class="inline-block px-3 py-1 bg-primary text-white text-xs font-semibold rounded-full mb-4">
                                        Featured
                                    </span>
                                @endif

                                <h3 class="text-2xl font-heading font-bold text-gray-900 dark:text-white mb-3">
                                    {{ $project['title'] }}
                                </h3>

                                <p class="text-gray-600 dark:text-gray-400 mb-6">
                                    {{ $project['excerpt'] }}
                                </p>

                                <!-- Technologies -->
                                @if(isset($project['technologies']) && count($project['technologies']) > 0)
                                    <div class="flex flex-wrap gap-2 mb-6">
                                        @foreach($project['technologies'] as $tech)
                                            <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-primary-light hover:text-primary-dark dark:hover:bg-gray-700 text-sm rounded-full transition-colors">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Challenge & Solution -->
                                @if(isset($project['challenge']) && $project['challenge'])
                                    <div class="space-y-4 mb-6">
                                        <div>
                                            <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Challenge</h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $project['challenge'] }}</p>
                                        </div>
                                        @if(isset($project['solution']) && $project['solution'])
                                            <div>
                                                <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Solution</h4>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $project['solution'] }}</p>
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                <!-- Links -->
                                <div class="flex flex-wrap gap-4">
                                    @if(isset($project['github_url']) && $project['github_url'])
                                        <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-primary hover:text-primary-dark font-medium transition-colors">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                            </svg>
                                            View Code
                                        </a>
                                    @endif

                                    @if(isset($project['live_url']) && $project['live_url'])
                                        <a href="{{ $project['live_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-primary hover:text-primary-dark font-medium transition-colors">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                            View Live
                                        </a>
                                    @endif
                                </div>

                                @if(isset($project['completed_at']) && $project['completed_at'])
                                    <p class="mt-6 text-sm text-gray-500 dark:text-gray-400">
                                        Completed: {{ $project['completed_at'] }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <svg class="w-24 h-24 mx-auto text-gray-300 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Portfolio Coming Soon</h3>
                    <p class="text-gray-600 dark:text-gray-400">We're currently adding our latest projects. Check back soon!</p>
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
