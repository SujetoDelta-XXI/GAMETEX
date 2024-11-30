<!-- resources/views/admin/dashboard.blade.php -->
<x-app-layout>
    <div class="flex">
        <div class="antialiased bg-black w-full min-h-screen text-slate-300 relative py-4">
            <div class="grid grid-cols-12 mx-auto gap-2 sm:gap-4 md:gap-6 lg:gap-10 xl:gap-14 max-w-7xl my-10 px-2">
                <div id="menu" class="bg-white/10 col-span-3 rounded-lg p-4 ">
                    <h1
                        class="font-bold text-lg lg:text-3xl bg-gradient-to-br from-white via-white/50 to-transparent bg-clip-text text-transparent">
                        Dashboard<span class="text-indigo-400">.</span></h1>
                    <p class="text-slate-400 text-sm mb-2">Welcome back,</p>
                    <a href="#"
                        class="flex flex-col space-y-2 md:space-y-0 md:flex-row mb-5 items-center md:space-x-2 hover:bg-white/10 group transition duration-150 ease-linear rounded-lg group w-full py-3 px-2">
                        <div>
                            <img class="rounded-full w-10 h-10 relative object-cover"
                                src="https://img.freepik.com/free-photo/no-problem-concept-bearded-man-makes-okay-gesture-has-everything-control-all-fine-gesture-wears-spectacles-jumper-poses-against-pink-wall-says-i-got-this-guarantees-something_273609-42817.jpg?w=1800&t=st=1669749937~exp=1669750537~hmac=4c5ab249387d44d91df18065e1e33956daab805bee4638c7fdbf83c73d62f125"
                                alt="">
                        </div>
                        <div>
                            <p class="font-medium group-hover:text-indigo-400 leading-4">Carlos Asparrin</p>
                            <span class="text-xs text-slate-400">Gamer de Shooter</span>
                        </div>
                    </a>
                    <hr class="my-2 border-slate-700">
                    <div id="menu" class="flex flex-col space-y-2 my-5">
                        <a href="#"
                            class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                            <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 8.25a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 19.5v-.75a5.25 5.25 0 015.25-5.25h4.5a5.25 5.25 0 015.25 5.25v.75" />
                                    </svg>
                                </div>
                                <div>
                                    <p
                                        class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                        Perfil</p>
                                    <p class="text-slate-400 text-sm hidden md:block">Información</p>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('users-torneos') }}"
                            class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                            <div class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 3.75h3.75c.621 0 1.125.504 1.125 1.125v6.375a1.125 1.125 0 01-1.125 1.125H16.5M7.5 3.75H3.75c-.621 0-1.125.504-1.125 1.125v6.375c0 .621.504 1.125 1.125 1.125H7.5m0 0v4.5m0-4.5h9m0 0v4.5m0 0h-9m0 0V21h9v-4.5" />
                                    </svg>
                                </div>
                                <div>
                                    <p
                                        class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                        Torneos
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('users-eventos') }}"
                            class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                            <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.375.375 0 01.683 0l2.08 4.214a.375.375 0 00.282.205l4.595.668a.375.375 0 01.208.639l-3.326 3.24a.375.375 0 00-.108.332l.785 4.577a.375.375 0 01-.544.395L12 15.854l-4.105 2.158a.375.375 0 01-.544-.395l.785-4.577a.375.375 0 00-.108-.332L4.702 9.226a.375.375 0 01.208-.639l4.595-.668a.375.375 0 00.282-.205l2.08-4.214z" />
                                    </svg>
                                </div>
                                <div>
                                    <p
                                        class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                        Eventos
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('users-recompensas') }}"
                            class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                            <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 8.25v13.5m0-13.5H8.25A2.25 2.25 0 116 6a2.25 2.25 0 012.25 2.25M12 8.25h3.75A2.25 2.25 0 1016 6a2.25 2.25 0 00-2.25 2.25M21 12.75v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18.75v-6m18 0v-3a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9.75v3m18 0H3" />
                                    </svg>
                                </div>
                                <div>
                                    <p
                                        class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                        Recompensas
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#"
                            class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                            <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p
                                        class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                        Cerrar Sesión
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <p class="text-sm text-center text-gray-600">v2.0.0.3 | &copy; 2022 Pantazi Soft</p>
                </div>
                
                <div id="content" class="bg-white/10 col-span-9 rounded-lg p-6">
                    @yield('content-user')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>