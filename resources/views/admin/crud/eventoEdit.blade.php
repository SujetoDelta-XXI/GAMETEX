<div id="editEventModal" class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto">
    <div class="relative p-4 w-full max-w-md h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-700">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Editar Evento
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeEditModal()">
                    <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Cerrar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form id="editEventForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nombre" class="block text-white">Nombre del Evento</label>
                        <input type="text" id="nombre" name="nombre" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-white">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="reglas" class="block text-white">Reglas</label>
                        <textarea id="reglas" name="reglas" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="fecha_inicio" class="block text-white">Fecha y Hora de Inicio</label>
                        <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
                    </div>
                    <div class="mb-4">
                        <label for="fecha_fin" class="block text-white">Fecha y Hora de Fin</label>
                        <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
                    </div>
                    <div class="mb-4">
                        <label for="moderador_id" class="block text-white">Moderador</label>
                        <select id="moderador_id" name="moderador_id" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
                            @foreach($moderadores as $moderador)
                                <option value="{{ $moderador->id }}">{{ $moderador->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="recompensa_id" class="block text-white">Recompensa</label>
                        <select id="recompensa_id" name="recompensa_id" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
                            @foreach($recompensas as $recompensa)
                                <option value="{{ $recompensa->id }}">{{ $recompensa->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="recompensas_cantidad" class="block text-white">Cantidad a Descontar</label>
                        <select id="recompensas_cantidad" name="recompensas_cantidad" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="imagen" class="block text-white">Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-600 text-white px-4 py-2 rounded mr-2 hover:bg-red-700" onclick="closeEditModal()">Cancelar</button>
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Actualizar Evento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openEditModal(eventoId) {
        // Obtener datos del evento y llenar el formulario del modal
        fetch(`/admin/crud/evento/${eventoId}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('editEventForm').action = `/admin/crud/evento/${eventoId}`;
                document.getElementById('nombre').value = data.nombre;
                document.getElementById('descripcion').value = data.descripcion;
                document.getElementById('reglas').value = data.reglas;
                document.getElementById('fecha_inicio').value = data.fecha_inicio;
                document.getElementById('fecha_fin').value = data.fecha_fin;
                document.getElementById('moderador_id').value = data.moderador_id;
                document.getElementById('recompensa_id').value = data.recompensa_id;
                document.getElementById('recompensas_cantidad').value = data.recompensas_cantidad;
                document.getElementById('editEventModal').classList.remove('hidden');
            });
    }

    function closeEditModal() {
        document.getElementById('editEventModal').classList.add('hidden');
    }
</script>
