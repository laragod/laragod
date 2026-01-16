@props(['submitUrl', 'services', 'budgetOptions', 'timelineOptions'])

<div id="onboarding-form"
     class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
    <!-- Progress Bar -->
    <div class="bg-gray-50 dark:bg-gray-800 px-6 lg:px-10 py-4 border-b border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ __('form.step_of', ['current' => '<span id="current-step">1</span>', 'total' => '3']) }}</span>
            <span id="step-title" class="text-sm font-medium text-primary">{{ __('form.step1.title') }}</span>
        </div>
        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5">
            <div id="progress-bar" class="bg-primary h-1.5 rounded-full transition-all duration-300"
                 style="width: 33.33%"></div>
        </div>
    </div>

    <form id="multi-step-form" class="p-6 lg:p-10">
        <!-- Step 1: Service Selection -->
        <div id="step-1" class="step-content">
            <div class="mb-6">
                <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white">{{ __('form.step1.heading') }}</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">{{ __('form.step1.description') }}</p>
            </div>

            <div class="flex flex-wrap gap-3" id="service-options">
                @foreach($services as $value => $label)
                    <x-form-chip name="services[]" :value="$value" :label="$label"/>
                @endforeach
            </div>

            <p id="step1-error" class="mt-4 text-sm text-red-500 hidden">{{ __('form.step1.error') }}</p>
        </div>

        <!-- Step 2: Contact Information -->
        <div id="step-2" class="step-content hidden">
            <div class="mb-8">
                <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white">{{ __('form.step2.heading') }}</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">{{ __('form.step2.description') }}</p>
            </div>

            <div class="space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <x-form-input name="name" :label="__('form.field.name')" :required="true" maxlength="100"
                                  placeholder="John Doe"/>
                    <x-form-input name="company" :label="__('form.field.company')" maxlength="100" placeholder="Acme Inc."/>
                    <x-form-input name="email" :label="__('form.field.email')" type="email" :required="true" maxlength="200"
                                  placeholder="john@example.com"/>
                    <x-form-input name="phone" :label="__('form.field.phone')" type="tel" maxlength="50"
                                  placeholder="+44 7XXX XXXXXX"/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <x-form-select name="budget" :label="__('form.field.budget')" :placeholder="__('form.field.budget_placeholder')"
                                   :options="$budgetOptions"/>
                    <x-form-select name="timeline" :label="__('form.field.timeline')" :placeholder="__('form.field.timeline_placeholder')"
                                   :options="$timelineOptions"/>
                </div>

                <x-form-textarea name="message" :label="__('form.field.message')" :required="true" rows="4" maxlength="2000"
                                 :placeholder="__('form.field.message_placeholder')"/>

                <x-form-textarea name="tech_notes" :label="__('form.field.tech_notes')" :optional="true" rows="2" maxlength="1000"
                                 :placeholder="__('form.field.tech_notes_placeholder')"/>
            </div>
        </div>

        <!-- Step 3: Review & Submit -->
        <div id="step-3" class="step-content hidden">
            <div class="mb-8">
                <h2 class="text-2xl font-heading font-bold text-gray-900 dark:text-white">{{ __('form.step3.heading') }}</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">{{ __('form.step3.description') }}</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-6">
                    <x-review-panel :title="__('form.review.services')" :editStep="1">
                        <div id="review-services" class="flex flex-wrap gap-2"></div>
                    </x-review-panel>

                    <x-review-panel :title="__('form.review.contact')" :editStep="2">
                        <dl id="review-contact" class="grid grid-cols-2 gap-3 text-sm"></dl>
                    </x-review-panel>
                </div>

                <div class="space-y-6">
                    <x-review-panel :title="__('form.review.project')" :editStep="2">
                        <div id="review-project"
                             class="text-sm text-gray-600 dark:text-gray-400 max-h-40 overflow-y-auto"></div>
                    </x-review-panel>

                    <div
                        class="rounded-xl p-5 border bg-gray-100 border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                        <label for="captcha" class="block text-sm font-medium text-gray-800 dark:text-white mb-2">
                            <span id="captcha-label"></span>
                        </label>
                        <input type="number" id="captcha" name="captcha" required class="form-control w-24"
                               placeholder="?">
                        <input type="hidden" id="captcha-answer" name="captcha_answer">
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
            <button type="button" id="prev-btn"
                    class="hidden text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white font-medium transition-colors">
                &larr; {{ __('form.nav.back') }}
            </button>

            <div class="ml-auto flex gap-3">
                <button type="button" id="next-btn" class="btn btn-primary">
                    {{ __('form.nav.continue') }}
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <button type="submit" id="submit-btn" class="btn btn-primary btn-shimmer" style="display: none;">
                    <span id="submit-text">{{ __('form.nav.submit') }}</span>
                    <svg id="submit-spinner" class="hidden animate-spin h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Messages -->
        <div id="form-message" class="hidden mt-6">
            <div id="success-message"
                 class="hidden rounded-lg bg-primary-light dark:bg-green-900/30 border border-primary dark:border-green-700 p-4">
                <div class="flex">
                    <svg class="w-5 h-5 text-primary dark:text-green-500 flex-shrink-0 mt-0.5" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <p class="ml-3 text-sm font-medium text-gray-900 dark:text-white"></p>
                </div>
            </div>
            <div id="error-message"
                 class="hidden rounded-lg bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-700 p-4">
                <div class="flex">
                    <svg class="w-5 h-5 text-red-500 dark:text-red-400 flex-shrink-0 mt-0.5" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <p class="ml-3 text-sm font-medium text-red-800 dark:text-red-300"></p>
                </div>
            </div>
        </div>
    </form>
