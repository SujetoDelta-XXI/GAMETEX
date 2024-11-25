@extends('layouts.layout')

@section('contenido')
<main>
    <div>
        <h2>Categorías de Usuario en GameTex</h2>
        <p>En GameTex, reconocemos y valoramos el compromiso y la dedicación de nuestros jugadores. Para ello, hemos implementado un sistema de categorías que clasifica a los usuarios en función de su experiencia y logros en la plataforma. Las categorías son: Principiante, Veterano, Leyenda y Campeón. A continuación, te explicamos cada categoría, sus beneficios y los requisitos necesarios para alcanzarlas.</p>
    </div>
    <article>
        <div>
            <h3>1. Categoría: Principiante</h3>
            <div>
                <h4>Beneficios:</h4>
                <ul>
                    <li>Acceso a tutoriales y guías exclusivas para mejorar tus habilidades.</li>
                    <li>Participación en torneos exclusivos para principiantes.</li>
                    <li>Descuentos en la tienda para las primeras compras.</li>
                </ul>
            </div>
            <div>
                <h4>Requisitos:</h4>
                <ul>
                    <li>Tener menos de 50 horas de juego en cualquier título de la plataforma.</li>
                    <li>Completar al menos 3 tutoriales o eventos de introducción.</li>
                </ul>
            </div>
        </div>
        <div>
            <h3>2. Categoría: Veterano</h3>
            <div>
                <h4>Beneficios:</h4>
                <ul>
                    <li>Todos los beneficios de la categoría Principiante.</li>
                    <li>Acceso anticipado a nuevas funciones y títulos.</li>
                    <li>Oportunidades para participar en torneos de nivel intermedio.<li>
                    <li>Aumento en las recompensas por participar en eventos.</li>
                </ul>
            </div>
            <div>
                <h4>Requisitos:</h4>
                <ul>
                    <li>Tener entre 50 y 150 horas de juego.</li>
                    <li>Completar al menos 5 torneos o eventos de GameTex.</li>
                    <li>Obtener un mínimo de 500 puntos de experiencia.</li>
                </ul>
            </div>
        </div>
        <div>
            <h3>3. Categoría: Leyenda</h3>
            <div>
                <h4>Beneficios:</h4>
                <ul>
                    <li>Todos los beneficios de la categoría Veterano.</li>
                    <li>Acceso a contenido exclusivo, como skins, objetos y premios únicos.</li>
                    <li>Invitaciones a eventos especiales y torneos de alto nivel.<li>
                    <li>Aumento significativo en las recompensas por logros y participación.</li>
                </ul>
            </div>
            <div>
                <h4>Requisitos:</h4>
                <ul>
                    <li>Tener entre 150 y 300 horas de juego.</li>
                    <li>Completar al menos 10 torneos y obtener posiciones destacadas.</li>
                    <li>Obtener un mínimo de 1500 puntos de experiencia.</li>
                </ul>
            </div>
        </div>
        <div>
            <h3>4. Categoría: Campeón</h3>
            <div>
                <h4>Beneficios:</h4>
                <ul>
                    <li>Todos los beneficios de la categoría Leyenda.</li>
                    <li>Reconocimiento en la comunidad como jugador destacado.</li>
                    <li>Acceso a eventos VIP y torneos exclusivos.<li>
                    <li>Recompensas monetarias en competiciones y eventos.</li>
                    <li>Oportunidades para colaborar en eventos de GameTex y ser embajador de la plataforma.</li>
                </ul>
            </div>
            <div>
                <h4>Requisitos:</h4>
                <ul>
                    <li>Tener más de 300 horas de juego.<li>
                    <li>Completar al menos 20 torneos con posiciones de podio (1º, 2º o 3º lugar).</li>
                    <li>Obtener un mínimo de 3000 puntos de experiencia.</li>
                </ul>
            </div>
        </div>
    </article>
</main>
@endsection