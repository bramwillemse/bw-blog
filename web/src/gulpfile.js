'use strict';

// Default Gulp task

// Include all gulp files
require('require-dir')('./_gulp', {recurse: true});



// Required modules
var gulp = require('gulp');



// DEFAULT TASKS
// Run local development task
gulp.task('default', [
    'templates',
	'style',
	'scripts',
    'styleguide',
	'serve',
	'watch'
]);
