import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                'marfim': '#F8F5F0',
                'ardosia': '#2F2F30',
                'terracota': '#D97B5D', 
                'verde-oliva': '#7A8C6D',
                'ouro': '#C49A4A',
            },
        },
    },

    plugins: [forms, require("daisyui")],
};
