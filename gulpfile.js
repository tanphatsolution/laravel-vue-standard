process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');
var vueify = require('vueify');
var path = require('path');
var plugins = require('./npm/plugins');
var config = require('./npm/config');
require('./npm/elixir.extensions');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix
    .copy(config.paths.plugins.img.in, config.paths.plugins.img.out)
    .bower(config.paths.plugins.bower, plugins.bower)
    .vue(config.paths.plugins.vue, plugins.vue)
    .sass('backend/*.scss','public/assets/css/backend/app.css')
    .styles([
        '../bower/sweetalert/dist/sweetalert.css',
        '../bower/animate.css/animate.min.css',
        '../bower/toastr/toastr.min.css',
        '../bower/bootstrap-toggle/css/bootstrap-toggle.min.css',
        ], 'public/assets/css/backend/plugins.css')
    .scripts([
	    'laroute.js',
	    'backend.js',
        '../bower/AdminLTE/dist/js/app.min.js',
	    '../bower/jquery-slimscroll/jquery.slimscroll.min.js',
        '../bower/sweetalert/dist/sweetalert.min.js',
        '../bower/toastr/toastr.min.js',
        '../bower/bootstrap-toggle/js/bootstrap-toggle.min.js',
	  ],'public/assets/js/backend/app.js')
    .version([
        'assets/css/backend/app.css',
        'assets/js/backend/app.js',
        'assets/vue/backend/app.js',
    	])
    .browserSync({
        proxy: 'gos.dev'
      });
});
