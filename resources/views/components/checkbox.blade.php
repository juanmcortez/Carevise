@props([
    'id' => '',
    'name' => '',
    'type' => 'checkbox',
    'class' => '',
    'value' => null,
    'labelclass' => '',
])
<input type="{{ $type }}" @if (!empty($id)) id="{{ $id }}" @endif
    @if (!empty($name)) name="{{ $name }}" @endif
    @if (!empty($value)) value="{{ $value }}" @endif
    class="w-3 h-3 text-teal-600 transition duration-150 ease-in-out xl:rounded xl:w-4 xl:h-4 form-checkbox focus:ring-0 {{ $class }}">
@if ($slot)
    <label @if (!empty($name)) for="{{ $name }}" @endif
        class="block ml-2 text-xs leading-5 text-gray-900 xl:text-sm {{ $labelclass }}">
        {{ $slot }}
    </label>
@endif
