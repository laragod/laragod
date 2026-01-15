<x-layouts.app title="About - Laragod">
    <!-- Hero Section -->
    <section class="bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-5xl lg:text-6xl font-heading font-bold text-gray-900 dark:text-white leading-tight">
                    We're NOT an Agency.<br>
                    <span class="text-primary">We're Developers.</span>
                </h1>
                <p class="mt-6 text-xl text-gray-600 dark:text-gray-400">
                    Laragod is founder-led out of the UK, with trusted senior developers brought into the fold as project scope demands. We're not flashy salesmen—we're developers who take pride in doing a good job.
                </p>
            </div>
        </div>
    </section>

    <!-- Origin Story -->
    <section class="bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-8 lg:p-12">
                <h2 class="text-3xl font-heading font-bold text-gray-900 dark:text-white mb-6">The Name</h2>
                <div class="prose prose-lg max-w-none text-gray-600 dark:text-gray-400 space-y-4">
                    <p>
                        The name? A colleague dubbed me "Laragod" years ago after I played a vital role in migrating the legacy app to a new codebase. The name stuck—and so did the standard we hold ourselves to.
                    </p>
                    <p>
                        Does it sound a bit cheeky? Sure. But here's the thing: we're not claiming to be gods. We're claiming to give a damn about the craft. In an industry full of agencies that treat code like disposable widgets, that apparently makes us stand out.
                    </p>
                    <p>
                        We've spent 10 years building web applications and 8 years deep in Laravel. We've seen the inside of big-name agencies. We've watched the smoke-and-mirror tactics. We've inherited the messes they leave behind. We decided to do better.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy -->
    <section class="bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">Our Philosophy</h2>
                <p class="mt-4 text-xl text-gray-600 dark:text-gray-400">How we think about code and why it matters</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Quick Wins vs Lasting Foundations -->
                <x-philosophy-card title="Quick Wins vs. Lasting Foundations">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </x-slot:icon>
                    You can build a house on sand quickly. We build on concrete—takes a bit longer upfront, but you can actually add a second floor later without it collapsing.
                </x-philosophy-card>

                <!-- Code Quality -->
                <x-philosophy-card title="Code Quality Isn't Optional">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </x-slot:icon>
                    PHPStan, comprehensive testing, proper architecture—these aren't "nice to haves." They're the difference between a codebase that scales and one that becomes your biggest liability.
                </x-philosophy-card>

                <!-- Developer Experience -->
                <x-philosophy-card title="Developer Experience Matters">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                        </svg>
                    </x-slot:icon>
                    Code smells physically bother us. Messy architectures impact DX for everyone on the team. We standardize, refactor, and document because we actually care about the next person who touches this code.
                </x-philosophy-card>

                <!-- Honest Communication -->
                <x-philosophy-card title="Straight Talk, Always">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </x-slot:icon>
                    If we can't do something, we'll tell you. If there's a better approach than what you asked for, we'll explain why. No sales pitches, no hand-waving—just honest technical guidance.
                </x-philosophy-card>
            </div>
        </div>
    </section>

    <!-- Tech Stack -->
    <section class="bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">Our Tech Stack</h2>
                <p class="mt-4 text-xl text-gray-600 dark:text-gray-400">The tools we use to build applications that last</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Backend -->
                <x-tech-list title="Backend">
                    <x-slot:icon>
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                        </svg>
                    </x-slot:icon>
                    <x-tech-item>PHP</x-tech-item>
                    <x-tech-item>Laravel</x-tech-item>
                    <x-tech-item>Filament / Laravel Nova</x-tech-item>
                    <x-tech-item>PostgreSQL / MySQL</x-tech-item>
                    <x-tech-item>Node.js / Express</x-tech-item>
                </x-tech-list>

                <!-- Frontend -->
                <x-tech-list title="Frontend">
                    <x-slot:icon>
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </x-slot:icon>
                    <x-tech-item>Vue.js / Nuxt</x-tech-item>
                    <x-tech-item>TypeScript</x-tech-item>
                    <x-tech-item>Tailwind CSS</x-tech-item>
                    <x-tech-item>Alpine.js / Livewire</x-tech-item>
                    <x-tech-item>Electron (desktop apps)</x-tech-item>
                </x-tech-list>

                <!-- Tools & Infrastructure -->
                <x-tech-list title="Tools & DevOps">
                    <x-slot:icon>
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </x-slot:icon>
                    <x-tech-item>PHPStan / Pest / Pint / Mago</x-tech-item>
                    <x-tech-item>GitHub Actions / CI/CD</x-tech-item>
                    <x-tech-item>AWS / Digital Ocean / Self-hosted</x-tech-item>
                    <x-tech-item>3rd Party Integrations</x-tech-item>
                    <x-tech-item>Jira / Trello / Asana / ADO</x-tech-item>
                </x-tech-list>
            </div>
        </div>
    </section>

    <!-- Values -->
    <section class="bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">What We Stand For</h2>
            </div>

            <div class="space-y-12">
                <!-- Craftsmanship -->
                <x-value-item title="Craftsmanship Over Speed">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </x-slot:icon>
                    Business cares about results and income—we get that. But we also care that the code itself is approachable and scalable beyond MVP. When you build something in WordPress, you can get it done quickly. But as soon as you try to reach anything beyond your own box, you're in for some hell. We build the kind that grows with you.
                </x-value-item>

                <!-- Transparency -->
                <x-value-item title="Transparency & Honesty">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </x-slot:icon>
                    We've spent years inside big-name agencies and seen the smoke-and-mirror tactics up close. We don't play that game. You'll get straight answers, realistic timelines, and code you can actually understand and maintain.
                </x-value-item>

                <!-- Long-term Thinking -->
                <x-value-item title="Long-term Thinking">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </x-slot:icon>
                    £500/day buys you code that doesn't become technical debt six months later. Your future developers will thank you instead of cursing whoever wrote this mess. That's the standard we hold ourselves to.
                </x-value-item>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <x-cta-section
        heading="Sound like your kind of team?"
        description="If you value code quality, honest communication, and long-term thinking, let's talk about your project."
        buttonText="Work With Us"
        buttonUrl="{{ route('contact.show') }}"
        background="gray-50">
    </x-cta-section>
</x-layouts.app>
