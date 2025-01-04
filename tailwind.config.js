import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Use 'class' strategy for dark mode
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        "./node_modules/aos/dist/aos.css",
        "./node_modules/@fortawesome/fontawesome-free/**/*.css",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Raleway', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                gray: {
                    900: '#1a202c',
                    800: '#2d3748',
                    // Add other colors as needed
                },
            },
            transitionProperty: {
                width: 'width',
            },
            
        },
    },

    plugins: [forms],
};

