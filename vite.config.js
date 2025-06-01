import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [

                'resources/css/dashboard.css',
                'resources/css/recipe-detail.css',
                'resources/css/recipes.css',
                'resources/css/timer.css',
                'resources/css/workout.css',
                'resources/js/timer.js',
                'resources/js/workout.js',

            ],
            refresh: true,
        }),
    ],
});
