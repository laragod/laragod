@props(['badge', 'titlePart1', 'titlePart2', 'description'])

<section class="relative bg-white dark:bg-gray-900 py-16 lg:py-24 transition-colors duration-200 overflow-hidden">
    {{-- Background decorations --}}
    <div class="absolute inset-0 bg-mesh-gradient"></div>
    <div class="absolute top-20 left-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-4xl mx-auto">
            <div class="animate-fade-in-up inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 dark:bg-primary/20 border border-primary/20 mb-8">
                <span class="text-sm font-medium text-primary">{{ $badge }}</span>
            </div>

            <h1 class="animate-fade-in-up text-4xl lg:text-6xl font-heading font-bold text-gray-900 dark:text-white leading-[1.1] tracking-tight" style="animation-delay: 0.1s">
                {{ $titlePart1 }}
                <span class="text-gradient">{{ $titlePart2 }}</span>
            </h1>
            <p class="animate-fade-in-up mt-6 text-xl text-gray-600 dark:text-gray-400 leading-relaxed max-w-3xl mx-auto" style="animation-delay: 0.2s">
                {{ $description }}
            </p>

            @if($slot->isNotEmpty())
                <div class="animate-fade-in-up mt-8 flex flex-wrap items-center justify-center gap-4" style="animation-delay: 0.3s">
                    {{ $slot }}
                </div>
            @endif
        </div>
    </div>
</section>
