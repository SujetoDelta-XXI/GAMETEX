@extends('admin.dashboard')

@section('crudAdm')

<div class="mt-6 flex justify-center">
    <div class="bg-gray-900 border-4 border-indigo-500 shadow-lg rounded-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-medium text-indigo-600 mb-4">Crear Nuevo Evento</h3>
        <form action="{{ route('admin.crud.evento.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-white">Nombre del Evento</label>
                <input type="text" id="nombre" name="nombre" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block text-white">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required></textarea>
            </div>
            <div class="mb-4">
                <label for="reglas" class="block text-white">Reglas</label>
                <textarea id="reglas" name="reglas" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required></textarea>
            </div>
            <div class="mb-4">
                <label for="fecha_inicio" class="block text-white">Fecha y Hora de Inicio</label>
                <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
            </div>
            <div class="mb-4">
                <label for="fecha_fin" class="block text-white">Fecha y Hora de Fin</label>
                <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
            </div>
            <div class="mb-4">
                <label for="moderador_id" class="block text-white">Moderador</label>
                <select id="moderador_id" name="moderador_id" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
                    @foreach($moderadores as $moderador)
                        <option value="{{ $moderador->id }}">{{ $moderador->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="recompensa_id" class="block text-white">Recompensa</label>
                <select id="recompensa_id" name="recompensa_id" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
                    @foreach($recompensas as $recompensa)
                        <option value="{{ $recompensa->id }}">{{ $recompensa->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="recompensas_cantidad" class="block text-white">Cantidad a Descontar</label>
                <select id="recompensas_cantidad" name="recompensas_cantidad" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="imagen" class="block text-white">Imagen</label>
                <input type="file" id="imagen" name="imagen" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white">
            </div>
            <div class="flex justify-end">
                <a href="{{ route('admin.crud.evento') }}" class="bg-red-600 text-white px-4 py-2 rounded mr-2 hover:bg-red-700">Cancelar</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Crear Evento</button>
            </div>
        </form>
    </div>
</div>

@endsection
