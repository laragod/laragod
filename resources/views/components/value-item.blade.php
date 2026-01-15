@props(['title', 'icon'])

<div class="flex items-start">
    <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center flex-shrink-0">
        {!! $icon !!}
    </div>
    <div class="ml-6">
        <h3 class="text-2xl font-heading font-bold text-gray-900 dark:text-white mb-3">
            {{ $title }}
        </h3>
        <p class="text-lg text-gray-600 dark:text-gray-400">
            {{ $slot }}
        </p>
    </div>
</div>
