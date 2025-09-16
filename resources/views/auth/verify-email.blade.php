<x-guest-layout>
    <div class="mb-4 text-sm text-marfim">
        {{ __('Obrigado por se cadastar! Antes de iniciar, poderia confirmar seu e-mail clicando no link que te enviamos? Se não recebeu, ficaremos felizes em enviar outro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Um novo link de confirmação foi enviado para o seu endereço de e-mail.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Reeviar link de verificação') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-marfim hover:text-ardosia">
                {{ __('Sair') }}
            </button>
        </form>
    </div>
</x-guest-layout>
