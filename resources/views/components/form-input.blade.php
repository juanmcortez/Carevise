@props([
    'value' => null,
    'name' => null,
    'class' =>
        'w-full form-input px-2.5 py-1.5 mb-4 text-xs placeholder-gray-500 bg-gray-100 border rounded xl:mb-6 xl:px-4 xl:py-3 xl:text-sm placeholder:font-light focus:ring-0 focus:outline-none focus:bg-gray-100 disabled:text-gray-400 disabled:bg-gray-200 focus:disabled:bg-gray-200 focus:disabled:border-gray-200 read-only:text-gray-400 read-only:bg-gray-200 focus:read-only:bg-gray-200 focus:read-only:border-gray-200',
    'label' => false,
    'placeholder' => false,
    'type' => 'text',
    'error' => false,
    'required' => false,
    'readonly' => false,
    'disabled' => false,
    'autocomplete' => false,
    'maxlength' => 128,
])
<div @class([
    'form-block',
    'error-notice' => $error,
    'no-label' => !$label,
    'item-' . $type => $type,
    'disabled' => $disabled,
    'relative',
])>
    @if ($label)
        <label for="{{ $name }}" @class(['required' => $required])>
            {{ $label }} <span @class(['hidden' => !$required])>*</span>
        </label>
    @else
        <span @class(['hidden' => !$required])>*</span>
    @endif
    <input {{ $attributes->merge(['type' => $type, 'name' => $name, 'id' => $name, 'value' => $value]) }}
        autocomplete="{{ $autocomplete ? $autocomplete : $name }}"
        placeholder="{{ $placeholder ? $placeholder : $label }}" maxlength="{{ $maxlength }}" @required($required)
        @readonly($readonly) @disabled($disabled)
        @if (count($error)) class="border-red-600 focus:border-red-400 {{ $class }}" @else class="border-gray-200 focus:border-gray-400 {{ $class }}" @endif />
    @if (count($error))
        @foreach ($error as $message)
            <span
                class="absolute w-full text-right text-[10px] xl:text-xs text-red-600 left-0 top-12 pr-1">{{ $message }}</span>
        @endforeach
    @endif
</div>
