<div {{ $attributes->merge(['class' => "px-0 py-4 sm:mb-0 mb-6 group relative w-full sm:w-1/2" . $class]) }}>
    <div class="rounded-lg h-80 overflow-hidden relative">
        <!-- Imagen con efecto hover -->
        <img alt="content"
            class="object-cover object-center h-full w-full transition duration-300 ease-in-out group-hover:brightness-50"
            src="{{ $imagen }}">
        <!-- Texto visible al hacer hover -->
        <p class="absolute inset-0 flex items-center justify-center text-white text-lg font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out px-5">
            {{ $descripcion }}
        </p>
    </div>
    <!-- Título del evento -->
    <h3 class="text-xl font-medium title-font text-white mt-5 text-center">
        {{ $titulo }}
    </h3>
    <!-- Botón Participar -->
    <div class="mt-3 flex justify-center">
        <a href="{{ 'eventos-register' }}" class="py-2 px-6 text-center text-indigo-500 border-2 border-indigo-500 rounded-lg transition duration-300 ease-in-out transform hover:bg-indigo-500 hover:text-white hover:border-indigo-500">
            Participar
        </a>
    </div>
</div>
