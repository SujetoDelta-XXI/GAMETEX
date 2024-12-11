<!-- resources/views/admin/crud/TorneoEquipos.blade.php -->
<div>
    @if ($detalles->isEmpty())
        <p>No se encontraron usuarios ni equipos para este torneo.</p>
    @else
        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Participantes</h4>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-2">Usuario</th>
                        <th scope="col" class="px-4 py-2">Equipo</th>
                        <th scope="col" class="px-4 py-2">Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $detalle)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-4 py-2">{{ optional($detalle->usuario)->name }}</td>
                            <td class="px-4 py-2">{{ optional($detalle->equipo)->nombre }}</td>
                            <td class="px-4 py-2">{{ $detalle->rol }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
