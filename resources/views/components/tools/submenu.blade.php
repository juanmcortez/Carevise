@props(['items' => []])
<aside class="submenu">
    <section class="nav">
        @foreach ($items as $section)
            <h2 class="menu">{{ __($section['title']) }}</h2>
            @foreach ($section['items'] as $title => $subitem)
                @isset($subitem['icon'])
                    <x-link :class="request()->routeIs($subitem['routename']) ? 'item active' : 'item'" :route="route($subitem['routename'])">
                        <box-icon type='solid' name='{{ $subitem['icon'] }}'></box-icon>
                        {{ $title }}
                    </x-link>
                @else
                    <x-link :class="request()->routeIs($subitem['routename']) ? 'item active' : 'item'" :route="route($subitem['routename'])">
                        {{ $title }}
                    </x-link>
                @endisset
            @endforeach
        @endforeach
    </section>
</aside>
