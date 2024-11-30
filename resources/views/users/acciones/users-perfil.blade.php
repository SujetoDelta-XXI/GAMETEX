@extends('users.dashboard')
@section('content-user')
    <div class="bg-gray-500 rounded-lg shadow-xl pb-8">
        <div class="w-full h-[150px]">
            <img src="{{ asset('gifs/Fondo1.gif') }}"
                class="w-full h-full rounded-tl-lg rounded-tr-lg">
        </div>
        <div class="flex flex-col items-center -mt-20">
            <img src="{{ asset('usuarios_img/gaming.gif') }}"
                class="w-40 border-4 border-white rounded-full">
            <div class="flex items-center space-x-2 mt-2">
                <p class="text-2xl text-white">SujetoDelta</p>
            </div>
            <p class="text-black">Carlos Alfonso Asparrin Martin</p>
        </div>
    </div>

    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
        <div class="w-full flex flex-col 2xl:w-1/2">
            <div class="flex-1 rounded-lg shadow-xl p-8 bg-gray-500">
                <h4 class="text-xl text-gray-900 font-bold">Información Personal</h4>
                <ul class="mt-2 text-black">
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Nombre:</span>
                        <span class="text-gray-100">Carlos Alfonso Asparrin Martin</span>
                    </li>
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Correo Electrónico:</span>
                        <span class="text-gray-100">carlos123@gmail.com</span>
                    </li>
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Fecha de creación de cuenta:</span>
                        <span class="text-gray-100">12/11/2024</span>
                    </li>
                    <li class="flex flex-col border-b py-2">
                        <span class="font-bold">Estado:</span>
                        <div class="text-gray-100 flex items-center space-x-2 p-1 px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="20" height="20">
                                <path d="M50 10a40 40 0 1 1 0 80a40 40 0 1 1 0-80" fill="green" />
                            </svg>
                            <span>Activo</span>
                        </div>
                    </li>
                    <br>
                    <button type="button"
                        class="border py-2 px-3 flex items-center text-sm font-medium text-center text-black bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                clip-rule="evenodd" />
                        </svg>
                        Editar
                    </button>
                </ul>
            </div>
        </div>
        <div class="flex flex-col w-full 2xl:w-2/3">
            <div class="flex-1 bg-gray-500 rounded-lg shadow-xl p-8">
                <h4 class="text-xl text-gray-900 font-bold">Descripción</h4>
                <p class="mt-2 text-gray-100">
                    Carlos "XtremeGamer" Rodríguez: Jugador competitivo y streamer, experto en Fortnite, LoL y Call of
                    Duty, siempre buscando nuevas estrategias.
                </p>
            </div>
        </div>
    </div>

    <script>
        const DATA_SET_VERTICAL_BAR_CHART_1 = [68.106, 26.762, 94.255, 72.021, 74.082, 64.923, 85.565, 32.432, 54.664,
            87.654, 43.013, 91.443
        ];

        const labels_vertical_bar_chart = ['January', 'February', 'Mart', 'April', 'May', 'Jun', 'July', 'August',
            'September', 'October', 'November', 'December'
        ];

        const dataVerticalBarChart = {
            labels: labels_vertical_bar_chart,
            datasets: [{
                label: 'Revenue',
                data: DATA_SET_VERTICAL_BAR_CHART_1,
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
            }]
        };
        const configVerticalBarChart = {
            type: 'bar',
            data: dataVerticalBarChart,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Last 12 Months'
                    }
                }
            },
        };

        var verticalBarChart = new Chart(
            document.getElementById('verticalBarChart'),
            configVerticalBarChart
        );
    </script>
@endsection
