@php
    $currencies = array_keys(config('offer.currencies'));
    $defaultCurrency = config('offer.default_currency')[app()->getLocale()] ?? $currencies[0];
@endphp

<div {{ $attributes->merge(['class' => 'inline-flex items-center gap-3']) }} data-currency-switcher role="group" aria-label="{{ __('offer.currency_label') }}">
    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('offer.currency_label') }}</span>
    <div class="inline-flex items-center gap-1 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 p-1">
        @foreach($currencies as $currency)
            <button type="button"
                    data-currency-switch="{{ $currency }}"
                    aria-pressed="{{ $currency === $defaultCurrency ? 'true' : 'false' }}"
                    class="px-3 py-1.5 rounded-md text-sm font-semibold text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-primary aria-pressed:bg-primary aria-pressed:text-white dark:aria-pressed:bg-primary dark:aria-pressed:text-white">
                {{ $currency }}
            </button>
        @endforeach
    </div>
</div>
