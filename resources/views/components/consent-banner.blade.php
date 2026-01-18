{{-- GDPR Cookie Consent Banner --}}
<div id="consent-banner" class="fixed bottom-0 left-0 right-0 z-[100] p-4 transform translate-y-full transition-transform duration-300 ease-out" role="dialog" aria-modal="true" aria-labelledby="consent-title">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 p-6 md:p-8">
            <div class="flex flex-col md:flex-row md:items-start gap-6">
                {{-- Icon and Content --}}
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h2 id="consent-title" class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ __('consent.title') }}
                        </h2>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        {{ __('consent.description') }}
                    </p>
                    <a href="#" id="consent-learn-more" class="inline-flex items-center gap-1 text-sm text-primary hover:underline mt-2">
                        {{ __('consent.learn_more') }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                {{-- Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 md:flex-col lg:flex-row">
                    <button type="button" id="consent-reject" class="px-6 py-3 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200 whitespace-nowrap">
                        {{ __('consent.reject') }}
                    </button>
                    <button type="button" id="consent-accept" class="px-6 py-3 rounded-xl text-sm font-medium text-white bg-primary hover:bg-primary-dark transition-colors duration-200 whitespace-nowrap">
                        {{ __('consent.accept') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Privacy Details Modal --}}
<div id="consent-modal" class="fixed inset-0 z-[101] hidden" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" id="consent-modal-backdrop"></div>
    <div class="fixed inset-0 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-lg w-full p-6 md:p-8">
                <button type="button" id="consent-modal-close" class="absolute top-4 right-4 p-2 rounded-lg text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <h3 id="modal-title" class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                    {{ __('consent.modal.title') }}
                </h3>

                <div class="space-y-4 text-sm text-gray-600 dark:text-gray-400">
                    <p>{{ __('consent.modal.intro') }}</p>

                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4">
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">{{ __('consent.modal.analytics_title') }}</h4>
                        <p>{{ __('consent.modal.analytics_description') }}</p>
                        <ul class="mt-2 space-y-1 text-xs">
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                {{ __('consent.modal.analytics_item1') }}
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                {{ __('consent.modal.analytics_item2') }}
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                {{ __('consent.modal.analytics_item3') }}
                            </li>
                        </ul>
                    </div>

                    <p class="text-xs text-gray-500 dark:text-gray-500">
                        {{ __('consent.modal.change_preferences') }}
                    </p>
                </div>

                <div class="mt-6 flex gap-3">
                    <button type="button" id="modal-reject" class="flex-1 px-4 py-2.5 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                        {{ __('consent.reject') }}
                    </button>
                    <button type="button" id="modal-accept" class="flex-1 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-primary hover:bg-primary-dark transition-colors">
                        {{ __('consent.accept') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    'use strict';

    const CONSENT_KEY = 'laragod_analytics_consent';
    const CONSENT_VERSION = '1';

    // Get stored consent
    function getStoredConsent() {
        try {
            const stored = localStorage.getItem(CONSENT_KEY);
            if (stored) {
                const data = JSON.parse(stored);
                if (data.version === CONSENT_VERSION) {
                    return data.consent;
                }
            }
        } catch (e) {
            console.error('Error reading consent:', e);
        }
        return null;
    }

    // Store consent
    function storeConsent(consent) {
        try {
            localStorage.setItem(CONSENT_KEY, JSON.stringify({
                consent: consent,
                version: CONSENT_VERSION,
                timestamp: new Date().toISOString()
            }));
        } catch (e) {
            console.error('Error storing consent:', e);
        }
    }

    // Update Google Consent Mode
    function updateGoogleConsent(granted) {
        if (typeof gtag === 'function') {
            gtag('consent', 'update', {
                'analytics_storage': granted ? 'granted' : 'denied'
            });
        }
    }

    // Show banner
    function showBanner() {
        const banner = document.getElementById('consent-banner');
        if (banner) {
            // Small delay to ensure CSS transition works
            requestAnimationFrame(() => {
                banner.classList.remove('translate-y-full');
                banner.classList.add('translate-y-0');
            });
        }
    }

    // Hide banner
    function hideBanner() {
        const banner = document.getElementById('consent-banner');
        if (banner) {
            banner.classList.remove('translate-y-0');
            banner.classList.add('translate-y-full');
        }
    }

    // Show modal
    function showModal() {
        const modal = document.getElementById('consent-modal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    // Hide modal
    function hideModal() {
        const modal = document.getElementById('consent-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    // Handle consent choice
    function handleConsent(granted) {
        storeConsent(granted);
        updateGoogleConsent(granted);
        hideBanner();
        hideModal();
    }

    // Initialize
    function init() {
        const storedConsent = getStoredConsent();

        // If no stored consent, show banner
        if (storedConsent === null) {
            // Wait for page load before showing banner
            if (document.readyState === 'complete') {
                setTimeout(showBanner, 500);
            } else {
                window.addEventListener('load', () => setTimeout(showBanner, 500));
            }
        } else {
            // Apply stored consent
            updateGoogleConsent(storedConsent);
        }

        // Event listeners
        document.getElementById('consent-accept')?.addEventListener('click', () => handleConsent(true));
        document.getElementById('consent-reject')?.addEventListener('click', () => handleConsent(false));
        document.getElementById('modal-accept')?.addEventListener('click', () => handleConsent(true));
        document.getElementById('modal-reject')?.addEventListener('click', () => handleConsent(false));
        document.getElementById('consent-learn-more')?.addEventListener('click', (e) => {
            e.preventDefault();
            showModal();
        });
        document.getElementById('consent-modal-backdrop')?.addEventListener('click', hideModal);
        document.getElementById('consent-modal-close')?.addEventListener('click', hideModal);

        // Escape key closes modal
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                hideModal();
            }
        });
    }

    // Run initialization
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
</script>
