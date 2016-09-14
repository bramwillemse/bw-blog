'use strict';

// Clean up all generated files

// Required modules
var gulp = require('gulp'),
	clean = require('gulp-rimraf');



// Main task
// Clean up all generated files
gulp.task('clean', [
	'clean:templates',
	'clean:style',
	'clean:scripts',
	'clean:styleguide'
]);


	// Sub-task: Clean minified html
	gulp.task('clean:templates', function() {
		return gulp.src([
			'./tmp',
			'./src/html/**/*.html',
			'./dist/**/*.html',
			'!./dist/_'
			], { read: false }) // much faster
		   	.pipe(clean({ force: true }));
	});



	// Sub-task: Clean up generated stylesheets
	gulp.task('clean:style', function() {
		return gulp.src('./dist/_/css/*', { read: false })
			.pipe(clean());
	});



	// Sub-task: Clean up generated scripts
	gulp.task('clean:scripts', function() {
		return gulp.src('./dist/_/js/*', { read: false })
			.pipe(clean());
	});



	// Sub-task: Clean up generated styleguide
	gulp.task('clean:styleguide', function() {
		return gulp.src('./dist/styleguide/*', { read: false })
			.pipe(clean());

	});
