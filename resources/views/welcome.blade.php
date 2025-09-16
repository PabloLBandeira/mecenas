<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body class="bg-marfim text-marfim flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/home') }}"
                            class="inline-block px-5 py-1.5 bg-verde-oliva border border-verde-oliva hover:border-ardosia font-bold rounded-sm text-sm leading-normal"
                        >
                            Home
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 bg-verde-oliva border border-verde-oliva hover:border-ardosia font-bold rounded-sm text-sm leading-normal"
                        >
                            Entrar
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 bg-verde-oliva border border-verde-oliva hover:border-ardosia font-bold rounded-sm text-sm leading-normal">
                                Cadastrar
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
                <div class="text-xl leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-verde-oliva text-marfim shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                    <h1 class="mb-1 font-bold text-2xl">Onde mora a arte</h1><br>
                    <p class="mb-2 text-marfim">Mecenas é o espaço que conecta artistas e amantes da arte. Aqui,criadores podem compartilhar suas obras e histórias, enquanto admiradores encontram o lugar certo para realizar seus desejos artísticos.</p><br>
                    
                    <span class="font-bold">Descubra. Apoie. Inspire-se.</span> 
                </div>
                
                <div class="relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">

                    <img src="{{ asset('images/logo-mecenas-terracota.png') }}" alt="Logo">

                    <div class="absolute inset-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"></div>
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
