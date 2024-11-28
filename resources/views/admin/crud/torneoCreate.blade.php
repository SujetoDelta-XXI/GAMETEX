@extends('admin.dashboard')

@section('crudAdm')

<div class="mt-6 flex justify-center">
    <div class="bg-gray-900 border-4 border-indigo-500 shadow-lg rounded-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-medium text-indigo-600 mb-4">Crear Nuevo Torneo</h3>
        <form action="{{ route('admin.crud.torneo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-white">Nombre del Torneo</label>
                <input type="text" id="nombre" name="nombre" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
            </div>
            <div class="mb-4">
                <label for="fecha_inicio" class="block text-white">Fecha Inicio</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
            </div>
            <div class="mb-4">
                <label for="fecha_fin" class="block text-white">Fecha Fin</label>
                <input type="date" id="fecha_fin" name="fecha_fin" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
            </div>
            <div class="mb-4">
                <label for="entrada" class="block text-white">Entrada</label>
                <input type="number" id="entrada" name="entrada" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
            </div>
            <div class="mb-4">
                <label for="exp" class="block text-white">EXP</label>
                <input type="text" id="exp" name="exp" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block text-white">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="3" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required></textarea>
            </div>
            <div class="mb-4">
                <label for="imagen" class="block text-white">Imagen</label>
                <input type="file" id="imagen" name="imagen" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white">
            </div>
            <div class="mb-4">
                <label for="torneo_juego_id" class="block text-white">Juego</label>
                <select id="torneo_juego_id" name="torneo_juego_id" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
                    @foreach($juegos as $juego)
                        <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="recompensas_cantidad" class="block text-white">Cantidad de Recompensas</label>
                <input type="number" id="recompensas_cantidad" name="recompensas_cantidad" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" min="1" max="5" required>
            </div>
            <div class="mb-4">
                <label for="moderador_id" class="block text-white">Moderador</label>
                <select id="moderador_id" name="moderador_id" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
                    @foreach($moderadores as $moderador)
                        <option value="{{ $moderador->id }}">{{ $moderador->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Crear Torneo</button>
            </div>
        </form>
    </div>
</div>

@endsection
