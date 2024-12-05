<div {{ $attributes->merge(['class' => 'px-0 py-4 sm:mb-0 mb-6 group relative w-full sm:w-1/2' . $class]) }}>
    <div class="rounded-lg h-80 overflow-hidden relative">
        <!-- Imagen con efecto hover -->
        <img alt="content"
            class="object-cover object-center h-full w-full transition duration-300 ease-in-out group-hover:brightness-50"
            src="{{ $imagen }}">
        <!-- Texto visible al hacer hover -->
        <div
            class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
            <div class="text-center text-white p-4">
                <h1 class="text-2xl font-bold">{{ $titulo }}</h1>
                <p class="mt-2 text-sm">{{ $descripcion }}</p>
            </div>
        </div>
    </div>
</div>
