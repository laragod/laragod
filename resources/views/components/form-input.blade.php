@props(['name', 'label', 'type' => 'text', 'required' => false, 'maxlength' => null, 'placeholder' => ''])

<div>
    <x-form-label :for="$name" :required="$required">{{ $label }}</x-form-label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
        @if($required) required @endif @if($maxlength) maxlength="{{ $maxlength }}" @endif class="form-control">
</div>
