<x-layouts.app title="Laragod - Laravel Applications That Scale Beyond MVP">
    <!-- Hero Section -->
    <section class="relative bg-white dark:bg-gray-900 py-20 lg:py-32 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl lg:text-6xl font-heading font-bold text-gray-900 dark:text-white leading-tight">
                    WordPress gets you started.<br>
                    <span class="text-primary">We build what comes next.</span>
                </h1>
                <p class="mt-6 text-xl lg:text-2xl text-gray-600 dark:text-gray-400 leading-relaxed">
                    Laravel applications that scale beyond MVP—because your business won't stay small forever, and your code shouldn't hold you back.
                </p>
                <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center px-8 py-4 bg-primary hover:bg-primary-dark text-white font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-lg">
                        Work With Us
                    </a>
                    <a href="{{ route('work') }}" class="inline-flex items-center justify-center px-8 py-4 border-2 border-primary text-primary hover:bg-primary hover:text-white font-semibold rounded-lg transition-all duration-200 text-lg">
                        View Our Work
                    </a>
                </div>
                <p class="mt-6 text-sm text-gray-500">
                    10 years building web applications · 8 years specializing in Laravel
                </p>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl lg:text-4xl font-heading font-bold text-gray-900 dark:text-white">
                    Code that doesn't become your problem later
                </h2>
                <div class="mt-6 text-lg text-gray-600 dark:text-gray-400 space-y-4">
                    <p>
                        Anyone can spin up a WordPress site in an afternoon. Need a contact form? Plugin. Need e-commerce? Another plugin. Need it to integrate with your CRM, scale to 100k users, and not fall apart when your intern touches it? Good luck.
                    </p>
                    <p>
                        We build the other kind—the kind that doesn't become your problem six months later. Laravel applications that are approachable for your team, scalable beyond MVP, and maintainable without needing the original developer on speed dial.
                    </p>
                    <p class="font-semibold text-gray-900 dark:text-white">
                        Business cares about results. We do too. But we also care that your codebase isn't technical debt from day one.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <p class="text-primary font-semibold uppercase tracking-wide text-sm">What We Do</p>
                <h2 class="mt-2 text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">Our Services</h2>
                <p class="mt-4 text-xl text-gray-600 dark:text-gray-400">Founder-led, with trusted senior developers brought in as project scope demands</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <x-service-card title="Custom Web Applications">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </x-slot:icon>
                    Bespoke Laravel applications built from scratch, tailored to your exact business requirements. No templates, no compromises.
                </x-service-card>

                <!-- Service 2 -->
                <x-service-card title="API Development & Integration">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </x-slot:icon>
                    RESTful APIs, GraphQL, third-party integrations. Connect your systems seamlessly with payment gateways, CRMs, and more.
                </x-service-card>

                <!-- Service 3 -->
                <x-service-card title="Laravel + Filament Admin Panels">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </x-slot:icon>
                    Powerful, beautiful admin panels with Filament. Manage your application with ease—no bloated WordPress dashboard.
                </x-service-card>

                <!-- Service 4 -->
                <x-service-card title="MVP Development">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </x-slot:icon>
                    Launch fast without cutting corners. We build MVPs that can actually scale when your business takes off.
                </x-service-card>

                <!-- Service 5 -->
                <x-service-card title="Legacy Code Modernization">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </x-slot:icon>
                    Stuck on PHP 5.6? We migrate and modernize legacy applications to current Laravel versions with comprehensive testing.
                </x-service-card>

                <!-- Service 6 -->
                <x-service-card title="Code Quality & Standardization">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </x-slot:icon>
                    PHPStan, Pint, Rector, comprehensive testing. We eliminate code smells and improve developer experience for your entire team.
                </x-service-card>

                <!-- Service 7 -->
                <x-service-card title="Technical Consulting / Fractional CTO">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </x-slot:icon>
                    Strategic technical guidance without the full-time hire. Architecture reviews, team mentoring, and roadmap planning.
                </x-service-card>

                <!-- Service 8 -->
                <x-service-card title="DevOps & Deployment">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                        </svg>
                    </x-slot:icon>
                    CI/CD pipelines, hosting setup, performance optimization. We handle the infrastructure so you can focus on your business.
                </x-service-card>

                <!-- Service 9 -->
                <x-service-card title="Team Augmentation">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </x-slot:icon>
                    Plug us into your dev team short-term. We match your pace, adopt your tools, and deliver without the HR overhead.
                </x-service-card>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <p class="text-primary font-semibold uppercase tracking-wide text-sm">Transparent Pricing</p>
                <h2 class="mt-2 text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">You Get What You Pay For</h2>
                <p class="mt-4 text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Code quality isn't extra. It's the difference between scaling and starting over.
                </p>
            </div>

            <div class="max-w-3xl mx-auto bg-white dark:bg-gray-900 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 p-8 lg:p-12">
                <div class="text-center mb-8">
                    <div class="text-5xl lg:text-6xl font-heading font-bold text-gray-900 dark:text-white">
                        £500<span class="text-3xl text-gray-600 dark:text-gray-400">/day</span>
                    </div>
                    <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">for development</p>
                </div>

                <div class="border-t border-gray-200 dark:border-gray-700 pt-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">What's Included</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="ml-3 text-gray-700 dark:text-gray-300">Clean, tested, maintainable code (PHPStan, Pest, Laravel Pint)</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="ml-3 text-gray-700 dark:text-gray-300">Architecture that scales beyond MVP</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="ml-3 text-gray-700 dark:text-gray-300">Documentation your team can actually use</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="ml-3 text-gray-700 dark:text-gray-300">Code that doesn't become technical debt from day one</span>
                        </li>
                    </ul>
                </div>

                <div class="mt-8 p-6 bg-primary-light dark:bg-gray-800 rounded-lg">
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Full-Service Projects</h4>
                    <p class="text-gray-700 dark:text-gray-300">
                        Need project management, QA testing, DevOps, hosting setup, and CI/CD? Full-service projects are priced individually based on scope. We'll give you a straight answer, not a sales pitch.
                    </p>
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center px-8 py-4 bg-primary hover:bg-primary-dark text-white font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-lg">
                        Start a Conversation
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <x-cta-section
        heading="Ready to build something that lasts?"
        description="Let's talk about your project. No sales fluff, just straight talk from developers who care about the craft."
        buttonText="Work With Us"
        buttonUrl="{{ route('contact.show') }}"
        background="white">
    </x-cta-section>
</x-layouts.app>
