'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var minify = require('gulp-minify');
 var concat = require('gulp-concat');
 
gulp.task('sass', function () {
  gulp.src('assets/css/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('public/assets/css'));
});

gulp.task('libs', function() {
  var bootstrap = gulp.src('bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js')
    .pipe(gulp.dest('public/assets/js'));
  var jquery = gulp.src('bower_components/jquery/dist/jquery.min.js')
    .pipe(gulp.dest('public/assets/js'));
  var angularJS = gulp.src('node_modules/angular/angular.min.js')
    .pipe(gulp.dest('public/assets/js'));
});

gulp.task('concat', function() {
  return gulp.src('assets/js/*.js')
    .pipe(concat('main.js'))
    .pipe(gulp.dest('public/assets/js'));
});

gulp.task('minify', ['concat'], function() {
  gulp.src('public/assets/js/main.js')
    .pipe(minify({
        exclude: ['tasks'],
        ignoreFiles: ['-min.js']
    }))
    .pipe(gulp.dest('public/assets/js'))
});
 
gulp.task('all:watch', function () {
  gulp.watch('assets/css/*.scss', ['sass']);
  gulp.watch('assets/js/*.js', ['minify']);
});

gulp.task('default', function() {
  // place code for your default task here
});