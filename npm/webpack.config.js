var path = require('path');

module.exports = {
  resolve: {
    root: path.resolve('./')
  },
  module: {
    loaders: [{
      test: /\.vue$/,
      loader: 'vue'
    }, {
      test: /\.js$/,
      loader: 'babel',
      query: {
        presets: ['es2015'],
        compact: false
      }
    }]
  }
};