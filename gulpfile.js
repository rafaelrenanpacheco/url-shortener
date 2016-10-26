const elixir = require("laravel-elixir");
const glob = require("glob");
const fs = require("fs");

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.css.minifier.pluginOptions = {
    keepSpecialComments: 0,
};

glob("public/**/*.+(css|js|map)", {}, function(er, files) {
    if (er) {
        console.log(er);
    } else {
        files.forEach(function(file) {
            fs.unlinkSync(file);
        });
    }
});

/* eslint strict: 0 */
elixir(mix => {
    mix.sass(["app.scss"], "public/css/all.css");

    if (elixir.config.production) {
        mix.version(["css/all.css"], "public");
    }
});
