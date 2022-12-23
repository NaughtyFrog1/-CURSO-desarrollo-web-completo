const { dest, src, series, parallel, watch } = require('gulp');

// Imagenes
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');

// CSS/SASS
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const sass = require('gulp-sass');

// Varios
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');
const terser = require('gulp-terser');

// Tools
const cache = require('gulp-cache');
const clean = require('gulp-clean');
const notify = require('gulp-notify');
const rename = require('gulp-rename');

// Paths
const paths = {
  img: 'src/img/**/*',
  js: 'src/js/**/*',
  scss: 'src/scss/**/*'
}



//* FUNCTIONS


// Imagenes

function imgmin() {
  return src(paths.img)
    .pipe(cache(imagemin({
      interlaced: true,
      progressive: true,
      optimizationLevel: 5,
      svgoPlugins: [{ removeViewBox: true }]
    })))
    .pipe(dest('build/img'))
    // .pipe(notify({ message: 'Imagenes comprimidas', onLast: true }));
}

function imgminToWebp() {
  return src('build/img/**/*')
    .pipe(webp())
    .pipe(dest('build/img'))
    // .pipe(notify({ message: 'Imagenes a .webp', onLast: true }));
}


// CSS/SASS

function buildSass() {
  return src('src/scss/app.scss')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(rename({suffix: '.min'}))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('build/css'))
}


// JavaScript

function buildJS() {
  return src(paths.js)
    .pipe(sourcemaps.init())
    .pipe(concat('bundle.js'))
    .pipe(terser())
    .pipe(rename({suffix: '.min'}))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('build/js'));
}


// Tools

function rmBuild() {
  return src('build/', {read: false, allowEmpty: true})
    .pipe(clean());
}

function notifyEnd() {
  return src('build/', {read: false, allowEmpty: true})
    .pipe(notify({
      title: 'Build Finalizado', 
      message: 'Build finalizado con éxito',
    }));
}

function watchFiles() {
  watch(paths.img, series(imagemin, imgminToWebp));
  watch(paths.js, buildJS);
  watch(paths.scss, buildSass);
}



//* EXPORTS

exports.img = series(imgmin, imgminToWebp);
exports.js = buildJS;
exports.scss = buildSass;

exports.watch = series(
  parallel(buildJS, buildSass),
  watchFiles
);

exports.default = series(
  rmBuild,
  parallel(
    series(imgmin, imgminToWebp),
    buildJS,
    buildSass
  ),
  notifyEnd
);
