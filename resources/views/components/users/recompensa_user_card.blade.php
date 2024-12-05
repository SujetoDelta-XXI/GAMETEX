<div class="bg-black/60 to-white/5 rounded-lg" data-recompensa-id="{{ $recompensaId }}">
    <div class="flex flex-row items-center">
        <div class="pl-4 py-2">
            <p class="text-xl font-bold">{{ $nombre }}</p>
            <p class="text-gray-500 font-medium">{{ $tipo }}</p>
            <p class="text-gray-500 text-sm">{{ $fecha }}</p>
        </div>
    </div>
    <div class="border-t border-white/5 p-2 flex">
        <span class="p-1 text-sm">Pendiente</span>
        <button type="button"
            class="ml-auto flex items-center text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-900"
            onclick="copyHiddenText('{{ $recompensaId }}',  '{{ $clave_producto }}')">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true">
                <path d="M4 2v20M4 2h16l-6 8 6 8H4"></path>
            </svg>
            Reclamar
        </button>
        <p id="hiddenText_{{ $recompensaId }}" class="hidden">{{ $clave_producto }}</p>
    </div>
</div>
