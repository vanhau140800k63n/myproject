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
    .js('resources/js/code-mirror.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/post_admin.js', 'public/js')
    .js('resources/js/post.js', 'public/js')
    .js('resources/js/game_editer.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/admin.css', 'public/css')
    .postCss('resources/css/user_detail.css', 'public/css')
    .copyDirectory('resources/js/assets', 'public/js/assets')
    .copyDirectory('resources/css/login', 'public/css/login')
    .copyDirectory('resources/fonts', 'public/fonts')
    .copyDirectory('resources/image', 'public/image')
    .copyDirectory('resources/img', 'public/img')
    .copyDirectory('resources/lib', 'public/lib')
mix.version();