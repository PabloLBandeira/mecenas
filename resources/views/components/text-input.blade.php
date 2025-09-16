@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-marfim bg-marfim text-ardosia focus:border-terracota focus:ring-terracota  rounded-md shadow-sm']) }}>
