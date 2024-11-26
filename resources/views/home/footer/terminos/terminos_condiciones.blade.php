@extends('layouts.layout')

@section('contenido')
<main class="bg-gray-700 text-white p-8">
    <div class="max-w-6xl mx-auto p-6 bg-gray-900 rounded-lg shadow-lg">
        <div class="mb-10">
            <h2 class="text-3xl font-bold text-white mb-4 text-center">Términos y Condiciones de GameTex</h2>
            <p class="text-lg leading-relaxed text-center">
                Bienvenido a GameTex. Al acceder y utilizar nuestra plataforma, aceptas cumplir con los siguientes términos y condiciones. Si no estás de acuerdo con estos términos, te invitamos a no utilizar nuestros servicios.
            </p>
        </div>

        <article class="space-y-8">
            <!-- Aceptación de los Términos -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">1. Aceptación de los Términos</h3>
                <p class="text-gray-300">Al registrarte y utilizar GameTex, confirmas que tienes al menos 18 años o que tienes el consentimiento de un padre o tutor legal para hacerlo. Al usar nuestros servicios, aceptas todos los términos establecidos en este documento.</p>
            </div>

            <!-- Modificación de los Términos -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">2. Modificación de los Términos</h3>
                <p class="text-gray-300">GameTex se reserva el derecho de modificar estos términos y condiciones en cualquier momento. Cualquier cambio será notificado a los usuarios a través de nuestra plataforma o por correo electrónico. Es tu responsabilidad revisar periódicamente estos términos para estar al tanto de cualquier modificación.</p>
            </div>

            <!-- Registro y Cuenta -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">3. Registro y Cuenta</h3>
                <p class="text-gray-300">Para utilizar ciertas funciones de GameTex, debes crear una cuenta. Eres responsable de mantener la confidencialidad de tus credenciales de inicio de sesión y de todas las actividades que ocurran bajo tu cuenta. Si sospechas de cualquier uso no autorizado de tu cuenta, debes notificarnos de inmediato.</p>
            </div>

            <!-- Uso de la Plataforma -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">4. Uso de la Plataforma</h3>
                <p class="text-gray-300">Te comprometes a utilizar GameTex de manera legal y ética. No puedes:</p>
                <ul class="list-disc pl-6 mt-2 text-gray-300">
                    <li>Utilizar la plataforma para actividades ilegales o fraudulentas.</li>
                    <li>Interferir en el funcionamiento de la plataforma o dañar la experiencia de otros usuarios.</li>
                    <li>Compartir tu cuenta con otros o utilizar cuentas de otros usuarios sin su permiso.</li>
                </ul>
            </div>

            <!-- Contenido de Usuario -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">5. Contenido de Usuario</h3>
                <p class="text-gray-300">Eres responsable del contenido que publiques en GameTex, incluyendo comentarios, mensajes y cualquier otro material. Al publicar contenido, otorgas a GameTex una licencia no exclusiva, mundial y libre de regalías para usar, modificar y distribuir dicho contenido en relación con nuestros servicios.</p>
            </div>

            <!-- Propiedad Intelectual -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">6. Propiedad Intelectual</h3>
                <p class="text-gray-300">Todos los derechos de propiedad intelectual en GameTex, incluyendo pero no limitado a, marcas registradas, derechos de autor y patentes, son propiedad de GameTex o de sus respectivos propietarios. No puedes utilizar ningún contenido de GameTex sin nuestro permiso explícito.</p>
            </div>

            <!-- Limitación de Responsabilidad -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">7. Limitación de Responsabilidad</h3>
                <p class="text-gray-300">GameTex no será responsable de ningún daño directo, indirecto, incidental, especial o consecuente que resulte del uso o la imposibilidad de uso de nuestra plataforma. Esto incluye, entre otros, daños por pérdida de datos o beneficios, o debido a interrupciones en el servicio.</p>
            </div>

            <!-- Indemnización -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">8. Indemnización</h3>
                <p class="text-gray-300">Aceptas indemnizar y mantener indemne a GameTex, sus directores, empleados y agentes de cualquier reclamo, pérdida, responsabilidad, daño, costo o gasto (incluidos honorarios legales) que surjan de tu uso de la plataforma o de tu incumplimiento de estos términos.</p>
            </div>

            <!-- Ley Aplicable -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">9. Ley Aplicable</h3>
                <p class="text-gray-300">Estos términos y condiciones se rigen por las leyes del país donde opera GameTex, sin considerar sus principios de conflictos de leyes. Cualquier disputa que surja en relación con estos términos se resolverá en los tribunales competentes de dicho país.</p>
            </div>

            <!-- Contacto -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">10. Contacto</h3>
                <p class="text-gray-300">Si tienes preguntas o inquietudes sobre estos términos y condiciones, no dudes en contactarnos a través de nuestro correo electrónico de soporte: soporte@gametex.com.</p>
            </div>
        </article>
    </div>
</main>
@endsection
