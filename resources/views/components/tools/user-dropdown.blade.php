@props([
    'userdata' => null,
])
<div class="user-dropdown" x-data="{ userDropDownIsOpen: false, openWithKeyboard: false }"
    @keydown.esc.window="userDropDownIsOpen = false, openWithKeyboard = false" x-cloak>
    <button @click="userDropDownIsOpen = ! userDropDownIsOpen" :aria-expanded="userDropDownIsOpen"
        @keydown.space.prevent="openWithKeyboard = true" @keydown.enter.prevent="openWithKeyboard = true"
        @keydown.down.prevent="openWithKeyboard = true">
        {!! __('Welcome back <strong>:user!</strong>', [
            'user' => $userdata->demographic->complete_name ? $userdata->demographic->complete_name : $userdata->username,
        ]) !!}
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
            <polygon points="16,28 9,21 10.4,19.6 16,25.2 21.6,19.6 23,21 "></polygon>
            <rect width="32" height="32" fill="none"></rect>
        </svg>
    </button>
    <ul x-cloak x-show="userDropDownIsOpen || openWithKeyboard" x-transition.opacity x-trap="openWithKeyboard"
        @click.outside="userDropDownIsOpen = false, openWithKeyboard = false"
        @keydown.down.prevent="$focus.wrap().next()" @keydown.up.prevent="$focus.wrap().previous()">
        <li>
            <div>
                <span class="font-semibold text-accent leading-none">
                    {{ Auth::user()->username ? '@' . Auth::user()->username : Auth::user()->email }}
                </span>
                <span class="text-[10px] text-accent/75 leading-none">
                    {{ Auth::user()->username ? Auth::user()->email : '' }}
                </span>
            </div>
        </li>
        <li>
            <x-link :class="request()->routeIs('users.profile') ? 'item active' : 'item'" :route="route('users.profile', ['user' => $userdata])">
                <box-icon type='solid' name='user-account'></box-icon>
                {{ __('Edit your info') }}
            </x-link>
        </li>
        <li>
            <x-link :class="request()->routeIs('users.list') ? 'item active' : 'item'" :route="route('users.list')">
                <box-icon type='solid' name='user-detail'></box-icon>
                {{ __('Users list') }}
            </x-link>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-link class="item" :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <box-icon name='log-out-circle'></box-icon>
                    {{ __('Log Out') }}
                </x-link>
            </form>
        </li>
    </ul>
</div>
