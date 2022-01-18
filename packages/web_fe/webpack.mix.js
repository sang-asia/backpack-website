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

const minSuffix = mix.inProduction() ? '.min' : '';

mix.options({ processCssUrls: false })
    .ts('resources/scripts/bundle.ts', 'public/bundle' + minSuffix + '.js')
    .sass('resources/styles/style.scss', 'public/style' + minSuffix + '.css');
