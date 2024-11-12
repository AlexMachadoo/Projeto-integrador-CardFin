<head>
    <!-- Outros links e meta tags -->
    <link rel="stylesheet" href="{{ asset('css/navbar/navbar.css') }}">
</head>

<body>
    <nav x-data="{ open: false }" class="navbar">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <!-- Left Section: Logo and Links -->
            <div class="flex items-center">
            <a href="{{ route('dashboard') }}" class="shrink-0 flex items-center">
    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-16 w-auto">
</a>
            </div>

            <!-- Centralizar Links -->
            <div class="nav-links flex-1 flex justify-center">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link">
                    {{ __('HomePage - CardFin') }}
                </x-nav-link>
                <x-nav-link :href="route('emprestimos.index')" :active="request()->routeIs('emprestimos.index')" class="nav-link">
                    {{ __('Empréstimos') }}
                </x-nav-link>
                <x-nav-link :href="route('cartao.index')" :active="request()->routeIs('cartao.index')" class="nav-link">
                    {{ __('Cartões') }}
                </x-nav-link>
            </div>

            <!-- Right Section: Settings Dropdown -->
            <div class="hidden sm:flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center px-3 py-2 rounded-md text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ms-1 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Menu Button -->
            <div class="sm:hidden flex items-center">
                <button id="hamburger-button" class="p-2 rounded-md text-gray-400 dark:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none transition duration-150">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div id="mobile-nav-menu" class="sm:hidden hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('HomePage - CardFin') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('emprestimos.index')" :active="request()->routeIs('emprestimos.index')">
                    {{ __('Empréstimos') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('cartao.index')" :active="request()->routeIs('cartao.index')">
                    {{ __('Cartões') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </nav>

    <!-- Incluindo o JS -->
    <script src="{{ asset('js/navbar/navbar.js') }}"></script>
</body>
