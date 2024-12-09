<tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700" data-recompensa="{{ $recompensa->tipo->nombre }}">
    <td scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <div class="flex items-center mr-3">
            {{ $recompensa->nombre }}
        </div>
    </td>
    <td class="px-4 py-3">
        <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
            {{ $recompensa->tipo->nombre }}
        </span>
    </td>
    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <div class="flex items-center">
            {{ $recompensa->cantidad }}
        </div>
    </td>
    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $recompensa->precio }}
    </td>
    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $recompensa->created_at }}
    </td>
    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $recompensa->updated_at }}
    </td>
    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <div class="flex items-center space-x-4">
            <button type="button" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-900 asignar-btn"
                data-modal-target="asignarModal{{ $recompensa->id }}" data-modal-toggle="asignarModal{{ $recompensa->id }}"
                data-recompensa-id="{{ $recompensa->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                Asignar
            </button>
        </div>
    </td>

    <!-- Modal de Asignación -->
    <div id="asignarModal{{ $recompensa->id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center 
        items-center w-full md:inset-0 h-[calc(100%-1rem)] md:h-full bg-opacity-50">
        <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-900 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Asignar Usuario</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="asignarModal{{ $recompensa->id }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Cerrar Modal</span>
                    </button>
                </div>

                <!-- Modal body -->

                <form id="asignarForm{{ $recompensa->id }}" action="{{ route('admin.crud.asignar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="recompensa_id" id="recompensa_id{{ $recompensa->id }}" value="{{ $recompensa->id }}">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="tipo_busqueda{{ $recompensa->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Búsqueda</label>
                            <select id="tipo_busqueda{{ $recompensa->id }}" name="tipo_busqueda"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="torneo">Torneo</option>
                                <option value="evento" disabled>Evento</option>
                            </select>
                        </div>
                        <div>
                            <label for="usuario_id{{ $recompensa->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario</label>
                            <select id="usuario_id{{ $recompensa->id }}" name="usuario_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <!-- Opciones dinámicas cargadas mediante AJAX -->
                            </select>
                        </div>
                    </div>
                    <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                        <button type="submit"
                            class="border w-full sm:w-auto justify-center text-white inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Asignar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</tr>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const asignarBtns = document.querySelectorAll('.asignar-btn');

        // Manejar la apertura del modal de asignación desde botones dentro de la tabla
        asignarBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                const recompensaId = btn.getAttribute('data-recompensa-id');
                const asignarModal = document.getElementById('asignarModal' + recompensaId);
                asignarModal.classList.remove('hidden');
            });
        });
    });
</script>
