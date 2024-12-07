@extends('layouts.layout')

@section('contenido')
    <main class="bg-gray-700 text-white p-8">
        <div class="max-w-6xl mx-auto p-6 bg-gray-900 rounded-lg shadow-lg">
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-white mb-4">Acerca de GameTex: Donde los Gamers Compiten y Ganan Recompensas</h2>
                <p class="text-lg leading-relaxed">
                    GameTex es la plataforma definitiva para gamers de todas las edades y niveles. Aquí encontrarás una amplia gama de torneos, eventos únicos, y desafíos diseñados para ofrecerte no solo diversión, sino también increíbles recompensas. Únete a nuestra comunidad y lleva tu experiencia de juego al siguiente nivel.
                </p>
            </div>

            <article class="space-y-8">
                @php
                    $sections = [
                        [
                            'title' => '¿Quiénes somos?',
                            'content' => 'GameTex combina la pasión por los videojuegos y la competencia para crear una plataforma única donde cada jugador puede encontrar su lugar. Con una visión clara, buscamos ofrecer oportunidades tanto a gamers ocasionales como a los más experimentados. Creemos que los videojuegos no son solo entretenimiento, sino también un medio para conectar personas, fomentar la creatividad y desarrollar habilidades. Nuestro equipo está formado por entusiastas del gaming que trabajan para brindarte experiencias inolvidables en cada torneo, construyendo una comunidad vibrante y diversa.'
                        ],
                        [
                            'title' => 'Nuestra misión: Competencia justa y gratificante',
                            'content' => 'En GameTex, creemos firmemente en recompensar la habilidad y el esfuerzo de cada jugador. Nuestra misión es crear un entorno donde todos puedan competir en igualdad de condiciones, disfrutando de experiencias emocionantes y gratificantes. Desde principiantes hasta jugadores avanzados, cada torneo está diseñado para destacar lo mejor de tu talento. Además, nos esforzamos por garantizar que las recompensas reflejen el compromiso y la dedicación de nuestra comunidad, ofreciendo premios tangibles que hacen la diferencia.'
                        ],
                        [
                            'title' => 'Nuestra visión: Construir la comunidad de gamers más grande y unida',
                            'content' => 'Nuestra visión es ir más allá de ser una simple plataforma de torneos; queremos ser el hogar de la comunidad gamer más inclusiva y dinámica. Creemos que los videojuegos tienen el poder de unir personas de diferentes lugares y culturas, fomentando el respeto y la amistad. En GameTex, trabajamos para construir un espacio donde cada jugador se sienta valorado, donde las experiencias compartidas y la pasión por los videojuegos fortalezcan los lazos entre los miembros de nuestra comunidad.'
                        ],
                        [
                            'title' => 'Torneos para todos los niveles',
                            'content' => 'En GameTex, todos los jugadores tienen un lugar, sin importar su nivel de experiencia. Organizamos torneos diseñados específicamente para principiantes que buscan mejorar y aprender, así como competiciones de alto nivel para los expertos que desean poner a prueba sus habilidades. Ya sea un evento casual o un torneo competitivo con grandes premios, siempre encontrarás un desafío que se adapte a ti. Nuestra meta es que cada participante disfrute, crezca y sienta la emoción de competir.'
                        ],
                        [
                            'title' => 'Recompensas que hacen la diferencia',
                            'content' => 'Sabemos que la dedicación merece ser recompensada. En GameTex, ofrecemos premios que van más allá de lo común: desde dinero en efectivo hasta artículos exclusivos como hardware gamer y productos tecnológicos. Nuestros torneos están diseñados para que cada victoria tenga un impacto tangible en tu experiencia como jugador. Además, continuamente buscamos nuevas formas de innovar en nuestras recompensas, asegurándonos de que sean tan emocionantes como los desafíos que enfrentas en cada partida.'
                        ],
                        [
                            'title' => 'Seguridad y juego justo',
                            'content' => 'En GameTex, la seguridad y la transparencia son pilares fundamentales. Implementamos tecnologías avanzadas para garantizar que cada torneo se desarrolle de manera justa y sin inconvenientes. Nuestro sistema protege a los jugadores contra el fraude y promueve un entorno competitivo saludable. Además, contamos con un equipo de soporte dedicado a resolver cualquier problema rápidamente, porque queremos que disfrutes de la experiencia sin preocupaciones. Aquí, todos tienen la misma oportunidad de destacar.'
                        ],
                        [
                            'title' => 'Únete a GameTex',
                            'content' => 'GameTex es más que una plataforma; es una comunidad que celebra la pasión por los videojuegos. Únete para descubrir un mundo de oportunidades donde puedes competir, ganar recompensas y conectar con otros gamers apasionados. Ya sea que busques divertirte, mejorar tus habilidades o convertirte en un jugador profesional, aquí encontrarás el apoyo y los recursos necesarios para alcanzar tus metas. ¡La arena te espera, y estamos emocionados de que formes parte de nuestra familia gamer!'
                        ],
                    ];
                @endphp

                @foreach ($sections as $section)
                    <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-lg">
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

                        <div x-show="open" x-transition class="mt-4 text-gray-300">
                            <p>{{ $section['content'] }}</p>
                        </div>
                    </div>
                @endforeach
            </article>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
