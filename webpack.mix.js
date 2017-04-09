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
    'bower_components/datatables.net/js/jquery.dataTables.min.js',
    'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
    'node_modules/jquery.mmenu/dist/js/jquery.mmenu.min.js',
    'bower_components/slick-carousel/slick/slick.js',
    'bower_components/summernote/dist/summernote.js',
    'bower_components/nivo-slider/jquery.nivo.slider.pack.js',
], 'public/js/core.js')
    .styles([
        'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
        'node_modules/jquery.mmenu/dist/css/jquery.mmenu.all.css',
        'bower_components/slick-carousel/slick/slick.css',
        'bower_components/summernote/dist/summernote.css',
        'bower_components/nivo-slider/nivo-slider.css'
    ], 'public/css/app.css')
    .copy([
        'bower_components/bootstrap/fonts/**',
        'bower_components/font-awesome/fonts/**'
    ], 'public/fonts')
    .copy([
        'bower_components/summernote/dist/font/**'
    ], 'public/css/font')
    .copy([
        'bower_components/AdminLTE/dist/css/AdminLTE.min.css',
        'bower_components/AdminLTE/dist/css/skins/skin-blue.min.css'
    ],'public/css')
    .copy([
        'bower_components/nivo-slider/themes',
    ],'public/css/themes',false)
    .copy('bower_components/AdminLTE/dist/js/app.min.js','public/js')
    .sass('resources/assets/sass/frontend.scss', 'public/css').options({processCssUrls: false})
    .sass('resources/assets/sass/backend.scss', 'public/css').options({processCssUrls: false})
    .sass('resources/assets/sass/login.scss','public/css').options({processCssUrls: false})
    .styles([
        'resources/assets/js/scripts.js'
    ], 'public/js/scripts.js')
    .styles([
        'resources/assets/js/login.js'
    ], 'public/js/login.js')
    .styles([
        'resources/assets/js/be-sanpham.js',
        'resources/assets/js/be-slider.js',
        'resources/assets/js/be-trang.js'
    ], 'public/js/backend.js')
