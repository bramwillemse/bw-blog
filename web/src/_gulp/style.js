'use strict';

// Stylesheets

// Required modules
var gulp = require('gulp'),
	sass = require('gulp-sass'),
	sourcemaps = require('gulp-sourcemaps'),
	prefix = require('gulp-autoprefixer'),
	minify = require('gulp-minify-css'),
	rename = require('gulp-rename'),
	browserSync = require('browser-sync');



// Task: Compile sass into CSS, compress and auto-inject into browsers
gulp.task('style', function() {
	return gulp.src('./src/scss/main.scss')
		.pipe(sourcemaps.init())
		.pipe(
		sass({
			sourceComments: 'map',
			errLogToConsole: true
			}).on('error', sass.logError))
		.pipe(prefix('last 2 versions'))
		.pipe(gulp.dest('./src/css'))
		.pipe(minify({sourceMap: true}))
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('./dist/_/css'))
		.pipe(browserSync.stream());
});