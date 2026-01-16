@props(['title', 'icon'])

<div class="group flex items-start p-6 -mx-6 rounded-2xl hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-300" data-reveal="left">
    <div class="icon-box icon-box-lg group-hover:scale-110 transition-transform duration-300">{!! $icon !!}</div>
    <div class="ml-6">
        <h3 class="text-2xl font-heading font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors duration-300">{{ $title }}</h3>
        <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">{{ $slot }}</p>
    </div>
</div>
