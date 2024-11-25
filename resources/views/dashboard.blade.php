<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
               
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900">Experiencia (EXP)</h3>
                    <div class="w-full bg-gray-200 rounded-full h-4 dark:bg-gray-700 mt-2">
                        <div class="bg-blue-600 h-4 rounded-full" style="width: 70%;"></div>
                    </div>
                    <div class="mt-1 text-sm text-gray-500">Nivel 14 - 70% hacia el próximo nivel</div>
                </div>

              
                <div>
                    <h3 class="text-lg font-medium text-gray-900">Actividad Reciente</h3>
                    <div class="mt-2">
                        @forelse($actividades as $actividad)
                            <div class="mb-4 p-4 bg-gray-100 rounded-lg">
                                <h4 class="text-sm font-semibold text-gray-800">{{ $actividad->titulo }}</h4>
                                <p class="text-xs text-gray-600">{{ $actividad->fecha }}</p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No hay actividad reciente.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
