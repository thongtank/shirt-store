module.exports = function(grunt) {
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.initConfig({
        // pkg: grunt.file.readJSON('package.json'), Read package.json to download some package
        watch: {
            files: ['*.html', '*.php'],
            options: {
                livereload: true
            }
        },
        uglify: {
            my_target: {
                files: [{
                    expand: 1,
                    cwd: 'js/',
                    ext: '.min.js',
                    src: ['*.js'],
                    dest: 'js/'
                }]
            },
            options: {}
        }
    });

    // grunt.registerTask('wtf','what the fuck custon task',function(){
    //     grunt.log.writeln('WTF!!!! BOOOOM');
    // });
    
    // Call watch plugin
    grunt.registerTask('wt',['watch']);
};