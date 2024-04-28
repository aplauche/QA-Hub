<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="font-bold text-black flex items-center gap-2" >
                        <div class="border-black border p-2 rounded-full">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M10.0503 10.6066L2.97923 17.6777C2.19818 18.4587 2.19818 19.7251 2.97923 20.5061V20.5061C3.76027 21.2872 5.0266 21.2872 5.80765 20.5061L12.8787 13.4351" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.1927 13.7994L21.071 17.6777C21.8521 18.4587 21.8521 19.7251 21.071 20.5061V20.5061C20.29 21.2872 19.0236 21.2872 18.2426 20.5061L12.0341 14.2977" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.73267 5.90381L4.61135 6.61092L2.49003 3.07539L3.90424 1.66117L7.43978 3.78249L6.73267 5.90381ZM6.73267 5.90381L9.5629 8.73404" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10.0503 10.6066C9.2065 8.45359 9.37147 5.62861 11.111 3.8891C12.8505 2.14958 16.0607 1.76778 17.8285 2.82844L14.7878 5.86911L14.5052 8.98015L17.6162 8.69754L20.6569 5.65686C21.7176 7.42463 21.3358 10.6349 19.5963 12.3744C17.8567 14.1139 15.0318 14.2789 12.8788 13.435" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                        QA HUB
                        {{-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> --}}
                    </a>
                </div>

            
            </div>

            <div class="flex gap-4">
                {{-- <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div> --}}

                <!-- Settings Dropdown --> 
                <div class="hidden sm:flex sm:items-center sm:ms-6">

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
