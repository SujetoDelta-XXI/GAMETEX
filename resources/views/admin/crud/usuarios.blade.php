@extends('admin.dashboard')

@section('crudAdm')
    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-900 antialiased">
        <div class="mx-auto max-w-screen-2xl">
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
                    <select id="usuarios-filter"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100 bg-gray-800">
                        <option value="all">Mostrar todo</option>
                        @foreach ($usuarios->pluck('estado')->unique() as $estado)
                            <option>{{ $estado }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-white dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="p-4 text-center">Nombre</th>
                                <th scope="col" class="p-4">Correo Electrónico</th>
                                <th scope="col" class="p-4">Actividad Torneos</th>
                                <th scope="col" class="p-4">Actividad Eventos</th>
                                <th scope="col" class="p-4">Fecha de creación</th>
                                <th scope="col" class="p-4">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <x-admin.usuarios>
                                    <x-slot name="name">
                                        {{ $usuario->name }}
                                    </x-slot>
                                    <x-slot name="email">
                                        {{ $usuario->email }}
                                    </x-slot>
                                    <x-slot name="estado">
                                        {{ $usuario->estado }}
                                    </x-slot>
                                    <x-slot name="f_cre">
                                        {{ $usuario->created_at->format('d/m/Y') }}
                                    </x-slot>
                                </x-admin.usuarios>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 pb-5 px-5">
                        {{ $usuarios->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Preview Drawer -->
    <x-admin.usuarios_datos>
        @foreach ($usuarios as $usuario)
            <x-slot name="name">
                {{ $usuario->name }}
            </x-slot>
            <x-slot name="email">
                {{ $usuario->email }}
            </x-slot>
            <x-slot name="estado">
                {{ $usuario->estado }}
            </x-slot>
            <x-slot name="descripcion">
                {{ $usuario->descripcion }}
            </x-slot>
            <x-slot name="f_cre">
                {{ $usuario->created_at }}
            </x-slot>
        @endforeach
    </x-admin.usuarios_datos>

    <script>
        // Filtrar por nombre de usuario (buscador)
        document.getElementById('search-dropdown').addEventListener('input', function() {
            let searchTerm = this.value.toLowerCase();
            let rows = document.querySelectorAll('.usuario-row');
            rows.forEach(row => {
                let name = row.querySelector('th').textContent.toLowerCase();
                if (name.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Filtrar por estado
        document.getElementById('usuarios-filter').addEventListener('change', function() {
            let selectedEstado = this.value.toLowerCase();
            let rows = document.querySelectorAll('.usuario-row');

            rows.forEach(row => {
                // El estado está en la columna 6 (<td>) (ajusta el índice según corresponda)
                let estado = row.querySelector('td:nth-child(6)').textContent.toLowerCase();

                if (selectedEstado === 'all' || estado.includes(selectedEstado)) {
                    row.style.display = ''; // Mostrar fila
                } else {
                    row.style.display = 'none'; // Ocultar fila
                }
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
    <script src="/livewire/livewire.js?id=38dc8241" data-csrf="BGW9EdPbFlgx3x6zunuiT1IxnJYEeNNNUASQP0z5"
        data-update-uri="/livewire/update" data-navigate-once="true"></script>
@endsection
