var elixir = require('laravel-elixir');
var gulp = require('gulp');
var composer = require('gulp-composer');
var bower = require('gulp-bower');
require('laravel-elixir-browser-sync');
var paths = {
    "assets": "./resources/assets/",
    "jquery": "./vendor/bower_components/jquery/",
    "bootstrap": "./vendor/bower_components/bootstrap-sass/assets/",
    //"highlightjs": "./vendor/bower_components/highlightjs/",
    "fontawesome": "./vendor/bower_components/font-awesome/"
}

elixir.extend("composer", function () {
    gulp.task('composer', function () {
        return composer({cwd: './', bin: 'composer'});
    });
    return this.queueTask("composer");
});
elixir.extend("bower", function () {
    gulp.task('bower', function () {
        return bower({ cmd: 'install'});
    });
    return this.queueTask("bower");
});

elixir(function (mix) {
    mix
        .bower()
        .browserSync([
            'app/**/*',
            'public/**/*',
            'resources/views/**/*'
        ], {
            proxy: 'homestead.app',
            reloadDelay: 2000
        })
        //.copy(paths.highlightjs + "styles/solarized_dark.css", paths.assets + "sass/solarized_dark.scss")
        .sass("app.scss", "public/css/", {
            includePaths: [
                paths.bootstrap + 'stylesheets/',
                paths.fontawesome + 'scss/'
            ]
        })
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            //paths.highlightjs + "highlight.pack.js",
            //paths.assets + "js/libraries/jquery.backstretch.min.js",
            paths.assets + "js/app.js"
        ], "public/js/app.js", "./")
        .version(["public/css/app.css", "public/js/app.js"])
        .copy(paths.bootstrap + "fonts/bootstrap/**", "public/fonts")
        .copy(paths.fontawesome + "fonts/**", "public/fonts")
        .composer()
        .phpUnit()
        .phpSpec();
});
