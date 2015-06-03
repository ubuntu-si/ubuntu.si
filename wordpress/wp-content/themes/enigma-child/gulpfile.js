var concat = require('gulp-concat');

gulp.task('css', function () {
    gulp.src('css/*.css')
        .pipe(concat('style.css'))
        .pipe(gulp.dest('./'));
});
gulp.task('default', ['css']);
