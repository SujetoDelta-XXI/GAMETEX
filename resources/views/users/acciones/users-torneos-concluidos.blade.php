@extends('users.dashboard')
@section('content-user')
    <div id="last-incomes">
        <h1 class="font-bold py-4 uppercase text-[18px] sm:text-[20px]">Torneos Concluidos</h1>
        <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($torneosConcluidos as $torneo)
                @php
                    $imagePath1 = public_path('images/' . $torneo->imagen);
                    $imagePath2 = public_path('storage/' . $torneo->imagen);

                    if (file_exists($imagePath1)) {
                        $imageUrl = asset('images/' . $torneo->imagen);
                    } elseif (file_exists($imagePath2)) {
                        $imageUrl = asset('storage/' . $torneo->imagen);
                    } else {
                        $imageUrl = asset('torneos_img/lol1.jpeg'); // Imagen predeterminada si no se encuentra en ninguna carpeta
                    }
                @endphp
                <div class="px-0 py-4 sm:mb-0 mb-6 group relative w-full" data-game="{{ $torneo->torneoJuego->nombre }}">
                    <a href="{{ route('torneos-descripcion', ['id' => $torneo->id]) }}">
                        <div
                            class="rounded-lg h-96 overflow-hidden relative border-4 border-solid border-transparent hover:border-gray-300 hover:ring-2 hover:ring-opacity-60 hover:ring-gray-500 transition-all duration-300 ease-in-out">
                            <img alt="content"
                                class="object-cover object-center h-full w-full transition duration-300 ease-in-out group-hover:brightness-50"
                                src="{{ $imageUrl }}">
                            <div
                                class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out px-5">
                                <ul>
                                    <h3 class="text-lg font-semibold">{{ $torneo->nombre }}</h3><br>
                                    <li><b>Juego:</b> {{ $torneo->torneoJuego->nombre }}</li><br>
                                    <li><b>Descripción:</b><br>{{ $torneo->descripcion }}</li><br>
                                    <li><b>Moderador:</b> {{ $torneo->moderador->name }}</li><br>
                                    <li><b>Inicio:</b> {{ $torneo->fecha_inicio }}</li><br>
                                    <li><b>Fin:</b> {{ $torneo->fecha_fin }}</li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
