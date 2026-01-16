@props(['heading', 'description', 'buttonText', 'buttonUrl', 'background' => 'white'])

<section @class([
    'relative py-20 lg:py-32 transition-colors duration-200 overflow-hidden',
    'bg-white dark:bg-gray-900' => $background === 'white',
    'bg-gray-50 dark:bg-gray-800' => $background === 'gray',
])>
    {{-- Background decorations --}}
    <div class="absolute inset-0 bg-mesh-gradient opacity-50"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-reveal>
        <h2 class="text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white leading-tight">{!! $heading !!}</h2>
        <p class="mt-6 text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">{{ $description }}</p>
        <div class="mt-10">
            <a href="{{ $buttonUrl }}" class="group btn btn-primary btn-shimmer px-10 py-4 text-lg">
                {{ $buttonText }}
                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
