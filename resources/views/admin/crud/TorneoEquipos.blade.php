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
                                <button 
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded asignar-recompensa" 
                                    data-user-id="{{ $detalle->usuario->id }}" 
                                    data-user-name="{{ optional($detalle->usuario)->name }}">
                                    Asignar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="modal" id="asignarModal" tabindex="-1" role="dialog" aria-labelledby="asignarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="asignarModalLabel">Asignar Recompensa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="asignarRecompensaForm" action="{{ route('admin.crud.asignar.recompensa') }}" method="POST">
                        @csrf
                        <input type="hidden" id="usuario_id" name="usuario_id">
                        <input type="hidden" id="torneo_id" name="torneo_id">
                        
                        <input type="hidden" id="recompensa_id" name="recompensa_id">
                        <p>Recompensa seleccionada: <span id="recompensa_text">Cargando...</span></p>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Asignar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("asignarModal");
    const modalUserName = document.getElementById("modalUserName");
    const recompensaText = document.getElementById("recompensa_text");
    const recompensaIdInput = document.getElementById("recompensa_id");

    const recompensaId = localStorage.getItem("recompensa_id");

    if (recompensaId) {
        recompensaIdInput.value = recompensaId; 
        recompensaText.textContent = `Recompensa ID: ${recompensaId}`; 
    } else {
        recompensaText.textContent = "Recompensa no disponible";
    }

    document.querySelectorAll(".asignar-recompensa").forEach(button => {
        button.addEventListener("click", () => {
            const userId = button.getAttribute("data-user-id");
            const userName = button.getAttribute("data-user-name");

            document.getElementById("usuario_id").value = userId;
            modalUserName.textContent = userName;
            modal.classList.remove("hidden");
        });
    });

    document.getElementById("btn-cerrar-modal").addEventListener("click", () => {
        modal.classList.add("hidden");
    });
});

    document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("asignarModal");
        const recompensaNombre = document.getElementById("recompensa_nombre");
        const recompensaIdInput = document.getElementById("recompensa_id");

        const url = window.location.href;
        const torneoId = url.split('/').pop(); 

        let recompensaId = null;
        fetch(`/api/recompensas/torneos/${torneoId}`)
            .then(response => response.json())
            .then(data => {
                recompensaId = data.id;
                recompensaIdInput.value = recompensaId; 
                recompensaNombre.textContent = data.nombre; 
            })
            .catch(error => {
                console.error("Error al cargar la recompensa:", error);
                recompensaNombre.textContent = "No disponible";
            });

        document.querySelectorAll(".asignar-recompensa").forEach(button => {
            button.addEventListener("click", () => {
                const userId = button.getAttribute("data-user-id");
                document.getElementById("usuario_id").value = userId;

                modal.classList.remove("hidden");
            });
        });

        document.getElementById("btn-cerrar-modal").addEventListener("click", () => {
            modal.classList.add("hidden");
        });
    });
</script>
