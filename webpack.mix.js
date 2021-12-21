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

mix.styles([
    'resources/front/css/bootstrap.css',
    'resources/front/css/main.css'
], 'public/css/styles.css');


mix.scripts([
    'resources/front/js/jquery-3.5.0.min.js',
    'resources/front/js/bootstrap.js',
    'resources/front/js/myscripts.js'
], 'public/js/scripts.js');


mix.copyDirectory('resources/front/images', 'public/images');


mix.browserSync('laravel-wfm-2020/');
