@props(['route' => '/', 'title' => '', 'target' => '_self'])
<a id="link" href="{{ $route }}" {{ $attributes->merge(['class' => '']) }} title="{{ $title }}"
    target="{{ $target }}">
    {{ $slot }}
</a>
