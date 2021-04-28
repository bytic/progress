const config = require('../config');

module.exports = {
    test: /\.(png|jpe?g|gif)$/,
    loader: 'file-loader',
    options: {
        name: config.outputs.image.filename
    }
}
