@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-marfim']) }}>
    {{ $value ?? $slot }}
</label>
