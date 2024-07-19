import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { glob } from 'glob';

function GetFilesArray(query) {
    return glob.sync(query);
}

const cssFiles = GetFilesArray('resources/css/**/*.css');
const jsFiles = GetFilesArray('resources/js/**/*.js');

export default defineConfig({
    plugins: [
        laravel(
        //     {
        //     input: ['resources/css/app.css', 'resources/js/app.js'],
        //     refresh: true,
        // },
            {
            input: [
                ...cssFiles,
                ...jsFiles,
                 'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
