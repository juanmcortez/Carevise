<div id="sidebar">
    <div id="sdbrTop">SDBR T</div>
    <div id="sdbrMiddle">SDBR M</div>
    <div id="sdbrBottom">
        @Auth
            <div id="user-menu" x-data="{ dropdownOpen: false }">
                <div id="user-icon" @click="dropdownOpen=true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49.16 59">
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <g id="account">
                                    <path
                                        d="M42.32,59H6.85a6.85,6.85,0,0,1-5.4-2.61A6.62,6.62,0,0,1,.18,50.74a25.08,25.08,0,0,1,48.81,0,6.62,6.62,0,0,1-1.28,5.65A6.83,6.83,0,0,1,42.32,59ZM24.58,36.43A20,20,0,0,0,5,51.88a1.68,1.68,0,0,0,.33,1.41A1.89,1.89,0,0,0,6.85,54H42.32a1.88,1.88,0,0,0,1.47-.71,1.64,1.64,0,0,0,.33-1.41A20,20,0,0,0,24.58,36.43Z" />
                                    <path
                                        d="M24.58,26.62A13.31,13.31,0,1,1,37.89,13.31,13.32,13.32,0,0,1,24.58,26.62ZM24.58,5a8.31,8.31,0,1,0,8.31,8.31A8.32,8.32,0,0,0,24.58,5Z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div id="submenu" x-show="dropdownOpen" @click.away="dropdownOpen=false"
                    x-transition:enter="ease-out duration-200" x-transition:enter-start="translate-y-2"
                    x-transition:enter-end="translate-y-0" x-cloak>
                    <div class="holder">

                        <span class="flex flex-col items-start flex-shrink-0 h-full px-2 py-1 leading-none">
                            <span class="text-sm">{{ Auth::user()->demographic->complete_name }}</span>
                            <span class="text-xs font-light text-neutral-400">{{ '@' . Auth::user()->username }}</span>
                        </span>

                        <div class="h-px my-1 -mx-1 bg-neutral-200"></div>

                        <x-link :route="route('user.profile', ['user' => Auth::user()])">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>{{ __('Profile') }}</span>
                        </x-link>

                        <x-link data-disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                            <span>{{ __('Security') }}</span>
                        </x-link>

                        <div class="h-px my-1 -mx-1 bg-neutral-200"></div>

                        <x-link data-disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <path
                                    d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
                                </path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <span>{{ __('Settings') }}</span>
                        </x-link>

                        <div class="h-px my-1 -mx-1 bg-neutral-200"></div>

                        <x-link route="https://github.com/juanmcortez/Carevise" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <path
                                    d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4">
                                </path>
                                <path d="M9 18c-4.51 2-5-2-7-2"></path>
                            </svg>
                            <span>GitHub</span>
                        </x-link>
                        <x-link data-disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="4"></circle>
                                <line x1="4.93" x2="9.17" y1="4.93" y2="9.17"></line>
                                <line x1="14.83" x2="19.07" y1="14.83" y2="19.07"></line>
                                <line x1="14.83" x2="19.07" y1="9.17" y2="4.93"></line>
                                <line x1="14.83" x2="18.36" y1="9.17" y2="5.64"></line>
                                <line x1="4.93" x2="9.17" y1="19.07" y2="14.83"></line>
                            </svg>
                            <span>Support</span>
                        </x-link>

                        <div class="h-px my-1 -mx-1 bg-neutral-200"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-link :route="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" x2="9" y1="12" y2="12"></line>
                                </svg>
                                <span>{{ __('Log Out') }}</span>
                            </x-link>
                        </form>
                    </div>
                </div>
            </div>
        @endAuth
    </div>
</div>
