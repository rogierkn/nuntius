const {mix} = require('laravel-mix');
const WebpackShellPlugin = require('webpack-shell-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
    plugins: [
        new WebpackShellPlugin({onBuildEnd: ['php ../../artisan vendor:publish --tag=public --force'], dev: false})
    ]
});

mix.js('./src/resources/assets/development/js/app.js', './src/resources/assets/public/js')
    .sass('./src/resources/assets/development/css/app.scss', './src/resources/assets/public/css');
