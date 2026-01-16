@props(['question'])

<div class="group bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 border border-transparent hover:border-primary/20 hover:bg-white dark:hover:bg-gray-700/50 transition-all duration-300">
    <h3 class="font-semibold text-gray-900 dark:text-white mb-3 flex items-start gap-3">
        <span class="w-6 h-6 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:bg-primary/20 transition-colors">
            <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </span>
        {{ $question }}
    </h3>
    <p class="text-gray-600 dark:text-gray-400 pl-9 leading-relaxed">{{ $slot }}</p>
</div>
