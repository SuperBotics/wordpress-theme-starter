// Load plugins
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    runSequence = require('run-sequence'),
    minifyCSS = require('gulp-minify-css'),
    autoprefixer = require('gulp-autoprefixer'),
    del = require('del'),
    merge = require('merge-stream');
/**
 *minified all js files
 */
gulp.task('scripts', function () {
    var main = gulp.src(['./themes/build-it/assets/js/src/common-elements/**/*.js',
        './themes/build-it/assets/js/src/framework/**/*.js',
        './themes/build-it/assets/js/src/template-specific/**/*.js'
    ])
        .pipe(concat('main.js'))
        .pipe(gulp.dest('./themes/build-it/assets/js'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify().on('error', function (e) {
            console.log(e);
        }))
        .pipe(gulp.dest('./themes/build-it/assets/js'))
        .pipe(notify({ message: 'Scripts task complete' }));

    var vendor = gulp.src(['./themes/build-it/assets/js/src/vendor/**/*.js'])
        .pipe(concat('vendor.js'))
        .pipe(gulp.dest('./themes/build-it/assets/js'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify().on('error', function (e) {
            console.log(e);
        }))
        .pipe(gulp.dest('./themes/build-it/assets/js'))
        .pipe(notify({ message: 'Scripts task complete' }));

    return merge(main, vendor);

});
/**
 *minified all css files
 */
gulp.task('css', function () {
    var main = gulp.src(['./themes/build-it/assets/css/main.scss'])
        .pipe(sass())
        .pipe(autoprefixer("last 3 version", "safari 5", "ie 8", "ie 9"))
        .pipe(gulp.dest('./themes/build-it/assets/css'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(minifyCSS())
        .pipe(gulp.dest('./themes/build-it/assets/css'))
        .pipe(notify({ message: 'Scripts task complete' }));

    var vendor = gulp.src(['./themes/build-it/assets/css/vendor.scss'])
        .pipe(sass())
        .pipe(autoprefixer("last 3 version", "safari 5", "ie 8", "ie 9"))
        .pipe(gulp.dest('./themes/build-it/assets/css'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(minifyCSS())
        .pipe(gulp.dest('./themes/build-it/assets/css'))
        .pipe(notify({ message: 'Scripts task complete' }));
});
/**
 *clean a mified gulp task files
 */
gulp.task('clean', function () {
    return del(['./themes/build-it/assets/js/main.js']);
});
// Default task
gulp.task('default', function (callback) {
    runSequence(['scripts'],
        callback
    );
});
// Watch
gulp.task('watch', function () {
    // Watch .js files
    gulp.watch('./themes/build-it/assets/js/**/*.js', ['scripts']);


});
