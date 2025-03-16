import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '127.0.0.1', // Force to use IPv4 loopback address instead of IPv6 (::1)
        port: 3000,        // You can change this to another port if needed, e.g., 5174
    }
});
