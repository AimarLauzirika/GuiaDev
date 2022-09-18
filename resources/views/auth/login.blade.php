<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
            <h1 class="text-3xl font-bold text-slate-800">Iniciar Sesión</h1>
        </x-slot>

        {{-- <x-jet-validation-errors class="mb-4" /> --}}

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="username" value="{{ __('Nombre de usuario') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" autocomplete="off" autofocus />
                <x-jet-input-error for="username" class="mt-1"></x-jet-input-error>
            </div>
            
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"  autocomplete="current-password" />
                <x-jet-input-error for="password" class="mt-1"></x-jet-input-error>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('register'))
                    <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('¿No tienes una cuenta? Créalo aquí') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
