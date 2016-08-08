var Elixir = require('laravel-elixir');
require('laravel-elixir-webpack-ex');
var path = require('path');

Elixir.extend('bower', function (config, plugins) {
  var self = this;
  var tasks = plugins.map(function (plugin) {
    self.mixins.copy(path.join(config.in, plugin.in), path.join(config.out, plugin.out))
  });
});

Elixir.extend('vue', function (config, entries) {
  var self = this;
  self.mixins.webpack(
    entries,
    require('./webpack.config.js'),
    config.out,
    config.in
  );
});