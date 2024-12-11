@extends('admin.dashboard')

@section('crudAdm')
    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex justify-between items-center space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <!-- Buscador Dinámico -->
                    <div class="relative w-full md:w-2/3">
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
                    <div class="relative w-full md:w-1/3">
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
                                <th scope="col" class="p-4">Última Actualización</th>
                                <th scope="col" class="p-4">Asignada</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="recompensas-table">
                            @foreach ($recompensas as $recompensa)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700" data-categoria="{{ $recompensa->tipo->nombre }}">
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $recompensa->nombre }}</td>
                                    <td class="px-4 py-3">{{ $recompensa->tipo->nombre }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $recompensa->clave_producto }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $recompensa->precio }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $recompensa->created_at }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $recompensa->updated_at }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($recompensa->asignada)
                                            <span class="text-green-600">Sí</span>
                                        @else
                                            <span class="text-red-600">No</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a href="{{ route('admin.crud.recompensasEventos', ['id' => $recompensa->id]) }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900">
                                            Eventos
                                        </a>
                                        <a href="{{ route('admin.crud.recompensasTorneos', ['id' => $recompensa->id]) }}" onclick="guardarRecompensaId({{ $recompensa->id }})" class="ml-2 text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-900">
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
                                                    body: JSON.stringify({ recompensa_id: recompensaId })
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
                </div>
            </div>
        </div>
    </section>
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
                body: JSON.stringify({ usuario_id: userId, recompensa_id: recompensaId, estado: 'asignada' })
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
    <script src="/livewire/livewire.js?id=38dc8241" data-csrf="BGW9EdPbFlgx3x6zunuiT1IxnJYEeNNNUASQP0z5" data-update-uri="/livewire/update" data-navigate-once="true"></script>
@endsection
