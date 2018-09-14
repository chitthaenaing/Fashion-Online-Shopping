const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;
gulp.task('serve', function() {
    browserSync.init({
        proxy: "http://localhost:8080/Fashion-Online-Shopping"
    });

    gulp.watch("*.php").on("change", reload);

});






