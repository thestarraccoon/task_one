import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vitePluginRequire from "vite-plugin-require";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vitePluginRequire.default({
            // Настройки плагина, если они необходимы
        }),
    ],
});
