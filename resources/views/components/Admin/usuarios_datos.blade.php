<div id="drawer-read-product-advanced"
    class=" overflow-y-auto fixed top-0 left-0 z-40 p-4 w-full max-w-lg h-screen bg-white transition-transform -translate-x-full dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <div>
        <h4 id="read-drawer-label" class="mb-1.5 leading-none text-xl font-semibold text-gray-900 dark:text-white">
            {{ $name }}
        </h4>
        <h5 class="mb-5 text-xl font-bold text-gray-900 dark:text-white">{{ $email }}</h5>
    </div>
    <button type="button" data-drawer-dismiss="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="grid grid-cols-3 gap-4 mb-4 sm:mb-5">
        <div class="p-2 w-auto bg-gray-100 rounded-lg dark:bg-gray-700">
            <img src="{{ asset('usuarios_img/gaming.gif') }}" alt="iMac Side Image">
        </div>
    </div>
    <dl class="sm:mb-5">
        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Descripción</dt>
        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
            {{ $descripcion }}
        </dd>
    </dl>
    <dl class="grid grid-cols-2 gap-4 mb-4">
        <div
            class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Actividad</dt>
            <dd class="flex items-center text-gray-500 dark:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6 pr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                20 horas
            </dd>
        </div>
        <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Estado</dt>
            <dd class="text-gray-500 dark:text-gray-400">
                <span class="flex items-center text-gray-500 dark:text-gray-400">
                    {{ $estado }}
                </span>
            </dd>
        </div>
        <div
            class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Fecha de Creación</dt>
            <dd class="flex items-center text-gray-500 dark:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6 pr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2zm0 4h10" />
                </svg>
                {{ $f_cre }}
            </dd>
        </div>
        <div
            class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Fecha de actualización</dt>
            <dd class="flex items-center text-gray-500 dark:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6 pr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2zm0 4h10" />
                </svg>
                {{ $f_actu }}
            </dd>
        </div>
    </dl>
</div>
