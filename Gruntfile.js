
    // Gruntfile
    module.exports = function(grunt) {

      // Initializing the configuration object
      grunt.initConfig({

        // Task configuration
        concat: {
          options: {
            separator: ';',
          },
          js_singlefile: {
            src: [
              './bower_components/jquery/dist/jquery.js',
              './bower_components/bootstrap/dist/js/bootstrap.js',
              './app/assets/js/salvattore.js',
              './app/assets/js/custom.js',
            ],
            dest: './public/js/main.js'
          },
        },
        less: {
          development: {
            options: {
              compress: true,
              sourceMap: true,
              sourceMapFilename: "./public/css/styles.css.map",
              sourceMapURL: "styles.css.map",
              sourceMapFileInline: true,
              outputSourceFiles: false
            },
            files: {
              "./public/css/styles.css":"./app/assets/css/styles.less"
            }
          }
        },
        uglify: {
          options: {
            mangle: true
          },
          js_singlefile: {
            files: {
              './public/js/main.js': './public/js/main.js',
            }
          },
        },
        watch: {
          //...
        }
      });

     // Plugin loading
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-less');

    // Task definition
    grunt.registerTask('default', ['concat', 'uglify', 'less']);
  };