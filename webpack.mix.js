let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 */

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
//mix.js('resources/assets/js/app.js', 'public/js')
mix.styles([
    'resources/assets/icon54-v2/style.css',
    'resources/assets/web/assets/mobirise-icons/mobirise-icons.css',
    'resources/assets/icon54/style.css',
    'resources/assets/tether/tether.min.css',
    'resources/assets/soundcloud-plugin/style.css',
    'resources/assets/bootstrap/css/bootstrap.min.css',
    'resources/assets/bootstrap/css/bootstrap-grid.min.css',
    'resources/assets/bootstrap/css/bootstrap-reboot.min.css',
    'resources/assets/animate.css/animate.min.css',
    'resources/assets/socicon/css/styles.css',
    'resources/assets/as-pie-progress/css/progress.min.css',
    'resources/assets/dropdown/css/style.css',
    'resources/assets/theme/css/style.css',
    'resources/assets/mobirise/css/mbr-additional.css'
    ], 'public/css/all.css')
    .options({
      //processCssUrls: false
   });
mix.scripts([
    'resources/assets/web/assets/jquery/jquery.min.js',
    'resources/assets/popper/popper.min.js',
    'resources/assets/tether/tether.min.js',
    'resources/assets/bootstrap/js/bootstrap.min.js',
    'resources/assets/smooth-scroll/smooth-scroll.js',
    'resources/assets/viewport-checker/jquery.viewportchecker.js',
    'resources/assets/jarallax/jarallax.min.js',
    'resources/assets/dropdown/js/script.min.js',
    'resources/assets/as-pie-progress/jquery-as-pie-progress.min.js',
    'resources/assets/touch-swipe/jquery.touch-swipe.min.js',
    'resources/assets/theme/js/script.js'
], 'public/js/all.js');
