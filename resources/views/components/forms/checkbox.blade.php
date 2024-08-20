@props([
    'value' => true,
    'label' => null,
    'name' => null,
    'type' => 'text',
    'error' => null,
    'readonly' => false,
    'disabled' => false,
    'required' => false,
])
<div @class([
    'form-block-checkbox',
    'disabled' => $disabled,
    'readonly' => $readonly,
    'show-error' => count($error->get($name)),
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
    @if (count($error->get($name)))
        @foreach ($error->get($name) as $message)
            <span class="error-detail">{{ $message }}</span>
        @endforeach
    @endif
</div>
