@props([
    'value' => null,
    'label' => null,
    'showlbl' => false,
    'name' => null,
    'type' => 'text',
    'error' => null,
    'maxlength' => 255,
    'readonly' => false,
    'disabled' => false,
    'required' => false,
    'focus' => false,
    'auto' => false,
])
@php
    $type = $name == 'password' ? 'password' : $type;
@endphp
<div @class([
    'form-block',
    'disabled' => $disabled,
    'readonly' => $readonly,
    'show-error' => count($error->get($name)),
    'mt-1' => !$showlbl,
])>
    @if ($label && $showlbl)
        <label for="{{ $name }}">
            {{ $label }}
            <span @class(['hidden' => !$required])>*</span>
        </label>
    @endif
    @if ($type == 'password')
        <input class="form-input" type="password"
            {{ $attributes->merge(['name' => $name, 'id' => $name, 'value' => $value, 'placeholder' => $label, 'maxlength' => $maxlength]) }}
            @readonly($readonly) @disabled($disabled) @required($required)
            @if ($focus) autofocus @endif
            @if ($auto) autocomplete="on" @else autocomplete="off" @endif />
    @else
        <input class="form-input"
            {{ $attributes->merge(['type' => $type, 'name' => $name, 'id' => $name, 'value' => $value, 'placeholder' => $label, 'maxlength' => $maxlength]) }}
            @readonly($readonly) @disabled($disabled) @required($required)
            @if ($focus) autofocus @endif
            @if ($auto) autocomplete="on" @else autocomplete="off" @endif />
    @endif
    @if (count($error->get($name)))
        @foreach ($error->get($name) as $message)
            <span class="error-detail">{{ $message }}</span>
        @endforeach
    @endif
</div>
