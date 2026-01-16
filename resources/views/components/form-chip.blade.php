@props(['name', 'value', 'label'])

<label class="cursor-pointer group">
    <input type="checkbox" name="{{ $name }}" value="{{ $value }}" class="peer sr-only">
    <span class="relative block px-5 py-2.5 rounded-full border-2 border-gray-200 dark:border-gray-700 font-medium text-sm text-gray-700 dark:text-gray-300 transition-all duration-300 hover:border-primary/50 hover:shadow-sm dark:hover:border-primary/50 peer-checked:border-primary peer-checked:bg-gradient-to-r peer-checked:from-primary peer-checked:to-primary-dark peer-checked:text-white peer-checked:shadow-md peer-checked:shadow-primary/20 overflow-hidden">
        {{-- Shimmer effect on selected --}}
        <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent opacity-0 group-has-[:checked]:opacity-100 group-has-[:checked]:animate-[shimmer_2s_infinite]"></span>
        <span class="relative">{{ $label }}</span>
    </span>
</label>
