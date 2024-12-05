@extends('users.dashboard')
@section('content-user')
    <div id="24h">
        <h1 class="font-bold py-4 uppercase">Recompensas Obtenidas</h1>
        <div id="stats" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach($recompensasPendientes as $recompensa)
            <x-users.recompensa_user_card>
                <x-slot name="recompensaId">
                    {{ $recompensa->id }}
                </x-slot>
                <x-slot name="nombre">
                    {{ $recompensa->recompensa->nombre }}
                </x-slot>
                <x-slot name="tipo">
                    {{ $recompensa->recompensa->tipo->nombre }}
                </x-slot>
                <x-slot name="fecha">
                    {{ $recompensa->recompensa->updated_at }}
                </x-slot>
                <x-slot name="clave_producto">
                    {{ $recompensa->recompensa->clave_producto }}
                </x-slot>
                <x-slot name="hiddenTextId">
                    hiddenText_{{ $recompensa->id }}
                </x-slot>
            </x-users.recompensa_user_card>
            @endforeach
        </div>

        <div id="last-incomes">
            <h1 class="font-bold py-4 uppercase">Recompensas Reclamadas</h1>
            <div id="stats" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id="recompensasReclamadasContainer">
                @foreach($recompensasReclamadas as $recompensa)
                <x-users.reenviar_user_card>
                    <x-slot name="recompensaId">
                        {{ $recompensa->id }}
                    </x-slot>
                    <x-slot name="nombre">
                        {{ $recompensa->recompensa->nombre }}
                    </x-slot>
                    <x-slot name="tipo">
                        {{ $recompensa->recompensa->tipo->nombre }}
                    </x-slot>
                    <x-slot name="fecha">
                        {{ $recompensa->recompensa->updated_at }}
                    </x-slot>
                    <x-slot name="clave_producto">
                        {{ $recompensa->recompensa->clave_producto }}
                    </x-slot>
                </x-users.reenviar_user_card>
                @endforeach
            </div>
        </div>
    </div>        
@endsection

<script>
    function copyHiddenText(recompensaId, nombre, tipo, fecha, claveProducto) {
        const hiddenTextElement = document.getElementById('hiddenText_' + recompensaId);
        if (hiddenTextElement) {
            const textToCopy = hiddenTextElement.textContent;
            navigator.clipboard.writeText(textToCopy).then(() => {
                alert('Clave de producto copiada: ' + textToCopy);
                fetch('{{ route('recompensa.updateEstado') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id: recompensaId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = window.location.href;
                    }
                });
            }).catch(err => {
                console.error('Error al copiar la clave: ', err);
            });
        } else {
            alert('No se encontró la clave del producto, comunicate con soporte.');
        }
    }

    function moveCardToReclaimed(recompensaId, nombre, tipo, fecha, claveProducto) {
        const reclaimedContainer = document.getElementById('recompensasReclamadasContainer');
        const originalCard = document.querySelector(`[data-recompensa-id="${recompensaId}"]`);
        if (originalCard) {
            originalCard.remove();
        }

        const cardHtml = `
            <div class="bg-black/60 to-white/5 rounded-lg">
                <div class="flex flex-row items-center">
                    <div class="pl-4 py-2">
                        <p class="text-xl font-bold">${nombre}</p>
                        <p class="text-gray-500 font-medium">${tipo}</p>
                        <p class="text-gray-500 text-sm">${fecha}</p>
                    </div>
                </div>
                <div class="border-t border-white/5 p-2 flex">
                    <span class="p-1 text-sm">Reclamado</span>
                    <button type="button" onclick="showReclaimedMessage('${claveProducto}')"
                        class="ml-auto flex items-center text-yellow-700 hover:text-white border border-yellow-700 hover:bg-yellow-800 focus:ring-4 
                        focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:hover:bg-yellow-600 dark:focus:ring-yellow-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path d="M4 2v20M4 2h16l-6 8 6 8H4"></path>
                        </svg>
                        Reenviar
                    </button>
                </div>
            </div>`;
        
        reclaimedContainer.insertAdjacentHTML('beforeend', cardHtml);
    }

    function showReclaimedMessage(claveProducto) {
        navigator.clipboard.writeText(claveProducto).then(() => {
            alert('Su clave ya ha sido reclamada: ' + claveProducto);
        }).catch(err => {
            console.error('Error al copiar la clave: ', err);
        });
    }
</script>
