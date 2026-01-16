@props(['name', 'label', 'required' => false, 'optional' => false, 'rows' => 4, 'maxlength' => null, 'placeholder' => ''])

<div>
    <x-form-label :for="$name" :required="$required" :optional="$optional">{{ $label }}</x-form-label>
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        @if($required) required @endif @if($maxlength) maxlength="{{ $maxlength }}" @endif class="form-control"></textarea>
</div>
