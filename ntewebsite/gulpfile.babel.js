"use strict";
import gulp from "gulp";
import babel from "gulp-babel";
import uglify from "gulp-uglify";
import sass from "gulp-sass";
import prefixer from "gulp-autoprefixer";

import sourcemaps from "gulp-sourcemaps";
import browserSync from "browser-sync";
import clean from 'gulp-rimraf';

browserSync.create();
const root = "node_modules";

// Config for build destination
let build_html_destination = "./"
let build_assets_destination = `${build_html_destination}/public`


gulp.task("vendor", () => {
  gulp
    .src([
      root + "/jquery/dist/jquery.min.js",
      root + "/bootstrap/dist/js/bootstrap.bundle.min.js",
      root + "/slick-carousel/slick/slick.min.js",
        root + "/main_home.min.js",
        root + "/jquery-ui.custom.min.js",
        root + "/jquery-1.9.1.min.js",
        root + "/timber.js",
        root + "/fastclick.min.js",
        root + "/jquery.lazyload.min.js",
        root + "/bootstrap.min.js",
        root + "/bootstrap_home.css",
      "resources/vendor/**/*"
    ])
    .pipe(gulp.dest(`${build_assets_destination}/vendor`))
});


gulp.task("fonts", function() {
  gulp
    .src(["resources/fonts/**/*"])
    .pipe(gulp.dest(`${build_assets_destination}/fonts`));
//  gulp
//    .src([root + "/font-awesome/fonts/fontawesome-webfont.*"])
//    .pipe(gulp.dest(`${build_assets_destination}/fonts`));
//  gulp
//    .src([root + "/font-awesome/css/font-awesome.min.css"])
//    .pipe(gulp.dest(`${build_assets_destination}/vendor`));
});



gulp.task("image", function() {
  return gulp
    .src("resources/images/**/*")
    .pipe(gulp.dest(`${build_assets_destination}/images`));
});

gulp.task("sass", () => {
  return gulp
    .src(["resources/css/**/*.scss"])
    .pipe(sourcemaps.init())
    .pipe(
      sass({
        outputStyle: "compressed"
      }).on("error", sass.logError)
    )
    .pipe(
      prefixer({
        browsers: ["last 2 versions"],
        cascade: false
      })
    )
//    .pipe(sourcemaps.write())
    .pipe(gulp.dest(`${build_assets_destination}/css`));
});

gulp.task("script", () => {
  return (
    gulp
      .src("resources/js/**/*.js")
      .pipe(sourcemaps.init())
      .pipe(babel())
      .pipe(uglify())
//      .pipe(sourcemaps.write())
      .pipe(gulp.dest(`${build_assets_destination}/js`))
//      .pipe(browserSync.stream())
  );
});

const tasks = ['sass',  'vendor', 'fonts', 'script', 'image']

gulp.task("serve", tasks, () => {
//  browserSync.init({
//    server: "./dist",
//    port: 6900
//  });
  gulp.watch(
    [root + "/bootstrap/scss/bootstrap.scss", "resources/css/**/*.scss"],
    ["sass"]
  );
  gulp.watch("resources/js/*.js", ["script"]);
  gulp.watch("resources/images/**/*", ["image"]);
  gulp.watch("resources/vendor/**/*", ["vendor"]);
});

gulp.task("default", [
  "sass",
  "script",

  "fonts",

  "vendor",

  "image"
]);
