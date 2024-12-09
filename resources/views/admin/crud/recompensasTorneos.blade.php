@extends('admin.dashboard')

@section('crudAdm')
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex justify-between items-center space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <!-- Buscador Dinámico -->
                    <div class="relative w-full md:w-2/3">
                        <input type="search" id="search-dropdown"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500"
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
                    <div class="relative w-full md:w-1/3">
                        <select id="search-filter"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500">
                            <option value="all">Todos los Juegos</option>
                            @foreach ($torneosJuegos as $juego)
                                <option value="{{ $juego->nombre }}">{{ $juego->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex">
                    <!-- Sección de 50% de Anchura Izquierda -->
                    <div class="w-1/2 p-4 border-r dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Resultados de Búsqueda</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-2">Torneo</th>
                                        <th scope="col" class="px-4 py-2">Juego</th>
                                        <th scope="col" class="px-4 py-2">Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="search-results">
                                    <!-- Resultados de la búsqueda se mostrarán aquí -->
                                    @foreach ($torneos as $torneo)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700" data-juego="{{ $torneo->torneo->torneoJuego->nombre }}">
                                            <td class="px-4 py-2">{{ $torneo->torneo->nombre }}</td>
                                            <td class="px-4 py-2">{{ $torneo->torneo->torneoJuego->nombre }}</td>
                                            <td class="px-4 py-2"><button class="btn-consultar" data-torneo-id="{{ $torneo->torneo->id }}">Consultar</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Sección de 50% de Anchura Derecha -->
                    <div class="w-1/2 p-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Detalles del Equipo</h3>
                        <div id="detalle-torneo" class="text-center text-gray-500 dark:text-gray-400">
                            <!-- Detalles del equipo se mostrarán aquí -->
                            Selecciona un torneo y haz clic en "Consultar" para ver más detalles del equipo.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById('search-dropdown');
            const searchFilter = document.getElementById('search-filter');
            const searchResults = document.getElementById('search-results');
            const detalleTorneo = document.getElementById('detalle-torneo');

            // Filtrado dinámico
            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();
                const filterType = searchFilter.value;

                fetch(`/admin/crud/recompensas/torneos/search?searchTerm=${encodeURIComponent(searchTerm)}&filterType=${encodeURIComponent(filterType)}`)
                    .then(response => response.json())
                    .then(data => {
                        searchResults.innerHTML = '';
                        if (data.length === 0) {
                            const noResults = document.createElement('tr');
                            noResults.classList.add('bg-white', 'dark:bg-gray-800');
                            noResults.innerHTML = '<td colspan="3" class="px-4 py-2">No se encontraron resultados.</td>';
                            searchResults.appendChild(noResults);
                        } else {
                            data.forEach(result => {
                                const tr = document.createElement('tr');
                                tr.classList.add('bg-white', 'border-b', 'dark:bg-gray-800', 'dark:border-gray-700', 'hover:bg-gray-100', 'dark:hover:bg-gray-700');
                                tr.innerHTML = `<td class="px-4 py-2">${result.torneo.nombre}</td><td class="px-4 py-2">${result.torneo.torneoJuego.nombre}</td><td class="px-4 py-2"><button class="btn-consultar" data-torneo-id="${result.torneo.id}">Consultar</button></td>`;
                                searchResults.appendChild(tr);
                            });

                            // Asignar eventos a los botones "Consultar"
                            document.querySelectorAll('.btn-consultar').forEach(button => {
                                button.addEventListener('click', function() {
                                    const torneoId = this.getAttribute('data-torneo-id');
                                    consultarEquipos(torneoId);
                                });
                            });
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });

            // Función para consultar y mostrar los equipos asociados a un torneo
            function consultarEquipos(torneoId) {
                fetch(`/admin/crud/recompensas/torneos/${torneoId}/equipos`)
                    .then(response => response.json())
                    .then(data => {
                        detalleTorneo.innerHTML = '';
                        if (data.length === 0) {
                            detalleTorneo.innerHTML = '<p>No se encontraron equipos para este torneo.</p>';
                        } else {
                            data.forEach(equipo => {
                                const equipoContainer = document.createElement('div');
                                equipoContainer.classList.add('equipo-container', 'mb-4');

                                const equipoHeader = document.createElement('div');
                                equipoHeader.classList.add('equipo-header', 'p-2', 'bg-gray-100', 'dark:bg-gray-700', 'cursor-pointer');
                                equipoHeader.textContent = equipo.nombre;
                                equipoHeader.addEventListener('click', function() {
                                    const equipoDetails = this.nextElementSibling;
                                    equipoDetails.classList.toggle('hidden');
                                });

                                const equipoDetails = document.createElement('div');
                                equipoDetails.classList.add('equipo-details', 'hidden', 'p-4', 'bg-gray-50', 'dark:bg-gray-800', 'border', 'border-gray-300', 'dark:border-gray-600');

                                const usuariosList = document.createElement('ul');
                                usuariosList.classList.add('list-disc', 'list-inside');

                                equipo.usuarios.forEach(usuario => {
                                    const li = document.createElement('li');
                                    li.textContent = usuario.nombre;
                                    usuariosList.appendChild(li);
                                });

                                equipoDetails.appendChild(usuariosList);
                                equipoContainer.appendChild(equipoHeader);
                                equipoContainer.appendChild(equipoDetails);
                                detalleTorneo.appendChild(equipoContainer);
                            });
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            // Filtrado por Juego en el dropdown
            searchFilter.addEventListener('change', function() {
                const selectedJuego = searchFilter.value.toLowerCase();

                document.querySelectorAll('[data-juego]').forEach(function(row) {
                    const juego = row.getAttribute('data-juego').toLowerCase();
                    if (selectedJuego === 'all' || juego === selectedJuego) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Filtrado dinámico por nombre del torneo
            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();
                document.querySelectorAll('[data-juego]').forEach(function(row) {
                    const torneo = row.querySelector('td:first-child').textContent.toLowerCase();
                    if (torneo.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Función para consultar y mostrar los equipos asociados a un torneo
            function consultarEquipos(torneoId) {
                fetch(`/admin/crud/recompensas/torneos/${torneoId}/equipos`)
                    .then(response => response.json())
                    .then(data => {
                        detalleTorneo.innerHTML = '';
                        if (data.length === 0) {
                            detalleTorneo.innerHTML = '<p>No se encontraron equipos para este torneo.</p>';
                        } else {
                            data.forEach(equipo => {
                                const equipoContainer = document.createElement('div');
                                equipoContainer.classList.add('equipo-container', 'mb-4');

                                const equipoHeader = document.createElement('div');
                                equipoHeader.classList.add('equipo-header', 'p-2', 'bg-gray-100', 'dark:bg-gray-700', 'cursor-pointer');
                                equipoHeader.textContent = equipo.nombre;
                                equipoHeader.addEventListener('click', function() {
                                    const equipoDetails = this.nextElementSibling;
                                    equipoDetails.classList.toggle('hidden');
                                });

                                const equipoDetails = document.createElement('div');
                                equipoDetails.classList.add('equipo-details', 'hidden', 'p-4', 'bg-gray-50', 'dark:bg-gray-800', 'border', 'border-gray-300', 'dark:border-gray-600');

                                const usuariosList = document.createElement('ul');
                                usuariosList.classList.add('list-disc', 'list-inside');

                                equipo.usuarios.forEach(usuario => {
                                    const li = document.createElement('li');
                                    li.textContent = usuario.nombre;
                                    usuariosList.appendChild(li);
                                });

                                equipoDetails.appendChild(usuariosList);
                                equipoContainer.appendChild(equipoHeader);
                                equipoContainer.appendChild(equipoDetails);
                                detalleTorneo.appendChild(equipoContainer);
                            });
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            // Inicializar el filtro de juegos
            searchFilter.dispatchEvent(new Event('change'));
        });
    </script>
@endsection

