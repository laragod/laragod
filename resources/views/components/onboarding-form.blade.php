@props(['submitUrl'])

@php
$services = [
    'web-app' => 'Web App',
    'mobile-app' => 'Mobile App',
    'internal-tool' => 'Internal Tool',
    'automation-ai' => 'Automation / AI',
    'api-integration' => 'API / Integration',
    'legacy-rescue' => 'Legacy Rescue',
    'fixed-contract' => 'Fixed Contract',
    'mvp' => 'Build MVP',
    'ongoing-support' => 'Ongoing Support',
    'audit-review' => 'Code Review',
];

$budgetOptions = [
    'under-5k' => 'Under £5,000',
    '5k-10k' => '£5,000 - £10,000',
    '10k-25k' => '£10,000 - £25,000',
    '25k-50k' => '£25,000 - £50,000',
    '50k-plus' => '£50,000+',
    'not-sure' => 'Not sure yet',
];

$timelineOptions = [
    'asap' => 'ASAP',
    '1-3-months' => '1 - 3 months',
    '3-6-months' => '3 - 6 months',
    '6-plus-months' => '6+ months',
    'flexible' => 'Flexible',
];
@endphp

<div id="onboarding-form" class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
    <!-- Progress Bar -->
    <div class="bg-gray-50 dark:bg-gray-800 px-6 lg:px-10 py-4 border-b border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Step <span id="current-step">1</span> of 3</span>
            <span id="step-title" class="text-sm font-medium text-primary">Select Services</span>
        </div>
        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5">
            <div id="progress-bar" class="bg-primary h-1.5 rounded-full transition-all duration-300" style="width: 33.33%"></div>
        </div>
    </div>

    <form id="multi-step-form" class="p-6 lg:p-10">
        <!-- Step 1: Service Selection -->
        <div id="step-1" class="step-content">
            <div class="mb-6">
                <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white">What do you need?</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Select all that apply</p>
            </div>

            <div class="flex flex-wrap gap-3" id="service-options">
                @foreach($services as $value => $label)
                    <x-form-chip name="services[]" :value="$value" :label="$label" />
                @endforeach
            </div>

            <p id="step1-error" class="mt-4 text-sm text-red-500 hidden">Please select at least one service.</p>
        </div>

        <!-- Step 2: Contact Information -->
        <div id="step-2" class="step-content hidden">
            <div class="mb-8">
                <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white">Your Details</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">We'll get back to you within 24 hours</p>
            </div>

            <div class="space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <x-form-input name="name" label="Full Name" :required="true" maxlength="100" placeholder="John Doe" />
                    <x-form-input name="company" label="Company" maxlength="100" placeholder="Acme Inc." />
                    <x-form-input name="email" label="Email" type="email" :required="true" maxlength="200" placeholder="john@example.com" />
                    <x-form-input name="phone" label="Phone / WhatsApp" type="tel" maxlength="50" placeholder="+44 7XXX XXXXXX" />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <x-form-select name="budget" label="Budget Range" placeholder="Select a range" :options="$budgetOptions" />
                    <x-form-select name="timeline" label="Timeline" placeholder="Select a timeline" :options="$timelineOptions" />
                </div>

                <x-form-textarea name="message" label="Project Description" :required="true" rows="4" maxlength="2000" placeholder="Tell us about your project, goals, and any specific requirements..." />

                <x-form-textarea name="tech_notes" label="Tech Notes" :optional="true" rows="2" maxlength="1000" placeholder="Existing tech stack, repo links, staging URLs, or constraints we should know about..." />
            </div>
        </div>

        <!-- Step 3: Review & Submit -->
        <div id="step-3" class="step-content hidden">
            <div class="mb-8">
                <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white">Review & Submit</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">One last look before we get started</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-6">
                    <x-review-panel title="Services" :editStep="1">
                        <div id="review-services" class="flex flex-wrap gap-2"></div>
                    </x-review-panel>

                    <x-review-panel title="Contact" :editStep="2">
                        <dl id="review-contact" class="grid grid-cols-2 gap-3 text-sm"></dl>
                    </x-review-panel>
                </div>

                <div class="space-y-6">
                    <x-review-panel title="Project" :editStep="2">
                        <div id="review-project" class="text-sm text-gray-600 dark:text-gray-400 max-h-40 overflow-y-auto"></div>
                    </x-review-panel>

                    <div class="bg-primary-light dark:bg-primary/10 rounded-xl p-5">
                        <label for="captcha" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Quick check: What is <span id="captcha-question" class="font-bold text-primary"></span>?
                        </label>
                        <input type="number" id="captcha" name="captcha" required class="form-control w-24" placeholder="?">
                        <input type="hidden" id="captcha-answer" name="captcha_answer">
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
            <button type="button" id="prev-btn" class="hidden text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white font-medium transition-colors">
                &larr; Back
            </button>

            <div class="ml-auto">
                <button type="button" id="next-btn" class="btn btn-primary">
                    Continue &rarr;
                </button>
                <button type="submit" id="submit-btn" class="hidden btn btn-primary">
                    <span id="submit-text">Send Request</span>
                    <svg id="submit-spinner" class="hidden animate-spin h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
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
    const form = document.getElementById('multi-step-form');
    const $ = id => document.getElementById(id);
    const submitUrl = '{{ $submitUrl }}';
    const labels = { services: @json($services), budget: @json($budgetOptions), timeline: @json($timelineOptions) };
    const stepTitles = ['', 'Select Services', 'Your Details', 'Review & Submit'];
    let step = 1;

    // Captcha
    const num1 = Math.floor(Math.random() * 10) + 1, num2 = Math.floor(Math.random() * 10) + 1;
    $('captcha-question').textContent = `${num1} + ${num2}`;
    $('captcha-answer').value = num1 + num2;

    function goTo(newStep) {
        step = newStep;
        $('progress-bar').style.width = (step / 3 * 100) + '%';
        $('current-step').textContent = step;
        $('step-title').textContent = stepTitles[step];
        [1, 2, 3].forEach(i => $('step-' + i).classList.toggle('hidden', i !== step));
        $('prev-btn').classList.toggle('hidden', step === 1);
        $('next-btn').classList.toggle('hidden', step === 3);
        $('submit-btn').classList.toggle('hidden', step !== 3);
        if (step === 3) populateReview();
        window.scrollTo({ top: $('onboarding-form').offsetTop - 100, behavior: 'smooth' });
    }

    function validate() {
        if (step === 1) {
            const hasServices = form.querySelectorAll('input[name="services[]"]:checked').length > 0;
            $('step1-error').classList.toggle('hidden', hasServices);
            return hasServices;
        }
        if (step === 2) {
            const name = $('name').value.trim(), email = $('email').value.trim(), msg = $('message').value.trim();
            return name && email && msg && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
        if (step === 3) return $('captcha').value === $('captcha-answer').value;
        return true;
    }

    function populateReview() {
        const esc = t => { const d = document.createElement('div'); d.textContent = t; return d.innerHTML; };
        const field = (label, val) => `<div><dt class="text-gray-500 dark:text-gray-400 text-xs">${label}</dt><dd class="font-medium text-gray-900 dark:text-white">${esc(val || '-')}</dd></div>`;

        $('review-services').innerHTML = [...form.querySelectorAll('input[name="services[]"]:checked')]
            .map(s => `<span class="px-2.5 py-1 bg-primary text-white text-xs rounded-full">${labels.services[s.value]}</span>`).join('');

        $('review-contact').innerHTML = [
            field('Name', $('name').value), field('Company', $('company').value),
            field('Email', $('email').value), field('Phone', $('phone').value),
            field('Budget', labels.budget[$('budget').value]), field('Timeline', labels.timeline[$('timeline').value])
        ].join('');

        const msg = $('message').value, tech = $('tech_notes').value;
        $('review-project').innerHTML = `<p class="whitespace-pre-wrap">${esc(msg || '-')}</p>` +
            (tech ? `<p class="mt-3 pt-3 border-t border-gray-200 dark:border-gray-700"><span class="text-gray-500 dark:text-gray-400 text-xs block mb-1">Tech Notes</span>${esc(tech)}</p>` : '');
    }

    function showError(msg) {
        $('error-message').querySelector('p').textContent = msg;
        $('error-message').classList.remove('hidden');
        $('form-message').classList.remove('hidden');
    }

    // Navigation
    $('prev-btn').onclick = () => step > 1 && goTo(step - 1);
    $('next-btn').onclick = () => validate() && step < 3 && goTo(step + 1);
    window.goToStep = goTo;

    // Submit
    form.onsubmit = async e => {
        e.preventDefault();
        if (!validate()) return showError('Please complete the captcha correctly.');

        $('submit-btn').disabled = true;
        $('submit-text').classList.add('hidden');
        $('submit-spinner').classList.remove('hidden');
        $('form-message').classList.add('hidden');

        const data = {
            services: [...form.querySelectorAll('input[name="services[]"]:checked')].map(el => el.value),
            name: $('name').value.trim(), company: $('company').value.trim(),
            email: $('email').value.trim(), phone: $('phone').value.trim(),
            budget: $('budget').value, timeline: $('timeline').value,
            message: $('message').value.trim(), tech_notes: $('tech_notes').value.trim()
        };

        try {
            const csrf = document.querySelector('meta[name="csrf-token"]')?.content;
            if (!csrf) throw new Error('CSRF token not found. Please refresh.');

            const res = await fetch(submitUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf },
                body: JSON.stringify(data)
            });
            const json = await res.json();

            if (res.ok && json.ok) {
                document.querySelectorAll('.step-content').forEach(el => el.classList.add('hidden'));
                document.querySelector('#multi-step-form > .flex')?.classList.add('hidden');
                form.insertAdjacentHTML('afterbegin', `
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-primary-light dark:bg-primary/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <h2 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-2">Request Received!</h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">We'll get back to you within 24 hours.</p>
                        <a href="{{ route('home') }}" class="text-primary hover:text-primary-dark font-medium text-sm">&larr; Back to Home</a>
                    </div>`);
            } else {
                showError(res.status === 419 ? 'Session expired. Please refresh.' : json.errors ? Object.values(json.errors).flat().join(' ') : json.message || 'An error occurred.');
            }
        } catch (err) {
            showError(err.message || 'Network error. Please check your connection.');
        }

        $('submit-btn').disabled = false;
        $('submit-text').classList.remove('hidden');
        $('submit-spinner').classList.add('hidden');
    };

    goTo(1);
});
</script>
