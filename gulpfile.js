var gulp = require('gulp');

gulp.task('css', function () {
    var postcss    = require('gulp-postcss');
    var processors = [
        require('autoprefixer'),
        require('precss'),
    ];

    return gulp.src('assets/css/src/style.css')
        .pipe(postcss(processors))
        .pipe(gulp.dest('assets/css/build/'));
});

gulp.task('watch', function() {
    return gulp.watch('assets/css/src/style.css', ['css']);
});

gulp.task('default', ['css']);
