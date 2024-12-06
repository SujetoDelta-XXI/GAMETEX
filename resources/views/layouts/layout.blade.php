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
                                        Registrarse
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

    @yield('contenido')

    <footer class="relative bg-gray-800 pt-8 pb-4">
        <div class="container mx-auto px-4 text-white ">
            <div class="flex flex-wrap text-left lg:text-left">
                <div class="w-full lg:w-6/12 px-4">
                    <h4 class="text-3xl font-semiboldpb-2">SIGUENOS EN:</h4>
                    <h5 class="text-lg mt-0 mb-2 text-white">
                        Entérate de las novedades sobre el desarrollo del sitio web y las actividades futuras a través
                        de nuestras redes sociales.
                    </h5>
                    <div class="mt-6 lg:mb-0 mb-6">
                        <a href="https://x.com/GAMETEX2024" target="_blank">
                            <button
                                class="bg-white text-blue-400 shadow-lg font-normal h-14 w-14 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button">
                                <i class="fab fa-twitter text-3xl"></i>
                            </button>
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=61555013789282" target="_blank">
                            <button
                                class="bg-white text-blue-700 shadow-lg font-normal h-14 w-14 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button">
                                <i class="fab fa-facebook-square text-3xl"></i>
                            </button>
                        </a>
                        <a href="https://discord.gg/eTHuf32W" target="_blank">
                            <button
                                class="bg-white text-blue-800 shadow-lg font-normal h-14 w-14 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button">
                                <i class="fab fa-discord text-3xl"></i>
                            </button>
                        </a>
                        <a href="https://www.youtube.com/@GAMETEX2024" target="_blank">
                            <button
                                class="bg-white text-red-600 shadow-lg font-normal h-14 w-14 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button">
                                <i class="fab fa-youtube text-3xl"></i>
                            </button>
                        </a>
                        <a href="https://www.twitch.tv/gametex2024" target="_blank">
                            <button
                                class="bg-white text-purple-700 shadow-lg font-normal h-14 w-14 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button">
                                <i class="fab fa-twitch text-3xl"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="flex flex-wrap items-top mb-0">
                        <div class="w-full lg:w-4/12 px-4 ml-auto py-5">
                            <span class="block uppercase text-white text-sm font-semibold mb-2">ACERCA</span>
                            <ul class="list-unstyled">
                                <li><a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                        href="{{ 'f_nosotros' }}">Nosotros</a></li>
                                <li><a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                        href="{{ 'f_metodos_pago' }}">Métodos de Pago</a></li>
                                <li><a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                        href="{{ 'f_tienda' }}">Tienda</a></li>
                                <li><a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                        href="{{ 'f_torneos' }}">Torneos</a></li>
                                <li><a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                        href="{{ 'f_eventos' }}">Eventos</a></li>
                                <li><a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                        href="{{ 'f_categorias' }}">Categorías</a></li>
                            </ul>
                        </div>
                        <div class="w-full lg:w-4/12 px-4 py-5">
                            <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Términos</span>
                            <ul class="list-unstyled">
                                <li><a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                        href="{{ 'f_poli_privacidad' }}">Políticas de Privacidad</a></li>
                                <li><a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                        href="{{ 'f_termin_condiciones' }}">Términos y Condiciones</a></li>
                                <li><a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                        href="{{ 'f_poli_reembolsos' }}">Política de Reembolsos</a></li>
                                <li><a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                        href="{{ 'f_poli_cookies' }}">Política de Cookies</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mb-4 mt-2 border-gray-600">
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                    <div class="text-sm text-blueGray-500 font-semibold py-1">
                        Copyright © <span id="get-current-year">2021</span><a href="{{ '/' }}"
                            class="text-blueGray-500 hover:text-gray-800" target="_blank"> GAMETEX</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
