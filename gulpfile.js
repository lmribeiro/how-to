var gulp = require('gulp');
var browserify = require('gulp-browserify');
var uglify = require('gulp-uglify');
var cssmin = require('gulp-cssmin');
var concat = require('gulp-concat');

gulp.task('css', function () {
    gulp.src('./web/css/style.css')
            .pipe(concat('style.min.css'))
            .pipe(cssmin())
            .pipe(gulp.dest('./web/css/'));
});

gulp.task('js', function () {
    gulp.src('./web/js/scripts.js')
            .pipe(concat('scripts.min.js'))
            .pipe(browserify())
            .pipe(uglify())
            .pipe(gulp.dest('./js/'));
});

gulp.task('build', ['css', 'js']);



gulp.task('default', ['build']);