const { mix } = require('laravel-mix');

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
mix
    .copy('./resources/assets/img', './public/images', false)
    .js('./resources/assets/js/dashboard.js', './public/js')
    .js('./resources/assets/js/maps.js', './public/js')
    .sass('./resources/assets/sass/dashboard.scss', './public/css')
    .version();
