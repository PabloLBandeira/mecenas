<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-marfim border border-transparent rounded-md font-semibold text-xs text-ardosia uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:outline-none focus:ring-2 focus:ring-terracota focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
