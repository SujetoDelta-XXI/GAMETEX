@extends('layouts.layout')
@section('contenido')
    <main>
        <div class="flex">
            <div class="antialiased bg-gray-900 w-full min-h-screen text-slate-300 relative py-4">
                <div class="grid grid-cols-12 mx-auto gap-2 sm:gap-4 md:gap-6 lg:gap-10 xl:gap-14 max-w-7xl my-10 px-2">
                    <div id="menu" class="bg-white/10 col-span-3 rounded-lg p-4 ">
                        <div id="menu" class="flex flex-col space-y-2 my-5">
                            <a href="{{ '/' }}"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="h-6 w-6 group-hover:text-indigo-400">
                                            <path
                                                d="M3 9L12 2L21 9V20C21 20.553 20.553 21 20 21H4C3.447 21 3 20.553 3 20V9Z">
                                            </path>
                                            <path d="M9 21V12H15V21"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Inicio</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('evento-detalle') }}"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div
                                    class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-indigo-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <!-- Borde del cuaderno -->
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 5h10M7 5a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2M7 5V3m10 2V3" />
                                            <!-- Líneas del contenido -->
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 10h6" />
                                            <!-- Línea 1 -->
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6" />
                                            <!-- Línea 2 -->
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 14h6" />
                                            <!-- Línea 3 -->
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 16h6" />
                                            <!-- Línea 4 -->
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Detalle
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('evento-ranking') }}"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-1 group">
                                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-8 w-8 text-white group-hover:text-indigo-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <!-- Barra más alta -->
                                            <rect x="4" y="6" width="4" height="12" rx="1" />
                                            <!-- Barra media -->
                                            <rect x="10" y="10" width="4" height="8" rx="1" />
                                            <!-- Barra más baja -->
                                            <rect x="16" y="14" width="4" height="4" rx="1" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Ranking
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div id="content" class="bg-white/10 col-span-9 rounded-lg p-6 hide-scroll-bar">
                        @yield('content-eventos')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
