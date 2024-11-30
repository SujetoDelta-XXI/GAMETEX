@extends('users.dashboard')
@section('content-user')
    <div id="24h">
        <h1 class="font-bold py-4 uppercase">Torneos Activos</h1>
        <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($torneos as $torneo)
                <div class="px-0 py-4 md:w-full sm:mb-0 mb-6 group relative w-full sm:w-full lg:w-full"
                    data-game="{{ $torneo->torneoJuego->nombre }}">
                    <div
                        class="rounded-lg h-96 overflow-hidden relative border-4 border-solid border-transparent hover:border-gray-300 hover:ring-2 hover:ring-opacity-60 hover:ring-gray-500 transition-all duration-300 ease-in-out">
                        <img alt="content"
                            class="object-cover object-center h-full w-full transition duration-300 ease-in-out group-hover:brightness-50"
                            src="{{ $torneo->imagen }}">
                        <div
                            class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out px-5">
                            <ul>
                                <h3 class="text-lg font-semibold">{{ $torneo->torneoJuego->nombre }}</h3><br>
                                <li>{{ $torneo->descripcion }}</li><br>
                                <li>Moderador: {{ $torneo->moderador->name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="last-incomes">
        <h1 class="font-bold py-4 uppercase">Torneos Terminados</h1>
        <div id="stats" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <div class="bg-black/60 to-white/5 rounded-lg">
                <div class="flex flex-row items-center">
                    <div class="text-3xl p-4">💰</div>
                    <div class="p-2">
                        <p class="text-xl font-bold">348$</p>
                        <p class="text-gray-500 font-medium">Amber Gates</p>
                        <p class="text-gray-500 text-sm">24 Nov 2022</p>
                    </div>
                </div>
                <div class="border-t border-white/5 p-4">
                    <a href="#" class="inline-flex space-x-2 items-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <span>Info</span>
                    </a>
                </div>
            </div>
            <div class="bg-black/60 to-white/5 rounded-lg">
                <div class="flex flex-row items-center">
                    <div class="text-3xl p-4">💰</div>
                    <div class="p-2">
                        <p class="text-xl font-bold">68$</p>
                        <p class="text-gray-500 font-medium">Maia Kipper</p>
                        <p class="text-gray-500 text-sm">23 Nov 2022</p>
                    </div>
                </div>
                <div class="border-t border-white/5 p-4">
                    <a href="#" class="inline-flex space-x-2 items-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <span>Info</span>
                    </a>
                </div>
            </div>
            <div class="bg-black/60 to-white/5 rounded-lg">
                <div class="flex flex-row items-center">
                    <div class="text-3xl p-4">💰</div>
                    <div class="p-2">
                        <p class="text-xl font-bold">12$</p>
                        <p class="text-gray-500 font-medium">Oprah Milles</p>
                        <p class="text-gray-500 text-sm">23 Nov 2022</p>
                    </div>
                </div>
                <div class="border-t border-white/5 p-4">
                    <a href="#" class="inline-flex space-x-2 items-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <span>Info</span>
                    </a>
                </div>
            </div>
            <div class="bg-black/60 to-white/5 rounded-lg">
                <div class="flex flex-row items-center">
                    <div class="text-3xl p-4">💰</div>
                    <div class="p-2">
                        <p class="text-xl font-bold">105$</p>
                        <p class="text-gray-500 font-medium">Jonny Nite</p>
                        <p class="text-gray-500 text-sm">23 Nov 2022</p>
                    </div>
                </div>
                <div class="border-t border-white/5 p-4">
                    <a href="#" class="inline-flex space-x-2 items-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <span>Info</span>
                    </a>
                </div>
            </div>
            <div class="bg-black/60 to-white/5 rounded-lg">
                <div class="flex flex-row items-center">
                    <div class="text-3xl p-4">💰</div>
                    <div class="p-2">
                        <p class="text-xl font-bold">52$</p>
                        <p class="text-gray-500 font-medium">Megane Baile</p>
                        <p class="text-gray-500 text-sm">22 Nov 2022</p>
                    </div>
                </div>
                <div class="border-t border-white/5 p-4">
                    <a href="#" class="inline-flex space-x-2 items-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <span>Info</span>
                    </a>
                </div>
            </div>
            <div class="bg-black/60 to-white/5 rounded-lg">
                <div class="flex flex-row items-center">
                    <div class="text-3xl p-4">💰</div>
                    <div class="p-2">
                        <p class="text-xl font-bold">28$</p>
                        <p class="text-gray-500 font-medium">Tony Ankel</p>
                        <p class="text-gray-500 text-sm">22 Nov 2022</p>
                    </div>
                </div>
                <div class="border-t border-white/5 p-4">
                    <a href="#" class="inline-flex space-x-2 items-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <span>Info</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
