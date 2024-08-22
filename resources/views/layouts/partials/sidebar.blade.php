<aside>
    <section class="logo">
        <x-logo />
    </section>
    <section class="nav">
        <div class="top">
            <h1 class="menu">{{ __('Dashboard') }}</h1>
            <a class="item" href="{{ route('index') }}" target="_self" title="{{ __('Dashboard') }}">
                <box-icon name='dashboard' type='solid'></box-icon>
            </a>

            <h1 class="menu">{{ __('Patients') }}</h1>
            <a class="item active" href="{{ route('index') }}" target="_self" title="{{ __('List') }}">
                <box-icon type='solid' name='user-detail'></box-icon>
            </a>
            <a class="item" href="{{ route('index') }}" target="_self" title="{{ __('Create') }}">
                <box-icon type='solid' name='user-plus'></box-icon>
            </a>

            <h1 class="menu">{{ __('Billing') }}</h1>
            <a class="item" href="{{ route('index') }}" target="_self" title="{{ __('Claims Manager') }}">
                <box-icon name='money-withdraw'></box-icon>
            </a>
            <a class="item" href="{{ route('index') }}" target="_self" title="{{ __('Post Payments') }}">
                <box-icon name='credit-card'></box-icon>
            </a>
            <a class="item" href="{{ route('index') }}" target="_self" title="{{ __('Collect Patient Payments') }}">
                <box-icon name='dollar-circle'></box-icon>
            </a>
            <a class="item" href="{{ route('index') }}" target="_self" title="{{ __('Print Statements') }}">
                <box-icon name='file'></box-icon>
            </a>
            <a class="item" href="{{ route('index') }}" target="_self" title="{{ __('Print Letters') }}">
                <box-icon name='file-blank'></box-icon>
            </a>
            <a class="item" href="{{ route('index') }}" target="_self" title="{{ __('Run Auto Write Off\'s') }}">
                <box-icon name='file-find'></box-icon>
            </a>

            <h1 class="menu">{{ __('Calendar') }}</h1>
            <a class="item" href="{{ route('index') }}" target="_self" title="{{ __('Calendar') }}">
                <box-icon name='calendar'></box-icon>
            </a>

            <h1 class="menu">{{ __('Reports') }}</h1>
            <a class="item" href="{{ route('index') }}" target="_self" title="{{ __('Reports') }}">
                <box-icon name='line-chart'></box-icon>
            </a>
        </div>
        <div class="bottom">
            <h1 class="menu">{{ __('Settings') }}</h1>
            <a class="item" href="{{ route('index') }}" target="_self" title="{{ __('Settings') }}">
                <box-icon name='cog'></box-icon>
            </a>
        </div>
    </section>
</aside>
