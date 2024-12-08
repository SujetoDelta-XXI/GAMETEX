@extends('layouts.header')
@section('contenido')
    <div class="flex justify-center items-center min-h-screen bg-gray-800">
        <div id="content" class="bg-white/10 col-span-9 rounded-lg p-6 hide-scroll-bar xl:w-[80%] mx-10">
            <div class="lg:w-1/2 block sm:hidden mb-4">
                <img src="{{ asset('torneos_img/lol1.jpeg') }}" class="h-full object-cover rounded-lg">
            </div>
            <div class="rounded-lg shadow-xl overflow-hidden flex sm:space-x-4">
                <!-- Imagen a la izquierda -->
                <div class="lg:w-1/2 sm:block hidden">
                    <img src="/storage/{{ $torneo->imagen }}" class="h-full object-cover rounded-lg">
                </div>

                <div class="lg:w-2/3 flex flex-col space-y-4 w-full">
                    <!-- Información personal -->
                    <div class="rounded-lg shadow-xl p-8 bg-gray-500">
                        <h4 class="text-[30px] text-gray-900 font-bold">{{ $torneo->nombre }}</h4>
                        <ul class="mt-2 text-black">
                            <li class="flex flex-col border-b py-2">
                                <span class="font-bold">Administrador</span>
                                <span class="text-gray-100">{{ $torneo->administrador->name }}</span>
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
                                <span class="text-gray-100">{{ \Carbon\Carbon::parse($torneo->fecha_inicio)->format('d/m/Y') }}</span>
                            </li>
                            <li class="flex flex-col border-b py-2">
                                <span class="font-bold">Fecha-Fin</span>
                                <span class="text-gray-100">{{ \Carbon\Carbon::parse($torneo->fecha_fin)->format('d/m/Y')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Descripción -->
            <div class="rounded-lg shadow-xl overflow-hidden flex sm:space-x-4">
                <div class="rounded-lg shadow-xl mt-4 p-8 bg-gray-500 xl:w-[70%] lg:w-[70%] md:w-[70%]">
                    <h4 class="text-xl text-gray-900 font-bold">Reglas del torneo:</h4>
                    <p id="texto">Eliminación doble. Modalidad: 5 vs 5. Mapas: Grieta del Invocador. Equipos de 5
                        jugadores (+2 suplentes opcionales). Nivel mínimo de cuenta: 30. Campeones desbloqueados: Mínimo 20.
                        Todas las partidas serán supervisadas a través de Discord.</p>
                </div>
                <div class="rounded-lg shadow-xl mt-4 p-8 bg-gray-500 hidden sm:block">
                    <h4 class="text-xl text-gray-900 font-bold">Formulario de Inscripción:</h4>
                    <br>
                    <form method="POST" action="#">
                        @csrf
                        <div>
                            <x-label for="name" class="text-white" value="{{ __('Nombre de usuario de Discord') }}" />
                            <x-input id="name" class="text-black block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                        <div class="mt-4">
                            <x-label for="password" class="text-white"
                                value="{{ __('Contraeña (Su usuario del sitio web)') }}" />
                            <x-input id="password" class="text-black block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a class="flex items-center justify-end text-white hover:text-gray-400" href="f_torneos">
                                {{ __('¿Necesitas Ayuda?') }}
                            </a>
                            <x-button class="ms-4 bg-gray-900 hover:bg-black">
                                {{ __('Inscribirme') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="lg:w-1/2 block sm:hidden mb-4">
                <div class="rounded-lg shadow-xl mt-4 p-8 bg-gray-500 sm:block">
                    <h4 class="text-xl text-gray-900 font-bold">Formulario de Inscripción:</h4>
                    <br>
                    <form method="POST" action="#">
                        @csrf
                        <div>
                            <x-label for="name" class="text-white" value="{{ __('Nombre de usuario de Discord') }}" />
                            <x-input id="name" class="text-black block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                        <div class="mt-4">
                            <x-label for="password" class="text-white"
                                value="{{ __('Contraeña (Su usuario del sitio web)') }}" />
                            <x-input id="password" class="text-black block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ms-4 bg-gray-900 hover:bg-black">
                                {{ __('Inscribirme') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
