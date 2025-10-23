import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#1E88E5',       // Azul Profundo
                secondary: '#8BC34A',     // Verde Lima
                background: '#121212',     // Negro Suave
                surface: '#1E1E1E',        // Gris Oscuro
                text: '#E0E0E0',           // Blanco
                textSecondary: '#B0BEC5', // Gris Claro
                linkHover: '#03A9F4',     // Azul Claro
            },
        },
    },
    plugins: [],
};