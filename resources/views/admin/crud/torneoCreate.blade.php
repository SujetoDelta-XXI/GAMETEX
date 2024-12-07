@extends('admin.dashboard')

@section('crudAdm')

    <div class="flex justify-center w-full px-10">
        <div class="bg-gray-900 border-4 border-indigo-500 shadow-lg rounded-lg p-6 w-full">
            <h3 class="text-xl font-medium text-indigo-600 mb-4">Crear Nuevo Torneo</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Formulario de creación de torneo -->
            <form action="{{ route('admin.crud.torneo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex justify-between space-x-4">
                    <div class="w-1/2 space-y-4">
                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nombre:
                        </label>
                        <input type="text" name="name" id="nombre"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Escribe el nombre del torneo" required>
                    </div>
                    <div class="w-1/2 space-y-4">
                        <label for="moderador" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Moderador:
                        </label>
                        <select name="moderator" id="moderador"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 select2"
                            required>
                            @foreach ($moderadores as $moderador)
                                <option value="{{ $moderador->id }}">{{ $moderador->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/2 space-y-4">
                        <label for="administrador" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Administrador:
                        </label>
                        <select name="administrator" id="administrador"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 select2"
                            required>
                            @foreach ($administradores as $administrador)
                                <option value="{{ $administrador->id }}">{{ $administrador->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="space-y-4 sm:col-span-2 sm:space-y-6">
                        <div>
                            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Descripción:
                            </label>
                            <textarea name="description" id="descripcion"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Escribe una breve descripción..." required></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="flex justify-between space-x-4">
                    <div class="w-1/2 space-y-4">
                        <label for="fecha_inicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Fecha Inicio:
                        </label>
                        <input type="datetime-local" name="start_date" id="fecha_inicio"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            min="{{ \Carbon\Carbon::today()->toDateString() }}" required>
                    </div>
                    <div class="w-1/2 space-y-4">
                        <label for="fecha_fin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Fecha Fin:
                        </label>
                        <input type="datetime-local" name="end_date" id="fecha_fin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            min="{{ \Carbon\Carbon::today()->toDateString() }}" required>
                    </div>
                </div>
                <br>
                <div class="flex justify-between space-x-4">
                    <div class="w-1/2 space-y-4">
                        <label for="reward" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Recompensa:
                        </label>
                        <select name="reward" id="reward"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 select2"
                            required>
                            @foreach ($recompensas as $recompensa)
                                <option value="{{ $recompensa->id }}">{{ $recompensa->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/2 space-y-4">
                        <label for="torneo_juego_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Juegos:
                        </label>
                        <select name="game" id="torneo_juego_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 select2"
                            required>
                            @foreach ($juegos as $juego)
                                <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="space-y-4 sm:col-span-2 sm:space-y-6">
                        <div>
                            <label for="reglas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Reglas:
                            </label>
                            <textarea name="reglas" id="reglas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Escribe las reglas del torneo..." required></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="flex justify-between space-x-4">
                    <!-- Imagen de Fondo -->
                    <div class="w-1/2 space-y-4">
                        <label for="dropzone-file-background"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Imagen de Fondo
                        </label>
                        <div class="flex justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                            onclick="document.getElementById('dropzone-file-background').click();">
                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                    <span class="font-semibold">Haga clic para cargar</span>
                                    o arrastrar y soltar
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                                </p>
                            </div>
                            <input id="dropzone-file-background" type="file" class="hidden"
                                onchange="previewBackgroundImage(event)">
                        </div>
                        <!-- Contenedor para mostrar la imagen de fondo cargada -->
                        <div id="background-image-preview-container" class="mt-4">
                            <img id="background-image-preview" src="" alt="Vista previa de fondo"
                                class="hidden w-full h-auto rounded-lg">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-6 sm:w-[50%] pt-4">
                    <button type="submit"
                        class="border text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Crear Torneo
                    </button>
                    <button type="button"
                        class="border text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        onclick="window.location='{{ route('admin.crud.torneo') }}'">
                        Salir
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Función para previsualizar la imagen
        function previewImage(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                // Obtener el contenedor de la imagen y mostrar la vista previa
                var imagePreview = document.getElementById('image-preview');
                var imageContainer = document.getElementById('image-preview-container');

                // Mostrar la imagen en el contenedor
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('hidden');
                imageContainer.classList.remove('hidden');
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
    <script>
        // Función para previsualizar la imagen de fondo
        function previewBackgroundImage(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                // Obtener el contenedor de la imagen y mostrar la vista previa
                var backgroundImagePreview = document.getElementById('background-image-preview');
                var backgroundImageContainer = document.getElementById('background-image-preview-container');

                // Mostrar la imagen en el contenedor
                backgroundImagePreview.src = e.target.result;
                backgroundImagePreview.classList.remove('hidden');
                backgroundImageContainer.classList.remove('hidden');
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>



@endsection
