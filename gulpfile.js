const { src, dest } = require('gulp');
const fs = require('fs');
const path = require('path');
const { Transform } = require('stream');
const package = require('./package.json');

// The plugin bootstraps its PSR-4 autoloader via `require vendor/autoload.php`.
// `vendor/` is gitignored, so a checkout without `composer install` has no
// autoloader — a zip built from that state fatals on activation (blank/AJAX
// errors in the Divi builder). Fail loudly here instead of shipping a broken zip.
const assertVendorPresent = () => {
    if (!fs.existsSync(path.join(__dirname, 'vendor', 'autoload.php'))) {
        throw new Error(
            'vendor/autoload.php is missing. Run `composer install` before `gulp zip`, '
            + 'otherwise the packaged plugin will fatal on activation.'
        );
    }
};

// Nest every file under a top-level `<package.name>/` folder so the archive
// extracts into a plugin root folder (required by the Divi Marketplace), e.g.
// infinity-tnc-divi-modules/admin/... instead of admin/... at the zip root.
const wrapInPluginFolder = () => new Transform({
    objectMode: true,
    transform(file, _encoding, callback) {
        if (file.relative) {
            file.path = path.join(file.base, package.name, file.relative);
        }
        callback(null, file);
    },
});

const files = [
    '**/*',

    // Ignored folders.
    '!**/.*/**', // Hidden files/dirs on Mac/Linux
    '!**/__*/**', // Hidden dirs on Mac
    '!.yarn/**',
    '!**/node_modules/**',
    '!src/**',
    '!test-config/**',

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
    assertVendorPresent();
    const gulpZip = (await import('gulp-zip')).default;
    // encoding: false keeps binary files (fonts, images) intact.
    // gulp 5 defaults to UTF-8 decoding which corrupts binaries.
    return src(files, { encoding: false })
        .pipe(wrapInPluginFolder())
        .pipe(gulpZip(package.name + '.zip'))
        .pipe(dest('./'));
};

exports.zip = zip;