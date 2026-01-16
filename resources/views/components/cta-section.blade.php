@props(['heading', 'description', 'buttonText', 'buttonUrl', 'background' => 'white'])

<section @class([
    'py-16 lg:py-24 transition-colors duration-200',
    'bg-white dark:bg-gray-900' => $background === 'white',
    'bg-gray-50 dark:bg-gray-800' => $background === 'gray',
])>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl lg:text-5xl font-heading font-bold text-gray-900 dark:text-white">{!! $heading !!}</h2>
        <p class="mt-6 text-xl text-gray-600 dark:text-gray-400">{{ $description }}</p>
        <div class="mt-10">
            <a href="{{ $buttonUrl }}" class="btn btn-primary px-8 py-4 text-lg hover:-translate-y-0.5">
                {{ $buttonText }}
            </a>
        </div>
    </div>
</section>
