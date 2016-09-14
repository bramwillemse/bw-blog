'use strict';

// Minification

// required modules
var gulp = require('gulp'),
    debug = require('gulp-debug'),
    htmlmin = require('gulp-htmlmin'),
    browserSync = require('browser-sync'),
    cp = require('child_process');



// Settings
var reload = browserSync.reload;



// Main task
// Create combined html task
gulp.task('templates', ['templates:minify']);



    // Sub-task jekyll build
    // Builds templates based on Markdown docs and Jekyll templates
    gulp.task('templates:build', ['clean:templates'], function (done) {
        browserSync.notify('Building Jekyll');

        return cp.spawn('jekyll', ['build'], { stdio: 'inherit' })
            .on('close', done);
    });



    // Sub-task: Minify HTML
    // Compresses compiled templates
    gulp.task('templates:minify', ['templates:build'], function() {
        browserSync.notify('Processing changes');

        return gulp.src('./src/html/**/*.html')
            .pipe(debug({title: 'src:'}))
            .pipe(htmlmin({
                collapseWhitespace: true
            }))
            .pipe(gulp.dest('./dist'))
            .pipe(browserSync.reload({
                stream: true,
                once: true
            }));

    });



    // Sub-task jekyll rebuild and reload
    gulp.task('templates:rebuild', ['templates:minify'], reload);
