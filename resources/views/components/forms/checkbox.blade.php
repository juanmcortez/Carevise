@props([
    'value' => null,
    'name' => null,
    'checked' => null,
    'class' => '',
    'placeholder' => false,
    'type' => 'checkbox',
    'error' => false,
    'required' => false,
    'readonly' => false,
    'disabled' => false,
    'autocomplete' => false,
    'maxlength' => 128,
])
<div @class([
    'flex',
    'error-notice' => $error,
    'no-label' => !$slot,
    'item-' . $type => $type,
    'disabled' => $disabled,
    'relative',
    $class,
])>
    <input {{ $attributes->merge(['type' => $type, 'name' => $name, 'id' => $name, 'value' => $value]) }}
        autocomplete="{{ $autocomplete ? $autocomplete : $name }}" placeholder="{{ $placeholder ? $placeholder : $slot }}"
        maxlength="{{ $maxlength }}" @required($required) @readonly($readonly) @disabled($disabled)
        @checked($checked) @class([
            'w-3 h-3 transition duration-150 ease-in-out xl:rounded xl:w-4 xl:h-4 focus:ring-0',
            'text-teal-600' => !$readonly && !$disabled,
            'text-gray-300' => $readonly || $disabled,
        ])>
    @if ($slot)
        <label @if (!empty($name)) for="{{ $name }}" @endif @class([
            'block ml-2 text-xs leading-5 xl:text-sm',
            'text-gray-900' => !$readonly && !$disabled,
            'text-gray-300' => $readonly || $disabled,
        ])>
            {{ $slot }}
        </label>
    @endif
    @if (count($error))
        @foreach ($error as $message)
            <span class="absolute w-full text-right text-[10px] xl:text-xs text-red-600 left-0 top-12 pr-1">
                {{ $message }}
            </span>
        @endforeach
    @endif
</div>
