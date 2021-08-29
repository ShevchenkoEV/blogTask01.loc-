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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

// --- admin

mix.styles([
        'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',
        'resources/assets/admin/plugins/select2/css/select2.min.css',
        'resources/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
        'resources/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'resources/assets/admin/css/adminlte.min.css',
], 'public/assets/admin/css/admin.css');

mix.scripts([
        'resources/assets/admin/plugins/jquery/jquery.min.js',
        'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'resources/assets/admin/plugins/select2/js/select2.full.min.js',
        'resources/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.js',
        'resources/assets/admin/js/adminlte.min.js',
        'resources/assets/admin/js/demo.js',
], 'public/assets/admin/js/admin.js');

mix.copyDirectory('resources/assets/admin/img','public/assets/admin/img');
mix.copyDirectory('resources/assets/admin/plugins/fontawesome-free/webfonts','public/assets/admin/webfonts');

mix.copy('resources/assets/admin/css/adminlte.min.css.map','public/assets/admin/css/adminlte.min.css.map');
mix.copy('resources/assets/admin/js/adminlte.min.js.map', 'public/assets/admin/js/adminlte.min.js.map');

// --- front

mix.styles([
        'resources/assets/front/vendor/bootstrap/css/bootstrap.min.css',
        'resources/assets/front/css/fontawesome.css',
        'resources/assets/front/css/templatemo-stand-blog.css',
        'resources/assets/front/css/owl.css',
], 'public/assets/front/css/front.css');

mix.scripts([
        'resources/assets/front/vendor/jquery/jquery.min.js',
        'resources/assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js',
        'resources/assets/front/js/custom.js',
        'resources/assets/front/js/owl.js',
        'resources/assets/front/js/slick.js',
        'resources/assets/front/js/isotope.js',
        'resources/assets/front/js/accordions.js',
], 'public/assets/front/js/front.js');


mix.copy('resources/assets/front/vendor/bootstrap/css/bootstrap.min.css.map', 'public/assets/front/css/bootstrap.min.css.map');
mix.copy('resources/assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js.map', 'public/assets/front/js/bootstrap.bundle.min.js.map');

mix.copyDirectory('resources/assets/front/fonts','public/assets/front/fonts');
mix.copyDirectory('resources/assets/front/images','public/assets/front/images');
