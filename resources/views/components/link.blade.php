@props(['route' => '/', 'title' => '', 'target' => '_self'])
<a href="{{ $route }}"
    {{ $attributes->merge(['class' => 'text-xs font-medium text-teal-500 transition duration-150 ease-in-out xl:text-sm hover:text-teal-500 focus:outline-none focus:underline']) }}
    title="{{ $title }}" target="{{ $target }}">
    {{ $slot }}
</a>
