<x-layouts.app title="Laragod - Laravel Applications That Scale Beyond MVP">
    <!-- Hero Section -->
    <section class="relative bg-white dark:bg-gray-900 py-24 lg:py-40 transition-colors duration-200 overflow-hidden">
        {{-- Background decorations --}}
        <div class="absolute inset-0 bg-mesh-gradient"></div>
        <div class="absolute inset-0 bg-grid opacity-50"></div>

        {{-- Floating decorative elements --}}
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>

        {{-- Code bracket decorations --}}
        <div class="hidden lg:block absolute top-32 left-[10%] text-primary/20 font-mono text-8xl font-bold select-none">{</div>
        <div class="hidden lg:block absolute bottom-32 right-[10%] text-primary/20 font-mono text-8xl font-bold select-none">}</div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">
                {{-- Badge --}}
                <div class="animate-fade-in-up inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 dark:bg-primary/20 border border-primary/20 mb-8">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                    </span>
                    <span class="text-sm font-medium text-primary">Available for new projects</span>
                </div>

                <h1 class="animate-fade-in-up text-5xl lg:text-7xl font-heading font-bold text-gray-900 dark:text-white leading-[1.1] tracking-tight text-hero" style="animation-delay: 0.1s">
                    WordPress gets you started.<br>
                    <span class="text-gradient">We build what comes next.</span>
                </h1>
                <p class="animate-fade-in-up mt-8 text-xl lg:text-2xl text-gray-600 dark:text-gray-400 leading-relaxed max-w-3xl mx-auto" style="animation-delay: 0.2s">
                    Laravel applications that scale beyond MVP—because your business won't stay small forever, and your code shouldn't hold you back.
                </p>
                <div class="animate-fade-in-up mt-12 flex flex-col sm:flex-row gap-4 justify-center" style="animation-delay: 0.3s">
                    <a href="{{ route('contact.show') }}" class="btn btn-primary btn-shimmer px-10 py-4 text-lg">
                        Work With Us
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <a href="{{ route('work') }}" class="btn btn-outline px-10 py-4 text-lg">
                        View Our Work
                    </a>
                </div>
                <p class="animate-fade-in-up mt-8 text-sm text-gray-500 dark:text-gray-500 flex items-center justify-center gap-3" style="animation-delay: 0.4s">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        10 years building web apps
                    </span>
                    <span class="w-1 h-1 rounded-full bg-gray-400"></span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        8 years with Laravel
                    </span>
                </p>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="relative bg-gray-50 dark:bg-gray-800 py-20 lg:py-32 transition-colors duration-200 overflow-hidden">
        {{-- Subtle texture --}}
        <div class="absolute inset-0 bg-noise"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <div data-reveal>
                    <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wide uppercase mb-6">Our Philosophy</span>
                    <h2 class="text-3xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white leading-tight">
                        Code that doesn't become <span class="text-gradient">your problem</span> later
                    </h2>
                </div>
                <div class="mt-8 text-lg lg:text-xl text-gray-600 dark:text-gray-400 space-y-6" data-reveal style="--reveal-delay: 0.1s">
                    <p class="leading-relaxed">
                        Anyone can spin up a WordPress site in an afternoon. Need a contact form? Plugin. Need e-commerce? Another plugin. Need it to integrate with your CRM, scale to 100k users, and not fall apart when your intern touches it? Good luck.
                    </p>
                    <p class="leading-relaxed">
                        We build the other kind—the kind that doesn't become your problem six months later. Laravel applications that are approachable for your team, scalable beyond MVP, and maintainable without needing the original developer on speed dial.
                    </p>
                    <p class="font-semibold text-gray-900 dark:text-white text-xl lg:text-2xl pt-4 border-l-4 border-primary pl-6 text-left">
                        Business cares about results. We do too. But we also care that your codebase isn't technical debt from day one.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="relative bg-white dark:bg-gray-900 py-20 lg:py-32 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20" data-reveal>
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wide uppercase mb-4">What We Do</span>
                <h2 class="mt-2 text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">Our Services</h2>
                <p class="mt-6 text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">Founder-led, with trusted senior developers brought in as project scope demands</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 stagger-reveal">
                <!-- Service 1 -->
                <div data-reveal>
                    <x-card :hover="true" title="Custom Web Applications">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </x-slot:icon>
                        Bespoke Laravel applications built from scratch, tailored to your exact business requirements. No templates, no compromises.
                    </x-card>
                </div>

                <!-- Service 2 -->
                <div data-reveal>
                    <x-card :hover="true" title="API Development & Integration">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </x-slot:icon>
                        RESTful APIs, GraphQL, third-party integrations. Connect your systems seamlessly with payment gateways, CRMs, and more.
                    </x-card>
                </div>

                <!-- Service 3 -->
                <div data-reveal>
                    <x-card :hover="true" title="Laravel + Filament Admin Panels">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </x-slot:icon>
                        Powerful, beautiful admin panels with Filament. Manage your application with ease—no bloated WordPress dashboard.
                    </x-card>
                </div>

                <!-- Service 4 -->
                <div data-reveal>
                    <x-card :hover="true" title="MVP Development">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </x-slot:icon>
                        Launch fast without cutting corners. We build MVPs that can actually scale when your business takes off.
                    </x-card>
                </div>

                <!-- Service 5 -->
                <div data-reveal>
                    <x-card :hover="true" title="Legacy Code Modernization">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </x-slot:icon>
                        Stuck on PHP 5.6? We migrate and modernize legacy applications to current Laravel versions with comprehensive testing.
                    </x-card>
                </div>

                <!-- Service 6 -->
                <div data-reveal>
                    <x-card :hover="true" title="Code Quality & Standardization">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </x-slot:icon>
                        PHPStan, Pint, Rector, comprehensive testing. We eliminate code smells and improve developer experience for your entire team.
                    </x-card>
                </div>

                <!-- Service 7 -->
                <div data-reveal>
                    <x-card :hover="true" title="Technical Consulting / Fractional CTO">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </x-slot:icon>
                        Strategic technical guidance without the full-time hire. Architecture reviews, team mentoring, and roadmap planning.
                    </x-card>
                </div>

                <!-- Service 8 -->
                <div data-reveal>
                    <x-card :hover="true" title="DevOps & Deployment">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                            </svg>
                        </x-slot:icon>
                        CI/CD pipelines, hosting setup, performance optimization. We handle the infrastructure so you can focus on your business.
                    </x-card>
                </div>

                <!-- Service 9 -->
                <div data-reveal>
                    <x-card :hover="true" title="Team Augmentation">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </x-slot:icon>
                        Plug us into your dev team short-term. We match your pace, adopt your tools, and deliver without the HR overhead.
                    </x-card>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="relative bg-gray-50 dark:bg-gray-800 py-20 lg:py-32 transition-colors duration-200 overflow-hidden">
        {{-- Background texture --}}
        <div class="absolute inset-0 bg-noise"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-reveal>
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wide uppercase mb-4">Transparent Pricing</span>
                <h2 class="mt-2 text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">You Get What You Pay For</h2>
                <p class="mt-6 text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Code quality isn't extra. It's the difference between scaling and starting over.
                </p>
            </div>

            <div class="max-w-3xl mx-auto" data-reveal="scale">
                <div class="relative bg-white dark:bg-gray-900 rounded-3xl shadow-2xl shadow-primary/5 border border-gray-100 dark:border-gray-700/50 p-8 lg:p-12 overflow-hidden">
                    {{-- Decorative gradient corner --}}
                    <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-bl from-primary/10 via-transparent to-transparent"></div>

                    <div class="relative text-center mb-10">
                        <div class="inline-flex items-baseline gap-1">
                            <span class="text-6xl lg:text-7xl font-heading font-bold text-gradient">£500</span>
                            <span class="text-2xl text-gray-500 dark:text-gray-400 font-medium">/day</span>
                        </div>
                        <p class="mt-3 text-lg text-gray-600 dark:text-gray-400">for development</p>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700/50 pt-10">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            What's Included
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start group">
                                <span class="w-6 h-6 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:bg-primary/20 transition-colors">
                                    <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="ml-4 text-gray-700 dark:text-gray-300">Clean, tested, maintainable code (PHPStan, Pest, Laravel Pint)</span>
                            </li>
                            <li class="flex items-start group">
                                <span class="w-6 h-6 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:bg-primary/20 transition-colors">
                                    <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="ml-4 text-gray-700 dark:text-gray-300">Architecture that scales beyond MVP</span>
                            </li>
                            <li class="flex items-start group">
                                <span class="w-6 h-6 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:bg-primary/20 transition-colors">
                                    <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="ml-4 text-gray-700 dark:text-gray-300">Documentation your team can actually use</span>
                            </li>
                            <li class="flex items-start group">
                                <span class="w-6 h-6 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:bg-primary/20 transition-colors">
                                    <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="ml-4 text-gray-700 dark:text-gray-300">Code that doesn't become technical debt from day one</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-10 p-6 bg-gradient-to-br from-primary/5 to-primary/10 dark:from-primary/10 dark:to-primary/5 rounded-2xl border border-primary/10">
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-2 flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Full-Service Projects
                        </h4>
                        <p class="text-gray-700 dark:text-gray-300">
                            Need project management, QA testing, DevOps, hosting setup, and CI/CD? Full-service projects are priced individually based on scope. We'll give you a straight answer, not a sales pitch.
                        </p>
                    </div>

                    <div class="mt-10 text-center">
                        <a href="{{ route('contact.show') }}" class="btn btn-primary btn-shimmer px-10 py-4 text-lg">
                            Start a Conversation
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
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
