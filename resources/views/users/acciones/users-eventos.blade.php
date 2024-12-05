@extends('users.dashboard')
@section('content-user')
    <div id="24h">
        <h1 class="font-bold text-[18px] sm:text-[20px] py-4 uppercase">Eventos Activos</h1>
        <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <x-users.eventos_card class="w-[100%]">
                <x-slot name="imagen">
                    https://image.api.playstation.com/vulcan/ap/rnd/202405/2117/bd406f42e9352fdb398efcf21a4ffe575b2306ac40089d21.png
                </x-slot>
                <x-slot name="descripcion">
                    Completa misiones épicas rápidamente para ganar Wukong. Los primeros 100 finalistas
                    recibirán Cartas de Regalo de Steam.
                </x-slot>
                <x-slot name="titulo">
                    Desafío del Guerrero Legendario
                </x-slot>
            </x-users.eventos_card>
        </div>
    </div>
    <div id="last-incomes">
        <h1 class="font-bold text-[18px] sm:text-[20px] py-4 uppercase">Eventos Concluidos</h1>
        <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <x-users.eventos_card class="w-[100%]">
                <x-slot name="imagen">
                    https://image.api.playstation.com/vulcan/ap/rnd/202405/2117/bd406f42e9352fdb398efcf21a4ffe575b2306ac40089d21.png
                </x-slot>
                <x-slot name="titulo">
                    Desafío del Guerrero Legendario
                </x-slot>
                <x-slot name="descripcion">
                    Completa misiones épicas rápidamente para ganar Wukong. Los primeros 100 finalistas
                    recibirán Cartas de Regalo de Steam.
                </x-slot>
            </x-users.eventos_card>
        </div>
    </div>
@endsection
