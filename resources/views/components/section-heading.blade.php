@props(['title', 'badge' => null, 'description' => null])

<div {{ $attributes->merge(['class' => 'text-center mb-12 lg:mb-16']) }} data-reveal>
    @if($badge)
        <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wide uppercase mb-4">{{ $badge }}</span>
    @endif
    <h2 class="mt-2 text-3xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">{{ $title }}</h2>
    @if($description)
        <p class="mt-6 text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">{{ $description }}</p>
    @endif
</div>
