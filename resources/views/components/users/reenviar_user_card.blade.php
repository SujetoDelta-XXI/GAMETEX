<div class="bg-black/60 to-white/5 rounded-lg">
    <div class="flex flex-row items-center">
        <div class="pl-4 py-2">
            <p class="text-xl font-bold">{{ $nombre }}</p>
            <p class="text-gray-400 font-medium">{{ $tipo}}</p>
            <p class="text-gray-500 text-sm">{{ $fecha}}</p>
        </div>
    </div>
    <div class="border-t border-white/5 p-2 flex">
        <span class="p-1 text-sm">Reclamado</span>
        <button type="button" 
            class="ml-auto flex items-center text-yellow-700 hover:text-white border border-yellow-700 hover:bg-yellow-800 focus:ring-4 
            focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:hover:bg-yellow-600 dark:focus:ring-yellow-900"
            onclick="showReclaimedMessage('{{ $clave_producto }}')">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true">
                <path d="M4 2v20M4 2h16l-6 8 6 8H4"></path>
            </svg>
            Reenviar
        </button>
    </div>
</div>
