<div class="bg-gray-900 flex justify-center items-center h-screen">
    <div class="w-1/2 h-full hidden lg:block md:block sm:block xs:block">
        <img src="{{ asset('login_register_imagen.jpg') }}" alt="Placeholder Image"
            class="object-cover w-full h-full">
    </div>

    <div {{ $attributes->merge(['class' => "lg:p-36 md:w-1/2 sm:p-20 p-8 w-full lg:w-1/2 h-full" . $class]) }}>
        <div class="flex flex-col items-center pr-5 pb-2">
            {{ $logo }}
        </div>
        <h1 class="pr-7 text-2xl font-semibold mb-4 text-center text-white">
            {{ $titulo }}
        </h1>
        <div class="w-full text-white sm:max-w-md mt-6 px-6 py-4 bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

</div>
