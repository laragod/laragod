@props(['title', 'icon', 'hover' => false])

<div @class([
    'bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-8 transition-all duration-300',
    'hover:shadow-lg' => $hover
])>
    <div class="icon-box icon-box-lg mb-6">{!! $icon !!}</div>
    <h3 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-3">{{ $title }}</h3>
    <p class="text-gray-600 dark:text-gray-400">{{ $slot }}</p>
</div>
