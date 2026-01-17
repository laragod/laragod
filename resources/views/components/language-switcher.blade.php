@props(['class' => ''])

@php
    $locales = available_locales();
    $currentLocale = current_locale();
    $currentRouteName = request()->route()?->getName();
    $routeParameters = request()->route()?->parameters() ?? [];
@endphp

<div {{ $attributes->merge(['class' => 'relative ' . $class]) }}>
    <select
        id="language-switcher"
        class="appearance-none bg-transparent border border-gray-200 dark:border-gray-700 rounded-lg px-3 py-2 pr-8 text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30 cursor-pointer transition-colors"
        aria-label="{{ __('meta.select_language') }}"
    >
        @foreach($locales as $code => $name)
            <option
                value="{{ $currentRouteName ? route_with_locale($currentRouteName, $code, collect($routeParameters)->except('locale')->toArray()) : '/' . $code }}"
                {{ $code === $currentLocale ? 'selected' : '' }}
            >
                {{ $name }}
            </option>
        @endforeach
    </select>

    {{-- Dropdown arrow --}}
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500 dark:text-gray-400">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>
</div>

<script>
    document.getElementById('language-switcher').addEventListener('change', function() {
        window.location.href = this.value;
    });
</script>
