@props(['labelClass' => ''])

{{-- Icon and label switch through CSS alone, so the right state shows before any script runs.
     The label names the theme the button switches to, and stays available to screen readers when visually hidden. --}}
<button type="button" data-theme-toggle {{ $attributes->class('inline-flex items-center justify-center gap-2 h-12 min-w-12 px-3 rounded-xl border-2 border-primary/40 bg-primary-light/70 dark:bg-gray-800 font-semibold text-gray-900 dark:text-white whitespace-nowrap hover:border-primary hover:bg-primary-light dark:hover:bg-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 dark:focus-visible:ring-offset-gray-900 transition-colors duration-200') }}>
    <svg class="w-6 h-6 flex-shrink-0 dark:hidden" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
    </svg>
    <svg class="w-6 h-6 flex-shrink-0 hidden dark:block" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
    </svg>
    <span class="dark:hidden {{ $labelClass }}">{{ __('nav.theme_dark') }}</span>
    <span class="hidden dark:inline {{ $labelClass }}">{{ __('nav.theme_light') }}</span>
</button>
