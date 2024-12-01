@extends('layouts.layout')

@section('contenido')
    <main>
        <section class="h-dvh w-full max-h-[80rem] relative">
            <div class="absolute inset-0 z-[1]">
                <img class="h-full w-full object-cover object-center" src="{{ asset('gifs/Fondo1.gif') }}" alt="">
            </div>
            <div class="max-w-[120rem] mx-auto h-full relative z-[2] px-6 md:px-8 lg:px-10">
                <div class="h-full w-full  flex flex-col relative space-y-6">
                    <div class="mt-auto mb-0 text-gray-50 md:pb-36 space-y-6">
                        <span class="font-light text-sm text-accent-500 ">GAMETEX</span>
                        <h1 class="text-3xl md:text-5xl max-w-[30rem] font-medium">EL ECOSISTEMA PARA LOS GAMERS</h1>
                        <p
                            class="max-w-[30rem] font-light ml-4 before:content-[''] relative before:absolute before:w-px before:h-full before:left-0 before:top-0 before:-translate-x-4 before:bg-accent-500 md:text-base text-sm">
                            "¡Únete a la batalla y demuestra tu habilidad en nuestros emocionantes torneos de videojuegos!
                            Donde los mejores gamers se enfrentan por la gloria y grandes premios."
                        </p>
                        <div class="md:flex-row flex-col flex gap-4">
                            <button
                                class="inline-block text-base font-medium px-12 py-2 border border-accent-400 rounded-lg text-accent-400 cursor-pointer bg-gray-50/10 backdrop-blur-3xl">
                                <a href="{{ 'f_nosotros' }}">Mas de nosotros</a>
                            </button>
                        </div>
                    </div>
                    <div class="md:absolute md:right-0 md:bottom-32 text-gray-50 my-16">
                        <ul class="flex md:flex-col items-center justify-center gap-2">

                            <li class="h-6 w-6 block rounded-full bg-accent-400 text-gray-50">
                                <a href="https://x.com/GAMETEX2024" class="block h-full w-full p-1" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>

                            <li class="h-6 w-6 block rounded-full bg-accent-400 text-gray-50">
                                <a href="https://discord.gg/eTHuf32W" class="block h-full w-full p-1" target="_blank">
                                    <i class="fab fa-discord"></i>
                                </a>
                            </li>

                            <li class="h-6 w-6 block rounded-full bg-accent-400 text-gray-50">
                                <a href="https://www.youtube.com/@GAMETEX2024" class="block h-full w-full p-1"
                                    target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </section>

        <section class="bg-blue-900 text-white py-14 px-8 border p-0">
            <div class="container mx-auto px-0 py-0">
                <!-- Subtítulo de la sección -->
                <h2 class="lg:px-20 md:px-10 px-5 lg:mx-0 md:mx-20 mx-5 font-bold text-4xl text-white text-center pb-5">
                    EVENTOS
                </h2>
                <section class="text-gray-400 bg-gray-900 body-font">
                    <div class="flex flex-wrap justify-center px-5 py-5 mx-auto space-x-0 sm:space-x-4 md:space-x-10">
                        <!--Evento 1-->
                        <x-home.evento_card class="lg:w-1/3">
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
                        </x-home.evento_card>

                        <!--Evento 2-->
                        <x-home.evento_card class="lg:w-1/4">
                            <x-slot name="imagen">
                                https://preview.redd.it/8m9tv6m3ouq81.jpg?auto=webp&s=0f99cb2b9bd28d93667453c0806a5dd75f888c1e
                            </x-slot>
                            <x-slot name="descripcion">
                                Ganá torneos de Left4Dead2 y Counter Strike. Las mejores estrategias ganan premios en
                                cartas de regalo de Steam.
                            </x-slot>
                            <x-slot name="titulo">
                                Concurso de Creadores de Estrategias
                            </x-slot>
                        </x-home.evento_card>

                        <!--Evento 3-->
                        <x-home.evento_card class="lg:w-1/3">
                            <x-slot name="imagen">
                                https://image.api.playstation.com/vulcan/ap/rnd/202405/2216/cbb03393f0ab1149f2b89a8194ce19e596a24fa5bec6526a.png
                            </x-slot>
                            <x-slot name="descripcion">
                                Participa en torneos de DragonBall Fighters y llevate el juego de Sparking Zero.
                            </x-slot>
                            <x-slot name="titulo">
                                Evento del Fin de Semana Épico
                            </x-slot>
                        </x-home.evento_card>
                    </div>
                </section>
            </div>
        </section>

        <section class="bg-blue-900 text-white spx-8 border p-4 pb-20">
            <!-- component -->
            <div class="flex flex-col m-auto p-auto overflow-x-auto max-w-full hide-scroll-bar">
                <h2 class="lg:px-20 md:px-10 px-5 lg:mx-0 md:mx-20 mx-5 font-bold text-4xl text-white text-center pt-8">
                    TORNEOS
                </h2>
                <div class="flex overflow-x-scroll py-8 hide-scroll-bar">
                    <div class="flex flex-nowrap lg:ml-10 my-8 md:ml-20 ml-10 mr-10">
                        <!-- Imagen 1 - Left 4 Dead 2 -->
                        <div class="inline-block px-3 h-[110%]" data-juego="Left 4 Dead 2">
                            <a href="#">
                                <img class="w-30 h-[100%] max-w-xs rounded-lg shadow-md bg-white hover:shadow-xl transition-transform duration-300 ease-in-out border-4 border-green-500 transform hover:scale-110 cursor-pointer"
                                    src="https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/550/capsule_616x353.jpg?t=1729702523"
                                    alt="Imagen 1">
                        </div>

                        <!-- Imagen 2 - Counter Strike 2 -->
                        <div class="inline-block px-3 h-[110%]" data-juego="Counter Strike 2">
                            <a href="#">
                                <img class="w-30 h-[100%] max-w-xs rounded-lg shadow-md bg-white hover:shadow-xl transition-transform duration-300 ease-in-out border-4 border-red-500 transform hover:scale-110 cursor-pointer"
                                    src="https://i.3djuegos.com/juegos/19026/counterstrike_2/fotos/ficha/counterstrike_2-5835305.webp"
                                    alt="Imagen 2">
                        </div>

                        <!-- Imagen 3 -->
                        <div class="inline-block px-3 h-[110%]">
                            <a href="#">
                                <img class="w-30 h-[100%] max-w-xs rounded-lg shadow-md bg-white hover:shadow-xl transition-transform duration-300 ease-in-out border-4 border-blue-500 transform hover:scale-110"
                                    src="https://cdn1.epicgames.com/offer/24b9b5e323bc40eea252a10cdd3b2f10/EGS_LeagueofLegends_RiotGames_S2_1200x1600-905a96cea329205358868f5871393042"
                                    alt="Imagen 3">
                            </a>
                        </div>
                        <!-- Imagen 4 -->
                        <div class="inline-block px-3 h-[110%]">
                            <a href="#">
                                <img class="w-30 h-[100%] max-w-xs rounded-lg shadow-md bg-white hover:shadow-xl transition-transform duration-300 ease-in-out border-4 border-yellow-500 transform hover:scale-110"
                                    src="https://media.vandal.net/m/78025/call-of-duty-mobile-2019102104887_1.jpg"
                                    alt="Imagen 4">
                            </a>
                        </div>
                        <!-- Imagen 5 -->
                        <div class="inline-block px-3 h-[110%]">
                            <a href="#">
                                <img class="w-30 h-[100%] max-w-xs rounded-lg shadow-md bg-white hover:shadow-xl transition-transform duration-300 ease-in-out border-4 border-purple-500 transform hover:scale-110"
                                    src="https://supercell.com/images/e93a34598d3723641a72eb9ce02691f6/790/games_thumbnail_brawlstars.5cd76330.webp"
                                    alt="Imagen 5">
                            </a>
                        </div>
                        <!-- Imagen 6 -->
                        <div class="inline-block px-3 h-[110%]">
                            <a href="#">
                                <img class="w-30 h-[100%] max-w-xs rounded-lg shadow-md bg-white hover:shadow-xl transition-transform duration-300 ease-in-out border-4 border-orange-500 transform hover:scale-110"
                                    src="https://yt3.googleusercontent.com/ytc/AIdro_m0DtuBhZUI1Mie9JUspzzqediBM76hO49vWA8hM5hwu9s=s900-c-k-c0x00ffffff-no-rj"
                                    src="Imagen 6">
                            </a>
                        </div>
                        <!-- Imagen 7 -->
                        <div class="inline-block px-3 h-[110%]">
                            <a href="#">
                                <img class="w-30 h-[100%] max-w-xs rounded-lg shadow-md bg-white hover:shadow-xl transition-transform duration-300 ease-in-out border-4 border-yellow-500 transform hover:scale-110"
                                    src="https://image.api.playstation.com/cdn/UP0700/CUSA09072_00/2eBPISxxvTv5foYSDlqiBJfmRj5LZxv3.png"
                                    alt="Imagen 7">
                            </a>
                        </div>
                        <!-- Imagen 8 -->
                        <div class="inline-block px-3 h-[110%]">
                            <a href="#">
                                <img class="w-30 h-[100%] max-w-xs rounded-lg shadow-md bg-white hover:shadow-xl transition-transform duration-300 ease-in-out border-4 border-teal-500 transform hover:scale-110"
                                    src="https://image.api.playstation.com/vulcan/ap/rnd/202312/0123/978efa66c9645e4692ac7036a31aa002a49d0efb4b88b45c.png"
                                    alt="Imagen 8">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-blue-900 text-white py-16 px-8 border p-4">
            <div class="flex justify-center items-center">
                <div class="max-w-7xl mx-auto px-4">
                    <h2 class="lg:px-20 md:px-10 px-5 lg:mx-0 md:mx-20 mx-5 font-bold text-4xl text-white text-center pb-10">
                        RANKING SEMANAL
                    </h2>
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center items-center text-center">
                        <!-- Card 1 -->
                        <x-home.ranking_card class="bg-gray-400">
                            <x-slot name="imagen">
                                https://i.pinimg.com/originals/22/b9/39/22b939e9dbefd23f513f189de558da24.gif
                            </x-slot>
                            <x-slot name="name">
                                Chicharron
                            </x-slot>
                            <x-slot name="fecha">
                                09/23 - 09/24
                            </x-slot>
                        </x-home.ranking_card>

                        <!-- Card 2 -->
                        <x-home.ranking_card class="bg-yellow-400">
                            <x-slot name="imagen">
                                https://i.pinimg.com/originals/8b/a4/8d/8ba48db13ca10021f9d14aa91a0d8cb1.gif
                            </x-slot>
                            <x-slot name="name">
                                SINAY
                            </x-slot>
                            <x-slot name="fecha">
                                09/23 - 09/24
                            </x-slot>
                        </x-home.ranking_card>

                        <!-- Card 3 -->
                        <x-home.ranking_card class="bg-orange-700">
                            <x-slot name="imagen">
                                https://media.tenor.com/xhC6NZETIzMAAAAM/simon-ghost-riley.gif
                            </x-slot>
                            <x-slot name="name">
                                TIREN PARO
                            </x-slot>
                            <x-slot name="fecha">
                                09/23 - 09/24
                            </x-slot>
                        </x-home.ranking_card>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
