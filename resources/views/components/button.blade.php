@props(['type' => 'button'])
<button
    {{ $attributes->merge(['class' => 'w-full px-3 py-2 font-semibold transition-all duration-300 ease-in-out border rounded xl:text-lg focus:ring-0 focus:outline-none']) }}
    type="{{ $type }}">
    {{ $slot }}
</button>
