const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/front/css/all.min.css',
    
    'resources/front/css/bootstrap.min.css',
    'resources/front/css/font-awesome.min.css',
    'resources/front/css/animate.css',
    'resources/front/css/font.css',
    'resources/front/css/li-scroller.css',
    'resources/front/css/slick.css',
    'resources/front/css/jquery.fancybox.css',
    'resources/front/css/theme.css',
    
    'resources/front/css/select2.min.css',
    'resources/front/css/select2-bootstrap4.min.css',
    'resources/front/css/style.css',
], 'public/front/css/style.css');


mix.scripts([
    'resources/front/js/jquery.min.js',
    'resources/front/js/select2.full.min.js',
    'resources/front/js/wow.min.js',
    'resources/front/js/bootstrap.min.js',
    'resources/front/js/slick.min.js',
    'resources/front/js/jquery.li-scroller.1.0.js',
    'resources/front/js/jquery.newsTicker.min.js',
    'resources/front/js/jquery.fancybox.pack.js',
    'resources/front/js/custom.js',
    'resources/front/js/app.js',
    'resources/front/js/script.js',
], 'public/front/js/app.js');

mix.copyDirectory('resources/front/img', 'public/front/img');
mix.copyDirectory('resources/front/css/images', 'public/front/css/images');
mix.copyDirectory('resources/front/fonts', 'public/front/fonts');