const { src, dest, watch, parallel, series } = require('gulp');
const cache = require('gulp-cache');
const clean = require('gulp-clean');
const concat = require('gulp-concat');
const imagemin = require('gulp-imagemin');
const notify = require('gulp-notify');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const webp = require('gulp-webp');

// Utilidades CSS/SASS
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const sass = require('gulp-dart-sass');

// Utilidades JS
const terser = require('gulp-terser-js');

function compileSass() {
  return src('src/scss/app.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('build/css'));
}

function concatJS() {
  return src('./src/js/**/*.js')
    .pipe(sourcemaps.init())
    .pipe(concat('bundle.js'))
    .pipe(terser())
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('build/js'));
}

// Modificar imagenes

function imgmin() {
  return src('src/img/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 3 })))
    .pipe(dest('./build/img'));
}

function imgminToWebp() {
  return src('build/img/**/*').pipe(webp()).pipe(dest('./build/img'));
}

// Utilidades

function watchFiles() {
  watch('./src/scss/**/*.scss', compileSass);
  watch('./src/js/**/*.js', concatJS);
  watch('./src/img/**/*', series(imgmin, imgminToWebp));
}

function notifyBuildEnd(done) {
  notify('Build Finalizado');
  done();
}

function cleanBuild() {
  return src('build/', { read: false, allowEmpty: true }).pipe(clean());
}

// Exports

exports.compileSass = compileSass;
exports.imgmin = imgmin;
exports.images = series(imgmin, imgminToWebp);
exports.watchFiles = watchFiles;

exports.default = series(
  cleanBuild,
  parallel(compileSass, concatJS, series(imgmin, imgminToWebp)),
  notifyBuildEnd
);
