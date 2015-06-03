var gulp = require('gulp');
var concat = require('gulp-concat');
watch = require('gulp-watch');

gulp.task('css', function () {
    gulp.src('css/*.css')
        .pipe(concat('style.css'))
        .pipe(gulp.dest('./'));
});
// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('css/*.css', ['css']);
});
gulp.task('default', ['watch', 'css']);
