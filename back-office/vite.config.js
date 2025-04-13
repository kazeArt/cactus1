import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';  // React plugin for JSX support
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.jsx', // This should be your main entry file for React
        'resources/css/app.css', // Include app.css for any global styles
        'resources/css/styles.css',
      ],
    }),
    react(),  // React plugin for JSX support
  ],
});
