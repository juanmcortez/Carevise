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
        $error_name = Str::replace('[', '.', $name);
        $error_name = Str::replace(']', '', $error_name);
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
            <span class="error-detail" role="alert" tabindex="-1" x-data="{ isOpen: false }" x-cloak x-show="isOpen"
                x-init="$nextTick(() => { isOpen = !isOpen });
                setTimeout(() => isOpen = !isOpen, 4000);" x-transition.duration.300ms>{{ $message }}</span>
        @endforeach
    @endif
</div>
