@extends('admin.dashboard')

@section('crudAdm')
    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <!-- Buscador -->
                    <div class="relative w-1/2">
                        <input type="search" id="search-dropdown"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                            placeholder="Buscar" required />
                        <button type="submit"
                            class="absolute top-0 right-0 p-2.5 h-full text-sm font-medium text-white bg-yellow-700 rounded-r-lg border border-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </button>
                    </div>
                    <select id="recompensa-filter"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100 bg-gray-800">
                        <option value="all">Mostrar todo</option>
                        @foreach ($recompensas->unique('tipo.nombre') as $recompensa)
                            <option value="{{ $recompensa->tipo->nombre }}">{{ $recompensa->tipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-layout:fixed">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">Producto</th>
                                <th scope="col" class="p-4">Categoria</th>
                                <th scope="col" class="p-4">Clave del producto</th>
                                <th scope="col" class="p-4">Precio</th>
                                <th scope="col" class="p-4">Fecha de ingreso</th>
                                <th scope="col" class="p-4">Ultima actualización</th>
                                <th>
                                    <button type="button" id="createProductButton" data-modal-toggle="createProductModal"
                                        class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 
                                    dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 hover:border bg-gray-800">
                                        <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                        </svg>
                                        Agregar producto
                                    </button>
                                </th>
                            </tr>
                        </thead>

                        <tbody id="recompensas-table">
                            @foreach ($recompensas as $recompensa)
                                <x-admin.recompensas_list>
                                    <x-slot name="recompensa_tipo">
                                        {{ $recompensa->tipo->nombre }}
                                    </x-slot>
                                    <x-slot name="producto">
                                        {{ $recompensa->nombre }}
                                    </x-slot>
                                    <x-slot name="categoria">
                                        {{ $recompensa->tipo->nombre }}
                                    </x-slot>
                                    <x-slot name="stock">
                                        {{ $recompensa->cantidad }}
                                    </x-slot>
                                    <x-slot name="precio">
                                        {{ $recompensa->precio }}
                                    </x-slot>
                                    <x-slot name="f_create">
                                        {{ $recompensa->created_at }}
                                    </x-slot>
                                    <x-slot name="f_update">
                                        {{ $recompensa->updated_at }}
                                    </x-slot>
                                </x-admin.recompensas_list>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 pb-5 px-5">
                        {{ $recompensas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End block -->
    <div id="createProductModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center 
        items-center w-full md:inset-0 h-[calc(100%-1rem)] md:h-full bg-opacity-50">
        <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-900 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Nuevo producto</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="createProductModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Cerrar Modal</span>
                    </button>
                </div>

                <!-- Modal body -->

                <form action="{{ route('admin.crud.recompensa.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="nombre"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del
                                producto</label>
                            <input type="text" name="nombre" id="nombre"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nombre del producto" required>
                        </div>
                        <div>
                            <label for="recompensa_tipo_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                            <select id="recompensa_tipo_id" name="recompensa_tipo_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected>Selecciona una categoría</option>
                                @foreach ($recompensas->unique('tipo.nombre') as $recompensa)
                                    <option value="{{ $recompensa->tipo->id }}">{{ $recompensa->tipo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="clave"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Clave de producto
                            </label>
                            <input type="text" name="clave" id="clave"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="niijsdsd-sdcxa85-549" required>
                        </div>
                        <div>
                            <label for="precio"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                            <input type="number" name="precio" id="precio"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="S/45" required>
                        </div>
                    </div>
                    <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                        <button type="submit"
                            class="border w-full sm:w-auto justify-center text-white inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 hover:border">
                            Agregar producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Drawer component -->
    <form action="{{ route('admin.crud.recompensa.update', $recompensa->id) }}" method="POST"
        id="drawer-update-product"
        class="fixed top-0 left-0 z-40 w-[30%] h-[80%] max-w-3xl p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-900"
        tabindex="-1" aria-labelledby="drawer-update-product-label" aria-hidden="true">
        @csrf
        @method('PUT')
        <h5 id="drawer-label"
            class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
            Actualizar Producto
        </h5>
        <button type="button" data-drawer-dismiss="drawer-update-product" aria-controls="drawer-update-product"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Cerrar menú</span>
        </button>
        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6 ">
            <div class="space-y-4 sm:col-span-2 sm:space-y-6">
                <div>
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nombre del Producto
                    </label>
                    <input type="text" name="nombre" id="nombre" value="{{ $recompensa->nombre }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600
                                block w-[80%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Escribe el nombre del producto" required="">
                </div>
            </div>
        </div>
        <br>
        <div>
            <label for="recompensa_tipo_id"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
            <select id="recompensa_tipo_id" name="recompensa_tipo_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block
                        w-[50%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                @foreach ($recompensasTipos as $tipo)
                    <option value="{{ $tipo->id }}"
                        {{ $recompensa->recompensa_tipo_id == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="space-y-4 sm:space-y-6">
            <div>
                <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                <input type="number" name="precio" id="precio" value="{{ $recompensa->precio }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-[40%]
                            p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Precio del producto" required="">
            </div>
        </div>
        <br>
        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6 ">
            <div class="space-y-4 sm:col-span-2 sm:space-y-6">
                <div>
                    <label for="clave" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Clave de producto
                    </label>
                    <input type="text" name="clave" id="clave" value="{{ $recompensa->nombre }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600
                                block w-[80%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Escribe el nombre del producto" required="">
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-6 sm:w-[100%] pt-4">
            <button type="submit"
                class="border text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Actualizar producto
            </button>
        </div>
    </form>
    </div>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const recompensasFilter = document.getElementById(
            'recompensa-filter'); // Renombrado a recompensasFilter
            const recompensaContainers = document.querySelectorAll(
            '[data-recompensa]'); // Renombrado a recompensaContainers
            const searchInput = document.getElementById('search-dropdown');

            // Filtrar recompensas por el tipo de juego seleccionado en el dropdown
            recompensasFilter.addEventListener('change', function() {
                const selectedRecompensa = recompensasFilter.value; // Renombrado a selectedRecompensa

                recompensaContainers.forEach(function(container) {
                    const recompensaType = container.getAttribute(
                    'data-recompensa'); // Renombrado a recompensaType
                    if (selectedRecompensa === 'all' || recompensaType === selectedRecompensa) {
                        container.style.display =
                        ""; // Muestra el contenedor, mantiene su espacio en el layout
                    } else {
                        container.style.display =
                        "none"; // Oculta el contenedor sin mover los demás
                    }
                });
            });


            const rows = document.querySelectorAll(
            '#recompensas-table tr'); // Seleccionamos todas las filas dentro del tbody

            // Función que filtra las filas según el texto de búsqueda
            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value
            .toLowerCase(); // Convertimos el término de búsqueda a minúsculas

                rows.forEach(function(row) {
                    // Buscar el contenido del nombre del producto en el slot "producto"
                    const productoCell = row.querySelector(
                    'td'); // La primera celda es donde se encuentra el nombre del producto
                    const productoText = productoCell ? productoCell.textContent.toLowerCase() : '';

                    if (productoText.includes(searchTerm)) {
                        row.style.display =
                        ''; // Muestra la fila si el nombre del producto coincide
                    } else {
                        row.style.display = 'none'; // Oculta la fila si no coincide
                    }
                });
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
    <script src="/livewire/livewire.js?id=38dc8241" data-csrf="BGW9EdPbFlgx3x6zunuiT1IxnJYEeNNNUASQP0z5"
        data-update-uri="/livewire/update" data-navigate-once="true"></script>
@endsection
