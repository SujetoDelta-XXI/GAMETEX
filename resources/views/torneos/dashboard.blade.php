@extends('layouts.layout')
@section('contenido')
    <main>
        <div class="flex">
            <div class="antialiased bg-black w-full min-h-screen text-slate-300 relative py-4">
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
                            <a href="{{ route('torneos-descripcion') }}"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div
                                    class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-indigo-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 5h10M7 5a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2M7 5V3m10 2V3" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Información
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-1 group">
                                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-8 w-8 text-white group-hover:text-indigo-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <!-- Persona central -->
                                            <circle cx="12" cy="8" r="3" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 14c0-2 2-3 3-3s3 1 3 3v1H9v-1z" />

                                            <!-- Persona izquierda -->
                                            <circle cx="6" cy="10" r="2" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4 16c0-1.5 1.5-2.5 2-2.5s2 1 2 2.5v0.5H4v-0.5z" />

                                            <!-- Persona derecha -->
                                            <circle cx="18" cy="10" r="2" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16 16c0-1.5 1.5-2.5 2-2.5s2 1 2 2.5v0.5h-4v-0.5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Equipo
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-white group-hover:text-indigo-400" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2" fill="none">
                                            <!-- Cuerpo del mando -->
                                            <path
                                                d="M4 8h16c1.104 0 2 0.896 2 2v8c0 1.104-0.896 2-2 2H4c-1.104 0-2-0.896-2-2V10c0-1.104 0.896-2 2-2z"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <!-- Joystick izquierdo -->
                                            <circle cx="7" cy="13" r="1.5" fill="currentColor" />
                                            <!-- Joystick derecho -->
                                            <circle cx="17" cy="13" r="1.5" fill="currentColor" />
                                            <!-- Botón Triángulo -->
                                            <circle cx="12" cy="5" r="1.5" fill="currentColor" />
                                            <!-- Botón Cuadrado -->
                                            <circle cx="8" cy="9" r="1.5" fill="currentColor" />
                                            <!-- Botón Círculo -->
                                            <circle cx="16" cy="9" r="1.5" fill="currentColor" />
                                            <!-- Botón Cruz -->
                                            <circle cx="12" cy="11" r="1.5" fill="currentColor" />
                                            <!-- D-Pad (Botones de dirección) -->
                                            <path d="M7 7h10M7 7a2 2 0 000 4h10a2 2 0 000-4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Partidas
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 group">
                                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div class="pl-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"
                                            class="h-8 w-8 text-white group-hover:text-indigo-400">
                                            <!-- Base del trofeo -->
                                            <path fill="none" stroke="currentColor" stroke-width="10"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                d="M60 145c0 10 80 10 80 0" />
                                            <!-- Cuerpo del trofeo -->
                                            <path fill="none" stroke="currentColor" stroke-width="10"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                d="M60 120c0 10 80 10 80 0V70c0-10-80-10-80 0v50z" />
                                            <!-- Decoración de la copa -->
                                            <path fill="none" stroke="currentColor" stroke-width="6"
                                                stroke-linecap="round" stroke-linejoin="round" d="M100 55l0 15" />
                                            <!-- Detalles de la base -->
                                            <path fill="none" stroke="currentColor" stroke-width="10"
                                                stroke-linecap="round" stroke-linejoin="round" d="M80 145h40" />
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
                            <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-white group-hover:text-indigo-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <!-- Cabeza -->
                                            <circle cx="12" cy="9" r="6" stroke="currentColor"
                                                stroke-width="2" fill="none" />
                                            <!-- Auricular -->
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12c-1.5 0-3 1.5-3 3v2c0 1.5 1.5 3 3 3h6c1.5 0 3-1.5 3-3v-2c0-1.5-1.5-3-3-3H9z" />
                                            <!-- Micrófono -->
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 13h1v4h-1v-4z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Soporte
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <p class="text-sm text-center text-gray-600">v2.0.0.3 | &copy; 2022 Pantazi Soft</p>
                    </div>

                    <div id="content" class="bg-white/10 col-span-9 rounded-lg p-6">
                        @yield('content-torneos')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
