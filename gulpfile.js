"use strict";

const gulp = require("gulp");
const sass = require("gulp-sass");
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const browserSync = require("browser-sync").create();
const nunjucksRender = require("gulp-nunjucks-render");
const imagemin = require("gulp-imagemin");

gulp.task("nunjucks", function() {
  return gulp
    .src([
      // Folder(s) to look in for content files
      "src/html/**/*.+(html|nunjucks)",
      "!src/templates/*.+(html|nunjucks)"
    ])
    .pipe(
      nunjucksRender({
        path: ["src/html/templates"] // Folder to look in for templates that are included/extended
      })
    )
    .pipe(gulp.dest("dist")); // Output rendered HTML in folder
});

gulp.task("nunjucks:watch", function() {
  gulp.watch("./src/**/*.nunjucks", ["nunjucks", browserSync.reload]);
});

gulp.task("copy", function() {
  return gulp
    .src([
      "src/html/**/*.+(php|css|jpg|png|svg|gif)",
      "src/extra/**/*.+(php|css|jpg|png|svg|gif|xml|json|html)"
    ])
    .pipe(gulp.dest("./dist/"));
});

gulp.task("js", function() {
  gulp
    .src(["./src/js/**/*.js", "!./src/js/**/*.min.js"])
    .pipe(gulp.dest("./dist/js"));
  // .pipe(uglify())
  // .pipe(rename({
  //   suffix: '.min'
  // }))
  // .pipe(gulp.dest('./dist/js'))
});

gulp.task("sass", function() {
  return gulp
    .src([
      "./src/sass/reset.scss",
      "./src/sass/global.scss",
      "./src/sass/print.scss"
    ])
    .pipe(
      sass({
        outputStyle: "expanded"
      }).on("error", sass.logError)
    )
    .pipe(gulp.dest("./dist/css"))
    .pipe(browserSync.stream());
});

gulp.task("sass:watch", function() {
  gulp.watch("./src/sass/**/*.scss", ["sass"]);
});

gulp.task("image", function() {
  gulp
    .src("src/images/**/*.{png,gif,jpg,jpeg,svg}")
    .pipe(
      imagemin([
        imagemin.gifsicle({
          interlaced: true
        }),
        imagemin.jpegtran({
          progressive: true
        }),
        imagemin.optipng({
          optimizationLevel: 5
        }),
        imagemin.svgo({
          plugins: [
            {
              removeViewBox: true
            },
            {
              cleanupIDs: false
            }
          ]
        })
      ])
    )
    .pipe(gulp.dest("dist/images"));
});

gulp.task("browser-sync", function() {
  browserSync.init({
    open: true,
    notify: false,
    server: {
      baseDir: "./dist"
    }
  });
});

gulp.task("watch", ["browser-sync", "sass:watch", "nunjucks:watch"]);
gulp.task("build", ["copy", "js", "sass", "nunjucks", "image"]);
gulp.task("default", ["build", "watch"]);
