const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

module.exports = (env = {}) => {
  const { mode = 'development' }  = env;
  const isDev = env.mode === 'development';
  const isProd = env.mode === 'production';

  return {
    mode: isProd ? 'production' : 'development',
    entry: ['./src/index.js'],
    output: {
      filename: 'main.js',
      path: path.resolve(__dirname, 'dist'),
    },
    watchOptions: {
      aggregateTimeout: 300,
      poll: 1000,
      ignored: '/node_modules/'
    },
    module: {
      rules: [
        /* Babel Loader */
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: [
            {
              loader: 'babel-loader',
              options: {
                presets: ['@babel/preset-env']
              }
            },
          ]
        },
        /* CSS Loaders */
        {
          test: /\.css$/,
          use: [
            {
              loader: MiniCssExtractPlugin.loader,
            },
            {
              loader: 'css-loader',
            },
          ]
        },
        /* SCSS/SASS Loaders */
        {
          test: /\.s[ca]ss$/,
          use: [
            {
              loader: MiniCssExtractPlugin.loader,
            },
            {
              loader: 'css-loader',
              options: {
                sourceMap: true,
                // modules: true,
              },
            },
            {
              loader: 'postcss-loader',
              options: {
                sourceMap: true,
                postcssOptions: {
                  config: 'postcss.config.js',
                },
                postcssOptions: {
                  plugins: [['autoprefixer']]
                }
              }
            },
            {
              loader: 'sass-loader',
              options: {
                sourceMap: true,
              },
            },
          ]
        },
        /* Loader for images */
        {
          test: /\.(png|svg|jpg|ico)$/i,
          use: [
            {
              loader: 'file-loader',
              options: {
                outputPath: 'images',
                name: '[name]-[sha1:hash:7].[ext]'
              }
            }
          ]
        },
        /* Loader for fonts */
        {
          test: /\.(ttf|woff|woff2|otf|eot)$/i,
          use: [
            {
              loader: 'file-loader',
              options: {
                outputPath: 'fonts',
                name: '[name].[ext]'
              }
            }
          ]
        },
      ]
    },
    plugins: [
      new HtmlWebpackPlugin({
        template: 'public/index.html'
      }),
      new MiniCssExtractPlugin({
        // filename: 'main-[hash:8].css'
        filename: 'main.css'
      }),
    ],
    performance: {
      hints: 'warning',
      maxAssetSize: 200000,
      maxEntrypointSize: 400000,
    },
    devtool: isDev ? 'source-map' : false,
    target: 'web',
    optimization: {
      minimizer: [
        new UglifyJsPlugin({
          sourceMap: false, // Must be set to true if using source-maps in production
          parallel: true,
          uglifyOptions: {
            compress: true,
            ecma: 6,
            mangle: true,
          }
        }),
      ]
    },
    devServer: {
      contentBase: path.join(__dirname, 'dist'),
      filename: 'main.js',
      open: false,
      lazy: true,
      port: 8080,
    }
  };
};