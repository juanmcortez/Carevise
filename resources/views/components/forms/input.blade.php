@props([
    'value' => null,
    'label' => null,
    'class' => null,
    'nolbl' => false,
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
    $error_name = $name;
    if (Str::contains($name, ['[', ']'])) {
        $error_name = Str::replace('[', '.', $name);
        $error_name = Str::replace(']', '', $error_name);
    }
    $type =
        $name == 'password' ||
        $name == 'password_confirmation' ||
        $name == 'current_password' ||
        $name == 'user_current_password'
            ? 'password'
            : $type;
@endphp

@if ($type == 'hidden')
    <input type="hidden" {{ $attributes->merge(['name' => $name, 'value' => $value]) }} />
@else
    <div @class([
        'form-block',
        'disabled' => $disabled,
        'readonly' => $readonly,
        'show-error' => count($error->get($error_name)),
        'no-label' => $nolbl,
        $class,
    ])>
        @if ($label && !$nolbl)
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
        @if (count($error->get($error_name)))
            @foreach ($error->get($error_name) as $message)
                <span class="error-detail" role="alert" tabindex="-1" x-data="{ isOpen: false }" x-cloak x-show="isOpen"
                    x-init="$nextTick(() => { isOpen = !isOpen });
                    setTimeout(() => isOpen = !isOpen, 4000);" x-transition.duration.300ms>{{ $message }}</span>
            @endforeach
        @endif
    </div>
@endif
