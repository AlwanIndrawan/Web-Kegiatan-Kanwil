<nav x-data="{ open: false }" class="bg-blue-800 shadow">

    <div class="w-full px-6">

        <div class="flex justify-between items-center h-16">

            <!-- KIRI : LOGO -->
            <div class="flex items-center gap-3 text-white">

                <img src="{{ asset('logo-imigrasi.png') }}" class="h-10">

                <div class="leading-tight">
                    <p class="font-bold text-sm">
                        Kantor Wilayah
                    </p>

                    <p class="text-xs text-blue-200">
                        Direktorat Jenderal Imigrasi Sulawesi Selatan
                    </p>
                </div>

            </div>


            <!-- KANAN : ADMIN -->
            <div class="flex items-center">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button class="flex items-center gap-2 text-white hover:text-blue-200 transition">

                            <span class="font-semibold">
                                {{ Auth::user()->name }}
                            </span>

                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"/>
                            </svg>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>


            <!-- HAMBURGER MOBILE -->
            <div class="sm:hidden flex items-center">

                <button @click="open = ! open"
                    class="p-2 rounded-md text-white hover:bg-blue-700">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">

                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

</nav>