@extends('admin.dashboard')

@section('crudAdm')
<div class="mt-6">
    <h3 class="text-lg font-medium text-gray-900">Eventos</h3>
    <div class="mt-4">
        <!-- Formulario de búsqueda -->
        <nav class="bg-gray-500">
            <form action="{{ route('admin.crud.evento.search') }}" method="GET" class="mb-4">
                <input type="text" name="search" placeholder="Buscar..." class="px-4 py-2 border rounded-lg" value="{{ request('search') }}">
                <select name="search_type" class="px-4 py-2 border rounded-lg">
                    <option value="nombre" {{ request('search_type') == 'nombre' ? 'selected' : '' }}>Nombre</option>
                    <option value="moderador" {{ request('search_type') == 'moderador' ? 'selected' : '' }}>Moderador</option>
                </select>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </nav>

        @foreach($eventos as $evento)
        <div class="mb-4 p-4 bg-white rounded-lg shadow">
            <h4 class="text-md font-semibold text-gray-800">Nombre del Evento: {{ $evento->eventosTipo->nombre }}</h4>
            <p class="text-sm text-gray-600">Descripción: {{ $evento->eventosTipo->descripcion }}</p>
            <p class="text-sm text-gray-600">Reglas: {{ $evento->eventosTipo->reglas }}</p>
            <p class="text-sm text-gray-600">Fecha Inicio: {{ $evento->fecha_inicio }}</p>
            <p class="text-sm text-gray-600">Fecha Fin: {{ $evento->fecha_fin }}</p>
            <p class="text-sm text-gray-600">Moderador: {{ $evento->moderador->name }}</p>
            <p class="text-sm text-gray-600">Última Modificación: {{ $evento->updated_at }}</p>
            <div class="flex mt-2">
                <a href="{{ route('admin.dinamicas.eventos-edit', $evento->id) }}" class="btn btn-warning mr-2">
                    Editar
                </a>
                <form action="{{ route('admin.dinamicas.delete', $evento->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este evento?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Borrar
                    </button>
                </form>
            </div>
        </div>
        @endforeach

        <!-- Paginación -->
        <div class="mt-4">
            {{ $eventos->links() }}
        </div>
    </div>
</div>
@endsection
