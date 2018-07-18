var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss');
    mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', 'public/js');
    mix.copy('node_modules/font-awesome/fonts', 'public/fonts');
});
