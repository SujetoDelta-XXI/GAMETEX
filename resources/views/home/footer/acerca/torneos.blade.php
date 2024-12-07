@extends('layouts.layout')

@section('contenido')
    <main class="bg-gray-700 text-white p-8">
        <div class="max-w-6xl mx-auto p-6 bg-gray-900 rounded-lg shadow-lg">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-center mb-4 text-white">Participa en los Torneos de GameTex</h2>
                <p class="text-lg text-center">En GameTex, los torneos son una emocionante manera de poner a prueba tus habilidades y competir contra otros jugadores. Si estás listo para unirte a la acción y ganar recompensas, aquí te presentamos todo lo que necesitas saber sobre nuestros torneos:</p>
            </div>

            <article class="space-y-8">
                @php
                    $sections = [
                        ['title' => 'Variedad de Torneos', 'content' => 'Organizamos una amplia gama de torneos que abarcan una variedad de juegos y géneros, incluyendo acción, aventuras, deportes y juegos de estrategia. Ya sea que prefieras un juego de disparos rápido o una batalla de mente estratégica, encontrarás un evento adecuado para tus habilidades. Nuestros torneos están diseñados para satisfacer a todos los tipos de jugadores, tanto casuales como competitivos. ¡Prepárate para competir y mostrar lo mejor de ti en una amplia selección de títulos!'],
                        ['title' => 'Recompensas y Premios', 'content' => 'Los torneos de GameTex no solo son una oportunidad para demostrar tus habilidades, sino que también ofrecen atractivas recompensas. Los premios varían según el torneo, e incluyen desde dinero en efectivo, videojuegos y equipos de gaming, hasta artículos exclusivos de edición limitada. Además, los mejores competidores tendrán la oportunidad de obtener trofeos o medallas conmemorativas. No importa si eres un principiante o un jugador experimentado, siempre hay algo que ganar. ¡No pierdas la oportunidad de obtener grandes premios!'],
                        ['title' => 'Registro Sencillo', 'content' => 'Inscribirse en un torneo en GameTex es muy sencillo. Todo lo que necesitas hacer es visitar nuestra sección de torneos en el sitio web, elegir el evento que te interese y completar el proceso de registro. Asegúrate de llenar todos los campos correctamente y de revisar los requisitos específicos para cada torneo. Recomendamos registrar tu participación con anticipación, ya que los espacios son limitados y los torneos suelen llenarse rápidamente. ¡No dejes pasar tu oportunidad!'],
                        ['title' => 'Formatos Competitivos', 'content' => 'Cada torneo en GameTex puede tener diferentes formatos competitivos. Algunos torneos se juegan en un sistema de eliminación directa, mientras que otros adoptan un formato de liga, donde los jugadores suman puntos a lo largo de varias rondas. Dependiendo del evento, las partidas pueden ser en solitario o en equipos, con diferentes tipos de reglas y estrategias involucradas. Es esencial que leas las reglas del torneo específico para comprender el formato y estar listo para cada desafío.'],
                        ['title' => 'Transmisión en Vivo', 'content' => 'En GameTex, muchos de nuestros torneos se transmiten en vivo a través de plataformas de streaming, como Twitch y YouTube, para que puedas seguir la acción en tiempo real. Estas transmisiones permiten que los espectadores disfruten del evento desde cualquier lugar, mientras comentan y celebran junto a los jugadores. Además, algunos torneos cuentan con comentarios en vivo, entrevistas con jugadores y análisis detallados de las partidas, lo que hace que la experiencia sea aún más emocionante. ¡No te pierdas ni un segundo de la acción!'],
                        ['title' => 'Comunidad de Jugadores', 'content' => 'Participar en nuestros torneos te brinda la oportunidad de conectar con otros jugadores que comparten tus mismos intereses. La comunidad de GameTex es activa y vibrante, y participar en eventos te permite hacer nuevos amigos, formar equipos y mejorar tus habilidades. Ya sea que estés buscando un compañero de equipo o simplemente desees intercambiar estrategias, los torneos son la forma perfecta de integrarte y formar parte de esta gran familia gamer. ¡Te esperamos en nuestros eventos para que crezcas y disfrutes!'],
                        ['title' => 'Normas y Condiciones', 'content' => 'Es fundamental familiarizarse con las normas y condiciones de participación en nuestros torneos para garantizar una experiencia justa y profesional. Cada torneo tiene su propio conjunto de reglas, que cubren desde el formato de juego hasta el comportamiento esperado de los jugadores. Asegúrate de leer detenidamente las condiciones antes de registrarte para evitar malentendidos o descalificaciones. Además, respetar estas normas no solo mejora la calidad de los torneos, sino que asegura que todos los participantes disfruten de un ambiente competitivo y respetuoso.']
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
@endsection
