module.exports = function (grunt) {
    grunt.initConfig({

    // define source files and their destinations
    sass: {
      dist: {
        files: {
          'app/View/Themed/KevthunderCom/webroot/css/theme.css': 'app/View/Themed/KevthunderCom/webroot/sass/theme.sass'
        }
      }
    },
    watch: {
        options: {
          atBegin: true,
          livereload: true
        },
        sass:  { files: 'app/View/Themed/KevthunderCom/webroot/sass/*.sass', tasks: [ 'sass' ] },
    }
});

// load plugins
grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-contrib-sass');

// register at least this one task
grunt.registerTask('default', [ 'sass' ]);


};