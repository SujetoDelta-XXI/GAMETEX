<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moderator Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Main Content Area -->
        <div class="flex-1 py-12 px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Stats Card -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Estadísticas de Moderación</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-600">Reportes Pendientes</p>
                            <p class="text-2xl font-bold text-blue-600">23</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Casos Resueltos Hoy</p>
                            <p class="text-2xl font-bold text-green-600">15</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Card -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Actividad Reciente</h3>
                    <div class="space-y-3">
                        @forelse($actividades ?? [] as $actividad)
                            <div class="border-b pb-2">
                                <p class="text-sm font-medium">{{ $actividad->titulo ?? 'Reporte #123 Revisado' }}</p>
                                <p class="text-xs text-gray-500">{{ $actividad->fecha ?? '2024-02-20 15:30' }}</p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No hay actividades recientes</p>
                        @endforelse
                    </div>
                </div>

                <!-- Performance Card -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Rendimiento</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-600">Tiempo Promedio de Respuesta</p>
                            <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                                <div class="bg-green-600 h-2 rounded-full" style="width: 85%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">2.5 horas</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Satisfacción de Usuario</p>
                            <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 92%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">92%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="w-64 bg-white shadow-xl p-4 hidden lg:block">
            <!-- Profile Section -->
            <div class="mb-6 text-center">
                <div class="relative w-32 h-32 mx-auto mb-4">
                    <img src="{{ Auth::guard('moder')->user()->profile_photo_url ?? '/default-avatar.png' }}" 
                         alt="Profile" 
                         class="rounded-full w-full h-full object-cover">
                    <label for="photo-upload" 
                           class="absolute bottom-0 right-0 bg-blue-500 text-white rounded-full p-2 cursor-pointer hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </label>
                    <input type="file" id="photo-upload" class="hidden">
                </div>
                <h4 class="font-semibold">{{ Auth::guard('moder')->user()->name ?? 'Moderador' }}</h4>
                <p class="text-sm text-gray-500">Moderador Senior</p>
            </div>

            <!-- Navigation Menu -->
            <nav class="space-y-2">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">📊 Panel Principal</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">🚨 Reportes Pendientes</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">📝 Casos Activos</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">📈 Estadísticas</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">⚙️ Configuración</a>
            </nav>
        </div>
    </div>
    @vite('resources/js/app.js')
    
</x-app-layout>