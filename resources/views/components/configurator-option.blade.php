@props(['type', 'group', 'value', 'label', 'description' => null, 'prices' => null, 'priceNote' => null, 'badge' => null, 'checked' => false])

<label class="group relative block h-full cursor-pointer">
    <input type="{{ $type }}" name="cfg_{{ $group }}" value="{{ $value }}" data-cfg="{{ $group }}" class="peer sr-only" @checked($checked)>
    <span class="flex flex-col h-full p-4 rounded-xl border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 transition-colors hover:border-primary/50 peer-checked:border-primary peer-checked:bg-primary-light/40 dark:peer-checked:border-primary dark:peer-checked:bg-primary/10 peer-focus-visible:ring-2 peer-focus-visible:ring-primary peer-focus-visible:ring-offset-2 dark:peer-focus-visible:ring-offset-gray-800">
        <span class="flex items-start gap-3">
            {{-- Marks the selection with a shape as well as a colour --}}
            <span aria-hidden="true" @class([
                'mt-0.5 flex items-center justify-center flex-shrink-0 w-5 h-5 border-2 border-gray-300 dark:border-gray-600 group-has-[:checked]:border-primary group-has-[:checked]:bg-primary',
                'rounded-full' => $type === 'radio',
                'rounded' => $type !== 'radio',
            ])>
                <svg class="hidden group-has-[:checked]:block w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
            </span>
            <span class="font-semibold text-gray-900 dark:text-white">{{ $label }}</span>
        </span>
        @if($description)
            <span class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $description }}</span>
        @endif
        @if($prices || $priceNote || $badge)
            <span class="mt-auto pt-3 flex flex-wrap items-center gap-2">
                @if($prices)
                    <span class="font-semibold text-gray-900 dark:text-white whitespace-nowrap"><x-price :prices="$prices" /></span>
                @elseif($priceNote)
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $priceNote }}</span>
                @endif
                @if($badge)
                    <span class="px-2 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-semibold whitespace-nowrap">{{ $badge }}</span>
                @endif
            </span>
        @endif
    </span>
</label>
