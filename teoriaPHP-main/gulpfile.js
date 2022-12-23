const { series, watch } = require('gulp');
const browserSync = require('browser-sync').create();

const paths = {
  web: {
    src: '**/*.{html,php}'
  }
}


function reload(done) {
  browserSync.reload();
  done();
}

function serve(done) {
  browserSync.init({
    proxy: 'localhost'
  });
  done();
}

function watchFiles() {
  watch(paths.web.src, reload);
}


//* EXPORTS

exports.watch = series(
  serve,
  watchFiles
);
