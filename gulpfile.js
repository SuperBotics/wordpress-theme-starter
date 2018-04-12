// Load plugins
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    runSequence = require('run-sequence'),
    del = require('del'),
    merge = require('merge-stream');
/**
 *Converted all js file into single minified file 
 */
gulp.task('scripts', function() {
    var main = gulp.src(['./themes/build-it/assets/js/src/common-elements/**/*.js',
            './themes/build-it/assets/js/src/framework/**/*.js',
            './themes/build-it/assets/js/src/template-specific/**/*.js'
        ])
        .pipe(concat('main.js'))
        .pipe(gulp.dest('./themes/build-it/assets/js'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify().on('error', function(e) {
            console.log(e);
        }))
        .pipe(gulp.dest('./themes/build-it/assets/js'))
        .pipe(notify({ message: 'Scripts task complete' }));

    var vendor = gulp.src(['./themes/build-it/assets/js/src/vendor/**/*.js'])
        .pipe(concat('vendor.js'))
        .pipe(gulp.dest('./themes/build-it/assets/js'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify().on('error', function(e) {
            console.log(e);
        }))
        .pipe(gulp.dest('./themes/build-it/assets/js'))
        .pipe(notify({ message: 'Scripts task complete' }));

    return merge(main, vendor);

});

gulp.task('sass', function() {
    /*TOTO: added path for minify scss*/
});
/**
 *
 */
gulp.task('clean', function() {
    return del(['./themes/build-it/assets/js/main.js']);
});
// Default task
gulp.task('default', function(callback) {
    runSequence(['scripts'],
        callback
    );
});
// Watch
gulp.task('watch', function() {
    // Watch .js files
    gulp.watch('./themes/build-it/assets/js/**/*.js', ['scripts']);


});
