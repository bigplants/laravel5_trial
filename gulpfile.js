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

elixir(function (mix) {
    mix.sass('app.scss')
        .copy(
        'vendor/bower_components/jquery/dist/jquery.min.js',
        'public/js/vendor/jquery.js'
    )
        .copy(
        'vendor/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        'public/js/vendor/bootstrap.js'
    )
        .copy(
        'vendor/bower_components/font-awesome/css/font-awesome.min.css',
        'public/css/vendor/font-awesome.css'
    )
        .copy(
        'vendor/bower_components/font-awesome/fonts',
        'public/fonts'
    )
        .copy(
        'vendor/bower_components/angular/angular.min.js',
        'public/js/vendor/angular.js'
    );
});
