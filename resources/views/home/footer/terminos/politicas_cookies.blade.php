@extends('layouts.layout')

@section('contenido')
<main class="bg-gray-700 text-white p-8">
    <div class="max-w-6xl mx-auto p-6 bg-gray-900 rounded-lg shadow-lg">
        <div class="mb-10">
            <h2 class="text-3xl font-bold text-white mb-4 text-center">Políticas de Cookies de GameTex</h2>
            <p class="text-lg leading-relaxed text-center">
                En GameTex, utilizamos cookies para mejorar tu experiencia en nuestra plataforma y proporcionar un servicio más personalizado. Esta política de cookies explica qué son las cookies, cómo las utilizamos y cómo puedes gestionarlas.
            </p>
        </div>

        <article class="space-y-8">
            <!-- ¿Qué son las cookies? -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">1. ¿Qué son las Cookies?</h3>
                <p class="text-gray-300">
                    Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo (ordenador, tablet o teléfono móvil) cuando visitas un sitio web. Estas cookies permiten que el sitio web reconozca tu dispositivo y registre información sobre tus preferencias o acciones pasadas.
                </p>
            </div>

            <!-- Tipos de cookies -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">2. Tipos de Cookies que Utilizamos</h3>
                <p class="text-gray-300">En GameTex, utilizamos diferentes tipos de cookies:</p>
                <ul class="list-disc pl-6 mt-2 text-gray-300">
                    <li><strong>Cookies Esenciales:</strong> Son necesarias para el funcionamiento básico de nuestra plataforma. Sin estas cookies, no podrías acceder a ciertas funcionalidades, como la creación de cuentas y la realización de compras.</li>
                    <li><strong>Cookies de Rendimiento:</strong> Estas cookies recopilan información sobre cómo los usuarios interactúan con nuestra plataforma, permitiéndonos mejorar su rendimiento y usabilidad. Por ejemplo, nos ayudan a entender qué secciones de la plataforma son más populares.</li>
                    <li><strong>Cookies de Funcionalidad:</strong> Estas cookies permiten que nuestro sitio web recuerde tus preferencias (como tu nombre de usuario y configuración de idioma) para mejorar tu experiencia de usuario.</li>
                    <li><strong>Cookies de Publicidad:</strong> Utilizamos estas cookies para mostrarte anuncios relevantes según tus intereses. También nos permiten medir la eficacia de nuestras campañas publicitarias.</li>
                </ul>
            </div>

            <!-- Uso de cookies -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">3. Uso de Cookies</h3>
                <p class="text-gray-300">Utilizamos cookies para:</p>
                <ul class="list-disc pl-6 mt-2 text-gray-300">
                    <li>Recopilar información sobre tus visitas y uso de la plataforma.</li>
                    <li>Mejorar la funcionalidad y rendimiento de nuestro sitio web.</li>
                    <li>Personalizar la experiencia de usuario y ofrecer contenido relevante.</li>
                    <li>Realizar análisis y estadísticas sobre el uso de la plataforma.</li>
                </ul>
            </div>

            <!-- Gestión de cookies -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">4. Gestión de Cookies</h3>
                <p class="text-gray-300">Puedes gestionar las cookies a través de la configuración de tu navegador. La mayoría de los navegadores permiten bloquear o eliminar cookies, así como configurar alertas para recibir notificaciones cuando se utilizan. Ten en cuenta que si decides desactivar las cookies, es posible que algunas funcionalidades de GameTex no estén disponibles.</p>
                <h4 class="text-lg font-semibold text-blue-400 mt-4">Instrucciones para gestionar cookies en los navegadores más comunes:</h4>
                <ul class="list-disc pl-6 mt-2 text-gray-300">
                    <li>Google Chrome: Configuración > Privacidad y seguridad > Cookies y otros datos de sitios.</li>
                    <li>Mozilla Firefox: Opciones > Privacidad y seguridad > Cookies y datos de sitios.</li>
                    <li>Microsoft Edge: Configuración > Cookies y permisos de sitio.</li>
                    <li>Safari: Preferencias > Privacidad > Cookies y datos de sitios web.</li>
                </ul>
            </div>

            <!-- Cambios en la política de cookies -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">5. Cambios en la Política de Cookies</h3>
                <p class="text-gray-300">GameTex se reserva el derecho de modificar esta política de cookies en cualquier momento. Cualquier cambio será notificado a los usuarios a través de nuestra plataforma o por correo electrónico. Te recomendamos revisar esta política periódicamente para estar al tanto de cómo utilizamos las cookies.</p>
            </div>

            <!-- Contacto -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">6. Contacto</h3>
                <p class="text-gray-300">Si tienes preguntas o inquietudes sobre nuestra política de cookies, no dudes en contactarnos a través de nuestro correo electrónico de soporte: soporte@gametex.com.</p>
            </div>
        </article>
    </div>
</main>
@endsection
