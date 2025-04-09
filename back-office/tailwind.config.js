// filepath: c:\xampp\htdocs\back-office\back-office\tailwind.config.js
import forms from '@tailwindcss/forms';

export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.jsx',
    ],
    theme: {
        extend: {},
    },
    plugins: [
        forms,
    ],
};