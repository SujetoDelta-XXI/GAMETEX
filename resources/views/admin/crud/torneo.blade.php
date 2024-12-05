@extends('admin.dashboard')
@section('crudAdm')
    <div class="mt-4">
        <!-- Formulario de búsqueda -->
        <nav class="bg-gray-800 p-6 rounded-lg shadow-md">
            <form action="{{ route('admin.crud.torneo.search') }}" method="GET"
                class="flex flex-col sm:flex-row items-center gap-6 sm:gap-8">
                <!-- Input de búsqueda -->
                <div class="flex items-center w-full sm:w-80">
                    <input type="text" name="search" placeholder="Buscar..."
                        class="w-full px-4 py-2 bg-gray-700 text-gray-300 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ request('search') }}">
                </div>
                <!-- Select de tipo de búsqueda -->
                <div class="flex items-center w-full sm:w-48">
                    <select name="search_type"
                        class="w-full px-4 py-2 bg-gray-700 text-gray-300 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="nombre" {{ request('search_type') == 'nombre' ? 'selected' : '' }}>Nombre
                        </option>
                        <option value="juego" {{ request('search_type') == 'juego' ? 'selected' : '' }}>Juego
                        </option>
                        <option value="moderador" {{ request('search_type') == 'moderador' ? 'selected' : '' }}>
                            Moderador</option>
                    </select>
                </div>
                <!-- Botón de búsqueda -->
                <button type="submit"
                    class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">
                    Buscar
                </button>
            </form>
            <!-- Botón de creación -->
            <div class="flex justify-end mt-6">
                <a href="{{ route('admin.crud.torneo.create') }}"
                    class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-500">
                    Crear Nuevo Torneo
                </a>
            </div>
        </nav>
        <br>
        <!-- Grilla de torneos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach ($torneos as $torneo)
                <div class="mb-6 p-6 bg-gray-800 rounded-xl shadow-lg border border-gray-700">
                    <h4 class="text-lg font-bold text-indigo-500 mb-2">🏆 {{ $torneo->nombre }}</h4>
                    <div class="space-y-2 text-sm text-gray-300">
                        <p><span class="font-semibold text-gray-400">Descripción:</span> {{ $torneo->descripcion }}
                        </p>
                        <p><span class="font-semibold text-gray-400">📅 Fecha Inicio:</span>
                            {{ $torneo->fecha_inicio }}</p>
                        <p><span class="font-semibold text-gray-400">📅 Fecha Fin:</span> {{ $torneo->fecha_fin }}
                        </p>
                        <p><span class="font-semibold text-gray-400">💰 Entrada:</span> {{ $torneo->entrada }}</p>
                        <p><span class="font-semibold text-gray-400">⭐ EXP:</span> {{ $torneo->exp }}</p>
                        <p><span class="font-semibold text-gray-400">🎮 Juego:</span>
                            {{ $torneo->torneoJuego->nombre }}
                        </p>
                        <p><span class="font-semibold text-gray-400">🎁 Recompensas:</span>
                            {{ $torneo->recompensas->nombre }}</p>
                        <p><span class="font-semibold text-gray-400">👨‍💼 Moderador:</span>
                            {{ $torneo->moderador->name }}
                        </p>
                        <p><span class="font-semibold text-gray-400">👑 Administrador:</span>
                            {{ $torneo->administrador->name }}</p>
                        <p><span class="font-semibold text-gray-400">🕒 Última Modificación:</span>
                            {{ $torneo->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="m-4 w-20 h-20 rounded-full overflow-hidden border-2 border-gray-300">
                        <img src="{{ Str::startsWith($torneo->imagen, ['http://', 'https://']) ? $torneo->imagen : Storage::url($torneo->imagen) }}"
                            alt="Imagen circular" class="w-full h-full object-cover">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('admin.crud.torneo.edit', $torneo->id) }}"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition">
                            Editar
                        </a>
                        <form action="{{ route('admin.crud.torneo.delete', $torneo->id) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de que quieres eliminar este torneo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 transition">
                                Borrar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="mt-4 px-5">
            {{ $torneos->links() }}
        </div>
    </div>
@endsection
