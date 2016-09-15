'use strict';

// Stylesheets

// Required modules
var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var prefix = require('gulp-autoprefixer');
var minify = require('gulp-clean-css');
var rename = require('gulp-rename');
var browserSync = require('browser-sync');
var debug = require('gulp-debug');



// Task: Compile sass into CSS, compress and auto-inject into browsers
gulp.task('style', function() {
	return gulp.src([
			'./src/sass/*.scss',
			'!.src/sass/**/_*.scss'
		])
	    .pipe(debug({title: 'src:'}))
		.pipe(sourcemaps.init())
		.pipe(
			sass({
				sourceComments: 'map',
				errLogToConsole: true
			}).on('error', sass.logError))
		.pipe(prefix('last 2 versions'))
		.pipe(gulp.dest('dist/css'))
		.pipe(minify({sourceMap: true}))
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(sourcemaps.write('.'))
	    .pipe(debug({title: 'dest:'}))	
		.pipe(gulp.dest('dist/css'))
		.pipe(browserSync.stream());
});