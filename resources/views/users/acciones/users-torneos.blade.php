@extends('users.dashboard')
@section('content-user')
    <div id="24h">
        <h1 class="font-bold py-4 uppercase text-[18px] sm:text-[20px]">Torneos Activos</h1>
        <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($torneosActivos as $torneo)
                <x-home.torneos_card>
                    <x-slot name="name">
                        {{ $torneo->torneoJuego->nombre }}
                    </x-slot>
                    <x-slot name="imagen">
                        {{ $torneo->imagen }}
                    </x-slot>
                    <x-slot name="nombre">
                    {{ $torneo->torneoJuego->nombre }}
                    </x-slot>
                    <x-slot name="descripcion">
                        {{ $torneo->descripcion }}
                    </x-slot>
                    <x-slot name="moderador">
                        {{ $torneo->moderador->name }}
                    </x-slot>
                    <x-slot name="inicio">
                        {{ $torneo->fecha_inicio }}
                    </x-slot>
                    <x-slot name="fin">
                        {{ $torneo->fecha_fin }}
                    </x-slot>
                </x-home.torneos_card>
            @endforeach
        </div>
    </div>
    <div id="last-incomes">
        <h1 class="font-bold py-4 uppercase text-[18px] sm:text-[20px]">Torneos Concluidos</h1>
        <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($torneosConcluidos as $torneo)
                <x-home.torneos_card>
                    <x-slot name="name">
                        {{ $torneo->torneoJuego->nombre }}
                    </x-slot>
                    <x-slot name="imagen">
                        {{ $torneo->imagen }}
                    </x-slot>
                    <x-slot name="nombre">
                        {{ $torneo->torneoJuego->nombre }}
                    </x-slot>
                    <x-slot name="descripcion">
                        {{ $torneo->descripcion }}
                    </x-slot>
                    <x-slot name="moderador">
                        {{ $torneo->moderador->name }}
                    </x-slot>
                    <x-slot name="inicio">
                        {{ $torneo->fecha_inicio }}
                    </x-slot>
                    <x-slot name="fin">
                        {{ $torneo->fecha_fin }}
                    </x-slot>
                </x-home.torneos_card>
            @endforeach
        </div>
    </div>
@endsection
