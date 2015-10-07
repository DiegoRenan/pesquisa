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

    mix.scripts([
        'jquery-1.11.3.js',
        'bootstrap.min.js',
        'summernote.min.js',
        //'custom.js'  
    ], 'public/assets/js/app.js');

   // mix.copy('node_modules/vue/dist/vue.min.js', 'public/assets/js/vue.min.js');
    //mix.copy('node_modules/vue-resource/dist/vue-resource.min.js', 'public/assets/js/vue-resource.min.js');
    mix.copy('resources/assets/js/custom.js', 'public/assets/js/custom.js');

    mix.styles([
        'bootstrap.min.css',
        'bootstrap-theme.min.css',
        '../../../node_modules/font-awesome/css/font-awesome.css',
        'summernote.css'
    ], 'public/assets/css/app.css');

    /*CSS for blog*/
    mix.styles([
        'timeline.css',
        'blog.css',
    ], 'public/assets/css/blog.css');

    /*CSS for researcher dashboard*/
    //mix.copy('resources/assets/css/dashboard.css', 'public/assets/css/dashboard.css');

    //mix.copy('resources/assets/fonts', 'public/assets/fonts');
    //mix.copy('node_modules/font-awesome/fonts', 'public/assets/fonts');
});
