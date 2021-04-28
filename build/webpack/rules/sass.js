const ExtractTextPlugin = require("extract-text-webpack-plugin")
const config = require('../config')
const path = require('path')

module.exports = {
    test: /\.scss$/,
    include: config.paths.assets,
    use: ExtractTextPlugin.extract({
        fallback: 'style-loader',
        //resolve-url-loader may be chained before sass-loader if necessary
        use: [
            {
                loader: 'css-loader',
                options: {
                    sourceMap: false
                }
            },
            {
                loader: 'resolve-url-loader'
            },
            {
                loader: 'sass-loader',
                options: {
                    sourceMap: true,
                    'includePaths': [
                        path.resolve(__dirname, '../../node_modules/bootstrap-sass/assets/stylesheets/'),
                        path.resolve(__dirname, '../../node_modules/mdbootstrap/sass/')
                    ]
                }
            }
        ]
    })
}
