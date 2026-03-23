<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('css/img/logo_curso.svg') }}" alt="Logo" style="max-width: 200px; margin: 0 auto;">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Antes de prosseguirmos, você poderia verificar seu endereço de e-mail clicando no link que acabamos de enviar para você? Caso não tenha recebido o e-mail, teremos prazer em enviar outro.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Um novo link de verificação foi enviado para o endereço de e-mail que você forneceu em suas configurações de perfil.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Reenviar Email de Verificação') }}
                    </x-jet-button>
                </div>
            </form>

            <div>
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    {{ __('Editar Perfil') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
                        {{ __('Sair') }}
                    </button>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
