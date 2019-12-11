let mix = require('laravel-mix');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management // pass an array and the files will be merged
 |--------------------------------------------------------------------------
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets1/icon54-v2/style.css',
    'resources/assets1/web/assets/mobirise-icons/mobirise-icons.css',
    'resources/assets1/web/assets/mobirise-icons2/mobirise2.css',
    'resources/assets1/icon54/style.css',
    'resources/assets1/tether/tether.min.css',
    'resources/assets1/bootstrap/css/bootstrap-grid.min.css',
    'resources/assets1/bootstrap/css/bootstrap-reboot.min.css',
    'resources/assets1/animate.css/animate.min.css',
    'resources/assets1/socicon/css/styles.css',
    'resources/assets1/as-pie-progress/css/progress.min.css',
    'resources/assets1/dropdown/css/style.css',
    'resources/assets1/theme/css/style.css',
    'resources/assets1/mobirise/css/mbr-additional.css'
    ], 'public/css/all.css')
    .options({
      //processCssUrls: false
   }).version();
mix.scripts([
    'resources/assets1/popper/popper.min.js',
    'resources/assets1/tether/tether.min.js',
    'resources/assets1/smooth-scroll/smooth-scroll.js',
    'resources/assets1/viewportchecker/jquery.viewportchecker.js',
    'resources/assets1/jarallax/jarallax.min.js',
    'resources/assets1/dropdown/js/script.min.js',
    'resources/assets1/touch-swipe/jquery.touch-swipe.min.js',
    'resources/assets1/theme/js/script.js'
], 'public/js/all.js').version();
