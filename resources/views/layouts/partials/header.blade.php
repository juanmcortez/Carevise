<div class="header">
    @Guest
        <h1 class="centered">
            <x-logo />
            {{ config('company.short-name', config('company.name', 'Carevise')) }}
        </h1>
    @endGuest
    @Auth
        <h1>
            @hasSection('page-title')
                @yield('page-title')
            @else
                {{ config('company.short-name', config('company.name', 'Carevise')) }}
            @endif
        </h1>
        <div class="subtools">&nbsp;</div>
    @endAuth
</div>
