'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var php = require('gulp-connect-php');
var browserSync = require('browser-sync').create();
var nunjucksRender = require('gulp-nunjucks-render');

gulp.task('nunjucks', function() {
  return gulp.src([       // Folder(s) to look in for content files
    'src/**/*.+(html|nunjucks)',
    '!src/partials/*.+(html|nunjucks)',
  ])
  .pipe(nunjucksRender({
    path: ['src/partials'] // Folder to look in for partials that are included/extended
  }))
  .pipe(gulp.dest('dist')) // Output rendered HTML in folder
});

gulp.task('nunjucks:watch', function() {
  gulp.watch('./src/**/*.nunjucks', ['nunjucks', browserSync.reload]);
});

gulp.task('js', function() {
  gulp.src([
    './js/**/*.js',
    '!./js/**/*.min.js'
  ])
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./js'))
})

gulp.task('sass', function() {
  return gulp.src([
    './src/sass/reset.scss',
    './src/sass/global.scss',
    './src/sass/stilark.scss'
  ])
    .pipe(sass({
      outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(gulp.dest('./dist/css'))
    .pipe(browserSync.stream());
});

gulp.task('sass:watch', function() {
  gulp.watch('./src/sass/**/*.scss', ['sass']);
});

gulp.task('php', function() {
  php.server({
    base: './',
    port: 8080,
    keepalive: true
  });
});

gulp.task('browser-sync-php', function() {
  browserSync.init({
    proxy: '127.0.0.1:8080',
    open: true,
    notify: false
  });
});

gulp.task('browser-sync', function() {
  browserSync.init({
    open: true,
    notify: false,
    server: {
      baseDir: './dist'
    }
  });
});

gulp.task('default', ['js', 'sass', 'nunjucks', 'browser-sync', 'sass:watch', 'nunjucks:watch']);

gulp.task('php', ['js', 'sass', 'browser-sync-php', 'sass:watch', 'php'], function() {
  gulp.watch(['./**/*.php'], [browserSync.reload]);
});

gulp.task('build', ['js', 'sass', 'nunjucks']);
