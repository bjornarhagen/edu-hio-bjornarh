"use strict";

import { task, src, dest, watch, series, parallel } from "gulp";
import gulpSass from "gulp-sass";
import * as sass from "sass";
import uglify from "gulp-uglify";
import rename from "gulp-rename";
import browserSync from "browser-sync";
import nunjucksRender from "gulp-nunjucks-render";
import imagemin, * as gulpImagemin from "gulp-imagemin";
import imageminPngquant from "imagemin-pngquant";

// Configure gulp-sass with the sass compiler
const sassCompiler = gulpSass(sass);

// Define tasks
task("nunjucks", function () {
  return src([
    "src/staticsite/html/**/*.+(html|nunjucks)",
    "!src/staticsite/templates/*.+(html|nunjucks)",
  ])
    .pipe(
      nunjucksRender({
        path: ["src/staticsite/html/templates"],
      })
    )
    .pipe(dest("dist/staticsite"));
});

task("nunjucks:watch", function () {
  watch(
    "./src/staticsite/**/*.nunjucks",
    series("nunjucks", browserSync.reload)
  );
});

task("copy", function () {
  return src([
    "src/staticsite/html/**/*.+(php|css|jpg|png|svg|gif)",
    "src/staticsite/extra/**/*.+(php|css|jpg|png|svg|gif|xml|json|html)",
  ]).pipe(dest("./dist/staticsite/"));
});

task("js", function () {
  return src([
    "./src/staticsite/js/**/*.js",
    "!./src/staticsite/js/**/*.min.js",
  ]).pipe(dest("./dist/staticsite/js"));
  // Uncomment these lines to minify and rename the JS files
  // .pipe(uglify())
  // .pipe(rename({
  //   suffix: '.min'
  // }))
  // .pipe(dest("./dist/staticsite/js"));
});

task("sass", function () {
  return src([
    "./src/staticsite/sass/reset.scss",
    "./src/staticsite/sass/global.scss",
    "./src/staticsite/sass/print.scss",
  ])
    .pipe(
      sassCompiler({
        outputStyle: "expanded",
      }).on("error", sassCompiler.logError)
    )
    .pipe(dest("./dist/staticsite/css"))
    .pipe(browserSync.stream());
});

task("sass:watch", function () {
  watch("./src/staticsite/sass/**/*.scss", series("sass"));
});

// task("image", function () {
//   return src("src/staticsite/images/**/*.{png,gif,jpg,jpeg,svg}")
//     .pipe(
//       imagemin([
//         gulpImagemin.gifsicle({ interlaced: true }),
//         gulpImagemin.mozjpeg({ progressive: true }),
//         imageminPngquant({ quality: [0.6, 0.8] }),
//         gulpImagemin.svgo({
//           plugins: [
//             { name: "removeViewBox", active: true },
//             { name: "cleanupIDs", active: false },
//           ],
//         }),
//       ])
//     )
//     .pipe(dest("dist/images"));
// });
task("image", function () {
  return src("src/staticsite/images/**/*.{png,gif,jpg,jpeg,svg}").pipe(
    dest("dist/staticsite/images")
  );
});

task("browser-sync", function () {
  browserSync.init({
    open: true,
    notify: false,
    server: {
      baseDir: "./dist",
    },
  });
});

task("watch", parallel("browser-sync", "sass:watch", "nunjucks:watch"));
task("build", series("copy", "js", "sass", "nunjucks", "image"));
// task("build", series("copy", "js", "sass", "nunjucks"));
task("default", series("build", "watch"));
