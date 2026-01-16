@props(['title', 'icon'])

<div class="bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-6">
    <div class="flex items-center">
        <div class="icon-box icon-box-md">{!! $icon !!}</div>
        <div class="ml-4">
            <h3 class="text-sm font-medium text-gray-900 dark:text-white">{{ $title }}</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $slot }}</p>
        </div>
    </div>
</div>
