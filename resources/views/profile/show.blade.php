<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form', ['user' => $user])

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form', ['user' => $user])
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form', ['user' => $user])
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form', ['user' => $user])
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form', ['user' => $user])
                </div>
            @endif

            <!-- Mostrar foto de perfil -->
            @if (isset($message))
                <div class="text-red-600">{{ $message }}</div>
            @else
                <div class="mt-10 sm:mt-0 text-center">
                    <img src="{{ $user->profile_photo_url }}" alt="Foto de Perfil" class="rounded-full w-32 h-32 object-cover mx-auto">
                    <h4 class="font-semibold mt-4">{{ $user->name }}</h4>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
            @endif

            <!-- Información específica según el rol -->
            @if(Auth::guard('admin')->check())
                <div class="mt-10 sm:mt-0">
                    <h3 class="text-lg font-medium text-gray-900">Admin Information</h3>
                    <p>Información específica para administradores.</p>
                </div>
            @elseif(Auth::guard('moder')->check())
                <div class="mt-10 sm:mt-0">
                    <h3 class="text-lg font-medium text-gray-900">Moder Information</h3>
                    <p>Información específica para moderadores.</p>
                </div>
            @elseif(Auth::guard('user')->check())
                <div class="mt-10 sm:mt-0">
                    <h3 class="text-lg font-medium text-gray-900">User Information</h3>
                    <p>Información específica para usuarios.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
