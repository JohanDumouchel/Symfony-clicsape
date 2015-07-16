/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var tabEntity = ['country','category','groupSize',];
var gulp = require('gulp');
var gulpif = require('gulp-if');
var uglify = require('gulp-uglify');
var uglifycss = require('gulp-uglifycss');
var less = require('gulp-less');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var env = process.env.GULP_ENV;

//Tâche lier a jquery, bootstrap et autre ressource générale à toute l'application

//JAVASCRIPT TASK: write one minified js file out of jquery.js, bootstrap.js and all of my global custom js files
gulp.task('js', function () {
    return gulp.src(['bower_components/jquery/dist/jquery.js',
        'bower_components/bootstrap/dist/js/bootstrap.js',
        'bower_components/jquery-confirm/jquery.confirm.js',
        'app/Resources/js/**/*.js'])
        .pipe(concat('javascript.js'))
        .pipe(gulpif(env === 'prod', uglify()))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('web/js'));
});

//CSS TASK: write one minified css file out of bootstrap.less and all of my custom less files
gulp.task('css', function () {
    return gulp.src([
        'bower_components/bootstrap/dist/css/bootstrap.css',
        'app/Resources/public/less/**/*.less'])
        .pipe(gulpif(/[.]less/, less()))
        .pipe(concat('styles.css'))
        .pipe(gulpif(env === 'prod', uglifycss()))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('web/css'));
});

//IMAGE TASK: Just pipe images from project folder to public web folder
gulp.task('fonts', function() {
    return gulp.src('bower_components/bootstrap/dist/fonts/**/*.*')
        .pipe(gulp.dest('web/fonts'));
});

//IMAGE TASK: Just pipe images from project folder to public web folder
gulp.task('img', function() {
    return gulp.src('app/Resources/img/**/*.*')
        .pipe(gulp.dest('web/img'));
});

//JAVASCRIPT TASK: write one minified js file out of my global custom js files for admin Bundle
gulp.task('admin_js', function () {
    return gulp.src(['src/ClicSape/Bundle/AdminBundle/Resources/js/global/global_admin.js'])
        .pipe(concat('admin.js'))
        .pipe(gulpif(env === 'prod', uglify()))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('web/js'));
});

gulp.task('admin_ready_js', function () {
    return gulp.src(['src/ClicSape/Bundle/AdminBundle/Resources/js/global/adminReady.js'])
        .pipe(concat('ready.js'))
        .pipe(gulpif(env === 'prod', uglify()))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('web/js/admin'));
});

//JAVASCRIPT TASK: write one minified js file out of my global custom js files for admin Bundle
gulp.task('admin_entity_js', function () {
    for (i = 0; i < tabEntity.length; i++) {
        var src = 'src/ClicSape/Bundle/AdminBundle/Resources/js/'+tabEntity[i]+'/*.js';
        var name = tabEntity[i]+'.js';
        var dir = 'web/js/admin';
        
        gulp.src([src])
        .pipe(concat(name))
        .pipe(gulpif(env === 'prod', uglify()))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(dir));
    }
});

//JAVASCRIPT TASK: write one minified css file out of each custom less files for admin Bundle
gulp.task('admin_entity_less', function () {
    for (i = 0; i < tabEntity.length; i++) {
        var src = 'src/ClicSape/Bundle/AdminBundle/Resources/less/'+tabEntity[i]+'/*.less';
        var name = tabEntity[i]+'.css';
        var dir = 'web/css/admin';
        
        gulp.src([src])
        .pipe(gulpif(/[.]less/, less()))
        .pipe(concat(name))
        .pipe(gulpif(env === 'prod', uglifycss()))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(dir));
    }
});
//CSS TASK: write one minified css file out of bootstrap.less and all of my custom less files
gulp.task('admin_less', function () {
    return gulp.src([
        'src/ClicSape/Bundle/AdminBundle/Resources/less/global/*.less'])
        .pipe(gulpif(/[.]less/, less()))
        .pipe(concat('admin.css'))
        .pipe(gulpif(env === 'prod', uglifycss()))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('web/css'));
});

//define executable tasks when running "gulp" command
gulp.task('default', ['js','admin_js', 'css', 'img','fonts','admin_entity_js','admin_ready_js','admin_entity_less','admin_less']);
//define executable tasks when running "gulp admin" command
gulp.task('admin', ['admin_js','admin_entity_js','admin_entity_less','admin_less','admin_ready_js']);
//define executable tasks when running "gulp gen" command
gulp.task('gen', ['js', 'css', 'img','fonts']);