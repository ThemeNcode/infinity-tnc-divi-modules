const { src, dest } = require('gulp');
const package = require('./package.json');

const files = [
    '**/*',

    // Ignored folders.
    '!**/.*/**', // Hidden files/dirs on Mac/Linux
    '!**/__*/**', // Hidden dirs on Mac
    '!.yarn/**',
    '!**/node_modules/**',
    '!src/**',
    '!test-config/**',
    '!storybook-assets/**',

    // Ignored files.
    '!**/*.zip',
    '!**/*.map',
    '!.gitignore',
    '!.yarnrc.yml',
    '!gulpfile.js',
    '!package.json',
    '!tsconfig.json',
    '!webpack.config.js',
    '!yarn.lock',
    '!composer.json',
    '!composer.lock',
];

const zip = async () => {
    const gulpZip = (await import('gulp-zip')).default;
    // encoding: false keeps binary files (fonts, images) intact.
    // gulp 5 defaults to UTF-8 decoding which corrupts binaries.
    return src(files, { encoding: false })
        .pipe(gulpZip(package.name + '.zip'))
        .pipe(dest('./'));
};

exports.zip = zip;