<x-layouts.app title="Contact - Laragod">
    <!-- Hero Section -->
    <section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200 overflow-hidden">
        {{-- Background decorations --}}
        <div class="absolute inset-0 bg-mesh-gradient opacity-70"></div>

        {{-- Floating elements --}}
        <div class="absolute top-10 right-1/4 w-48 h-48 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/3 w-56 h-56 bg-primary/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <div class="animate-fade-in-up inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 dark:bg-primary/20 border border-primary/20 mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                    </span>
                    <span class="text-sm font-medium text-primary">Available for new projects</span>
                </div>

                <h1 class="animate-fade-in-up text-5xl lg:text-6xl font-heading font-bold text-gray-900 dark:text-white leading-[1.1] tracking-tight text-hero" style="animation-delay: 0.1s">
                    Let's <span class="text-gradient">Talk</span>
                </h1>
                <p class="animate-fade-in-up mt-6 text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto" style="animation-delay: 0.2s">
                    No sales pitches. No hand-waving. Just straight talk from developers who care about the craft.
                </p>
            </div>

            <!-- Key Points - Enhanced -->
            <div class="animate-fade-in-up mt-12 flex flex-wrap justify-center gap-4 lg:gap-6" style="animation-delay: 0.3s">
                <div class="group flex items-center gap-3 px-5 py-3 rounded-2xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border border-gray-100 dark:border-gray-700 hover:border-primary/30 hover:shadow-lg hover:shadow-primary/5 transition-all duration-300">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary/20 to-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-900 dark:text-white text-sm">Integrity</span>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Straight talk</p>
                    </div>
                </div>

                <div class="group flex items-center gap-3 px-5 py-3 rounded-2xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border border-gray-100 dark:border-gray-700 hover:border-primary/30 hover:shadow-lg hover:shadow-primary/5 transition-all duration-300">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary/20 to-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-900 dark:text-white text-sm">MVP in 6-12 weeks</span>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Depending on scope</p>
                    </div>
                </div>

                <div class="group flex items-center gap-3 px-5 py-3 rounded-2xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border border-gray-100 dark:border-gray-700 hover:border-primary/30 hover:shadow-lg hover:shadow-primary/5 transition-all duration-300">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary/20 to-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-900 dark:text-white text-sm">24h Response</span>
                        <p class="text-xs text-gray-500 dark:text-gray-400">We reply fast</p>
                    </div>
                </div>

                <div class="group flex items-center gap-3 px-5 py-3 rounded-2xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border border-gray-100 dark:border-gray-700 hover:border-primary/30 hover:shadow-lg hover:shadow-primary/5 transition-all duration-300">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary/20 to-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-900 dark:text-white text-sm">£500/day</span>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Transparent pricing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Onboarding Form Section -->
    <section class="bg-gray-50 dark:bg-gray-800 py-12 lg:py-16 transition-colors duration-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-onboarding-form submitUrl="{{ route('contact.store') }}" />
        </div>
    </section>

    <!-- FAQ & Info Section - Side by Side -->
    <section class="bg-white dark:bg-gray-900 py-12 lg:py-16 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                <!-- FAQ Column -->
                <div class="lg:col-span-2">
                    <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white mb-6">Quick Answers</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-faq-item question="How much does a project cost?">
                            £500/day for development. Full-service projects are priced individually. We'll give you a straight quote based on your actual requirements.
                        </x-faq-item>

                        <x-faq-item question="How long does it take?">
                            Depends on scope. MVPs can launch in 6-12 weeks. Legacy migrations might take 3-6 months. We'll give you realistic timelines upfront.
                        </x-faq-item>

                        <x-faq-item question="Do you work with startups?">
                            Absolutely. We build MVPs that can actually scale. Just be prepared for honest feedback if requirements don't match your timeline or budget.
                        </x-faq-item>

                        <x-faq-item question="Can you take over an existing project?">
                            Yes. We've salvaged plenty of legacy projects. We'll audit your codebase and give you an honest assessment.
                        </x-faq-item>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="space-y-6">
                    <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white mb-6">Get in Touch</h2>

                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-100 dark:border-gray-700">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Location</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Based in St Helens, UK</p>
                                <p class="text-gray-500 dark:text-gray-500 text-xs mt-1">Available for remote & on-site</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-100 dark:border-gray-700">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Availability</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Mon - Fri, 9am - 6pm GMT</p>
                                <p class="text-gray-500 dark:text-gray-500 text-xs mt-1">Flexible for urgent projects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
