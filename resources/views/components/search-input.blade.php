@props(['value' => ''])

<div class="relative flex items-center">
    <!-- Ícone de lupa -->
    <div class="absolute left-3 z-10">
        <svg class="h-5 w-5 text-ardosia" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </div>
    
    <!-- Barra vertical separadora -->
    <div class="absolute left-10 h-5 w-px bg-ardosia opacity-40"></div>
    
    <!-- Input de pesquisa -->
    <input
        type="search"
        {{ $attributes->merge(['class' => 'w-full pl-14 pr-4 py-2 border-verde-oliva bg-marfim text-ardosia focus:border-verde-oliva focus:ring-verde-oliva rounded-md shadow-sm']) }}
        value="{{ $value }}"
        placeholder="{{ $attributes->get('placeholder', 'Pesquisar...') }}"
    >
</div>