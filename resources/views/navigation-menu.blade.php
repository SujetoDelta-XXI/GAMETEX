<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div>
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @php
                                $user =
                                    Auth::guard('user')->user() ??
                                    (Auth::guard('admin')->user() ?? Auth::guard('moder')->user());
                                $userType = Auth::guard('admin')->check()
                                    ? 'Admin'
                                    : (Auth::guard('moder')->check()
                                        ? 'Moderator'
                                        : (Auth::guard('user')->check()
                                            ? 'User'
                                            : 'Guest'));
                            @endphp
                            @if ($user)
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        <div>
                                            <img class="rounded-full w-10 h-10 relative object-cover"
                                                src="https://img.freepik.com/free-photo/no-problem-concept-bearded-man-makes-okay-gesture-has-everything-control-all-fine-gesture-wears-spectacles-jumper-poses-against-pink-wall-says-i-got-this-guarantees-something_273609-42817.jpg?w=1800&t=st=1669749937~exp=1669750537~hmac=4c5ab249387d44d91df18065e1e33956daab805bee4638c7fdbf83c73d62f125"
                                                alt="">
                                        </div>
                                        <div class="flex items-center pl-4">
                                            <p class="font-medium group-hover:text-indigo-400 leading-4">
                                                {{ $user->name }} ({{ $userType }})
                                            </p>
                                            <svg class="ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </div>
                                    </button>
                                </span>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ __('Imvitado') }}
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <!-- Dropdown Options -->
                        <x-slot name="content">
                            @if ($user)
                                <x-dropdown-link href="{{ route('users-perfil') }}">
                                    {{ __('Perfil') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </x-dropdown-link>
                                </form>
                            @else
                                <x-dropdown-link href="{{ route('login') }}">
                                    {{ __('Inciar Sesión') }}
                                </x-dropdown-link>
                            @endif
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (Auth::guard('admin')->check())
                <x-responsive-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                    {{ __('Panel Administrador') }}
                </x-responsive-nav-link>
            @elseif(Auth::guard('moder')->check())
                <x-responsive-nav-link href="{{ route('moder.dashboard') }}" :active="request()->routeIs('moder.dashboard')">
                    {{ __('Panel Moderador') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <span class="inline-flex rounded-md">
                        <button type="button"
                            class="inline-flex items-center px-2 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            <div>
                                <img class="rounded-full w-10 h-10 relative object-cover"
                                    src="https://img.freepik.com/free-photo/no-problem-concept-bearded-man-makes-okay-gesture-has-everything-control-all-fine-gesture-wears-spectacles-jumper-poses-against-pink-wall-says-i-got-this-guarantees-something_273609-42817.jpg?w=1800&t=st=1669749937~exp=1669750537~hmac=4c5ab249387d44d91df18065e1e33956daab805bee4638c7fdbf83c73d62f125"
                                    alt="">
                            </div>
                            <div class="flex items-center pl-4">
                                <p class="w-full font-medium group-hover:text-indigo-400 leading-4">
                                    {{ $user->name }} ({{ $userType }})
                                </p>
                            </div>
                        </button>
                    </span>
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pb-4 border-t border-gray-200">
            <div class="mt-3 space-y-1">
                @if ($user)
                    <x-dropdown-link href="{{ route('users-perfil') }}">
                        {{ __('Perfil') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-dropdown-link>
                    </form>
                @else
                    <x-responsive-nav-link href="{{ route('login') }}">
                        {{ __('Iniciar Sesión') }}
                    </x-responsive-nav-link>
                @endif
            </div>
        </div>
    </div>
</nav>
