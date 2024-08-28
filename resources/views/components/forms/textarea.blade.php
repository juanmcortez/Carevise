@props([
    'value' => null,
    'label' => null,
    'class' => null,
    'nolbl' => false,
    'name' => null,
    'error' => null,
    'rows' => 5,
    'cols' => 5,
    'readonly' => false,
    'disabled' => false,
    'required' => false,
    'focus' => false,
    'auto' => false,
])
@php
    $error_name = $name;
    if (Str::contains($name, ['[', ']'])) {
        $error_name = Str::replaceFirst('[', '.', $name);
        $error_name = Str::replaceFirst(']', '', $error_name);
    }
@endphp

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
    <textarea class="form-textarea"
        {{ $attributes->merge(['name' => $name, 'id' => $name, 'placeholder' => $label, 'rows' => $rows, 'cols' => $cols]) }}
        @readonly($readonly) @disabled($disabled) @required($required) @if ($focus) autofocus @endif
        @if ($auto) autocomplete="on" @else autocomplete="off" @endif>{{ $value }}</textarea>
    @if (count($error->get($error_name)))
        @foreach ($error->get($error_name) as $message)
            <span class="error-detail" role="alert" tabindex="-1" x-data="{ isOpen: false }" x-cloak x-show="isOpen"
                x-init="$nextTick(() => { isOpen = !isOpen });
                setTimeout(() => isOpen = !isOpen, 4000);" x-transition.duration.300ms>{{ $message }}</span>
        @endforeach
    @endif
</div>
