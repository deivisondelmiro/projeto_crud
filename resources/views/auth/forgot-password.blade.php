<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('css/img/logo_curso.svg') }}" alt="Logo" style="max-width: 200px; margin: 0 auto;">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um link para redefinição de senha, que permitirá que você escolha uma nova.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Voltar para o login') }}
                </a>
                <x-jet-button>
                    {{ __('Redefinir Senha') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
