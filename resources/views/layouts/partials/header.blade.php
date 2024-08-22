<div class="header">
    <h1>
        @hasSection('page-title')
            @yield('page-title')
        @else
            {{ config('company.name', 'Laravel') }}
        @endif
    </h1>
    <div class="subtools">
        TOOLS
    </div>
</div>
