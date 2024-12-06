@extends('admin.dashboard')

@section('crudAdm')

    <div class="flex justify-center w-full px-10">
        <div class="bg-gray-900 border-4 border-indigo-500 shadow-lg rounded-lg p-6 w-full">
            <h3 class="text-xl font-medium text-indigo-600 mb-4">Actualizar datos del Torneo</h3>
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
            <form action="#" method="POST">
                @csrf
                <div class="flex justify-between space-x-4">
                    <div class="w-1/2 space-y-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nombre:
                        </label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Escribe el nombre del torneo" required>
                    </div>
                    <div class="w-1/2 space-y-4">
                        <label for="administrador" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Administrador
                        </label>
                        <input type="administrador" name="administrador" id="administrador"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="Admin" required>
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
                                block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Escribe una breve descripción..." required></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="flex justify-between space-x-4">
                    <div class="w-1/2 space-y-4">
                        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Fecha Inicio:
                        </label>
                        <input type="date" name="start_date" id="start_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            min="{{ \Carbon\Carbon::today()->toDateString() }}" required>
                    </div>
                    <div class="w-1/2 space-y-4">
                        <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Fecha Fin:
                        </label>
                        <input type="date" name="end_date" id="end_date"
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
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Juego</option>
                            <option>Tarjeta de regalo</option>
                        </select>
                    </div>
                    <div class="w-1/2 space-y-4">
                        <label for="entry_fee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Entrada:
                        </label>
                        <select name="entry_fee" id="entry_fee"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Gratis</option>
                            <option>S/5</option>
                            <option>S/10</option>
                            <option>S/15</option>
                        </select>
                    </div>
                    <div class="w-1/2 space-y-4">
                        <label for="game" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Juegos:
                        </label>
                        <select name="game" id="game"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Left 4 Dead 2</option>
                            <option>Counter Strike 2</option>
                            <option>League of Legends</option>
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
                    <!-- Imagen de Perfil -->
                    <div class="w-1/2 space-y-4">
                        <label for="dropzone-file-profile"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Imagen de Torneo:
                        </label>
                        <div
                            class="flex justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
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
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG o GIF (MAX. 800x400px)
                                </p>
                            </div>
                            <input id="dropzone-file-profile" type="file" class="hidden">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-6 sm:w-[50%] pt-4">
                    <button type="submit"
                        class="border text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Actualizar Torneo
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

@endsection
