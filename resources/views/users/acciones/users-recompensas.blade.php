@extends('users.dashboard')
@section('content-user')
    <div id="24h">
        <h1 class="font-bold py-4 text-[18px] sm:text-[20px] uppercase">Recompensas Obtenidas</h1>
        <div id="stats" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <x-users.recompensa_user_card>
                <x-slot name="nombre">
                    Half Life
                </x-slot>
                <x-slot name="tipo">
                    Clave de Juego
                </x-slot>
                <x-slot name="fecha">
                    08/12/2024
                </x-slot>
            </x-users.recompensa_user_card>
            <x-users.recompensa_user_card>
                <x-slot name="nombre">
                    Half Life
                </x-slot>
                <x-slot name="tipo">
                    Clave de Juego
                </x-slot>
                <x-slot name="fecha">
                    08/12/2024
                </x-slot>
            </x-users.recompensa_user_card>
            <x-users.recompensa_user_card>
                <x-slot name="nombre">
                    Half Life
                </x-slot>
                <x-slot name="tipo">
                    Clave de Juego
                </x-slot>
                <x-slot name="fecha">
                    08/12/2024
                </x-slot>
            </x-users.recompensa_user_card>
            <x-users.recompensa_user_card>
                <x-slot name="nombre">
                    Half Life
                </x-slot>
                <x-slot name="tipo">
                    Clave de Juego
                </x-slot>
                <x-slot name="fecha">
                    08/12/2024
                </x-slot>
            </x-users.recompensa_user_card>
            <x-users.recompensa_user_card>
                <x-slot name="nombre">
                    Half Life
                </x-slot>
                <x-slot name="tipo">
                    Clave de Juego
                </x-slot>
                <x-slot name="fecha">
                    08/12/2024
                </x-slot>
            </x-users.recompensa_user_card>
        </div>

        <div id="last-incomes">
            <h1 class="font-bold py-4 uppercase text-[18px] sm:text-[20px]">Recompensas Reclamadas</h1>
            <div id="stats" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <x-users.reenviar_user_card>
                    <x-slot name="nombre">
                        Half Life
                    </x-slot>
                    <x-slot name="tipo">
                        Clave de Juego
                    </x-slot>
                    <x-slot name="fecha">
                        08/12/2024
                    </x-slot>
                </x-users.reenviar_user_card>
                <x-users.reenviar_user_card>
                    <x-slot name="nombre">
                        Half Life
                    </x-slot>
                    <x-slot name="tipo">
                        Clave de Juego
                    </x-slot>
                    <x-slot name="fecha">
                        08/12/2024
                    </x-slot>
                </x-users.reenviar_user_card>
            </div>
        </div>
    </div>        
    @endsection
