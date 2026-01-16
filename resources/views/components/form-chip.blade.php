@props(['name', 'value', 'label'])

<label class="cursor-pointer">
    <input type="checkbox" name="{{ $name }}" value="{{ $value }}" class="peer sr-only">
    <span class="block px-4 py-2.5 rounded-full border-2 border-gray-200 dark:border-gray-700 font-medium text-sm text-gray-700 dark:text-gray-300 transition-all hover:border-gray-300 dark:hover:border-gray-600 peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white">
        {{ $label }}
    </span>
</label>
