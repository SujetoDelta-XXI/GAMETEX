@extends('layouts.layout')

@section('contenido')
    <main class="max-w-6xl mx-auto rounded-lg shadow-lg bg-gray-900 text-white p-8">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-center mb-4">Medios de Pago en GameTex: Flexibilidad y Comodidad para los
                Gamers</h2>
            <p class="text-lg text-center">En GameTex, queremos que participar en torneos y eventos sea una experiencia
                sencilla y accesible para todos los jugadores. Por eso, ofrecemos varios medios de pago para que puedas
                elegir la opción que mejor se adapte a tus necesidades. Actualmente, aceptamos tres métodos de pago seguros
                y populares: Yape, PagoEfectivo y PayPal.</p>
        </div>
        <article class="space-y-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold text-purple-500">1. Yape</h3>
                <ul class="list-disc pl-6 mt-2">
                    <li><strong>Descripción:</strong> Yape es una aplicación de pagos móviles ampliamente utilizada en Perú.
                        Permite realizar transferencias rápidas y seguras usando solo el número de teléfono del
                        destinatario.</li>
                    <li><strong>Ventajas:</strong>
                        <ul class="list-inside">
                            <li><strong>Transferencias instantáneas:</strong> Los depósitos se procesan al instante,
                                permitiéndote ingresar dinero rápidamente para participar en tus torneos sin demoras.</li>
                            <li><strong>Facilidad de uso:</strong> Solo necesitas el número de teléfono para hacer una
                                transferencia, lo que hace el proceso más accesible y cómodo para usuarios que prefieren
                                métodos simples.</li>
                            <li><strong>Sin necesidad de tarjeta bancaria:</strong> Puedes realizar depósitos sin usar
                                tarjetas de crédito o débito, ideal para quienes prefieren pagos móviles directos.</li>
                        </ul>
                    </li>
                    <li><strong>Moneda:</strong> Soles (PEN).</li>
                </ul>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold text-yellow-400">2. PagoEfectivo</h3>
                <ul class="list-disc pl-6 mt-2">
                    <li><strong>Descripción:</strong> PagoEfectivo es una solución de pago que permite realizar abonos en
                        efectivo a través de bancos y agentes autorizados. Al seleccionar este método, el usuario genera un
                        "Código de Pago" para completar la transacción.</li>
                    <li><strong>Ventajas:</strong>
                        <ul class="list-inside">
                            <li><strong>Accesible sin tarjeta:</strong> Ideal para quienes no utilizan tarjetas bancarias,
                                ya que permite pagar en efectivo a través de agentes autorizados.</li>
                            <li><strong>Ampliamente disponible:</strong> Puedes usar PagoEfectivo en diversas cadenas de
                                tiendas y bancos, lo que lo hace conveniente para jugadores de distintas regiones.</li>
                            <li><strong>Seguridad en cada transacción:</strong> Garantiza la seguridad de tus pagos en
                                efectivo, brindando un proceso claro y confiable para los jugadores que prefieren no usar
                                métodos bancarios.</li>
                        </ul>
                    </li>
                    <li><strong>Moneda:</strong> Soles (PEN).</li>
                </ul>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold text-blue-500">3. PayPal</h3>
                <ul class="list-disc pl-6 mt-2">
                    <li><strong>Descripción:</strong> PayPal es uno de los métodos de pago más utilizados globalmente.
                        Permite realizar pagos seguros utilizando tarjetas de crédito, débito o saldo disponible en la
                        cuenta PayPal.</li>
                    <li><strong>Ventajas:</strong>
                        <ul class="list-inside">
                            <li><strong>Pagos internacionales:</strong> Ideal para jugadores fuera de Perú, ya que PayPal
                                admite múltiples monedas y facilita el acceso a torneos internacionales de GameTex.</li>
                            <li><strong>Protección al comprador:</strong> Ofrece una capa adicional de seguridad en tus
                                pagos, protegiendo a los jugadores de posibles fraudes en transacciones en línea.</li>
                            <li><strong>Accesibilidad global:</strong> Permite a los jugadores de todo el mundo ingresar
                                dinero en su cuenta de GameTex y participar en torneos de manera rápida y eficiente.</li>
                        </ul>
                    </li>
                    <li><strong>Moneda:</strong> Soles (PEN).</li>
                </ul>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold text-white">Comodidad y Seguridad para Todos los Gamers</h3>
                <p>En GameTex, sabemos que participar en los torneos debe ser una experiencia rápida y sin complicaciones.
                    Con nuestros métodos de pago, puedes ingresar dinero de forma segura y empezar a competir en el momento
                    que lo desees. Ya sea utilizando Yape, PagoEfectivo o PayPal, tendrás siempre la flexibilidad y
                    confianza necesarias para disfrutar al máximo de los eventos en nuestra plataforma.</p>
            </div>
        </article>
    </main>
@endsection
