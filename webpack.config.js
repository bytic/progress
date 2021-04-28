// 'use strict';

// webpack.config.js
const webpack = require('webpack');
const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

const config = require("./build/webpack/config");

const fontsRule = require("./build/webpack/rules/fonts");
const sassRule = require("./build/webpack/rules/sass");
const lessRule = require("./build/webpack/rules/less");
const imagesRule = require("./build/webpack/rules/images");

module.exports = {
  entry: {
    'progress': [
      path.join(__dirname, '/resources/assets/scss/progress.scss')
    ],
  },

  /**
   * Output settings for application scripts.
   * @type {Object}
   */
  output: {
    path: config.paths.public,
    publicPath: config.outputs.publicPath,
    filename: config.outputs.javascript.filename,
    chunkFilename: '[name].js'
  },

  module: {
    rules: [
      lessRule,
      sassRule,
      fontsRule,
      imagesRule,
      {
        test: /\.css$/,
        use: ExtractTextPlugin.extract({
          use: [{
            loader: "css-loader",
            options: {importLoaders: 1},
          }],
        })
      }
    ],
  },

  plugins: [
    new ExtractTextPlugin(config.outputs.css),
  ],
  stats: "normal"
};
