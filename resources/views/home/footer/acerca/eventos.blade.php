@extends('layouts.layout')

@section('contenido')
    <main class="bg-gray-700 text-white p-8">
        <div class="max-w-6xl mx-auto p-6 bg-gray-900 rounded-lg shadow-lg">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-center mb-4 text-white">Participa en los Eventos de GameTex</h2>
                <p class="text-lg text-center">
                    En GameTex, los eventos son una parte fundamental de la comunidad gamer. Son oportunidades para conectar,
                    competir y disfrutar de la pasión por los videojuegos. A continuación, te presentamos todo lo que necesitas
                    saber sobre nuestros emocionantes eventos:
                </p>
            </div>

            <article class="space-y-8">
                @php
                    $sections = [
                        ['title' => '1. Variedad de Eventos', 'content' => 'En GameTex organizamos una gran variedad de eventos que van desde torneos en los videojuegos más populares hasta competiciones especiales de nicho. Los jugadores de todos los niveles encontrarán algo para disfrutar, ya sea que busquen retos competitivos o eventos más relajados para conectarse con otros gamers. Además, nuestros eventos se actualizan constantemente para ofrecer siempre nuevas experiencias.'],
                        ['title' => '2. Recompensas y Premios', 'content' => 'Los eventos de GameTex ofrecen una variedad de recompensas que van desde premios en efectivo hasta productos tecnológicos de última generación, como consolas de videojuegos y accesorios exclusivos. Al participar, no solo tienes la oportunidad de ganar premios tangibles, sino que también puedes obtener reconocimiento en nuestra comunidad, lo que te permitirá destacar entre otros jugadores.'],
                        ['title' => '3. Registro Abierto', 'content' => 'Es fácil unirte a cualquier evento de GameTex. Solo debes visitar nuestra página de eventos, elegir el torneo que más te interese y completar tu registro en línea. Recomendamos hacerlo con tiempo, ya que muchos eventos tienen plazas limitadas. ¡No dejes pasar la oportunidad de competir y ganar en nuestros emocionantes torneos, y asegúrate de asegurarte un lugar!'],
                        ['title' => '4. Actividades Interactivas', 'content' => 'Además de las competencias, GameTex organiza actividades interactivas diseñadas para mejorar la experiencia de todos los participantes. Desde talleres de formación sobre las mejores tácticas hasta concursos y pruebas de juegos nuevos, nuestras actividades permiten a los jugadores aprender de expertos y mejorar sus habilidades. Estas actividades son una excelente oportunidad para interactuar con la comunidad y conocer a otros gamers con intereses similares.'],
                        ['title' => '5. Conexión con la Comunidad', 'content' => 'Participar en eventos de GameTex no es solo una forma de competir, sino también de formar parte de una comunidad global de jugadores. A través de nuestras competiciones y actividades interactivas, tendrás la oportunidad de conocer a otros gamers, compartir estrategias y consejos, y, lo más importante, hacer nuevos amigos. Los eventos son una excelente oportunidad para fortalecer la conexión dentro de nuestra comunidad y disfrutar del verdadero espíritu competitivo.'],
                        ['title' => '6. Transmisiones en Vivo', 'content' => 'Todos los eventos importantes de GameTex se transmiten en vivo para que puedas disfrutar de la emoción y la competitividad desde la comodidad de tu hogar. Además, nuestras transmisiones permiten la interacción en tiempo real, donde los espectadores pueden comentar y debatir sobre las partidas. Si no puedes participar en un torneo, no te preocupes, puedes seguir la acción en vivo y animar a tus jugadores favoritos mientras compiten.'],
                        ['title' => '7. Normas y Condiciones', 'content' => 'Es fundamental que todos los participantes se familiaricen con las normas y condiciones de cada evento antes de registrarse. En GameTex nos aseguramos de que todos los torneos y actividades sean justos y transparentes, por lo que es importante cumplir con las reglas establecidas. Lee cuidadosamente los términos y condiciones para asegurarte de tener una experiencia segura y sin contratiempos, y de disfrutar de un ambiente de competencia saludable.']
                    ];
                @endphp

                @foreach ($sections as $section)
                    <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <!-- Header con el título y el ícono -->
                        <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                            <h3 class="text-2xl font-semibold text-blue-400">{{ $section['title'] }}</h3>
                            <button class="text-white bg-blue-400 rounded-full p-2 focus:outline-none">
                                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Contenido oculto -->
                        <div x-show="open" x-transition class="mt-4 text-gray-300">
                            <p>{{ $section['content'] }}</p>
                        </div>
                    </div>
                @endforeach
            </article>
        </div>
    </main>

    <!-- Alpine.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
