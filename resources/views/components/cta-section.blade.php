@props(['heading', 'description', 'buttonText', 'buttonUrl', 'background' => 'white'])

@php
    $bgClasses = match($background) {
        'white' => 'bg-white dark:bg-gray-900',
        'gray-50' => 'bg-gray-50 dark:bg-gray-800',
        default => 'bg-white dark:bg-gray-900',
    };
@endphp

<section class="{{ $bgClasses }} py-16 lg:py-24 transition-colors duration-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">
            {!! $heading !!}
        </h2>
        <p class="mt-6 text-xl text-gray-600 dark:text-gray-400">
            {{ $description }}
        </p>
        <div class="mt-10">
            <a href="{{ $buttonUrl }}" class="inline-flex items-center justify-center px-8 py-4 bg-primary hover:bg-primary-dark text-white font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-lg">
                {{ $buttonText }}
            </a>
        </div>
    </div>
</section>
