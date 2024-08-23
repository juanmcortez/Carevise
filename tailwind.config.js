import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        colors: {
            'dark': '#022B3A',
            'light': '#FFFFFF',
            'primary': '#E1E5F2',
            'secondary': '#BFDBF7',
            'accent': '#1F7A8C',
            'info': '#1CA3C4',
            'info-darker': '#0D4A59',
            'success': '#7BC950',
            'success-darker': '#457D26',
            'warning': '#FFA630',
            'warning-darker': '#B86800',
            'danger': '#a30500',
            'danger-darker': '#3D0200',
        },
        fontFamily: {
            sans: ['Poppins', ...defaultTheme.fontFamily.sans],
        },
    },
    plugins: [
        forms,
    ],
};
