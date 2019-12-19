const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/users/app.js', 'public/js')
    .js('resources/js/placeAutocomplete.js', 'public/js')
    .sass('resources/sass/users/app.scss', 'public/css')
    .js('resources/js/admins/app.js', 'public/admins/js')
    .sass('resources/sass/admins/app.scss', 'public/admins/css')
    .copyDirectory('node_modules/admin-lte/dist/img', 'public/admins/img');
