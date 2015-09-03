var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.copy('resources/assets/js/jquery-1.11.3.js', 'public/assets/js/jquery-1.11.3.js');
    mix.copy('resources/assets/js/bootstrap.min.js', 'public/assets/js/bootstrap.min.js');
    mix.copy('resources/assets/js/summernote.min.js', 'public/assets/js/summernote.min.js');
    mix.copy('resources/assets/js/ng-infinite-scroll.js', 'public/assets/js/ng-infinite-scroll.js');
    mix.copy('resources/assets/js/custom.js', 'public/assets/js/custom.js');

    mix.copy('resources/assets/css/bootstrap.min.css', 'public/assets/css/bootstrap.min.css');
    mix.copy('resources/assets/css/bootstrap-theme.min.css', 'public/assets/css/bootstrap-theme.min.css');
    mix.copy('resources/assets/css/summernote.css', 'public/assets/css/summernote.css');
    mix.copy('resources/assets/css/summernote.css', 'public/assets/css/summernote-bs2.css');
    mix.copy('resources/assets/css/summernote.css', 'public/assets/css/summernote-bs3.css');
    mix.copy('resources/assets/css/custom.css', 'public/assets/css/custom.css');
    mix.copy('resources/assets/css/dashboard.css', 'public/assets/css/dashboard.css');


    mix.copy('resources/assets/fonts/glyphicons-halflings-regular.eot', 'public/assets/fonts/glyphicons-halflings-regular.eot');
    mix.copy('resources/assets/fonts/glyphicons-halflings-regular.svg', 'public/assets/fonts/glyphicons-halflings-regular.svg');
    mix.copy('resources/assets/fonts/glyphicons-halflings-regular.ttf', 'public/assets/fonts/glyphicons-halflings-regular.ttf');
    mix.copy('resources/assets/fonts/glyphicons-halflings-regular.woff', 'public/assets/fonts/glyphicons-halflings-regular.woff');
    mix.copy('resources/assets/fonts/glyphicons-halflings-regular.woff2', 'public/assets/fonts/glyphicons-halflings-regular.woff2');
});
