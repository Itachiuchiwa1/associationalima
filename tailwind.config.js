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
                'deme-dark': '#0f2955',
                'deme-cyan': '#3dd5d7',
                'deme-slate': '#f4f8fc',
            },
            boxShadow: {
                premium: '0 24px 80px rgba(15, 41, 85, 0.12)',
                soft: '0 24px 60px rgba(15, 41, 85, 0.08)',
            },
            borderRadius: {
                '4xl': '2rem',
            },
        },
    },

    plugins: [forms],
};
