import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/Carevise.css',
                'resources/js/Carevise.js',
            ],
            refresh: true,
        }),
    ],
});
