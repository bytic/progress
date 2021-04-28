
const path = require("path");
const merge = require("webpack-merge");

// const config = require("../config/app")
const config = {};

module.exports = merge({
    assets: {
        "frontend": [
            "./resources/assets/scripts/frontend.js",
            "./resources/assets/sass/frontend.scss"
        ],
        "admin/bundle": [
            "./vendor/bytic/admin-base/src/themes/bootstrap4/assets/scripts/admin.js",
            "./vendor/bytic/admin-base/src/themes/bootstrap4/assets/sass/admin.scss"
        ]
    },

    /**
     * Project paths.
     *
     * @type {Object}
     */
    paths: {
        root: path.resolve(__dirname, "../../"),
        public: path.resolve(__dirname, "../../dist"),
        sass: path.resolve(__dirname, "../../sass"),
        fonts: path.resolve(__dirname, "../../fonts"),
        images: path.resolve(__dirname, "../../images"),
        javascript: path.resolve(__dirname, "../../js"),
        relative: "../",
        external: /node_modules|bower_components/
    },

    /**
     * List of filename schemas for different
     * application assets.
     *
     * @type {Object}
     */
    outputs: {
        publicPath: "/dist/assets",
        css: {filename: "css/[name].css"},
        font: {filename: "fonts/[name].[ext]"},
        image: {filename: "images/[name].[ext]"},
        javascript: {filename: "js/[name].js"}
    },

    /**
     * Settings of other build features.
     *
     * @type {Object}
     */
    settings: {
        sourceMaps: true,
        styleLint: true,
        browserSync: {
            host: "localhost",
            port: 3000,
            proxy: "http://localhost:8080/"
        }
    }
}, config);
