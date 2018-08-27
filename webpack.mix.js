let mix = require('laravel-mix');

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
mix.styles([
    'resources/assets/styles/vendor/font-awesome.css',
    'resources/assets/styles/vendor/themify-icons.css',
    'resources/assets/custom.css',
    
], 'public/css/all.css')

mix.js('resources/assets/scripts/index.js', 'public/js')
    .sass('resources/assets/styles/index.scss', 'public/css');

