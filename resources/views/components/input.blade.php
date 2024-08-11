@props([
    'id' => '',
    'name' => '',
    'errors' => '',
    'placeholder' => '',
    'autocomplete' => '',
    'type' => 'text',
    'class' => '',
])
<div class="relative">
    <input type="{{ $type }}" @if (!empty($id)) id="{{ $id }}" @endif
        @if (!empty($name)) name="{{ $name }}" @endif
        @if (!empty($placeholder)) placeholder="{{ $placeholder }}" @endif
        @if (!empty($name)) autocomplete="{{ $name }}" @endif value="{{ old($name) }}"
        class="w-full form-input px-2.5 py-1.5 mb-4 text-xs placeholder-gray-500 bg-gray-100 border rounded xl:mb-6 xl:px-4 xl:py-3 xl:text-sm placeholder:font-light focus:ring-0 focus:outline-none focus:bg-gray-100 @error($name) border-red-600 focus:border-red-400 @elseerror border-gray-200 focus:border-gray-400  @enderror {{ $class }}" />
    @error($name)
        <span class="absolute w-full text-[10px] xl:text-xs text-red-600 left-0 xl:left-1.5 bottom-0 xl:bottom-1.5">
            {{ $message }}
        </span>
    @enderror
</div>
