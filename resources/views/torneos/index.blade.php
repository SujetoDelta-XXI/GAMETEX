@extends('layouts.layout')

@section('contenido')
<main>
    <section>
        <h1>Torneos</h1>
        <div>
            <input placeholder="Ingrese el nombre del torneo">
            <button>
                <a href="#">Buscar</a>
            </button>
        </div>
        <div>
            <label>Categorias:</label>
            <select>
                <option>Left 4 Dead 2</option>
                <option>Counter Strike 2</option>
                <option>League of Legends</option>
                <option>Call of Duty Mobile</option>
                <option>Call of duty Warzone</option>
                <option>Clash royale</option>
                <option>Brawl Stars</option>
                <option>Dragon Fighter Z</option>
            </select>
        </div>
    </section>

    <section class="bg-blue-900 text-white py-14 px-8 border p-0">
        <div class="container mx-auto px-0 py-0">
            <div class="flex flex-wrap justify-center px-5 py-5 mx-auto space-x-0 sm:space-x-4 md:space-x-10">
                <div class="px-0 py-4 md:w-1/3 sm:mb-0 mb-6 group relative w-full sm:w-1/2 lg:w-1/5">
                    <div class="rounded-lg h-96 overflow-hidden relative">
                        <img alt="content" class="object-cover object-center h-full transition duration-300 ease-in-out group-hover:brightness-50" src="https://image.api.playstation.com/vulcan/img/cfn/11307FnkczgCEIGhZeeO6hHoSw11DMjlR3c4q3dguXzAXXKsbv6A1qEejoiucwtjt43HO7RYWTDbMEq6ORkjpEg05rod2Opj.png?w=440">
                        <div class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out px-5">
                            <ul>
                                <h3 class="text-lg font-semibold">Supervivencia Extrema</h3><br>
                                <li>Premio: S/50 en Cartas de Regalo de Steam para el equipo ganador.</li><br>
                                <li>Creador: Comunidad "Survivor Legends".</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="px-0 py-4 md:w-1/3 sm:mb-0 mb-6 group relative w-full sm:w-1/2 lg:w-1/5">
                    <div class="rounded-lg h-96 overflow-hidden relative">
                        <img alt="content" class="object-cover object-center h-full transition duration-300 ease-in-out group-hover:brightness-50" src="https://ensigame.com/storage/uploads/posts/19105/1.jpg">
                        <div class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out px-5">
                            <ul>
                                <h3 class="text-lg font-semibold">Global Offensive - "Operación Cabeza Fría"</h3><br>
                                <li>Premio: S/100</li><br>
                                <li>Creador: Organizado por "Pro Gamers Arena".</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="px-0 py-4 md:w-1/3 sm:mb-0 mb-6 group relative w-full sm:w-1/2 lg:w-1/5">
                    <div class="rounded-lg h-96 overflow-hidden relative">
                        <img alt="content" class="object-cover object-center h-full transition duration-300 ease-in-out group-hover:brightness-50" src="https://platform.polygon.com/wp-content/uploads/sites/2/chorus/uploads/chorus_asset/file/19349214/jbareham_191158_ply0958_decade_lolengends.jpg?quality=90&strip=all&crop=22.864583333333,0,56.25,100">
                        <div class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out px-5">
                            <ul>
                                <h3 class="text-lg font-semibold">"La Copa de los Invocadores"</h3><br>
                                <li>Premio: S/80</li><br>
                                <li>Creador: Creado por la comunidad "Legends United".</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="px-0 py-4 md:w-1/3 sm:mb-0 mb-6 group relative w-full sm:w-1/2 lg:w-1/5">
                    <div class="rounded-lg h-96 overflow-hidden relative">
                        <img alt="content" class="object-cover object-center h-full transition duration-300 ease-in-out group-hover:brightness-50" src="https://i.blogs.es/c906f5/portada-tier-list-db-fighterz/1366_2000.jpeg">
                        <div class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out px-5">
                            <ul>
                                <h3 class="text-lg font-semibold">"El Torneo del Poder"</h3><br>
                                <li>Premio: El juego de dragon ball fighters</li><br>
                                <li>Creador: Comunidad "Survivor Legends".</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection