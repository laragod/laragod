@props(['title', 'icon'])

<div>
    <h3 class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-6 flex items-center">
        <span class="icon-box icon-box-sm mr-3">{!! $icon !!}</span>
        {{ $title }}
    </h3>
    <ul class="space-y-3">{{ $slot }}</ul>
</div>
