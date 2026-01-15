@props(['title', 'icon'])

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg border border-gray-100 dark:border-gray-700 p-8 transition-all duration-300">
    <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center mb-6">
        {!! $icon !!}
    </div>
    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">
        {{ $title }}
    </h3>
    <p class="text-gray-600 dark:text-gray-400">
        {{ $slot }}
    </p>
</div>
