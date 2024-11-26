@extends('admin.dashboard')

@section('crudAdm')
<div class="container mx-auto my-8">
    <div class="max-w-2xl mx-auto bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 p-8 rounded-lg shadow-lg">
        <form action="{{ route('evento.store') }}" method="POST" enctype="multipart/form-data" class="bg-opacity-75 bg-black p-8 rounded shadow-md">
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-gray-200">Crear Nuevo Evento</h2>
            
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-300">Nombre del Evento</label>
                <input type="text" name="nombre" id="nombre" class="mt-1 block w-full border border-gray-600 rounded-md p-2 shadow-sm focus:ring focus:border-indigo-300" required>
            </div>
            
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-300">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="mt-1 block w-full border border-gray-600 rounded-md p-2 shadow-sm focus:ring focus:border-indigo-300" required>
            </div>
            
            <div class="mb-4">
                <label for="categoria" class="block text-sm font-medium text-gray-300">Categoría</label>
                <input type="text" name="categoria" id="categoria" class="mt-1 block w-full border border-gray-600 rounded-md p-2 shadow-sm focus:ring focus:border-indigo-300" required>
            </div>
            
            <div class="mb-4">
                <label for="reglas" class="block text-sm font-medium text-gray-300">Reglas</label>
                <textarea name="reglas" id="reglas" class="mt-1 block w-full border border-gray-600 rounded-md p-2 shadow-sm focus:ring focus:border-indigo-300" required maxlength="255"></textarea>
            </div>
            
            <div class="mb-4">
                <label for="fecha_inicio" class="block text-sm font-medium text-gray-300">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="mt-1 block w-full border border-gray-600 rounded-md p-2 shadow-sm focus:ring focus:border-indigo-300" required>
            </div>
            
            <div class="mb-4">
                <label for="fecha_fin" class="block text-sm font-medium text-gray-300">Fecha Fin</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="mt-1 block w-full border border-gray-600 rounded-md p-2 shadow-sm focus:ring focus:border-indigo-300" min="{{ date('Y-m-d') }}" required>
            </div>
            
            <div class="mb-4">
                <label for="evento_tipo_nombre" class="block text-sm font-medium text-gray-300">Nombre del Tipo de Evento</label>
                <input type="text" name="evento_tipo_nombre" id="evento_tipo_nombre" class="mt-1 block w-full border border-gray-600 rounded-md p-2 shadow-sm focus:ring focus:border-indigo-300" required maxlength="50">
            </div>
            
            <div class="mb-4">
                <label for="moderador_id" class="block text-sm font-medium text-gray-300">Moderador</label>
                <select name="moderador_id" id="moderador_id" class="mt-1 block w-full border border-gray-600 rounded-md p-2 shadow-sm focus:ring focus:border-indigo-300" required>
                    @foreach ($moderadores as $moderador)
                        <option value="{{ $moderador->id }}">{{ $moderador->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="imagen" class="block text-sm font-medium text-gray-300">Imagen del Evento</label>
                <input type="file" name="imagen" id="imagen" class="mt-1 block w-full border border-gray-600 rounded-md p-2 shadow-sm focus:ring focus:border-indigo-300">
            </div>
            
            <div class="flex justify-end">
                <a href="{{ route('admin.crud.evento') }}" class="bg-red-600 text-white px-4 py-2 rounded mr-2 hover:bg-red-700">Cancelar</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection
