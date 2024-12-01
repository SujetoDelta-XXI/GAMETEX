<!-- resources/views/admin/dashboard.blade.php -->
<x-app-layout>
    <div class="flex">
        <div class="antialiased bg-black w-full min-h-screen text-slate-300 relative py-4">
            <div class="grid grid-cols-12 mx-auto gap-2 sm:gap-4 md:gap-6 lg:gap-10 xl:gap-14 max-w-7xl my-10 px-2">
                <div id="menu" class="bg-white/10 col-span-3 rounded-lg p-4 ">
                    <div id="menu" class="flex flex-col space-y-2 my-5">
                        <a href="{{ '/' }}"
                            class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                            <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-6 w-6">
                                        <path
                                            d="M3 9L12 2L21 9V20C21 20.553 20.553 21 20 21H4C3.447 21 3 20.553 3 20V9Z">
                                        </path>
                                        <path d="M9 21V12H15V21"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p
                                        class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                        Inicio</p>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('users-torneos') }}"
                            class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                            <div
                                class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 group-hover:text-indigo-400">
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
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 group-hover:text-indigo-400">
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
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 group-hover:text-indigo-400">
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
