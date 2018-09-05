'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var php = require('gulp-connect-php');
var browserSync = require('browser-sync').create();

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
      outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(gulp.dest('./css'))
    .pipe(browserSync.stream());
});

gulp.task('sass:watch', function() {
  gulp.watch('./sass/**/*.scss', ['sass']);
});

gulp.task('php', function() {
  php.server({
    base: './',
    port: 8080,
    keepalive: true
  });
});

gulp.task('browser-sync', function() {
  browserSync.init({
    proxy: '127.0.0.1:8080',
    open: true,
    notify: false
  });
});

gulp.task('default', ['js', 'sass', 'php', 'browser-sync', 'sass:watch'], function() {
  gulp.watch(['./**/*.php'], [browserSync.reload]);
});

gulp.task('build', ['js', 'sass']);
