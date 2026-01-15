@props(['submitUrl'])

<div id="onboarding-form" class="bg-white dark:bg-gray-900 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden">
    <!-- Progress Bar -->
    <div class="bg-gray-50 dark:bg-gray-800 px-8 py-4 border-b border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Step <span id="current-step">1</span> of 3</span>
            <span id="step-title" class="text-sm font-medium text-primary">How can we help?</span>
        </div>
        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
            <div id="progress-bar" class="bg-primary h-2 rounded-full transition-all duration-300" style="width: 33.33%"></div>
        </div>
    </div>

    <form id="multi-step-form" class="p-8 lg:p-12">
        <!-- Step 1: How can we help? -->
        <div id="step-1" class="step-content">
            <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white mb-2">How can we help you?</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-8">Select all that apply. Your responses route straight to our inbox.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4" id="service-options">
                <label class="service-option group cursor-pointer">
                    <input type="checkbox" name="services[]" value="web-app" class="sr-only peer">
                    <div class="flex items-center p-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 peer-checked:border-primary peer-checked:bg-primary-light dark:peer-checked:bg-primary/10 hover:border-gray-300 dark:hover:border-gray-600 transition-all">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 peer-checked:bg-primary group-has-[:checked]:bg-primary flex items-center justify-center mr-4 transition-colors">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-has-[:checked]:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900 dark:text-white">Web App</span>
                    </div>
                </label>

                <label class="service-option group cursor-pointer">
                    <input type="checkbox" name="services[]" value="mobile-app" class="sr-only peer">
                    <div class="flex items-center p-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 peer-checked:border-primary peer-checked:bg-primary-light dark:peer-checked:bg-primary/10 hover:border-gray-300 dark:hover:border-gray-600 transition-all">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 peer-checked:bg-primary group-has-[:checked]:bg-primary flex items-center justify-center mr-4 transition-colors">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-has-[:checked]:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900 dark:text-white">Mobile App</span>
                    </div>
                </label>

                <label class="service-option group cursor-pointer">
                    <input type="checkbox" name="services[]" value="internal-tool" class="sr-only peer">
                    <div class="flex items-center p-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 peer-checked:border-primary peer-checked:bg-primary-light dark:peer-checked:bg-primary/10 hover:border-gray-300 dark:hover:border-gray-600 transition-all">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 peer-checked:bg-primary group-has-[:checked]:bg-primary flex items-center justify-center mr-4 transition-colors">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-has-[:checked]:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900 dark:text-white">Internal Tool</span>
                    </div>
                </label>

                <label class="service-option group cursor-pointer">
                    <input type="checkbox" name="services[]" value="automation-ai" class="sr-only peer">
                    <div class="flex items-center p-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 peer-checked:border-primary peer-checked:bg-primary-light dark:peer-checked:bg-primary/10 hover:border-gray-300 dark:hover:border-gray-600 transition-all">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 peer-checked:bg-primary group-has-[:checked]:bg-primary flex items-center justify-center mr-4 transition-colors">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-has-[:checked]:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900 dark:text-white">Automation / AI</span>
                    </div>
                </label>

                <label class="service-option group cursor-pointer">
                    <input type="checkbox" name="services[]" value="api-integration" class="sr-only peer">
                    <div class="flex items-center p-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 peer-checked:border-primary peer-checked:bg-primary-light dark:peer-checked:bg-primary/10 hover:border-gray-300 dark:hover:border-gray-600 transition-all">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 peer-checked:bg-primary group-has-[:checked]:bg-primary flex items-center justify-center mr-4 transition-colors">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-has-[:checked]:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900 dark:text-white">API / Integration</span>
                    </div>
                </label>

                <label class="service-option group cursor-pointer">
                    <input type="checkbox" name="services[]" value="legacy-rescue" class="sr-only peer">
                    <div class="flex items-center p-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 peer-checked:border-primary peer-checked:bg-primary-light dark:peer-checked:bg-primary/10 hover:border-gray-300 dark:hover:border-gray-600 transition-all">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 peer-checked:bg-primary group-has-[:checked]:bg-primary flex items-center justify-center mr-4 transition-colors">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-has-[:checked]:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900 dark:text-white">Rescue a Legacy Project</span>
                    </div>
                </label>

                <label class="service-option group cursor-pointer">
                    <input type="checkbox" name="services[]" value="fixed-contract" class="sr-only peer">
                    <div class="flex items-center p-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 peer-checked:border-primary peer-checked:bg-primary-light dark:peer-checked:bg-primary/10 hover:border-gray-300 dark:hover:border-gray-600 transition-all">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 peer-checked:bg-primary group-has-[:checked]:bg-primary flex items-center justify-center mr-4 transition-colors">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-has-[:checked]:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900 dark:text-white">Fixed Contract Work</span>
                    </div>
                </label>

                <label class="service-option group cursor-pointer">
                    <input type="checkbox" name="services[]" value="mvp" class="sr-only peer">
                    <div class="flex items-center p-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 peer-checked:border-primary peer-checked:bg-primary-light dark:peer-checked:bg-primary/10 hover:border-gray-300 dark:hover:border-gray-600 transition-all">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 peer-checked:bg-primary group-has-[:checked]:bg-primary flex items-center justify-center mr-4 transition-colors">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-has-[:checked]:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900 dark:text-white">Build an MVP</span>
                    </div>
                </label>

                <label class="service-option group cursor-pointer">
                    <input type="checkbox" name="services[]" value="ongoing-support" class="sr-only peer">
                    <div class="flex items-center p-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 peer-checked:border-primary peer-checked:bg-primary-light dark:peer-checked:bg-primary/10 hover:border-gray-300 dark:hover:border-gray-600 transition-all">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 peer-checked:bg-primary group-has-[:checked]:bg-primary flex items-center justify-center mr-4 transition-colors">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-has-[:checked]:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900 dark:text-white">Ongoing Support</span>
                    </div>
                </label>

                <label class="service-option group cursor-pointer">
                    <input type="checkbox" name="services[]" value="audit-review" class="sr-only peer">
                    <div class="flex items-center p-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 peer-checked:border-primary peer-checked:bg-primary-light dark:peer-checked:bg-primary/10 hover:border-gray-300 dark:hover:border-gray-600 transition-all">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 peer-checked:bg-primary group-has-[:checked]:bg-primary flex items-center justify-center mr-4 transition-colors">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-has-[:checked]:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900 dark:text-white">Audit & Code Review</span>
                    </div>
                </label>
            </div>

            <p id="step1-error" class="mt-4 text-sm text-red-500 hidden">Please select at least one service.</p>
        </div>

        <!-- Step 2: Contact Information -->
        <div id="step-2" class="step-content hidden">
            <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white mb-2">Tell us how to contact you</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-8">We'll get back to you within 24 hours.</p>

            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" required maxlength="100"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-colors"
                            placeholder="John Doe">
                    </div>

                    <div>
                        <label for="company" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Company / Team
                        </label>
                        <input type="text" id="company" name="company" maxlength="100"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-colors"
                            placeholder="Acme Inc.">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" name="email" required maxlength="200"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-colors"
                            placeholder="john@example.com">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Phone / WhatsApp
                        </label>
                        <input type="tel" id="phone" name="phone" maxlength="50"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-colors"
                            placeholder="+44 7XXX XXXXXX">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="budget" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Budget Range
                        </label>
                        <select id="budget" name="budget"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-colors">
                            <option value="">Select a range</option>
                            <option value="under-5k">Under £5,000</option>
                            <option value="5k-10k">£5,000 - £10,000</option>
                            <option value="10k-25k">£10,000 - £25,000</option>
                            <option value="25k-50k">£25,000 - £50,000</option>
                            <option value="50k-plus">£50,000+</option>
                            <option value="not-sure">Not sure yet</option>
                        </select>
                    </div>

                    <div>
                        <label for="timeline" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Timeline
                        </label>
                        <select id="timeline" name="timeline"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-colors">
                            <option value="">Select a timeline</option>
                            <option value="asap">ASAP</option>
                            <option value="1-3-months">1 - 3 months</option>
                            <option value="3-6-months">3 - 6 months</option>
                            <option value="6-plus-months">6+ months</option>
                            <option value="flexible">Flexible</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Tell us about your project <span class="text-red-500">*</span>
                    </label>
                    <textarea id="message" name="message" rows="4" required maxlength="2000"
                        class="appearance-none block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-colors"
                        placeholder="Describe your project, goals, and any specific requirements..."></textarea>
                </div>

                <div>
                    <label for="tech_notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Existing tech, repos, or constraints?
                    </label>
                    <textarea id="tech_notes" name="tech_notes" rows="2" maxlength="1000"
                        class="appearance-none block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-colors"
                        placeholder="Links to repos, staging URLs, or integrations we should know about..."></textarea>
                </div>
            </div>
        </div>

        <!-- Step 3: Review & Submit -->
        <div id="step-3" class="step-content hidden">
            <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white mb-2">Review & Submit</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-8">One last look before we get started.</p>

            <div class="space-y-6">
                <!-- Services Summary -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">What you need</h3>
                        <button type="button" onclick="goToStep(1)" class="text-primary hover:text-primary-dark text-sm font-medium">Edit</button>
                    </div>
                    <div id="review-services" class="flex flex-wrap gap-2">
                        <!-- Populated by JS -->
                    </div>
                </div>

                <!-- Contact Summary -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Contact Information</h3>
                        <button type="button" onclick="goToStep(2)" class="text-primary hover:text-primary-dark text-sm font-medium">Edit</button>
                    </div>
                    <dl id="review-contact" class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <!-- Populated by JS -->
                    </dl>
                </div>

                <!-- Project Summary -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Project Details</h3>
                        <button type="button" onclick="goToStep(2)" class="text-primary hover:text-primary-dark text-sm font-medium">Edit</button>
                    </div>
                    <div id="review-project" class="text-sm text-gray-600 dark:text-gray-400">
                        <!-- Populated by JS -->
                    </div>
                </div>

                <!-- Spam Protection -->
                <div class="bg-primary-light dark:bg-primary/10 rounded-lg p-6">
                    <label for="captcha" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        What is <span id="captcha-question" class="font-bold text-primary"></span>? <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="captcha" name="captcha" required
                        class="appearance-none block w-32 px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-colors"
                        placeholder="?">
                    <input type="hidden" id="captcha-answer" name="captcha_answer">
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex items-center justify-between mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
            <button type="button" id="prev-btn" onclick="prevStep()"
                class="hidden px-6 py-3 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white font-medium transition-colors">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back
            </button>

            <div class="ml-auto flex items-center gap-4">
                <button type="button" id="next-btn" onclick="nextStep()"
                    class="px-8 py-3 bg-primary hover:bg-primary-dark text-white font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:-translate-y-0.5">
                    Continue
                    <svg class="w-5 h-5 inline ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <button type="submit" id="submit-btn"
                    class="hidden px-8 py-3 bg-primary hover:bg-primary-dark text-white font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:-translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                    <span id="submit-text">Send Request</span>
                    <span id="submit-spinner" class="hidden">
                        <svg class="animate-spin h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>

        <!-- Messages -->
        <div id="form-message" class="hidden mt-6">
            <div id="success-message" class="hidden rounded-lg bg-primary-light dark:bg-green-900/30 border border-primary dark:border-green-700 p-4">
                <div class="flex">
                    <svg class="w-5 h-5 text-primary dark:text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <p class="ml-3 text-sm font-medium text-gray-900 dark:text-white"></p>
                </div>
            </div>
            <div id="error-message" class="hidden rounded-lg bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-700 p-4">
                <div class="flex">
                    <svg class="w-5 h-5 text-red-500 dark:text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <p class="ml-3 text-sm font-medium text-red-800 dark:text-red-300"></p>
                </div>
            </div>
        </div>
    </form>
