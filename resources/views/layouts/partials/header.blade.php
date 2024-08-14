<div id="header">
    <div class="left">
        @guest
            <x-logo route="{{ route('index') }}" class="logo" />
            <span>{{ config('company.name') }}</span>
        @else
            HDR L
        @endguest
    </div>
    @Auth
        <div class="right">HDR R</div>
    @endAuth
</div>