</div>

<script defer>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('multi-step-form');
        const $ = id => document.getElementById(id);
        const submitUrl = '{{ $submitUrl }}';
        const labels = {services: @json($services), budget: @json($budgetOptions), timeline: @json($timelineOptions) };
        const stepTitles = ['', @json(__('form.step1.title')), @json(__('form.step2.title')), @json(__('form.step3.title'))];
        const i18n = {
            captcha: @json(__('form.captcha')),
            captchaError: @json(__('form.captcha_error')),
            successTitle: @json(__('form.success.title')),
            successMessage: @json(__('form.success.message')),
            backHome: @json(__('form.success.back_home')),
            csrfError: @json(__('form.error.csrf')),
            csrfTokenError: @json(__('form.error.csrf_token')),
            networkError: @json(__('form.error.network')),
            genericError: @json(__('form.error.generic') ?? 'An error occurred.'),
            techNotes: @json(__('form.review.tech_notes'))
        };
        let step = 1;

        // Captcha
        const num1 = Math.floor(Math.random() * 10) + 1, num2 = Math.floor(Math.random() * 10) + 1;
        $('captcha-label').textContent = i18n.captcha.replace(':question', `${num1} + ${num2}`);
        $('captcha-answer').value = num1 + num2;

        function goTo(newStep) {
            step = newStep;
            $('progress-bar').style.width = (step / 3 * 100) + '%';
            $('current-step').textContent = step;
            $('step-title').textContent = stepTitles[step];
            [1, 2, 3].forEach(i => $('step-' + i).classList.toggle('hidden', i !== step));
            $('prev-btn').classList.toggle('hidden', step === 1);
            // Show/hide buttons based on step - use display for bulletproof hiding
            $('next-btn').style.display = step === 3 ? 'none' : 'inline-flex';
            $('submit-btn').style.display = step === 3 ? 'inline-flex' : 'none';
            if (step === 3) populateReview();
            window.scrollTo({top: $('onboarding-form').offsetTop - 100, behavior: 'smooth'});
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
            const esc = t => {
                const d = document.createElement('div');
                d.textContent = t;
                return d.innerHTML;
            };
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
                (tech ? `<p class="mt-3 pt-3 border-t border-gray-200 dark:border-gray-700"><span class="text-gray-500 dark:text-gray-400 text-xs block mb-1">${i18n.techNotes}</span>${esc(tech)}</p>` : '');
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
            if (!validate()) return showError(i18n.captchaError);

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
                if (!csrf) throw new Error(i18n.csrfTokenError);

                const res = await fetch(submitUrl, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf},
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
                        <h2 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-2">${i18n.successTitle}</h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">${i18n.successMessage}</p>
                        <a href="{{ route('home') }}" class="text-primary hover:text-primary-dark font-medium text-sm">&larr; ${i18n.backHome}</a>
                    </div>`);
                } else {
                    showError(res.status === 419 ? i18n.csrfError : json.errors ? Object.values(json.errors).flat().join(' ') : json.message || i18n.genericError);
                }
            } catch (err) {
                showError(err.message || i18n.networkError);
            }

            $('submit-btn').disabled = false;
            $('submit-text').classList.remove('hidden');
            $('submit-spinner').classList.add('hidden');
        };

        goTo(1);
    });
</script>
