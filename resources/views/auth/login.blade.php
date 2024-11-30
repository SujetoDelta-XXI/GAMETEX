<x-guest-layout>
    <x-authentication-card class="mb-[100px]">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>
        <x-slot name="titulo">
            Iniciar Sesión
        </x-slot>

        {{-- Mostrar errores de validación --}}
        <x-validation-errors class="mb-4" />

        {{-- Mostrar mensaje de estado si existe --}}
        @if (session('error'))
            <div class="mb-4 font-medium text-sm text-red-600">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Campo para el email --}}
            <div>
                <x-label for="email" class="text-white" value="{{ __('Correo Electrónico') }}" />
                <x-input id="email" class="block mt-1 w-full text-black" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            {{-- Campo para la contraseña --}}
            <div class="mt-4">
                <x-label for="password" class="text-white" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full text-black" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            {{-- Recordarme --}}
            <div class="block mt-4">
                @if (Route::has('password.request'))
                    <a class="text-white underline text-s hover:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>

            {{-- Botón de enviar --}}
            <div class="flex items-center justify-end mt-4 text-white hover:text-gray-400">
                <a href="{{ route('register') }}">
                    {{ __('¿No tienes una cuenta?') }}
                </a>

                <x-button class="ms-4 bg-gray-900 hover:bg-black">
                    {{ __('Iniciar Sesión') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
