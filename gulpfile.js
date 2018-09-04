'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

gulp.task('js', function() {
  gulp.src('./js/**/*.js')
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./js'))
})

gulp.task('sass', function() {
  return gulp.src('./sass/**/*.scss')
    .pipe(sass({
      outputStyle: 'extended'
    }).on('error', sass.logError))
    .pipe(gulp.dest('./css'));
});

gulp.task('sass:watch', function() {
  gulp.watch('./sass/**/*.scss', ['sass']);
});

gulp.task('default', ['js', 'sass', 'sass:watch']);
