@props([
    'value' => 1,
    'label' => null,
    'class' => null,
    'name' => null,
    'type' => 'text',
    'error' => null,
    'readonly' => false,
    'disabled' => false,
    'required' => false,
])
@php
    $error_name = $name;
    if (Str::contains($name, ['[', ']'])) {
        $error_name = Str::replaceFirst('[', '.', $name);
        $error_name = Str::replaceFirst(']', '', $error_name);
    }
@endphp
<div @class([
    'form-block-checkbox',
    'disabled' => $disabled,
    'readonly' => $readonly,
    'show-error' => count($error->get($error_name)),
    $class,
])>
    <input class="form-checkbox" type="checkbox"
        {{ $attributes->merge(['name' => $name, 'id' => $name, 'value' => $value]) }} @readonly($readonly)
        @disabled($disabled) @required($required) />
    @if ($label)
        <label for="{{ $name }}">
            {{ $label }}
            <span @class(['hidden' => !$required])>*</span>
        </label>
    @endif
    @if (count($error->get($error_name)))
        @foreach ($error->get($error_name) as $message)
            <span class="error-detail">{{ $message }}</span>
        @endforeach
    @endif
</div>
