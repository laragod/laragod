@props(['name', 'label', 'placeholder' => 'Select an option', 'options' => []])

<div>
    <x-form-label :for="$name">{{ $label }}</x-form-label>
    <select id="{{ $name }}" name="{{ $name }}" class="form-control">
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $value => $text)
            <option value="{{ $value }}">{{ $text }}</option>
        @endforeach
    </select>
</div>
