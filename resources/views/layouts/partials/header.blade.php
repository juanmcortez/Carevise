<header>
    @guest
        <div class="logo guest">
            <box-icon name='notepad'></box-icon>
            <span>{{ config('company.short-name') }}</span>
        </div>
    @else
        <div class="logo">
            <box-icon name='notepad'></box-icon>
        </div>
        <div class="content">
            <div class="left">HDRL</div>
            <div class="right">

            </div>
        </div>
    @endguest
    {{-- System wide messages --}}
    <x-tools.toast :help="session('status')" :success="session('success')" :errors="$errors" :warning="session('warning')" :info="session('info')" />
</header>
