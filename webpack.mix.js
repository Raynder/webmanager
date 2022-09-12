const mix = require('laravel-mix');

// Mix configuration admin
mix.copy('resources/css/adminlte.min.css', 'public/css/adminlte.min.css')
    .copy('resources/css/adminlte.min.css.map', 'public/css/adminlte.min.css.map')
    .copy('resources/css/ijaboCropTool.min.css', 'public/css/ijaboCropTool.min.css')
    .copy('resources/css/colReorder.dataTables.min.css', 'public/css/colReorder.dataTables.min.css')
    .copy('resources/css/jquery.dataTables.min.css', 'public/css/jquery.dataTables.min.css')
    .copy('resources/css/fontawesome-all.min.css', 'public/css/fontawesome-all.min.css')
    .copy('resources/css/owl.carousel.min.css', 'public/css/owl.carousel.min.css')
    .copy('resources/css/summernote-bs4.min.css', 'public/css/summernote-bs4.min.css');

mix.copy('resources/js/adminlte.min.js', 'public/js/adminlte.min.js')
    .copy('resources/js/adminlte.min.js.map', 'public/js/adminlte.min.js.map')
    .copy('resources/js/ijaboCropTool.min.js', 'public/js/ijaboCropTool.min.js')
    .copy('resources/js/jquery.dataTables.min.js', 'public/js/jquery.dataTables.min.js')
    .copy('resources/js/dataTables.colReorder.min.js', 'public/js/dataTables.colReorder.min.js')
    .copy('resources/js/breakpoints.min.js', 'public/js/breakpoints.min.js')
    .copy('resources/js/browser.min.js', 'public/js/browser.min.js')
    .copy('resources/js/jquery.dropotron.min.js', 'public/js/jquery.dropotron.min.js')
    .copy('resources/js/main.js', 'public/js/main.js')
    .copy('resources/js/util.js', 'public/js/util.js')
    .copy('resources/js/alertas.js', 'public/js/alertas.js')
    .copy('resources/js/owl.carousel.min.js', 'public/js/owl.carousel.min.js')
    .copy('resources/js/summernote-bs4.min.js', 'public/js/summernote-bs4.min.js')
    .copy('resources/js/jquery-ui.min.js', 'public/js/jquery-ui.min.js');
    
mix.js('resources/js/app.js', 'public/js/app.js')
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .sourceMaps();

mix.css('resources/css/app.css', 'public/css/app.css');

// Mix configuration app
mix.copy('resources/css/style.css', 'public/css/style.css')
    .copy('resources/css/line-awesome.min.css', 'public/css/line-awesome.min.css')

mix.copyDirectory('resources/img', 'public/img')

// Fim

mix.version();