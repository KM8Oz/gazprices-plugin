/* config-overrides.js */

module.exports = {
    webpack: {
      configure: {
        optimization: {
          runtimeChunk: false,
          splitChunks: {
            chunks: 'all',
            name: false,
            cacheGroups: {
              default:false
            }
          }
        },
      },
    },
  }
  