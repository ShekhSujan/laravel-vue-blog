const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .vue()
    .sass("resources/sass/app.scss", "public/css");
//mix.sass("resources/sass/site/app.scss", "public/css/style.css");

mix.styles(
    [
        "resources/sass/site/assets/css/bootstrap.min.css",
        "resources/sass/site/assets/css/main.css",
        "resources/sass/site/assets/css/blue.css",
        "resources/sass/site/assets/css/font-awesome.css"
    ],
    "public/css/all.css"
);
mix.scripts(
    [
        "resources/sass/site/assets/js/jquery-1.11.1.min.js",
        "resources/sass/site/assets/js/bootstrap.min.js",
        "resources/sass/site/assets/js/bootstrap-hover-dropdown.min.js",
        "resources/sass/site/assets/js/owl.carousel.min.js",
        "resources/sass/site/assets/js/echo.min.js",
        "resources/sass/site/assets/js/jquery.easing-1.3.min.js",
        "resources/sass/site/assets/js/bootstrap-slider.min.js",
        "resources/sass/site/assets/js/jquery.rateit.min.js",
        "resources/sass/site/assets/js/lightbox.min.js",
        "resources/sass/site/assets/js/jbootstrap-select.min.js",
        "resources/sass/site/assets/js/wow.min.js",
        "resources/sass/site/assets/js/scripts.js"
    ],
    "public/js/all.js"
);
