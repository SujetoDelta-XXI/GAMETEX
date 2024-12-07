<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameTex</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])

    <!-- component -->
    <header>
        <nav x-data="{ open: false }" class="flex h-auto w-auto bg-white shadow-lg rounded-lg justify-between md:h-16">
            <div class="flex w-full justify-between">
                <div :class="open ? 'hidden' : 'flex'"
                    class="flex px-6 w-1/2 items-center font-semibold md:w-1/5 md:px-1 md:flex md:items-center md:justify-center"
                    x-transition:enter="transition ease-out duration-300">
                    <a href="{{ '/' }}"><img class="h-12" src="{{ asset('logo.png') }}"></a>
                </div>

                <div x-show="open" x-transition:enter="transition ease-in-out duration-300"
                    class="flex flex-col w-full h-auto md:hidden">
                    <div class="flex flex-col items-center justify-center gap-2 py-4">
                        <a href="{{ '/' }}">Inicio</a>
                        <a href="{{ 'torneos' }}">Torneos</a>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-2 py-2">
                        @if (Route::has('login'))
                            @if (!auth()->guard('admin')->check() && !auth()->guard('moder')->check() && !auth()->guard('user')->check())
                                <a href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Iniciar Sesión
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                        Registrase
                                    </a>
                                @endif
                            @else
                                <!-- Responsive Navigation Menu -->
                                <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                                    <div class="pt-2 pb-3 space-y-1">
                                        @if (Auth::guard('admin')->check())
                                            <x-responsive-nav-link href="{{ route('admin.dashboard') }}"
                                                :active="request()->routeIs('admin.dashboard')">
                                                <x-home.admin.admin_perfil_responsive>
                                                </x-home.admin.admin_perfil_responsive>
                                            </x-responsive-nav-link>
                                        @elseif(Auth::guard('moder')->check())
                                            <x-responsive-nav-link href="{{ route('moder.dashboard') }}"
                                                :active="request()->routeIs('moder.dashboard')">
                                                <x-home.moder.moder_perfil_responsive>
                                                </x-home.moder.moder_perfil_responsive>
                                            </x-responsive-nav-link>
                                        @else
                                            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                                <x-home.users.perfil_responsive>
                                                </x-home.users.perfil_responsive>
                                            </x-responsive-nav-link>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="hidden w-1/5 items-center justify-evenly font-semibold md:flex">
                    <a href="{{ '/' }}">Inicio</a>
                    <a class="pl-10" href="{{ 'torneos' }}">Torneos</a>
                    <a class="pl-10" href="{{ 'torneos-panel' }}">Panel</a>
                </div>
                <div class="hidden w-1/5 items-center justify-evenly font-semibold md:flex mr-[50px]">
                    @if (Route::has('login'))
                        @if (!auth()->guard('admin')->check() && !auth()->guard('moder')->check() && !auth()->guard('user')->check())
                            <a href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                Iniciar Sesión
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Registrarse
                                </a>
                            @endif
                        @else
                            @if (auth()->guard('admin')->check())
                                <x-home.admin.admin_perfil_card>
                                </x-home.admin.admin_perfil_card>
                            @elseif(auth()->guard('moder')->check())
                                <x-home.moder.moder_perfil_card>
                                </x-home.moder.moder_perfil_card>
                            @elseif(auth()->guard('user')->check())
                                <x-home.users.perfil_card>
                                </x-home.users.perfil_card>
                            @endif
                        @endif
                    @endif
                </div>
                <button class="text-gray-500 w-10 h-10 relative focus:outline-none bg-white md:hidden"
                    @click="open = !open">
                    <span class="sr-only">Open main menu</span>
                    <div class="block w-5 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <span aria-hidden="true"
                            class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out"
                            :class="{ 'rotate-45': open, '-translate-y-1.5': !open }"></span>
                        <span aria-hidden="true"
                            class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out"
                            :class="{ 'opacity-0': open }"></span>
                        <span aria-hidden="true"
                            class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out"
                            :class="{ '-rotate-45': open, 'translate-y-1.5': !open }"></span>
                    </div>
                </button>
            </div>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <main class="h-full">
        @yield('contenido')
    </main>
    

</body>
</html>