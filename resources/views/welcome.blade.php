<x-guest-layout>
<header class="text-black flex items-center flex-col py-8">
    <div class="">
        <h3 class="text-center font-bold text-3xl mb-8">Welcome</h3>
    </div>
    @if (Route::has('login'))
        <nav class="flex gap-4 items-center">
            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                >
                    Access Dashboard
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="cursor-pointer rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] " :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            @else
                <a
                    href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                >
                    Log in
                </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                    >
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif
</header>
  </x-guest-layout>
    