</div>

<script defer>
document.addEventListener('DOMContentLoaded', function() {
    let currentStep = 1;
    const totalSteps = 3;
    const form = document.getElementById('multi-step-form');
    const submitUrl = '{{ $submitUrl }}';

    const stepTitles = {
        1: 'How can we help?',
        2: 'Contact information',
        3: 'Review & submit'
    };

    const serviceLabels = {
        'web-app': 'Web App',
        'mobile-app': 'Mobile App',
        'internal-tool': 'Internal Tool',
        'automation-ai': 'Automation / AI',
        'api-integration': 'API / Integration',
        'legacy-rescue': 'Rescue a Legacy Project',
        'fixed-contract': 'Fixed Contract Work',
        'mvp': 'Build an MVP',
        'ongoing-support': 'Ongoing Support',
        'audit-review': 'Audit & Code Review'
    };

    const budgetLabels = {
        'under-5k': 'Under £5,000',
        '5k-10k': '£5,000 - £10,000',
        '10k-25k': '£10,000 - £25,000',
        '25k-50k': '£25,000 - £50,000',
        '50k-plus': '£50,000+',
        'not-sure': 'Not sure yet'
    };

    const timelineLabels = {
        'asap': 'ASAP',
        '1-3-months': '1 - 3 months',
        '3-6-months': '3 - 6 months',
        '6-plus-months': '6+ months',
        'flexible': 'Flexible'
    };

    // Generate captcha
    function generateCaptcha() {
        const num1 = Math.floor(Math.random() * 10) + 1;
        const num2 = Math.floor(Math.random() * 10) + 1;
        const answer = num1 + num2;
        document.getElementById('captcha-question').textContent = `${num1} + ${num2}`;
        document.getElementById('captcha-answer').value = answer;
    }

    // Initialize captcha
    generateCaptcha();

    // Update UI for current step
    function updateUI() {
        // Update progress bar
        const progress = (currentStep / totalSteps) * 100;
        document.getElementById('progress-bar').style.width = progress + '%';
        document.getElementById('current-step').textContent = currentStep;
        document.getElementById('step-title').textContent = stepTitles[currentStep];

        // Show/hide steps
        for (let i = 1; i <= totalSteps; i++) {
            const stepEl = document.getElementById('step-' + i);
            if (i === currentStep) {
                stepEl.classList.remove('hidden');
            } else {
                stepEl.classList.add('hidden');
            }
        }

        // Show/hide navigation buttons
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const submitBtn = document.getElementById('submit-btn');

        if (currentStep === 1) {
            prevBtn.classList.add('hidden');
        } else {
            prevBtn.classList.remove('hidden');
        }

        if (currentStep === totalSteps) {
            nextBtn.classList.add('hidden');
            submitBtn.classList.remove('hidden');
            populateReview();
        } else {
            nextBtn.classList.remove('hidden');
            submitBtn.classList.add('hidden');
        }
    }

    // Validate current step
    function validateStep() {
        if (currentStep === 1) {
            const services = form.querySelectorAll('input[name="services[]"]:checked');
            const errorEl = document.getElementById('step1-error');
            if (services.length === 0) {
                errorEl.classList.remove('hidden');
                return false;
            }
            errorEl.classList.add('hidden');
            return true;
        }

        if (currentStep === 2) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();

            if (!name || !email || !message) {
                return false;
            }

            // Basic email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                return false;
            }

            return true;
        }

        if (currentStep === 3) {
            const captcha = document.getElementById('captcha').value;
            const answer = document.getElementById('captcha-answer').value;
            return captcha === answer;
        }

        return true;
    }

    // Populate review section
    function populateReview() {
        // Services
        const services = form.querySelectorAll('input[name="services[]"]:checked');
        const servicesContainer = document.getElementById('review-services');
        servicesContainer.innerHTML = '';
        services.forEach(service => {
            const badge = document.createElement('span');
            badge.className = 'px-3 py-1 bg-primary text-white text-sm rounded-full';
            badge.textContent = serviceLabels[service.value] || service.value;
            servicesContainer.appendChild(badge);
        });

        // Contact info
        const contactContainer = document.getElementById('review-contact');
        const name = document.getElementById('name').value || 'Not specified';
        const company = document.getElementById('company').value || 'Not specified';
        const email = document.getElementById('email').value || 'Not specified';
        const phone = document.getElementById('phone').value || 'Not specified';
        const budget = document.getElementById('budget').value;
        const timeline = document.getElementById('timeline').value;

        contactContainer.innerHTML = `
            <div><dt class="text-gray-500 dark:text-gray-400">Name</dt><dd class="font-medium text-gray-900 dark:text-white">${escapeHtml(name)}</dd></div>
            <div><dt class="text-gray-500 dark:text-gray-400">Company</dt><dd class="font-medium text-gray-900 dark:text-white">${escapeHtml(company)}</dd></div>
            <div><dt class="text-gray-500 dark:text-gray-400">Email</dt><dd class="font-medium text-gray-900 dark:text-white">${escapeHtml(email)}</dd></div>
            <div><dt class="text-gray-500 dark:text-gray-400">Phone</dt><dd class="font-medium text-gray-900 dark:text-white">${escapeHtml(phone)}</dd></div>
            <div><dt class="text-gray-500 dark:text-gray-400">Budget</dt><dd class="font-medium text-gray-900 dark:text-white">${budgetLabels[budget] || 'Not specified'}</dd></div>
            <div><dt class="text-gray-500 dark:text-gray-400">Timeline</dt><dd class="font-medium text-gray-900 dark:text-white">${timelineLabels[timeline] || 'Not specified'}</dd></div>
        `;

        // Project details
        const projectContainer = document.getElementById('review-project');
        const message = document.getElementById('message').value || 'Not specified';
        const techNotes = document.getElementById('tech_notes').value;

        let projectHtml = `<p class="mb-4"><strong class="text-gray-900 dark:text-white">Project Description:</strong><br>${escapeHtml(message)}</p>`;
        if (techNotes) {
            projectHtml += `<p><strong class="text-gray-900 dark:text-white">Tech Notes:</strong><br>${escapeHtml(techNotes)}</p>`;
        }
        projectContainer.innerHTML = projectHtml;
    }

    // Escape HTML for XSS protection
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Navigation functions (global scope)
    window.nextStep = function() {
        if (validateStep()) {
            if (currentStep < totalSteps) {
                currentStep++;
                updateUI();
                window.scrollTo({ top: document.getElementById('onboarding-form').offsetTop - 100, behavior: 'smooth' });
            }
        }
    };

    window.prevStep = function() {
        if (currentStep > 1) {
            currentStep--;
            updateUI();
            window.scrollTo({ top: document.getElementById('onboarding-form').offsetTop - 100, behavior: 'smooth' });
        }
    };

    window.goToStep = function(step) {
        currentStep = step;
        updateUI();
        window.scrollTo({ top: document.getElementById('onboarding-form').offsetTop - 100, behavior: 'smooth' });
    };

    // Form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        if (!validateStep()) {
            const errorMessage = document.getElementById('error-message');
            errorMessage.querySelector('p').textContent = 'Please complete the captcha correctly.';
            errorMessage.classList.remove('hidden');
            document.getElementById('form-message').classList.remove('hidden');
            return;
        }

        const submitBtn = document.getElementById('submit-btn');
        const submitText = document.getElementById('submit-text');
        const submitSpinner = document.getElementById('submit-spinner');
        const formMessage = document.getElementById('form-message');
        const successMessage = document.getElementById('success-message');
        const errorMessage = document.getElementById('error-message');

        // Reset messages
        formMessage.classList.add('hidden');
        successMessage.classList.add('hidden');
        errorMessage.classList.add('hidden');

        // Show loading state
        submitBtn.disabled = true;
        submitText.classList.add('hidden');
        submitSpinner.classList.remove('hidden');

        // Collect form data
        const services = Array.from(form.querySelectorAll('input[name="services[]"]:checked')).map(el => el.value);

        const formData = {
            services: services,
            name: document.getElementById('name').value.trim(),
            company: document.getElementById('company').value.trim(),
            email: document.getElementById('email').value.trim(),
            phone: document.getElementById('phone').value.trim(),
            budget: document.getElementById('budget').value,
            timeline: document.getElementById('timeline').value,
            message: document.getElementById('message').value.trim(),
            tech_notes: document.getElementById('tech_notes').value.trim()
        };

        try {
            const csrfMeta = document.querySelector('meta[name="csrf-token"]');
            if (!csrfMeta) {
                throw new Error('CSRF token not found. Please refresh the page.');
            }
            const csrfToken = csrfMeta.getAttribute('content');

            const response = await fetch(submitUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(formData)
            });

            const data = await response.json();

            if (response.ok && data.ok) {
                successMessage.querySelector('p').textContent = data.message || 'Request sent successfully! We\'ll get back to you within 24 hours.';
                successMessage.classList.remove('hidden');
                formMessage.classList.remove('hidden');

                // Hide form content and show success
                document.querySelectorAll('.step-content').forEach(el => el.classList.add('hidden'));
                document.querySelector('#multi-step-form > .flex').classList.add('hidden'); // Hide buttons

                // Show a success state
                const successSection = document.createElement('div');
                successSection.className = 'text-center py-8';
                successSection.innerHTML = `
                    <div class="w-20 h-20 bg-primary-light dark:bg-primary/20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white mb-4">Request Received!</h2>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">We'll review your project and get back to you within 24 hours.</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center text-primary hover:text-primary-dark font-medium">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Home
                    </a>
                `;
                form.insertBefore(successSection, formMessage);
            } else {
                let errorText = 'An error occurred. Please try again.';
                if (response.status === 419) {
                    errorText = 'Your session has expired. Please refresh the page and try again.';
                } else if (data.errors) {
                    errorText = Object.values(data.errors).flat().join(' ');
                } else if (data.message) {
                    errorText = data.message;
                }
                errorMessage.querySelector('p').textContent = errorText;
                errorMessage.classList.remove('hidden');
                formMessage.classList.remove('hidden');
            }
        } catch (error) {
            const errorText = error.message || 'Network error. Please check your connection and try again.';
            errorMessage.querySelector('p').textContent = errorText;
            errorMessage.classList.remove('hidden');
            formMessage.classList.remove('hidden');
        }

        // Reset button state
        submitBtn.disabled = false;
        submitText.classList.remove('hidden');
        submitSpinner.classList.add('hidden');
    });

    // Initialize
    updateUI();
});
</script>
