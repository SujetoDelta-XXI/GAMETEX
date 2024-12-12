@extends('admin.dashboard')

@section('crudAdm')
    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex justify-between items-center space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <!-- Buscador Dinámico -->
                    <div class="relative w-full md:w-1/2">
                        <input type="search" id="search-dropdown"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500"
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
                    <button type="button" id="createProductButton" data-modal-toggle="createProductModal"
                        class="border flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Nuevo producto
                    </button>
                    <div class="relative w-full md:w-1/4">
                        <select id="search-filter"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500">
                            <option value="all">Todas las Categorías</option>
                            @foreach ($recompensasTipos as $tipo)
                                <option value="{{ $tipo->nombre }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-layout:fixed">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">Producto</th>
                                <th scope="col" class="p-4">Categoría</th>
                                <th scope="col" class="p-4">Clave del Producto</th>
                                <th scope="col" class="p-4">Precio</th>
                                <th scope="col" class="p-4">Fecha de Ingreso</th>
                                <th scope="col" class="p-4">Asignada</th>
                                <th scope="col" class="p-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="recompensas-table">
                        @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

                            @if (session('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                    <span class="block sm:inline">{{ session('error') }}</span>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @foreach ($recompensas as $recompensa)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700"
                                    data-categoria="{{ $recompensa->tipo->nombre }}">
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $recompensa->nombre }}</td>
                                    <td class="px-4 py-3">{{ $recompensa->tipo->nombre }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $recompensa->clave_producto }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $recompensa->precio }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $recompensa->created_at }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($recompensa->asignada)
                                            <span class="text-green-600">Sí</span>
                                        @else
                                            <span class="text-red-600">No</span>
                                        @endif
                                    </td>
                                    <td class="py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a href="{{ route('admin.crud.recompensasTorneos', ['id' => $recompensa->id]) }}"
                                            onclick="guardarRecompensaId({{ $recompensa->id }})"
                                            class="ml-2 text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-900">
                                            Torneos
                                        </a>

                                        <script>
                                            function guardarRecompensaId(recompensaId) {
                                                fetch('{{ route('admin.crud.guardarRecompensaId') }}', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json',
                                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                    },
                                                    body: JSON.stringify({
                                                        recompensa_id: recompensaId
                                                    })
                                                }).then(response => {
                                                    if (response.ok) {
                                                        console.log('ID de la recompensa guardada exitosamente.');
                                                    } else {
                                                        console.error('Error al guardar la ID de la recompensa.');
                                                    }
                                                }).catch(error => {
                                                    console.error('Error:', error);
                                                });
                                            }
                                        </script>
                                    </td>
                                </tr>
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


    <script>
        function guardarRecompensaId(recompensaId) {
            localStorage.setItem('recompensa_id', recompensaId);
        }

        document.querySelectorAll('[data-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');
                document.getElementById('modalUserId').value = userId;
                const recompensaId = localStorage.getItem('recompensa_id');
                console.log('ID de la Recompensa:', recompensaId); // Agregar depuración aquí
                document.getElementById('hiddenRecompensaId').value = recompensaId;
                document.getElementById('assignRewardModal').classList.remove('hidden');
            });
        });

        document.getElementById('assignRewardForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const userId = document.getElementById('modalUserId').value;
            const recompensaId = document.getElementById('hiddenRecompensaId').value;
            fetch('{{ route('admin.crud.asignar.recompensa') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    usuario_id: userId,
                    recompensa_id: recompensaId,
                    estado: 'asignada'
                })
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    alert('Recompensa asignada con éxito');
                    closeModal();
                } else {
                    alert('Hubo un error al asignar la recompensa');
                }
            }).catch(error => console.error('Error:', error));
        });
    </script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
    <script src="/livewire/livewire.js?id=38dc8241" data-csrf="BGW9EdPbFlgx3x6zunuiT1IxnJYEeNNNUASQP0z5"
        data-update-uri="/livewire/update" data-navigate-once="true"></script>
@endsection
