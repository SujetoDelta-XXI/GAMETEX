@extends('admin.dashboard')

@section('crudAdm')
    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" placeholder="Search for products" required=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                            class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                class="h-4 w-4 mr-1.5 -ml-1 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                    clip-rule="evenodd" />
                            </svg>
                            Filtrar opciones
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        <div id="filterDropdown"
                            class="z-10 hidden px-3 pt-1 bg-white rounded-lg shadow w-80 dark:bg-gray-700 right-0">
                            <div class="flex items-center justify-between pt-2">
                                <h6 class="text-sm font-medium text-black dark:text-white">Filters</h6>
                                <div class="flex items-center space-x-3">
                                    <a href="#"
                                        class="flex items-center text-sm font-medium text-primary-600 dark:text-primary-500 hover:underline">Save
                                        view</a>
                                    <a href="#"
                                        class="flex items-center text-sm font-medium text-primary-600 dark:text-primary-500 hover:underline">Clear
                                        all</a>
                                </div>
                            </div>
                            <div class="pt-3 pb-2">
                                <label for="input-group-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="input-group-search"
                                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Search keywords...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-white dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="p-4 text-center">Nombre</th>
                                <th scope="col" class="p-4">Correo Electrónico</th>
                                <th scope="col" class="p-4">Actividad</th>
                                <th scope="col" class="p-4">Fecha de creación</th>
                                <th scope="col" class="p-4">Fecha de actualización</th>
                                <th scope="col" class="p-4">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center mr-3">
                                        <img src="{{ asset('usuarios_img/gaming.gif') }}" alt="iMac Front Image"
                                            class="h-8 w-auto mr-3">
                                        Carlos
                                    </div>
                                </th>
                                <td class="px-4 py-3">
                                    <span
                                        class="bg-primary-100 text-primary-800 text-x1 font-medium px-2 py-0.5 rounded dark:bg-primary-900 
                                    dark:text-primary-300">
                                        carlos@tecsup.edu.pe
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <span
                                        class="bg-primary-100 text-primary-800 text-x1 font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                        20 horas
                                    </span>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center">
                                        12/12/2024
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center">
                                        14/12/2024
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-gray-400">
                                    <div class="flex">
                                        Suspendido
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center space-x-4">
                                        <button type="button" data-drawer-target="drawer-read-product-advanced"
                                            data-drawer-show="drawer-read-product-advanced"
                                            aria-controls="drawer-read-product-advanced"
                                            class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-900 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-900 dark:focus:ring-gray-900 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                            Visualizar
                                        </button>
                                        <button type="button" data-modal-target="delete-modal"
                                            data-modal-toggle="delete-modal"
                                            class="flex items-center text-yellow-700 hover:text-white border border-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:hover:bg-yellow-600 dark:focus:ring-yellow-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                                viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Suspender
                                        </button>
                                        <button type="button" data-modal-target="delete-modal"
                                            data-modal-toggle="delete-modal"
                                            class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-600 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                                viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                Carlos
            </h4>
            <h5 class="mb-5 text-xl font-bold text-gray-900 dark:text-white">carlos@tecsup.edu.pe</h5>
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
        <div class="grid grid-cols-3 gap-4 mb-4 sm:mb-5">
            <div class="p-2 w-auto bg-gray-100 rounded-lg dark:bg-gray-700">
                <img src="{{ asset('usuarios_img/gaming.gif') }}"
                    alt="iMac Side Image">
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
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Actividad</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 pr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    20 horas
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
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Fecha de actualización</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 pr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2zm0 4h10" />
                    </svg>
                    14/12/2024
                </dd>
            </div>
            <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Brand</dt>
                <dd class="text-gray-500 dark:text-gray-400">Apple</dd>
            </div>
            <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Dimensions (cm)</dt>
                <dd class="text-gray-500 dark:text-gray-400">105 x 15 x 23</dd>
            </div>
            <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Item weight</dt>
                <dd class="text-gray-500 dark:text-gray-400">12kg</dd>
            </div>
        </dl>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
    <script src="/livewire/livewire.js?id=38dc8241" data-csrf="BGW9EdPbFlgx3x6zunuiT1IxnJYEeNNNUASQP0z5" data-update-uri="/livewire/update" data-navigate-once="true"></script>
@endsection
