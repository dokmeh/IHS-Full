const elixir = require('laravel-elixir');


elixir(mix => {
    mix.sass('a' +
        'pp.scss', 'resources/assets/css')
        .copy("/node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js", "resources/assets/js/bootstrap.js")
        .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/', "public/fonts/bootstrap")

        .styles([
            'bootstrap.css',
            'jquery-ui.css',
            'app.css',
            'vendor.css',
            'flat-admin.css',
            'default.css',
        ])
        .scripts([
            'jquery.js',
            'bootstrap.js',


        ])
        .version('css/all.css', 'js/all.js')

});
