import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    /*
    server: {
        host: 'hq.tenant',       // a Vite-szerver hostname-je
        port: 5174,
        strictPort: true,        // ha foglalt, inkább hibázzon
        origin: 'http://hq.tenant:5174', // <- HMR és asset-URL-ekhez
        hmr: {
            host: 'hq.tenant',
            port: 5174,
        },
        cors: {
            origin: ['http://hq.tenant'],  // böngésző felől engedett origin
        },
    },
    */
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
