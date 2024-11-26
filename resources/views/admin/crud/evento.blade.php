@extends('admin.dashboard')

@section('crudAdm')

<div class="mt-6">
    <h3 class="text-lg font-medium text-indigo-600">Eventos</h3>
    <div class="mt-4">
        <!-- Formulario de búsqueda -->
        <nav class="bg-blue-900">
            <form action="{{ route('evento.search') }}" method="GET" class="mb-4">
                <input type="text" name="search" placeholder="Buscar..." class="px-4 py-2 border rounded-lg" value="{{ request('search') }}">
                <select name="search_type" class="px-4 py-2 border rounded-lg">
                    <option value="nombre" {{ request('search_type') == 'nombre' ? 'selected' : '' }}>Nombre</option>
                    <option value="moderador" {{ request('search_type') == 'moderador' ? 'selected' : '' }}>Moderador</option>
                </select>
                <button type="submit" class="btn btn-primary ext-indigo-600 ">Buscar</button>
                <div class="flex justify-end mb-4"> <a href="{{ route('evento.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Crear Nuevo Evento</a> </div>
            </form>
        </nav>

        @foreach($eventos as $evento)
        <div class="mb-4 p-4 bg-gray-900 rounded-lg shadow">
            <h4 class="text-md font-semibold text-indigo-600">Nombre del Evento: {{ $evento->eventosTipo->nombre }}</h4>
            <p class="text-sm text-white">Descripción: {{ $evento->eventosTipo->descripcion }}</p>
            <p class="text-sm text-white">Reglas: {{ $evento->eventosTipo->reglas }}</p>
            <p class="text-sm text-white">Fecha Inicio: {{ $evento->fecha_inicio }}</p>
            <p class="text-sm text-white">Fecha Fin: {{ $evento->fecha_fin }}</p>
            <p class="text-sm text-white">Moderador: {{ $evento->moderador->name }}</p>
            <p class="text-sm text-white">Última Modificación: {{ $evento->updated_at }}</p>
            <div class="flex mt-2">
                <a href="{{ route('evento-edit', $evento->id) }}" class="btn btn-warning mr-2 text-indigo-600">
                    Editar
                </a>
                <form action="{{ route('evento.delete', $evento->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este evento?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-indigo-600">
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
