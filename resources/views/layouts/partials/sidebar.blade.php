<aside>
    <section class="logo">
        <x-logo />
    </section>
    <section class="nav">
        <div class="top">
            <h1 class="menu">{{ __('Dashboard') }}</h1>
            <x-link :class="request()->routeIs('dashboard') ? 'item active' : 'item'" :route="route('dashboard')" :title="__('Dashboard')">
                <box-icon name='dashboard' type='solid'></box-icon>
            </x-link>

            <h1 class="menu">{{ __('Patients') }}</h1>
            <x-link :class="request()->routeIs('patients.list') ? 'item active' : 'item'" :route="route('dashboard')" :title="__('List')">
                <box-icon type='solid' name='user-detail'></box-icon>
            </x-link>
            <x-link :class="request()->routeIs('patients.create') ? 'item active' : 'item'" :route="route('dashboard')" :title="__('Create')">
                <box-icon type='solid' name='user-plus'></box-icon>
            </x-link>

            <h1 class="menu">{{ __('Billing') }}</h1>
            <x-link :class="request()->routeIs('billings.manager') ? 'item active' : 'item'" :route="route('dashboard')" :title="__('Claims manager')">
                <box-icon name='money-withdraw'></box-icon>
            </x-link>
            <x-link :class="request()->routeIs('billings.payments') ? 'item active' : 'item'" :route="route('dashboard')" :title="__('Post payments')">
                <box-icon name='credit-card'></box-icon>
            </x-link>
            <x-link :class="request()->routeIs('billings.collect') ? 'item active' : 'item'" :route="route('dashboard')" :title="__('Collect payments')">
                <box-icon name='dollar-circle'></box-icon>
            </x-link>
            <x-link :class="request()->routeIs('billings.statements') ? 'item active' : 'item'" :route="route('dashboard')" :title="__('Print statements')">
                <box-icon name='file'></box-icon>
            </x-link>
            <x-link :class="request()->routeIs('billings.letters') ? 'item active' : 'item'" :route="route('dashboard')" :title="__('Print letters')">
                <box-icon name='file-blank'></box-icon>
            </x-link>
            <x-link :class="request()->routeIs('billings.awos') ? 'item active' : 'item'" :route="route('dashboard')" :title="__('Auto write off\'s')">
                <box-icon name='file-find'></box-icon>
            </x-link>

            <h1 class="menu">{{ __('Calendar') }}</h1>
            <x-link :class="request()->routeIs('calendar') ? 'item active' : 'item'" :route="route('dashboard')" :title="__('Calendar')">
                <box-icon name='calendar'></box-icon>
            </x-link>

            <h1 class="menu">{{ __('Reports') }}</h1>
            <x-link :class="request()->routeIs('reports') ? 'item active' : 'item'" :route="route('dashboard')" :title="__('Reports')">
                <box-icon name='line-chart'></box-icon>
            </x-link>
        </div>
        <div class="bottom">
            <h1 class="menu">{{ __('Settings') }}</h1>
            <x-link :class="request()->routeIs('settings') ? 'item active' : 'item'" :route="route('dashboard')" :title="__('Settings')">
                <box-icon name='cog'></box-icon>
            </x-link>
        </div>
    </section>
</aside>
