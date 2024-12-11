<!-- resources/views/admin/crud/TorneoEquipos.blade.php -->
<div>
    @if ($detalles->isEmpty())
        <p>No se encontraron usuarios ni equipos para este torneo.</p>
    @else
        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Participantes</h4>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-2">Usuario</th>
                        <th scope="col" class="px-4 py-2">Equipo</th>
                        <th scope="col" class="px-4 py-2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $detalle)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-4 py-2">{{ optional($detalle->usuario)->name }}</td>
                            <td class="px-4 py-2">{{ optional($detalle->equipo)->nombre }}</td>
                            <td class="px-4 py-2">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded" data-user-id="{{ $detalle->usuario->id }}" data-toggle="modal" data-target="#assignRewardModal">Asignar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div id="assignRewardModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white p-4 rounded-lg w-1/3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Asignar Recompensa</h3>
                <form id="assignRewardForm" method="POST" action="{{ route('admin.crud.asignar.recompensa') }}">
                    @csrf
                    <input type="hidden" name="usuario_id" id="modalUserId">
                    <input type="hidden" name="recompensa_id" id="hiddenRecompensaId"> <!-- Recuperar el ID de la recompensa del atributo de datos -->
                    <div class="mb-4">
                        <label for="recompensa" class="block mb-2 text-sm font-medium text-gray-900">Seleccionar Recompensa:</label>
                        @if($recompensas && $recompensas->count())
                        <select name="recompensa_id" id="recompensa" class="block w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($recompensas as $recompensa)
                                <option value="{{ $recompensa->id }}">{{ $recompensa->nombre }}</option>
                            @endforeach
                        </select>
                        @else
                        <p>No hay recompensas disponibles.</p>
                        @endif
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded mr-2" onclick="closeModal()">Cancelar</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Recompensar</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

<script>
    function closeModal() {
        document.getElementById('assignRewardModal').classList.add('hidden');
    }

    document.querySelectorAll('[data-toggle="modal"]').forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.getAttribute('data-user-id');
            document.getElementById('modalUserId').value = userId;

            // Consultar al controlador para obtener la ID de la recompensa
            fetch('{{ route('admin.crud.obtenerRecompensaId') }}')
                .then(response => response.json())
                .then(data => {
                    const recompensaId = data.recompensa_id;
                    console.log('ID de la Recompensa obtenida del controlador:', recompensaId); // Depuración
                    document.getElementById('hiddenRecompensaId').value = recompensaId;
                    document.getElementById('assignRewardModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error al obtener la ID de la recompensa:', error);
                });
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

