<x-layouts.app title="Contact - Laragod">
    <!-- Hero Section -->
    <section class="bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-5xl lg:text-6xl font-heading font-bold text-gray-900 dark:text-white leading-tight">
                    Let's <span class="text-primary">Talk</span>
                </h1>
                <p class="mt-6 text-xl text-gray-600 dark:text-gray-400">
                    No sales pitches. No hand-waving. Just straight talk from developers who care about the craft. Walk through the onboarding flow and we'll shape a plan around you.
                </p>
            </div>

            <!-- Key Points -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary-light dark:bg-primary/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 dark:text-white text-sm">Integrity</h3>
                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Straight talk from scope to launch</p>
                </div>

                <div class="text-center">
                    <div class="w-12 h-12 bg-primary-light dark:bg-primary/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 dark:text-white text-sm">Avg. MVP Time</h3>
                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">6-12 weeks depending on scope</p>
                </div>

                <div class="text-center">
                    <div class="w-12 h-12 bg-primary-light dark:bg-primary/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 dark:text-white text-sm">Transparency</h3>
                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Open, honest communication</p>
                </div>

                <div class="text-center">
                    <div class="w-12 h-12 bg-primary-light dark:bg-primary/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 dark:text-white text-sm">Response Time</h3>
                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Within 24 hours</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Onboarding Form Section -->
    <section class="bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-heading font-bold text-gray-900 dark:text-white">Onboarding Flow</h2>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">3 quick steps. Your responses route straight to our inbox.</p>
            </div>

            <x-onboarding-form submitUrl="{{ route('contact.store') }}" />

            <!-- Info Cards -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-info-card title="Location">
                    <x-slot:icon>
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </x-slot:icon>
                    Based in St Helens, UK (can travel)
                </x-info-card>

                <x-info-card title="Pricing">
                    <x-slot:icon>
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </x-slot:icon>
                    £500/day - transparent, no hidden fees
                </x-info-card>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-heading font-bold text-gray-900 dark:text-white mb-8 text-center">Quick Answers</h2>
            <div class="space-y-6">
                <x-faq-item question="How much does a project cost?">
                    £500/day for development. Full-service projects (with PM, QA, DevOps) are priced individually. We'll give you a straight quote based on your actual requirements—no inflated estimates.
                </x-faq-item>

                <x-faq-item question="How long does it take?">
                    Depends entirely on scope. MVPs can launch in 6-12 weeks. Legacy migrations might take 3-6 months. We'll give you realistic timelines upfront—not aspirational ones.
                </x-faq-item>

                <x-faq-item question="Do you work with startups?">
                    Absolutely. We're happy to build MVPs that can actually scale. Just be prepared for honest feedback if your technical requirements don't match your timeline or budget.
                </x-faq-item>

                <x-faq-item question="Can you take over an existing project?">
                    Yes. We've salvaged plenty of legacy projects. We'll audit your codebase, give you an honest assessment, and outline what it'll take to get it production-ready.
                </x-faq-item>
            </div>
        </div>
    </section>
</x-layouts.app>
