@extends('layouts.layout')

@section('contenido')
<main class="bg-gray-700 text-white p-8">
    <div class="max-w-6xl mx-auto p-6 bg-gray-900 rounded-lg shadow-lg">
        <div class="mb-10">
            <h2 class="text-3xl font-bold text-white mb-4 text-center">Políticas de Reembolsos de GameTex</h2>
            <p class="text-lg leading-relaxed text-center">
                En GameTex, nos esforzamos por ofrecer la mejor experiencia posible a nuestros usuarios. Sin embargo, entendemos que pueden surgir situaciones en las que necesites solicitar un reembolso. A continuación, te presentamos nuestras políticas de reembolsos, que explican los casos en los que se pueden otorgar reembolsos y el proceso a seguir.
            </p>
        </div>

        <article class="space-y-8">
            <!-- Condiciones para Solicitar un Reembolso -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">1. Condiciones para Solicitar un Reembolso</h3>
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
                    <p class="text-gray-300">Los reembolsos se otorgarán en las siguientes circunstancias:</p>
                    <ul class="list-disc pl-6 mt-2 text-gray-300">
                        <li><strong>Errores en la compra:</strong> Si has adquirido un producto por error, como seleccionar el juego incorrecto o comprar dos veces el mismo producto.</li>
                        <li><strong>Problemas técnicos:</strong> Si el juego que has comprado presenta fallos técnicos que no se pueden solucionar y que impiden su uso.</li>
                        <li><strong>No activación del producto:</strong> Si la clave de activación del videojuego no funciona y no has utilizado el producto.</li>
                    </ul>
                </div>
            </div>

            <!-- Excepciones a la Política de Reembolsos -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">2. Excepciones a la Política de Reembolsos</h3>
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
                    <p class="text-gray-300">No se otorgarán reembolsos en los siguientes casos:</p>
                    <ul class="list-disc pl-6 mt-2 text-gray-300">
                        <li><strong>Cambio de opinión:</strong> Si decides que ya no deseas el producto después de haberlo comprado.</li>
                        <li><strong>Uso del producto:</strong> Si has utilizado el producto (por ejemplo, si has activado la clave del videojuego).</li>
                        <li><strong>Productos en oferta:</strong> Los artículos comprados durante promociones especiales o en oferta pueden no ser elegibles para reembolso.</li>
                    </ul>
                </div>
            </div>

            <!-- Proceso para Solicitar un Reembolso -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">3. Proceso para Solicitar un Reembolso</h3>
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
                    <p class="text-gray-300">Si cumples con las condiciones para un reembolso, sigue estos pasos:</p>
                    <ol class="list-decimal pl-6 mt-2 text-gray-300">
                        <li><strong>Contacto:</strong> Envía un correo electrónico a nuestro equipo de soporte a soporte@gametex.com con el asunto "Solicitud de Reembolso".</li>
                        <li><strong>Información necesaria:</strong> Incluye la siguiente información en tu correo:</li>
                        <ul class="list-disc pl-6 mt-2 text-gray-300">
                            <li>Tu nombre completo y dirección de correo electrónico registrada en GameTex.</li>
                            <li>El número de pedido o la clave del producto.</li>
                            <li>Una descripción del motivo de la solicitud de reembolso.</li>
                        </ul>
                        <li><strong>Evaluación:</strong> Nuestro equipo revisará tu solicitud y se comunicará contigo dentro de un plazo de 5 a 7 días hábiles.</li>
                    </ol>
                </div>
            </div>

            <!-- Tiempo de Procesamiento -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">4. Tiempo de Procesamiento</h3>
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
                    <p class="text-gray-300">Si se aprueba tu solicitud de reembolso, el proceso puede tardar de 5 a 10 días hábiles en completarse. Los reembolsos se emitirán a través del mismo método de pago utilizado para la compra original.</p>
                </div>
            </div>

            <!-- Cambios en la Política de Reembolsos -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">5. Cambios en la Política de Reembolsos</h3>
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
                    <p class="text-gray-300">GameTex se reserva el derecho de modificar estas políticas de reembolsos en cualquier momento. Te notificaremos sobre cambios significativos a través de nuestra plataforma o por correo electrónico. Te recomendamos revisar esta política periódicamente para estar al tanto de cualquier modificación.</p>
                </div>
            </div>

            <!-- Contacto -->
            <div x-data="{ open: false }" class="bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">6. Contacto</h3>
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
                    <p class="text-gray-300">Si tienes preguntas o inquietudes sobre nuestra política de reembolsos, no dudes en contactarnos a través de nuestro correo electrónico de soporte: soporte@gametex.com.</p>
                </div>
            </div>
        </article>
    </div>
</main>
@endsection
