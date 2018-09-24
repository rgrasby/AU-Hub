var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');

gulp.task('sass', function() {
    gulp.src('sass/*.scss')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('./'))
		.pipe(autoprefixer({browsers: ['last 2 versions', 'ie >= 9', "Android >= 5", "Safari >= 6"]}))
        .pipe(gulp.dest('./'))
}); 

gulp.task('auhubjs', function() {
    return gulp.src(['./js/dev/plugins.js','./js/dev/main.js'])
    .pipe(concat('auhub.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./js'));
});

//Watch task
gulp.task('watch', function() {
	gulp.watch('sass/**/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'watch', 'auhubjs']);