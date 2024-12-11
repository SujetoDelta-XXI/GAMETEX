@extends('torneos.dashboard')

@section('content-torneos')
    <div class="lg:w-1/2 block sm:hidden mb-4">
        <img src="/storage/{{ $torneo->imagen }}" class="h-full object-cover rounded-lg">
    </div>
    <div class="rounded-lg shadow-xl overflow-hidden flex sm:space-x-4">
        <!-- Imagen a la izquierda -->
        <div class="lg:w-1/2 sm:block hidden">
            <img src="/storage/{{ $torneo->imagen }}" class="h-full object-cover rounded-lg">
        </div>

        <!-- Contenedor para la información personal y la descripción -->
        <div class="lg:w-2/3 flex flex-col space-y-4">
            <!-- Información personal -->
            <div class="rounded-lg shadow-xl p-8 bg-gray-500">
                <h4 class="text-[30px] text-gray-900 font-bold">{{ $torneo -> nombre}}</h4>
                <ul class="mt-2 text-black">
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Administrador</span>
                        <span class="text-gray-100">{{ $torneo->administrador->name}}</span>
                    </li>
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Moderador</span>
                        <span class="text-gray-100">{{$torneo->moderador->name}}</span>
                    </li>
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Recompensa</span>
                        <span class="text-gray-100">{{$torneo->recompensa->nombre}}</span>
                    </li>
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Juego</span>
                        <span class="text-gray-100">{{$torneo->torneoJuego->nombre}}</span>
                    </li>
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Fecha-Inicio:</span>
                        <span class="text-gray-100">{{ \Carbon\Carbon::parse($torneo->fecha_inicio)->format('j M, Y') }}</span>
                    </li>
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Fecha-Fin</span>
                        <span class="text-gray-100">{{ \Carbon\Carbon::parse($torneo->fecha_fin)->format('j M, Y')}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Descripción -->
    <div class="rounded-lg shadow-xl mt-4 p-8 bg-gray-500">
        <h4 class="text-xl text-gray-900 font-bold">Detalles del Torneo:</h4>
        <p id="texto">Eliminación doble. Modalidad: 5 vs 5. Mapas: Grieta del Invocador. Equipos de 5
            jugadores (+2 suplentes opcionales). Nivel mínimo de cuenta: 30. Campeones desbloqueados: Mínimo 20.
            Todas las partidas serán supervisadas a través de Discord.</p>
    </div>

    <script>
        function convertirTextoEnLista() {
            // Seleccionar la etiqueta <p>
            const parrafo = document.querySelector('#texto');

            // Obtener el texto y dividirlo en partes usando el punto como delimitador
            const textoDividido = parrafo.textContent.split('.').filter(item => item.trim() !== '');

            // Crear un nuevo elemento <ul>
            const lista = document.createElement('ul');

            // Agregar clases si lo necesitas
            lista.className = 'mt-4 list-disc pl-6 text-gray-100 space-y-2';

            // Crear un <li> por cada elemento del array
            textoDividido.forEach(item => {
                const li = document.createElement('li');
                li.textContent = item.trim();
                lista.appendChild(li);
            });

            // Reemplazar el párrafo con la lista
            parrafo.parentNode.replaceChild(lista, parrafo);
        }

        // Ejecutar la función cuando cargue el DOM
        document.addEventListener('DOMContentLoaded', convertirTextoEnLista);
    </script>
@endsection
