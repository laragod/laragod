@props(['title', 'icon'])

<div class="bg-white dark:bg-gray-900 rounded-2xl p-6 lg:p-8 border border-gray-100 dark:border-gray-700/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-300" data-reveal>
    <h3 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-6 flex items-center">
        <span class="icon-box icon-box-sm mr-3">{!! $icon !!}</span>
        {{ $title }}
    </h3>
    <ul class="space-y-3">{{ $slot }}</ul>
</div>
