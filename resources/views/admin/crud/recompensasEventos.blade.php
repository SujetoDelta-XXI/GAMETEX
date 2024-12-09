@extends('admin.dashboard')

@section('crudAdm')
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Detalles de Recompensa: Eventos</h3>
                    <div class="mt-4">
                        <p>Nombre: {{ $recompensa->nombre }}</p>
                        <p>Clave del Producto: {{ $recompensa->clave_producto }}</p>
                        <p>Precio: {{ $recompensa->precio }}</p>
                        <p>Tipo: {{ $recompensa->tipo->nombre }}</p>
                        <p>Asignada: {{ $recompensa->asignada ? 'Sí' : 'No' }}</p>
                        <!-- Agregar más detalles específicos para eventos aquí -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
