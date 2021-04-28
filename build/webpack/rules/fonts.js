const config = require('../config');

module.exports = {
    test: /\.(woff2?|woff|ttf|eot|svg|otf)$/,
    loader: 'file-loader',
    options: {
        name: config.outputs.font.filename
    }
}
