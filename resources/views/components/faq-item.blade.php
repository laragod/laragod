@props(['question'])

<div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6">
    <h3 class="font-semibold text-gray-900 dark:text-white mb-2">{{ $question }}</h3>
    <p class="text-gray-600 dark:text-gray-400">{{ $slot }}</p>
</div>
