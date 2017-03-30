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

mix.styles([
    'bower_components/jquery/dist/jquery.min.js',
    'bower_components/bootstrap/dist/js/bootstrap.min.js',
    // 'node_modules/jquery.mmenu/dist/js/jquery.mmenu.min.js',
    // 'bower_components/slick-carousel/slick/slick.js',
], 'public/js/core.js')
    .styles([
        'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'bower_components/font-awesome/css/font-awesome.min.css',
        // 'node_modules/jquery.mmenu/dist/css/jquery.mmenu.all.css',
    ], 'public/css/app.css')
    .copy([
        'bower_components/bootstrap/fonts/**',
        'bower_components/font-awesome/fonts/**'
    ], 'public/fonts')
    .sass('resources/assets/sass/frontend.scss', 'public/css').options({processCssUrls: false})
    .styles([
        'resources/assets/js/scripts.js'
    ], 'public/js/scripts.js')
