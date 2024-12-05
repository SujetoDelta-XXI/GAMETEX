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
                    {{ $recompensa->recompensa->tipo }}
                </x-slot>
                <x-slot name="fecha">
                    {{ $recompensa->created_at }}
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
                    <x-slot name="nombre">
                        {{ $recompensa->recompensa->nombre }}
                    </x-slot>
                    <x-slot name="tipo">
                        {{ $recompensa->recompensa->tipo }}
                    </x-slot>
                    <x-slot name="fecha">
                        {{ $recompensa->created_at }}
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
                        // Redirigir a la misma página después de aceptar el mensaje
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
</script>
