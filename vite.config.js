import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
            output: 'public/dist',
        }),
    ],
    build: {
        outDir: "public/dist", // Pastikan output directory adalah public/dist
    },
});
