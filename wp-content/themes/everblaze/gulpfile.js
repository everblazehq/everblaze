var gulp = require('gulp');
var sass = require('gulp-sass');

var paths = {
    styles: {
        src: './**/*.scss',
        dest: './'
    }
};

gulp.task('style', function() {
    return gulp.src('./scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./'))
});


// Development Tasks
// -----------------
gulp.task('watch', function() {
    gulp.watch(paths.styles.src, gulp.series('style'));
});

gulp.task('default', gulp.series('style', 'watch'))
