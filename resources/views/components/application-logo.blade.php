@props(['color' => 'ardosia'])

@if ($color === 'marfim')
     <img src="{{ asset('images/logo-mecenas-marfim.png') }}" alt="Logo Mecenas"
          {{$attributes->merge(['class' => 'w-16 h-16'])}}>

@elseif ($color === 'ardosia')
     <img src="{{ asset('images/logo-mecenas-ardosia.png') }}" alt="Logo Mecenas" 
     {{$attributes->merge(['class' => 'w-16 h-16'])}}>

@endif
     