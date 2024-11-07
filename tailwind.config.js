import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#3490dc',
                secondary: '#6c757d',
                success: '#38c172',
                danger: '#e3342f',
            },
            spacing: {
                128: '32rem',
                144: '36rem',
            },
            boxShadow: {
                'outline': '0 0 0 3px rgba(66, 153, 225, 0.5)',
            },
        },
    },

    plugins: [forms],
};
