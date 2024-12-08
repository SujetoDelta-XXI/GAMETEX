@extends('layouts.layout')

@section('contenido')
    <main>
        <section class="bg-customBlue text-white px-8 p-0">
            <h1 class="lg:px-20 md:px-10 px-5 lg:mx-0 md:mx-20 mx-5 font-bold text-6xl text-white text-center pt-14">
                Torneos
            </h1>

            <!-- Contenedor con flex para centrar los elementos -->
            <div class="flex justify-center items-center mt-6 space-x-4 py-5">
                <!-- Buscador -->
                <div class="relative w-1/2">
                    <input type="search" id="search-dropdown"
                        class="block p-2.5 w-full text-sm bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 text-white dark:focus:border-blue-500"
                        placeholder="Buscar" required />
                    <button type="submit"
                        class="absolute top-0 right-0 p-2.5 h-full text-sm font-medium text-white bg-yellow-700 rounded-r-lg border border-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>
                <!-- Filtro dropdown -->
                <select id="game-filter"
                    class="bg-gray-100 text-gray-900 border border-gray-300 rounded-lg py-2.5 px-4 text-sm font-medium focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-gray-800">
                    <option value="all" {{ $gameFilter === 'all' ? 'selected' : '' }}>Mostrar todo</option>
                    @foreach ($torneos->unique('torneoJuego.nombre') as $torneo)
                        <option value="{{ $torneo->torneoJuego->nombre }}"
                            {{ $torneo->torneoJuego->nombre ? 'selected' : '' }}>
                            {{ $torneo->torneoJuego->nombre }}
                        </option>
                    @endforeach
                </select>

            </div>
        </section>

        <section class="bg-customBlue text-white pb-8 px-8 pt-5">
            <div class="container mx-auto px-0 py-0">
                <div class="flex flex-wrap justify-center px-5 py-5 mx-auto gap-x-4">
                    @foreach ($torneos as $torneo)
                        <div class="px-0 py-4 sm:mb-0 mb-6 group relative w-full sm:w-1/2 md:w-1/3 lg:1/4 xl:w-1/5"
                            data-game="{{ $torneo->torneoJuego->nombre }}">
                            <a href="torneos-register/{{$torneo->id}}">
                                <div
                                    class="rounded-lg h-96 overflow-hidden relative border-4 border-solid border-transparent hover:border-gray-300 hover:ring-2 hover:ring-opacity-60 hover:ring-gray-500 transition-all duration-300 ease-in-out">
                                    <img alt="content"
                                        class="object-cover object-center h-full w-full transition duration-300 ease-in-out group-hover:brightness-50"
                                        src="\storage\{{ $torneo->imagen }}">
                                    <div
                                        class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out px-5">
                                        <ul>
                                            <h3 class="text-lg font-semibold">{{ $torneo->nombre }}</h3><br>
                                            <li><b>Juego:</b> {{ $torneo->torneoJuego->nombre }}</li><br>
                                            <li><b>Descripción:</b><br>{{ $torneo->descripcion }}</li><br>

                                            <span class="absolute bottom-3 left-4 title-font font-medium text-2xl text-white z-10">
                                            <p class="text-gray-200 line-through text-lg">${{$torneo->entrada}}</p>
                                            <p class="text-green-300 text-2xl font-bold">$0.00</p>
                                            </span>
                                            
                                            
                                            <!-- <li><b>Moderador:</b> {{ $torneo->moderador->name }}</li> -->
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const gameFilter = document.getElementById("game-filter");
            const torneoContainers = document.querySelectorAll("[data-game]");
            const searchInput = document.getElementById("search-dropdown");

            // Aplicar el filtro inicial basado en el parámetro de la URL
            const urlParams = new URLSearchParams(window.location.search);
            const initialGame = urlParams.get("game") || "all";

            gameFilter.value = initialGame;
            torneoContainers.forEach(function(container) {
                const gameType = container.getAttribute("data-game");
                if (initialGame === "all" || gameType === initialGame) {
                    container.style.display = "block";
                } else {
                    container.style.display = "none";
                }
            });

            // Filtrar torneos al cambiar el valor del dropdown
            gameFilter.addEventListener("change", function() {
                const selectedGame = gameFilter.value;
                torneoContainers.forEach(function(container) {
                    const gameType = container.getAttribute("data-game");
                    if (selectedGame === "all" || gameType === selectedGame) {
                        container.style.display = "block";
                    } else {
                        container.style.display = "none";
                    }
                });
            });

            // Filtrar los torneos por búsqueda
            searchInput.addEventListener("input", function() {
                const searchTerm = searchInput.value.toLowerCase();
                torneoContainers.forEach(function(container) {
                    const title = container.querySelector("h3").textContent.toLowerCase();
                    if (title.includes(searchTerm)) {
                        container.style.display = "block";
                    } else {
                        container.style.display = "none";
                    }
                });
            });
        });
    </script>
@endsection
