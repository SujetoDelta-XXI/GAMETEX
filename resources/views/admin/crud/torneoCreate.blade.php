@extends('admin.dashboard')

@section('crudAdm')

<div class="mt-6 flex justify-center">
    <div class="bg-gray-900 border-4 border-indigo-500 shadow-lg rounded-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-medium text-indigo-600 mb-4">Crear Nuevo Torneo</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.crud.torneo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-white">Nombre del Torneo</label>
                <input type="text" id="nombre" name="nombre" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
            </div>
            <div class="mb-4">
                <label for="fecha_inicio" class="block text-white">Fecha Inicio</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white">
            </div>
            <div class="mb-4">
                <label for="fecha_fin" class="block text-white">Fecha Fin</label>
                <input type="date" id="fecha_fin" name="fecha_fin" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white">
            </div>
            <div class="mb-4">
                <label for="entrada" class="block text-white">Entrada</label>
                <select id="entrada" type="number" name="entrada" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white">
                    <option value="gratuito">Gratuito</option>
                    <option value="5">s/5</option>
                    <option value="15">s/15</option>
                    <option value="30">s/30</option>
                    <option value="50">s/50</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="nombre" class="block text-white">Exp</label>
                <input type="text" id="exp" name="exp" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white">
            </div>
            <div class="mb-4">
                <label for="nombre" class="block text-white">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white">
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
                <label for="recompensas_tipo_id" class="block text-white">Tipo de Recompensa</label>
                <select id="recompensas_tipo_id" name="recompensas_tipo_id" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white" required>
                    @foreach($recompensasTipos as $recompensaTipo)
                        <option value="{{ $recompensaTipo->id }}">{{ $recompensaTipo->nombre }}</option>
                    @endforeach
                </select>
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
                <label for="imagen" class="block text-white">Imagen</label>
                <input type="file" id="imagen" name="imagen" class="mt-1 p-2 w-full border-2 border-indigo-500 rounded-lg bg-gray-800 text-white">
            </div>
            <div class="flex justify-end">
                <a href="{{ route('admin.crud.torneo') }}" class="bg-red-600 text-white px-4 py-2 rounded mr-2 hover:bg-red-700">Cancelar</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Crear Torneo</button>
            </div>
        </form>
    </div>
</div>

@endsection
