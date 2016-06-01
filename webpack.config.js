var webpack = require('webpack');

module.exports = {
    entry: {
        'index': __dirname + '/assets/js/src/index',
        vendor: ['jquery', 'bootstrap']
    },
    output: {
        path: __dirname + '/assets/js/build/',
        filename: '[name].js'
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin("vendor", "vendor.bundle.js"),
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery"
        }),
        new webpack.optimize.UglifyJsPlugin({
            compress: {
                warnings: false
            }
        })
    ],
    module: {
        loaders: [
            { test: /\.js$/, exclude: /node_modules/, loader: "babel-loader" }
        ],
    },
};
