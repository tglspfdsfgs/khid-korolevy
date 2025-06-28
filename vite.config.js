import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/text-editor.js",
                "resources/js/gallery-editor.js",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
