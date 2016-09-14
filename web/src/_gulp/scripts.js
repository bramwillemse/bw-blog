'use strict';

// Javascript

// Required modules
var gulp = require('gulp'),
    debug = require('gulp-debug'),
    sourcemaps = require('gulp-sourcemaps'),
    jshint = require('gulp-jshint'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
	rename = require('gulp-rename');



// Settings
var uglifyOptions = {
        mangle: true,
        output: { beautify: false },
        outSourceMap: true
    };



// Main scripts task
gulp.task('scripts', ['scripts:lint'], function() {
    return gulp.src('./src/js/**/_*.js')
    .pipe(debug({title: 'src:'}))
    .pipe(sourcemaps.init())
    .pipe(concat('main.js'))
    .pipe(uglify(uglifyOptions))
    .pipe(debug({title: 'uglify:'}))
    .pipe(rename({
    suffix: '.min'
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./dist/_/js'))
        .pipe(debug({title: 'dest:'}));
});


    // Sub-task Linting
    gulp.task('scripts:lint', function() {
        return gulp.src('./src/js/**/*.js')
    .pipe(jshint());
    // .pipe(jshint.reporter('YOUR_REPORTER_HERE'));
    });
