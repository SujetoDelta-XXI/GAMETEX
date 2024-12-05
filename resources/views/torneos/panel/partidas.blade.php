@extends('torneos.dashboard')
@section('content-torneos')
    <section id="24h">
        <h1 class="font-bold py-4 uppercase text-2xl text-center">Cronograma de Partidas</h1>
        <br>
        <hr>
        <h2 class="font-bold pt-4 uppercase text-2x1 mt-1">Fase 1</h2>
        <div>
            <h3 class="font-bold py-4 uppercase text-1x1 mt-1">Ronda 1 - 12/11/2024 - 3:00pm</h3>
            <div id="stats" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-7 gap-4">
                <div class="bg-black/60 to-white/5 rounded-lg col-span-3">
                    <div class="flex flex-row items-center">
                        <div class="pl-4 py-2">
                            <p class="text-xl font-bold">Equipo 1</p>
                        </div>
                    </div>
                    <div class="border-t border-white/5 p-2 flex">
                        <span class="p-1 text-sm text-green-500">
                            Ganador
                        </span>
                        <button type="button" data-drawer-target="drawer-read-product-advanced"
                            data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced"
                            class="py-[5px] px-3  ml-auto flex items-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-900 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-900 dark:focus:ring-gray-900 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4 mr-2 -ml-0.5">
                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                            </svg>
                            Integrantes
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-center text-2xl font-bold">
                    <p class="text-xl">VS</p>
                </div>
                <div class="bg-black/60 to-white/5 rounded-lg col-span-3">
                    <div class="flex flex-row items-center">
                        <div class="pl-4 py-2">
                            <p class="text-xl font-bold">Equipo 2</p>
                        </div>
                    </div>
                    <div class="border-t border-white/5 p-2 flex">
                        <span class="p-1 text-sm text-red-500">
                            Perdedor
                        </span>
                        <button type="button" data-drawer-target="drawer-read-product-advanced"
                            data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced"
                            class="py-[5px] px-3  ml-auto flex items-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-900 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-900 dark:focus:ring-gray-900 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4 mr-2 -ml-0.5">
                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                            </svg>
                            Integrantes
                        </button>
                    </div>
                </div>
            </div>
            <h3 class="font-bold py-4 uppercase text-1x1 mt-1">Ronda 1 - 12/11/2024 - 3:00pm</h3>
            <div id="stats" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-7 gap-4">
                <div class="bg-black/60 to-white/5 rounded-lg col-span-3">
                    <div class="flex flex-row items-center">
                        <div class="pl-4 py-2">
                            <p class="text-xl font-bold">Equipo 1</p>
                        </div>
                    </div>
                    <div class="border-t border-white/5 p-2 flex">
                        <span class="p-1 text-sm text-green-500">
                            Ganador
                        </span>
                        <button type="button" data-drawer-target="drawer-read-product-advanced"
                            data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced"
                            class="py-[5px] px-3  ml-auto flex items-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-900 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-900 dark:focus:ring-gray-900 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4 mr-2 -ml-0.5">
                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                            </svg>
                            Integrantes
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-center text-2xl font-bold">
                    <p class="text-xl">VS</p>
                </div>
                <div class="bg-black/60 to-white/5 rounded-lg col-span-3">
                    <div class="flex flex-row items-center">
                        <div class="pl-4 py-2">
                            <p class="text-xl font-bold">Equipo 2</p>
                        </div>
                    </div>
                    <div class="border-t border-white/5 p-2 flex">
                        <span class="p-1 text-sm text-red-500">
                            Perdedor
                        </span>
                        <button type="button" data-drawer-target="drawer-read-product-advanced"
                            data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced"
                            class="py-[5px] px-3  ml-auto flex items-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-900 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-900 dark:focus:ring-gray-900 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4 mr-2 -ml-0.5">
                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                            </svg>
                            Integrantes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div>
            <h2 class="font-bold pt-4 uppercase text-2x1 mt-1">Fase 2</h2>
            <h3 class="font-bold py-4 uppercase text-1x1 mt-1">Ronda 1 - 12/11/2024 - 3:00pm</h3>
            <div id="stats" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-7 gap-4">
                <div class="bg-black/60 to-white/5 rounded-lg col-span-3">
                    <div class="flex flex-row items-center">
                        <div class="pl-4 py-2">
                            <p class="text-xl font-bold">Equipo 1</p>
                        </div>
                    </div>
                    <div class="border-t border-white/5 p-2 flex">
                        <span class="p-1 text-sm text-green-500">
                            Ganador
                        </span>
                        <button type="button" data-drawer-target="drawer-read-product-advanced"
                            data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced"
                            class="py-[5px] px-3  ml-auto flex items-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-900 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-900 dark:focus:ring-gray-900 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4 mr-2 -ml-0.5">
                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                            </svg>
                            Integrantes
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-center text-2xl font-bold">
                    <p class="text-xl">VS</p>
                </div>
                <div class="bg-black/60 to-white/5 rounded-lg col-span-3">
                    <div class="flex flex-row items-center">
                        <div class="pl-4 py-2">
                            <p class="text-xl font-bold">Equipo 2</p>
                        </div>
                    </div>
                    <div class="border-t border-white/5 p-2 flex">
                        <span class="p-1 text-sm text-red-500">
                            Perdedor
                        </span>
                        <button type="button" data-drawer-target="drawer-read-product-advanced"
                            data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced"
                            class="py-[5px] px-3  ml-auto flex items-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-900 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-900 dark:focus:ring-gray-900 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4 mr-2 -ml-0.5">
                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                            </svg>
                            integrantes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Preview Drawer -->
    <div id="drawer-read-product-advanced"
        class=" overflow-y-auto fixed top-0 left-0 z-40 p-4 w-full max-w-lg h-screen bg-white transition-transform -translate-x-full dark:bg-gray-800"
        tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
        <div>
            <h4 id="read-drawer-label" class="mb-1.5 leading-none text-xl font-semibold text-gray-900 dark:text-white">
                Integrantes:
            </h4>
        </div>
        <button type="button" data-drawer-dismiss="drawer-read-product-advanced"
            aria-controls="drawer-read-product-advanced"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <br>
        <div
            class="p-3 my-3 flex items-center justify-start bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 grid-cols-2">
            <div class="w-[10%]">
                <img src="{{ asset('usuarios_img/gaming.gif') }}" alt="Imagen del jugador" class="rounded-lg">
            </div>
            <!-- Información del jugador -->
            <div class="ml-4">
                <dt class="text-xl text-gray-900 dark:text-white">Carlos Alfonso Asparrin Martin</dt>
            </div>
            <button type="button" data-drawer-target="drawer-read-perfil" data-drawer-show="drawer-read-perfil"
                aria-controls="drawer-read-perfil"
                class="py-[5px] px-3  ml-auto flex items-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-900 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-900 dark:focus:ring-gray-900 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                    class="w-4 h-4 mr-2 -ml-0.5">
                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                </svg>
                Ver
            </button>
        </div>
        <div
            class="p-3 my-3 flex items-center justify-start bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 grid-cols-2">
            <div class="w-[10%]">
                <img src="{{ asset('usuarios_img/gaming.gif') }}" alt="Imagen del jugador" class="rounded-lg">
            </div>
            <!-- Información del jugador -->
            <div class="ml-4">
                <dt class="text-xl text-gray-900 dark:text-white">Carlos Alfonso Asparrin Martin</dt>
            </div>
            <!-- Botón para abrir el drawer de perfil -->
            <button type="button" data-drawer-target="drawer-read-perfil" data-drawer-show="drawer-read-perfil"
                aria-controls="drawer-read-perfil"
                class="py-[5px] px-3 ml-auto flex items-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-900 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-900 dark:focus:ring-gray-900 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-4 h-4 mr-2 -ml-0.5">
                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                </svg>
                Ver
            </button>
        </div>
    </div>

    <!-- Modal (Drawer) -->
    <div id="drawer-read-perfil"
        class="overflow-y-auto fixed top-0 left-0 z-40 p-4 w-full max-w-lg h-screen bg-white transition-transform -translate-x-full dark:bg-gray-800"
        tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
        <div>
            <h4 id="read-drawer-label" class="mb-1.5 leading-none text-xl font-semibold text-gray-900 dark:text-white">
                Carlos
            </h4>
            <h5 class="mb-5 text-xl font-bold text-gray-900 dark:text-white">carlos@tecsup.edu.pe</h5>
        </div>
        <button type="button" data-drawer-dismiss="drawer-read-perfil" aria-controls="drawer-read-perfil"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <!-- Contenido del modal aquí -->
        <button type="button" data-drawer-dismiss="drawer-read-perfil" aria-controls="drawer-read-perfil"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="grid grid-cols-3 gap-4 mb-4 sm:mb-5">
            <div class="p-2 w-auto bg-gray-100 rounded-lg dark:bg-gray-700">
                <img src="{{ asset('usuarios_img/gaming.gif') }}" alt="iMac Side Image">
            </div>
        </div>
        <dl class="sm:mb-5">
            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Descripción</dt>
            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                Jugador peruano de left 4 dead 2, interesado en diversos torneos con tematica shooter.
            </dd>
        </dl>
        <dl class="grid grid-cols-2 gap-4 mb-4">
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Torneos jugados</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400 gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 3.75h3.75c.621 0 1.125.504 1.125 1.125v6.375a1.125 1.125 0 01-1.125 1.125H16.5M7.5 3.75H3.75c-.621 0-1.125.504-1.125 1.125v6.375c0 .621.504 1.125 1.125 1.125H7.5m0 0v4.5m0-4.5h9m0 0v4.5m0 0h-9m0 0V21h9v-4.5" />
                    </svg>
                    2
                </dd>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Eventos jugados</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400 gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.375.375 0 01.683 0l2.08 4.214a.375.375 0 00.282.205l4.595.668a.375.375 0 01.208.639l-3.326 3.24a.375.375 0 00-.108.332l.785 4.577a.375.375 0 01-.544.395L12 15.854l-4.105 2.158a.375.375 0 01-.544-.395l.785-4.577a.375.375 0 00-.108-.332L4.702 9.226a.375.375 0 01.208-.639l4.595-.668a.375.375 0 00.282-.205l2.08-4.214z" />
                    </svg>
                    3
                </dd>
            </div>
            <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Estado</dt>
                <dd class="text-gray-500 dark:text-gray-400">
                    <span class="flex items-center text-gray-500 dark:text-gray-400">
                        Activo
                    </span>
                </dd>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Fecha de Creación</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 pr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2zm0 4h10" />
                    </svg>
                    12/12/2024
                </dd>
            </div>
        </dl>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
    <script src="/livewire/livewire.js?id=38dc8241" data-csrf="BGW9EdPbFlgx3x6zunuiT1IxnJYEeNNNUASQP0z5"
        data-update-uri="/livewire/update" data-navigate-once="true"></script>
@endsection
