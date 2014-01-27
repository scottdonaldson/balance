module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        jshint: {
            options: {
                force: true
            },
            all: ['Gruntfile.js', 'js/script.js']
        },

        uglify: {
            build: {
                files: {
                    'js/balance.min.js': ['js/plugins.js', 'js/script.js']
                }
            }
        },

        sass: {
            dist: {
                options: {
                    compass: true,
                    style: 'compressed'
                },
                files: {
                    'css/admin.css': 'sass/admin.scss',
                    'css/style.css': 'sass/style.scss'
                }
            }
        },

        autoprefixer: {
            options: {
                browsers: ['> 1%']
            },
            no_dest: {
                src: 'css/style.css'
            }
        },

        watch: {
            options: {
                livereload: true
            },
            scripts: {
                files: ['js/*.js'],
                tasks: ['uglify', 'jshint'],
                options: {
                    spawn: false,
                }
            },
            css: {
                files: ['sass/*.scss', 'css/style.css'],
                tasks: ['sass', 'autoprefixer'],
                options: {
                    spawn: false
                }
            }
        }

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['jshint', 'uglify', 'sass', 'autoprefixer', 'watch']);

};