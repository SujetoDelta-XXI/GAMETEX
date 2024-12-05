<tr class="usuario-row border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <div class="flex items-center mr-3">
            <img src="{{ asset('usuarios_img/gaming.gif') }}" alt="iMac Front Image" class="h-8 w-auto mr-3">
            {{ $name }}
        </div>
    </th>
    <td class="px-4 py-3">
        <span class="bg-primary-100 text-primary-800 text-x1 font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
            {{ $email }}
        </span>
    </td>
    <td class="px-4 py-3">
        <span class="bg-primary-100 text-primary-800 text-x1 font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
            5
        </span>
    </td>
    <td class="px-4 py-3">
        <span class="bg-primary-100 text-primary-800 text-x1 font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
            2
        </span>
    </td>
    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <div class="flex items-center">
            {{ $f_cre }}
        </div>
    </td>
    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-gray-400">
        <div class="flex">
            {{ $estado }}
        </div>
    </td>
    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <div class="flex items-center space-x-4">
            <button data-email="{{ $email }}" type="button" data-drawer-target="drawer-read-product-advanced"
                data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced"
                class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-900 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-900 dark:focus:ring-gray-900 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                </svg>
                Visualizar
            </button>
            <button type="button" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                class="flex items-center text-yellow-700 hover:text-white border border-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:hover:bg-yellow-600 dark:focus:ring-yellow-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                Suspender
            </button>
            <button type="button" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-600 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                Eliminar
            </button>
        </div>
    </td>
</tr>
