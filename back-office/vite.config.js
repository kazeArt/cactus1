// vite.config.js
import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react'; // Make sure you're using the React plugin
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.jsx',  // Updated to app.jsx
        'resources/css/app.css',
      ],
    }),
    react(),  // React plugin for JSX support
  ],
});
