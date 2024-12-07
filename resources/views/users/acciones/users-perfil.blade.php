@extends('users.dashboard')
@section('content-user')
    <div class="bg-gray-500 rounded-lg shadow-xl pb-8">
        <div class="w-full h-[150px]">
            <img src="{{ asset('gifs/Fondo1.gif') }}" class="w-full h-full rounded-tl-lg rounded-tr-lg">
        </div>
        <div class="flex flex-col items-center -mt-20">
            <img src="{{ asset('usuarios_img/gaming.gif') }}" class="w-40 border-4 border-white rounded-full">
            <div class="flex items-center space-x-2 mt-2">
                <p class="text-2xl text-white">{{ $usuario->name }}</p>
            </div>
            <p class="text-black">Carlos Alfonso Asparrin Martin</p>
        </div>
    </div>

    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
        <div class="w-full flex flex-col 2xl:w-1/2">
            <div class="flex-1 rounded-lg shadow-xl p-8 bg-gray-500">
                <h4 class="text-xl text-gray-900 font-bold">Información Personal</h4>
                <ul class="mt-2 text-black">
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Nombre:</span>
                        <span class="text-gray-100">{{ $usuario->name }}</span>
                    </li>
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">{{$usuario->email}}</span>
                        <span class="text-gray-100">carlos123@gmail.com</span>
                    </li>
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Fecha de creación de cuenta:</span>
                        <span class="text-gray-100">12/11/2024</span>
                    </li>
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Estado:</span>
                        <div class="text-gray-100 flex items-center space-x-2 p-1 px-2">
                            @if ($usuario->estado == 'activo')
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="20" height="20">
                                    <path d="M50 10a40 40 0 1 1 0 80a40 40 0 1 1 0-80" fill="green" />
                                </svg>
                                <span>Activo</span>
                            @elseif ($usuario->estado == 'inactivo')
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="20" height="20">
                                    <path d="M50 10a40 40 0 1 1 0 80a40 40 0 1 1 0-80" fill="red" />
                                </svg>
                                <span>Inactivo</span>
                            @elseif ($usuario->estado == 'nuevo')
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="20" height="20">
                                    <path d="M50 10a40 40 0 1 1 0 80a40 40 0 1 1 0-80" fill="blue" />
                                </svg>
                                <span>Nuevo</span>
                            @endif
                        </div>

                    </li>
                    <br>
                    <button type="button" data-drawer-target="drawer-update-product"
                        data-drawer-show="drawer-update-product" aria-controls="drawer-update-product"
                        class="border py-2 px-3 flex items-center text-sm font-medium text-center text-black hover:text-gray-200 bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                clip-rule="evenodd" />
                        </svg>
                        Editar
                    </button>
                </ul>
            </div>
        </div>
        <div class="flex flex-col w-full 2xl:w-2/3">
            <div class="flex-1 bg-gray-500 rounded-lg shadow-xl p-8">
                <h4 class="text-xl text-gray-900 font-bold">Descripción</h4>
                <p class="mt-2 text-gray-100">
                    Jugador competitivo y streamer, experto en Fortnite, LoL y Call of
                    Duty, siempre buscando nuevas estrategias.
                </p>
            </div>
        </div>
    </div>

    <!-- Drawer component -->
    <form action="#" id="drawer-update-product"
        class="fixed top-0 left-0 z-40 w-[100%] h-[100%] max-w-3xl p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-900"
        tabindex="-1" aria-labelledby="drawer-update-product-label" aria-hidden="true">
        <h5 id="drawer-label"
            class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
            Actualizar Datos
        </h5>
        <button type="button" data-drawer-dismiss="drawer-update-product" aria-controls="drawer-update-product"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Cerrar menú</span>
        </button>

        <div class="flex justify-between space-x-4">
            <div class="w-1/2 space-y-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nombre:
                </label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                        block w-[100%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Escribe tu nombre" required="">
            </div>
            <div class="w-1/2 space-y-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Apodo:
                </label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                        block w-[100%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Escribe tu apodo" required="">
            </div>
        </div>
        <br>
        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
            <div class="space-y-4 sm:col-span-2 sm:space-y-6">
                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Descripción:
                    </label>
                    <textarea name="description" id="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                        block w-[120%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Escribe una breve descripción..." required=""></textarea>
                </div>
            </div>
        </div>

        <br>

        <div class="flex justify-between space-x-4">
            <!-- Imagen de Perfil -->
            <div class="w-1/2 space-y-4">
                <label for="dropzone-file-profile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Imagen de Perfil
                </label>
                <div class="flex justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                    onclick="document.getElementById('dropzone-file-profile').click();">
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
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file-profile" type="file" class="hidden" onchange="previewImage(event)">
                </div>
                <!-- Contenedor para mostrar la imagen cargada -->
                <div id="image-preview-container" class="mt-4">
                    <img id="image-preview" src="" alt="Vista previa" class="hidden w-full h-auto rounded-lg">
                </div>
            </div>


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
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
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
                Actualizar datos
            </button>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
    <script src="/livewire/livewire.js?id=38dc8241" data-csrf="BGW9EdPbFlgx3x6zunuiT1IxnJYEeNNNUASQP0z5"
        data-update-uri="/livewire/update" data-navigate-once="true"></script>
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
