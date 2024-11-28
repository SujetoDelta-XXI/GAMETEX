<!-- resources/views/admin/dashboard.blade.php -->
<x-app-layout>
    <div class="flex">
        <div class="flex-1 py-12 px-4 bg-gray-900">
            @yield('crudAdm')
        </div>

        <div class="w-64 bg-gray-400 shadow-xl p-4 hidden lg:block">
            <div class="mb-6 text-center">
                <div class="relative w-32 h-32 mx-auto mb-4">
                    <img id="profile-image" src="{{ Auth::guard('admin')->user()->profile_photo_url ?? '/default-avatar.png' }}" 
                         alt="Profile" 
                         class="rounded-full w-full h-full object-cover">
                    <label for="admin-photo-upload" 
                           class="absolute bottom-0 right-0 bg-purple-500 text-white rounded-full p-2 cursor-pointer hover:bg-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </label>
                    <input type="file" id="admin-photo-upload" class="hidden" onchange="previewImage(event)">
                </div>
                <h4 class="font-semibold">{{ Auth::guard('admin')->user()->name ?? 'Administrador' }}</h4>
                <p class="text-sm text-gray-500">Administrador del Sistema</p>
            </div>

            <!-- Navigation Menu -->
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">🏠 Panel Principal</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">👥 Gestión de Usuarios</a>
                <a href="{{ route('admin.crud.evento') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">🔒 CRUD Eventos</a>
                <a href="{{ route('admin.crud.torneo') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">📊 CRUD Torneos</a>
                <a href="{{ route('admin.crud.recompensas') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">CRUD Recompensas</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">📁 Backups</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">📝 Logs del Sistema</a>
            </nav>            
        </div>
    </div>
    
    <script>
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function() {
            const img = document.getElementById('profile-image');
            img.src = reader.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
    </script>
</x-app-layout>
