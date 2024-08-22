<div class="header">
    @Guest
        <h1 class="centered">
            <x-logo />
            {{ config('company.name', 'Laravel') }}
        </h1>
    @endGuest
    @Auth
        <h1>
            @hasSection('page-title')
                @yield('page-title')
            @else
                {{ config('company.name', 'Laravel') }}
            @endif
        </h1>
        <div class="subtools">&nbsp;</div>
    @endAuth
</div>
