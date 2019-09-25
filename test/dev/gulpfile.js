var
	gulp   = require("gulp"),
	sass   = require("gulp-sass");
	rename = require("gulp-rename");

function css_style(done){
	gulp.src('scss/**/*.scss')
	.pipe(sass({
		errorLogToConsole: true,
		outputStyle: 'compressed'
	}))
	.on('error', console.error.bind(console))
	.pipe(rename({suffix: '.min'}))
	.pipe(gulp.dest('css/'));

	done();
}

function watchSass(){
	gulp.watch("scss/**/*.scss", css_style);
}

gulp.task("default", gulp.series(watchSass));