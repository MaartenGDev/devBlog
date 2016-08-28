var elixir = require('laravel-elixir');
//require('./elixir-extensions');

elixir(function(mix) {

    // Markdown Editor
    mix.scripts(['../../../node_modules/simplemde/dist/simplemde.min.js'],'public/js/simplemde.min.js');
    mix.sass(['../../../node_modules/simplemde/dist/simplemde.min.css'],'public/css/simplemde.min.css');

    // Dashboard css
    mix.sass(['dashboard.scss'],'public/css/dashboard.css');

    // Load the markdown editor
    mix.scripts(['dashboard.js'],'public/js/dashboard.js');

    mix
        .sass([
            'app.scss',
            'input.scss'
        ], 'public/css/app.css')

        .scripts([
            'app.js',
            'editor.js',
            'navigate.js',
        ], 'public/js/app.js');
});