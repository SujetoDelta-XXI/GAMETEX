@extends('admin.dashboard')

@section('crudAdm')

<div class="mt-6">
    <h3 class="text-lg font-medium text-indigo-600">Eventos</h3>
    <div class="mt-4">
        <nav class="bg-gray-900 p-6 rounded-lg">
            <form action="{{ route('admin.crud.evento') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-4">
                <input type="text" name="search" id="search-dropdown" placeholder="Buscar..." class="w-full sm:w-64 px-4 py-2 text-gray-800 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('search') }}">
                <select name="search_type" id="search-type" class="w-full sm:w-auto px-4 py-2 text-gray-800 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="nombre" {{ request('search_type') == 'nombre' ? 'selected' : '' }}>Nombre</option>
                    <option value="moderador" {{ request('search_type') == 'moderador' ? 'selected' : '' }}>Moderador</option>
                </select>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                    Buscar
                </button>
                <div class="flex justify-end mt-4 sm:mt-0">
                    <a href="{{ route('admin.crud.evento.create') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-500">
                        Crear Nuevo Evento
                    </a>
                </div>
            </form>
        </nav>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            @foreach($eventos as $evento)
            <div class="mb-6 p-6 bg-gray-800 rounded-xl shadow-lg border border-gray-700 evento-row" data-nombre="{{ strtolower($evento->nombre) }}" data-moderador="{{ strtolower($evento->moderador->name) }}">
                <h4 class="text-lg font-bold text-indigo-500 mb-2">🎉 {{ $evento->nombre }}</h4>
                <div class="space-y-2 text-sm text-gray-300">
                    <p><span class="font-semibold text-gray-400">📜 Descripción:</span> {{ $evento->descripcion }}</p>
                    <p><span class="font-semibold text-gray-400">📜 Reglas:</span> {{ $evento->reglas }}</p>
                    <p><span class="font-semibold text-gray-400">📅 Fecha Inicio:</span> {{ $evento->fecha_inicio }}</p>
                    <p><span class="font-semibold text-gray-400">📅 Fecha Fin:</span> {{ $evento->fecha_fin }}</p>
                    <p><span class="font-semibold text-gray-400">👨‍💼 Moderador:</span> {{ $evento->moderador->name }}</p>
                    <p><span class="font-semibold text-gray-400">🕒 Última Modificación:</span> {{ $evento->updated_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="flex justify-end mt-4 space-x-3">
                    <a href="{{ route('admin.crud.evento.edit', $evento->id) }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition">
                        ✏️ Editar
                    </a>
                    <form action="{{ route('admin.crud.evento.delete', $evento->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este evento?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 transition">
                            🗑️ Borrar
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $eventos->links() }}
        </div>
    </div>
</div>

<script>
    // Filtrar por nombre de evento (buscador) según el tipo seleccionado
    document.getElementById('search-dropdown').addEventListener('input', function() {
        let searchTerm = this.value.toLowerCase();
        let searchType = document.getElementById('search-type').value;
        let rows = document.querySelectorAll('.evento-row');

        rows.forEach(row => {
            let dataAttr = row.getAttribute('data-' + searchType).toLowerCase();
            if (dataAttr.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Filtrar por tipo de búsqueda (nombre, moderador)
    document.getElementById('search-type').addEventListener('change', function() {
        document.getElementById('search-dropdown').dispatchEvent(new Event('input'));
    });
</script>

@endsection
