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
                'rsud-blue': '#044f86',
                'rsud-blue-light': '#346b9b',
                // 'sidebar-dark' Anda adalah putih, jadi mungkin tidak perlu,
                // tapi jika ingin, bisa ditambahkan:
                'sidebar-bg': '#ffffff', 
            }
        },
    },

    plugins: [forms],
};
