@extends('layouts.layout')

@section('contenido')
<main class="bg-gray-700 text-white p-8">
    <div class="max-w-6xl mx-auto p-6 bg-gray-900 rounded-lg shadow-lg">
        <div class="mb-10">
            <h2 class="text-3xl font-bold text-white mb-4 text-center">Políticas de Privacidad de GameTex</h2>
            <p class="text-lg leading-relaxed text-center">
                En GameTex, valoramos tu privacidad y estamos comprometidos a proteger la información personal que compartes con nosotros. Esta política de privacidad describe cómo recopilamos, utilizamos, y protegemos tus datos. Al utilizar nuestra plataforma, aceptas las prácticas descritas en esta política.
            </p>
        </div>

        <article class="space-y-8">
            <!-- Información que Recopilamos -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">1. Información que Recopilamos</h3>
                    <button class="text-white bg-blue-400 rounded-full p-2 focus:outline-none">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" x-transition class="text-gray-300">
                    <p class="text-gray-300">Recopilamos diferentes tipos de información cuando interactúas con nuestra plataforma, que incluye:</p>
                    <ul class="list-disc pl-6 mt-2 text-gray-300">
                        <li><strong>Información Personal:</strong> Al registrarte, es posible que solicitemos datos como tu nombre, dirección de correo electrónico, y detalles de pago.</li>
                        <li><strong>Información de Uso:</strong> Recopilamos información sobre cómo utilizas nuestra plataforma, incluidos los juegos que juegas, el tiempo que pasas en ellos y las interacciones dentro de la comunidad.</li>
                        <li><strong>Cookies y Tecnologías Similares:</strong> Utilizamos cookies para mejorar tu experiencia en nuestra plataforma y recopilar datos sobre el tráfico del sitio.</li>
                    </ul>
                </div>
            </div>

            <!-- Uso de la Información -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">2. Uso de la Información</h3>
                    <button class="text-white bg-blue-400 rounded-full p-2 focus:outline-none">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" x-transition class="text-gray-300">
                    <p class="text-gray-300">Utilizamos la información recopilada para diversos fines, incluyendo:</p>
                    <ul class="list-disc pl-6 mt-2 text-gray-300">
                        <li><strong>Mejorar nuestros servicios:</strong> Para personalizar y optimizar tu experiencia en GameTex.</li>
                        <li><strong>Comunicación:</strong> Para enviarte actualizaciones, promociones y notificaciones relevantes.</li>
                        <li><strong>Análisis:</strong> Para analizar el uso de nuestra plataforma y mejorar continuamente nuestros productos y servicios.</li>
                    </ul>
                </div>
            </div>

            <!-- Compartir Información -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">3. Compartir Información</h3>
                    <button class="text-white bg-blue-400 rounded-full p-2 focus:outline-none">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" x-transition class="text-gray-300">
                    <p class="text-gray-300">No vendemos ni alquilamos tu información personal a terceros. Sin embargo, podemos compartir tu información en las siguientes circunstancias:</p>
                    <ul class="list-disc pl-6 mt-2 text-gray-300">
                        <li><strong>Proveedores de Servicios:</strong> Podremos compartir información con terceros que nos ayuden a operar nuestra plataforma o proporcionar servicios, siempre que estén de acuerdo en mantener la confidencialidad de tu información.</li>
                        <li><strong>Cumplimiento Legal:</strong> Podemos divulgar tu información si así lo exige la ley o en respuesta a procesos legales.</li>
                    </ul>
                </div>
            </div>

            <!-- Seguridad de la Información -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">4. Seguridad de la Información</h3>
                    <button class="text-white bg-blue-400 rounded-full p-2 focus:outline-none">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" x-transition class="text-gray-300">
                    <p class="text-gray-300">Implementamos medidas de seguridad razonables para proteger tu información personal. Sin embargo, ten en cuenta que ninguna transmisión de datos a través de Internet es completamente segura. Hacemos nuestro mejor esfuerzo para proteger tus datos, pero no podemos garantizar su seguridad absoluta.</p>
                </div>
            </div>

            <!-- Tus Derechos -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">5. Tus Derechos</h3>
                    <button class="text-white bg-blue-400 rounded-full p-2 focus:outline-none">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" x-transition class="text-gray-300">
                    <p class="text-gray-300">Tienes derechos sobre tu información personal, incluyendo:</p>
                    <ul class="list-disc pl-6 mt-2 text-gray-300">
                        <li><strong>Acceso:</strong> Puedes solicitar acceso a la información personal que tenemos sobre ti.</li>
                        <li><strong>Corrección:</strong> Puedes solicitar la corrección de información incorrecta o incompleta.</li>
                        <li><strong>Eliminación:</strong> Tienes el derecho de solicitar la eliminación de tu información personal bajo ciertas circunstancias.</li>
                    </ul>
                </div>
            </div>

            <!-- Cambios en la Política de Privacidad -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">6. Cambios en la Política de Privacidad</h3>
                    <button class="text-white bg-blue-400 rounded-full p-2 focus:outline-none">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" x-transition class="text-gray-300">
                    <p class="text-gray-300">Podemos actualizar esta política de privacidad ocasionalmente. Te notificaremos sobre cambios significativos mediante un aviso en nuestra plataforma o a través de correo electrónico. Te recomendamos revisar esta política periódicamente para estar al tanto de cómo protegemos tu información.</p>
                </div>
            </div>

            <!-- Contacto -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">7. Contacto</h3>
                    <button class="text-white bg-blue-400 rounded-full p-2 focus:outline-none">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" x-transition class="text-gray-300">
                    <p class="text-gray-300">Si tienes preguntas o inquietudes sobre nuestras políticas de privacidad, no dudes en contactarnos a través de nuestro correo electrónico de soporte: soporte@gametex.com.</p>
                </div>
            </div>
        </article>
    </div>
</main>
@endsection
