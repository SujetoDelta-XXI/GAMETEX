<div class="px-0 py-4 md:w-full sm:mb-0 mb-6 group relative w-full sm:w-full lg:w-full"
    data-game="{{ $name }}">
    <div
        class="rounded-lg h-96 overflow-hidden relative border-4 border-solid border-transparent hover:border-gray-300 hover:ring-2 hover:ring-opacity-60 hover:ring-gray-500 transition-all duration-300 ease-in-out">
        <img alt="content"
            class="object-cover object-center h-full w-full transition duration-300 ease-in-out group-hover:brightness-50"
            src="\storage\{{ $imagen }}">
        <div
            class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out px-5">
            <ul>
                <h3 class="text-lg font-semibold">{{ $nombre }}</h3><br>
                <li>{{ $descripcion }}</li><br>
                <li>Moderador: {{ $moderador}}</li>
                <li>Fecha Inicio: {{ \Carbon\Carbon::parse($inicio)->format('d/m/Y') }}</li>
                <li>Fecha Fin: {{ \Carbon\Carbon::parse($fin)->format('d/m/Y') }}</li>
            </ul>
        </div>
    </div>
</div>
