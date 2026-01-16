@props(['title', 'editStep' => null])

<div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-5">
    <div class="flex items-center justify-between mb-3">
        <h3 class="font-semibold text-gray-900 dark:text-white text-sm">{{ $title }}</h3>
        @if($editStep)
            <button type="button" onclick="goToStep({{ $editStep }})" class="text-primary hover:text-primary-dark text-xs font-medium">Edit</button>
        @endif
    </div>
    {{ $slot }}
</div>
