<nav x-data="{ open: false, profileOpen: false, stickyMenu: false }" @scroll.window="stickyMenu = (window.pageYOffset > 20)"
    :class="stickyMenu ? 'fixed top-0 left-0 w-full z-50 bg-white dark:bg-gray-800 shadow' : 'bg-white dark:bg-gray-800'"
    class="transition-all duration-300 border-b border-gray-200 dark:border-gray-700">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- LOGO -->
            <div class="flex items-center">
                <a href="{{ url('/') }}"  class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-800 dark:text-gray-100 tracking-tight">
                    Psikolog
                </a>
            </div>
            
            <!-- RIGHT SECTION -->
            <div class="flex items-center space-x-4">
                <!-- AUTH SECTION -->
                @guest
                    <a href="{{ route('login') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-medium">
                        Masuk
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-3 py-1 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition">
                            Daftar
                        </a>
                    @endif
                @endguest

                @auth
                    <!-- USER DROPDOWN -->
                    <div class="relative sm:flex hidden sm:relative" @click.away="profileOpen = false">
                        <button @click="profileOpen = !profileOpen"
                            class="flex items-center focus:outline-none rounded-full ring-2 ring-transparent hover:ring-gray-300 dark:hover:ring-gray-600">
                            <img class="h-9 w-9 rounded-full object-cover" src="{{ asset('images/team-01.png') }}"
                                alt="Profil">
                        </button>

                        <div x-show="profileOpen" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg overflow-hidden z-50">
                            <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-100">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                            </div>

                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                Edit Profil
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth

                <!-- HAMBURGER (MOBILE) -->
                <button @click="open = !open"
                    class="sm:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- RESPONSIVE MENU (MOBILE)-->
    <div x-show="open" x-transition
        class="sm:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}"
                class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                Home
            </a>
        </div>

        @auth
            <div class="border-t border-gray-200 dark:border-gray-700 pt-2 pb-3 space-y-1">
                <a href="{{ route('profile.edit') }}"
                    class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                    Edit Profil
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        Keluar
                    </button>
                </form>
            </div>
        @endauth
    </div>
</nav>
