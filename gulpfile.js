'use strict';
 
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps');
 
sass.compiler = require('node-sass');
 
gulp.task('sass', function () {
  return gulp.src('scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css'));
});
 
gulp.task('sass:watch', function () {
  gulp.watch('scss/**/*.scss', ['sass', 'sassPrimary']);
});

/* Compile outside the CSS directory for the main style.css file */
gulp.task('sassPrimary', function () {
    return gulp.src('scss/style.scss')
      .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
      .pipe(gulp.dest('./'));
});

gulp.task('sassPrimarySM', function () {
    return gulp.src('scss/style.scss')
      .pipe(sourcemaps.init())
      .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
      .pipe(sourcemaps.write())
      .pipe(gulp.dest('./'));
});