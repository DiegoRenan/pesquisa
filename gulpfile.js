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
        '../../../node_modules/jquery-mask-plugin/dist/jquery.mask.js',
        '../../../node_modules/moment/moment.js',
        '../../../node_modules/vue/dist/vue.min.js',
        '../../../node_modules/vue-resource/dist/vue-resource.min.js'
    ], 'public/assets/js/app.js');

    mix.styles([
        'bootstrap.min.css',
        'bootstrap-theme.min.css',
        '../../../node_modules/font-awesome/css/font-awesome.css',
        'summernote.css',
    ], 'public/assets/css/app.css');

    mix.copy('resources/assets/fonts', 'public/assets/fonts');
    mix.copy('node_modules/font-awesome/fonts', 'public/assets/fonts');

/*for blog=======================================================================================================================*/
    mix.copy('resources/assets/js/custom.js', 'public/assets/js/custom.js');
    mix.styles([
        'timeline.css',
        'blog.css',
    ], 'public/assets/css/blog.css');

/*for researcher dashboard======================================================================================================*/
    mix.copy('resources/assets/js/project.js', 'public/assets/js/project.js');
    /*mix.copy('node_modules/blueimp-file-upload/js/vendor/jquery.ui.widget.js', 'public/assets/js/jquery.ui.widget.js');
    mix.copy('node_modules/blueimp-file-upload/js/jquery.fileupload.js', 'public/assets/js/jquery.fileupload.js');
    mix.copy('node_modules/blueimp-file-upload/css/jquery.fileupload.css', 'public/assets/css/jquery.fileupload.css');*/
    mix.styles([
        'dashboard.css',
    ], 'public/assets/css/dashboard.css');
});
