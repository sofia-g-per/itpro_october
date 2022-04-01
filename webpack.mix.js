let mix = require('laravel-mix');
mix.setPublicPath('./themes/ITPROtheme/assets/dist/')
.js('./themes/ITPROtheme/assets/js/*.js', 'js/combined.js')
.styles([
    './themes/ITPROtheme/assets/css/*.css', 
    './themes/ITPROtheme/assets/css/partials/*.css',
    './themes/ITPROtheme/assets/css/popups/*.css',
    './themes/ITPROtheme/assets/css/pages/*.css',
    './themes/ITPROtheme/assets/css/UI/*.css'
    ], 'css/combined.css'
);
