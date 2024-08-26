@props([
    'slctxt' => 'Please select an option',
    'items' => [],
    'value' => null,
    'label' => null,
    'class' => null,
    'nolbl' => false,
    'name' => null,
    'error' => null,
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
    'show-error' => isset($error) ? count($error->get($error_name)) : false,
    'no-label' => $nolbl,
    $class,
])>
    @if ($label && !$nolbl)
        <label for="{{ $name }}">
            {{ $label }}
            <span @class(['hidden' => !$required])>*</span>
        </label>
    @endif
    <select class="form-input" {{ $attributes->merge(['name' => $name, 'id' => $name]) }} @readonly($readonly)
        @disabled($disabled) @required($required) @if ($focus) autofocus @endif
        @if ($auto) autocomplete="on" @else autocomplete="off" @endif>
        <option value="">{{ __($slctxt) }}</option>
        @foreach ($items as $selval => $item)
            <option @selected($value == $selval) value="{{ $selval }}">{{ __($item) }}</option>
        @endforeach
    </select>
    @if (isset($error) && count($error->get($error_name)))
        @foreach ($error->get($error_name) as $message)
            <span class="error-detail" role="alert" tabindex="-1" x-data="{ isOpen: false }" x-cloak x-show="isOpen"
                x-init="$nextTick(() => { isOpen = !isOpen });
                setTimeout(() => isOpen = !isOpen, 4000);" x-transition.duration.300ms>{{ $message }}</span>
        @endforeach
    @endif
</div>
