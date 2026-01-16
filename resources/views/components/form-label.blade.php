@props(['for', 'required' => false, 'optional' => false])

<label for="{{ $for }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
    {{ $slot }}
    @if($required)<span class="text-red-500">*</span>@endif
    @if($optional)<span class="text-gray-400 font-normal">{{ __('form.optional') }}</span>@endif
</label>
