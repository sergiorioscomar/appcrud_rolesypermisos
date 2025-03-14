const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .copy('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/js')
   .copy('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css')
   .copy('node_modules/admin-lte/dist/css/alt/', 'public/css/alt')
   .copy('node_modules/admin-lte/plugins/', 'public/plugins');

mix.browserSync('your-local-domain.test'); // Opcional, para desarrollo local
