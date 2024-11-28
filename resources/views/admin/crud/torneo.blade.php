@extends('admin.dashboard')
@section('crudAdm')
<div class="mt-6">
    <h3 class="text-lg font-medium text-indigo-600">Torneos</h3>
    <div class="mt-4">
        <!-- Formulario de búsqueda -->
        <nav class="bg-gray-900">
            <form action="{{ route('admin.crud.torneo.search') }}" method="GET" class="mb-4">
                <input type="text" name="search" placeholder="Buscar..." class="px-4 py-2 border rounded-lg" value="{{ request('search') }}">
                <select name="search_type" class="px-4 py-2 border rounded-lg">
                    <option value="nombre" {{ request('search_type') == 'nombre' ? 'selected' : '' }}>Nombre</option>
                    <option value="juego" {{ request('search_type') == 'juego' ? 'selected' : '' }}>Juego</option>
                    <option value="moderador" {{ request('search_type') == 'moderador' ? 'selected' : '' }}>Moderador</option>
                </select>
                <button type="submit" class="btn btn-primary text-indigo-600">Buscar</button>
                <div class="flex justify-end mb-4">
                    <a href="{{ route('admin.crud.torneo.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Crear Nuevo Torneo</a>
                </div>
            </form>
        </nav>

        @foreach($torneos as $torneo)
        <div class="mb-4 p-4 bg-gray-900 rounded-lg shadow">
            <h4 class="text-md font-semibold text-indigo-600">Nombre del Torneo: {{ $torneo->nombre }}</h4>
            <p class="text-sm text-white">Descripción: {{ $torneo->descripcion }}</p>
            <p class="text-sm text-white">Fecha Inicio: {{ $torneo->fecha_inicio }}</p>
            <p class="text-sm text-white">Fecha Fin: {{ $torneo->fecha_fin }}</p>
            <p class="text-sm text-white">Entrada: {{ $torneo->entrada }}</p>
            <p class="text-sm text-white">EXP: {{ $torneo->exp }}</p>
            <p class="text-sm text-white">Juego: {{ $torneo->torneoJuego->nombre }}</p>
            <p class="text-sm text-white">Recompensas: {{ $torneo->recompensas->nombre }}</p>
            <p class="text-sm text-white">Moderador: {{ $torneo->moderador->name }}</p>
            <p class="text-sm text-white">Administrador: {{ $torneo->administrador->name }}</p>
            <p class="text-sm text-white">Última Modificación: {{ $torneo->updated_at }}</p>
            <div class="flex mt-2">
                <a href="{{ route('admin.crud.torneo.edit', $torneo->id) }}" class="btn btn-warning mr-2 text-indigo-600">Editar</a>
                <form action="{{ route('admin.crud.torneo.delete', $torneo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este torneo?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-indigo-600">Borrar</button>
                </form>
            </div>
        </div>
        @endforeach

        <!-- Paginación -->
        <div class="mt-4">
            {{ $torneos->links() }}
        </div>
    </div>
</div>

@endsection