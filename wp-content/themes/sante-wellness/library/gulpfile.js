var gulp 		= require('gulp'),
	gutil 		= require('gulp-util'),
    
	filter      = require("gulp-filter"),
    fs          = require('fs'),
    del         = require('del'),
    es          = require('event-stream'),
    zip         = require('gulp-zip'),

	sass 		= require('gulp-sass'),
	sourcemaps 	= require('gulp-sourcemaps'),
	rename 		= require('gulp-rename'),
	concat 		= require('gulp-concat'),
	uglify 		= require('gulp-uglify'),
	stripDebug 	= require('gulp-strip-debug'),
	buffer 		= require('vinyl-buffer'),
	watchify 	= require('watchify'),
	source 		= require('vinyl-source-stream'),
	xtend 		= require('xtend'),
	jscs 		= require('gulp-jscs'),
	jshint 		= require('gulp-jshint'),
	stylish 	= require('jshint-stylish'),
	notify 		= require("gulp-notify"),
	autoprefixer = require('gulp-autoprefixer'),
	combineMq 	= require('gulp-combine-mq');

var paths = {
	themename : 'sante-wellness',
	scss: {
		src: './scss/*.scss',
		dest: './css',
		imports : './scss/**/*.scss'
	},
	head: {
		src: ['./js/head/modernizr-3.4.0.js']
	},		
	scripts: {
		src: ['./js/plugins/*.js', './js/script.js']
	},
	developmentScripts : './scripts',
	productionScripts : './scripts/production'
}

// Create a production ready theme
gulp.task('copytheme', function() {
    return es.concat(
        gulp.src([
            '../**/*'
        ])
        .pipe(filter([
            '../**/*', 
            '**', 
            '!*.bat', 
            '!package.json', 
            '!gulpfile.js', 
            '!*css/maps/**/*',
            '!css/maps',
            '!*scss/**/*',
            '!scss',
            '!*node_modules/**/*',
            '!node_modules',
            '!*scripts/**/*',
            '!scripts',
            '!*js/**/*',
            '!js',
            '!*pattern-library/**/*',
            '!pattern-library'
        ]))
        .on("error", notify.onError("Error: <%= error.message %>"))
        .pipe(gulp.dest('../../production/'+paths.themename)) ,

        // Move production script.js
        gulp.src([
            '../**/scripts/production/*.js'
        ])
        .pipe(rename({dirname: ''}))
        .pipe(gulp.dest('../../production/'+paths.themename+'/library/scripts/'))
    )

});

// Zip up our production ready theme
gulp.task('ziptheme', ['copytheme'], function() {
    gulp.src([
        '../../production/'+paths.themename+'/**/*'
    ])
    .pipe(zip(paths.themename+'.zip'))
    .pipe(gulp.dest('../../production/'));
});



function buildJS(source, filename) {
	gulp.src(source)
	.on("error", notify.onError("Error: <%= error.message %>"))
	.pipe(concat(filename))
	.pipe(rename({suffix: '.min'}))
	.pipe(gulp.dest(paths.developmentScripts))
	.pipe(stripDebug())
	.pipe(uglify())
	.pipe(gulp.dest(paths.productionScripts));
}



// Build SCSS files
gulp.task('scss', function () {
	return gulp.src(paths.scss.src)
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'compressed'}))
		.on("error", notify.onError("Error: <%= error.message %>"))
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest(paths.scss.dest));
});	

// Build head.js
gulp.task('head', function () {
	buildJS(paths.head.src, 'head.js');
});

// Build scripts.js
gulp.task('scripts', function() {
	buildJS(paths.scripts.src, 'scripts.js');
});

// Watch changes in SCSS and Javscript
gulp.task('watch', function () {
	gulp.watch(paths.scss.imports, 		['scss']);
	gulp.watch(paths.scripts.src, 		['scripts']);
});


// The production task, run copy theme then ziptheme
gulp.task('production', ['copytheme', 'ziptheme']);

// Build all Front End code, Less and JS
gulp.task('default', ['scss', 'head', 'scripts', 'watch']);