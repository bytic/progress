const ExtractTextPlugin = require("extract-text-webpack-plugin")
const config = require('../config')
const path = require('path')

module.exports = {
    test: /\.less$/,
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
                loader: 'less-loader',
                options: {
                }
            }
        ]
    })
}
