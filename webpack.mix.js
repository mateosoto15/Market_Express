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

mix.js('resources/js/app.js', 'public/js')
	.js('resources/js/panelApp.js', 'public/js')
	.js('resources/js/dataTables.js', 'public/js')
	.js('resources/js/summerNotes.js', 'public/js')
	.js('resources/js/dateTimePicker.js', 'public/js')
	.js('resources/js/select2.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/app_profile.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);
