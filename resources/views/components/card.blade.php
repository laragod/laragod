@props(['title', 'icon', 'hover' => false])

<div @class([
    'group relative bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/50 p-8 transition-all duration-500 ease-out',
    'hover:shadow-xl hover:shadow-primary/5 hover:-translate-y-1 hover:border-primary/20 dark:hover:border-primary/30' => $hover,
    'shadow-sm' => !$hover
])>
    {{-- Subtle gradient overlay on hover --}}
    @if($hover)
    <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-primary/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
    @endif

    <div class="relative">
        <div class="icon-box icon-box-lg mb-6 group-hover:scale-110 transition-transform duration-300">{!! $icon !!}</div>
        <h3 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors duration-300">{{ $title }}</h3>
        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $slot }}</p>
    </div>
</div>
