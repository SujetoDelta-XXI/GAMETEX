<div
    {{ $attributes->merge(['class' => 'relative flex flex-col mt-6 text-black shadow-md bg-clip-border rounded-xl transform transition-transform duration-300 ease-in-out hover:scale-105 overflow-hidden' . $class]) }}>
    <div
        class="relative h-56 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
        <img class="object-cover w-full h-full" src="{{ $imagen }}" alt="card-image" />
    </div>
    <div class="p-6">
        <h5
            class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-black text-center">
            {{ $name }}
        </h5>
        <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
            {{ $fecha }}
        </p>
    </div>
    <div class="p-6 pt-0">
        <button data-modal-target="exampleModal" data-modal-toggle="exampleModal"
            class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-900 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-900 dark:focus:ring-gray-900 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                class="w-4 h-4 mr-2 -ml-0.5">
                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
            </svg>
            Visualizar
        </button>
    </div>
</div>

<!-- Modal -->
<div id="exampleModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Botón para cerrar -->
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="exampleModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Cerrar</span>
            </button>
            <!-- Contenido del modal -->
            <div class="p-6 text-center">
                <div>
                    <h4 id="read-drawer-label"
                        class="mb-1.5 leading-none text-xl font-semibold text-gray-900 dark:text-white">
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
                <div class="mb-4 sm:mb-5">
                    <div class="flex items-center justify-center p-2 w-auto bg-gray-100 rounded-lg dark:bg-gray-700">
                        <img src="{{ asset('usuarios_img/gaming.gif') }}" alt="iMac Side Image"
                            class="max-w-full max-h-full">
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.375.375 0 01.683 0l2.08 4.214a.375.375 0 00.282.205l4.595.668a.375.375 0 01.208.639l-3.326 3.24a.375.375 0 00-.108.332l.785 4.577a.375.375 0 01-.544.395L12 15.854l-4.105 2.158a.375.375 0 01-.544-.395l.785-4.577a.375.375 0 00-.108-.332L4.702 9.226a.375.375 0 01.208-.639l4.595-.668a.375.375 0 00.282-.205l2.08-4.214z" />
                            </svg>
                            3
                        </dd>
                    </div>
                    <div
                        class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6 pr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2zm0 4h10" />
                            </svg>
                            12/12/2024
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script src="/livewire/livewire.js?id=38dc8241" data-csrf="BGW9EdPbFlgx3x6zunuiT1IxnJYEeNNNUASQP0z5"
    data-update-uri="/livewire/update" data-navigate-once="true"></script>
