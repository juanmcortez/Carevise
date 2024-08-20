<aside>
    <ul class="nav">
        <li x-data="{ open: false }" x-cloak>
            <box-icon @click="open = !open" name='id-card'></box-icon>
            <ul class="sub-menu" x-show="open" @click.away="open = false">
                <li>
                    <h5>{{ __('Patients') }}</h5>
                </li>
                <li><a href="{{ route('index') }}">{{ __('List') }}</a></li>
                <li><a href="{{ route('index') }}">{{ __('Search') }}</a></li>
                <li class="split"></li>
                <li x-data="{ subopen: false }" @click="subopen = !subopen">
                    <span>{{ __('Previous') }}<box-icon name='chevron-right'></box-icon></span>
                    <ul class="child-menu" x-show="subopen" @click.away="subopen = false">
                        <li><a href="{{ route('index') }}">{{ __('Patient') }}</a></li>
                        <li><a href="{{ route('index') }}">{{ __('Patient') }}</a></li>
                        <li><a href="{{ route('index') }}">{{ __('Patient') }}</a></li>
                        <li><a href="{{ route('index') }}">{{ __('Patient') }}</a></li>
                        <li><a href="{{ route('index') }}">{{ __('Patient') }}</a></li>
                        <li><a href="{{ route('index') }}">{{ __('Patient') }}</a></li>
                        <li><a href="{{ route('index') }}">{{ __('Patient') }}</a></li>
                        <li><a href="{{ route('index') }}">{{ __('Patient') }}</a></li>
                        <li><a href="{{ route('index') }}">{{ __('Patient') }}</a></li>
                        <li><a href="{{ route('index') }}">{{ __('Patient') }}</a></li>
                        <li><a href="{{ route('index') }}">{{ __('Patient') }}</a></li>
                    </ul>
                </li>
                <li class="split"></li>
                <li><a href="{{ route('index') }}">{{ __('New') }}</a></li>
            </ul>
        </li>
        <li x-data="{ open: false }" x-cloak @click="open = !open">
            <box-icon name='dollar-circle'></box-icon>
            <ul class="sub-menu" x-show="open" @click.away="open = false">
                <li>
                    <h5>{{ __('Billing') }}</h5>
                </li>
                <li><a href="{{ route('index') }}">{{ __('Claims Manager') }}</a></li>
                <li class="split"></li>
                <li><a href="{{ route('index') }}">{{ __('Post Payments') }}</a></li>
                <li><a href="{{ route('index') }}">{{ __('Collect Patient Payments') }}</a></li>
                <li class="split"></li>
                <li><a href="{{ route('index') }}">{{ __('Print Statements') }}</a></li>
                <li><a href="{{ route('index') }}">{{ __('Print Letters') }}</a></li>
                <li class="split"></li>
                <li><a href="{{ route('index') }}">{{ __('Run Auto Write Off\'s') }}</a></li>
            </ul>
        </li>
        <li x-data="{ open: false }" x-cloak @click="open = !open">
            <box-icon name='calendar'></box-icon>
            <ul class="sub-menu" x-show="open" @click.away="open = false">
                <li>
                    <h5>{{ __('Appointments') }}</h5>
                </li>
                <li><a href="{{ route('index') }}">{{ __('Calendar') }}</a></li>
            </ul>
        </li>
        <li x-data="{ open: false }" x-cloak @click="open = !open">
            <box-icon name='money-withdraw'></box-icon>
            <ul class="sub-menu" x-show="open" @click.away="open = false">
                <li>
                    <h5>{{ __('Reports') }}</h5>
                </li>
                <li><a href="{{ route('index') }}">{{ __('A/R Reports') }}</a></li>
                <li><a href="{{ route('index') }}">{{ __('Payments Reports') }}</a></li>
                <li class="split"></li>
                <li><a href="{{ route('index') }}">{{ __('Patient Reports') }}</a></li>
                <li class="split"></li>
                <li><a href="{{ route('index') }}">{{ __('PAAC Reports') }}</a></li>
                <li><a href="{{ route('index') }}">{{ __('Production & Revenue Reports') }}</a></li>
                <li><a href="{{ route('index') }}">{{ __('Adjustments & Denials Reports') }}</a></li>
                <li class="split"></li>
                <li><a href="{{ route('index') }}">{{ __('Specialty Reports') }}</a></li>
                <li class="split"></li>
                <li><a href="{{ route('index') }}">{{ __('Admin Reports') }}</a></li>
            </ul>
        </li>
    </ul>
    <ul class="nav">
        <li class="user-menu" x-data="{ open: false }" x-cloak>
            <box-icon @click="open = !open" name='cog'></box-icon>
            <ul class="sub-menu" x-show="open" @click.away="open = false">
                <li>
                    <h5>{{ __('Settings') }}</h5>
                </li>
                <li><a href="{{ route('index') }}">{{ __('General Settings') }}</a></li>
                <li class="split"></li>
                <li><a href="{{ route('index') }}">{{ __('New Users') }}</a></li>
                <li><a href="{{ route('index') }}">{{ __('New Providers') }}</a></li>
                <li><a href="{{ route('index') }}">{{ __('New Doctors') }}</a></li>
                <li class="split"></li>
                <li><a href="{{ route('index') }}">{{ __('Practice Settings') }}</a></li>
                <li><a href="{{ route('index') }}">{{ __('Facilities Settings') }}</a></li>
                <li><a href="{{ route('index') }}">{{ __('EDI Partner Settings') }}</a></li>
                <li class="split"></li>
                <li><a href="{{ route('index') }}">{{ __('Insurances Settings') }}</a></li>
                <li><a href="{{ route('index') }}">{{ __('Codes Settings') }}</a></li>
                <li class="split"></li>
                <li><a href="{{ route('index') }}">{{ __('HL7 Settings') }}</a></li>
                <li><a href="{{ route('index') }}">{{ __('ERA Settings') }}</a></li>
            </ul>
        </li>
    </ul>
</aside>
