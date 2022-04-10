let mix = require('laravel-mix');

mix
.js('./themes/ITPROtheme/assets/js/*.js', 'js/combined.js')
.styles([
    './themes/ITPROtheme/assets/css/*.css', 
    './themes/ITPROtheme/assets/css/partials/*.css',
    './themes/ITPROtheme/assets/css/popups/*.css',
    './themes/ITPROtheme/assets/css/pages/*.css',
    './themes/ITPROtheme/assets/css/UI/*.css',
    
    ], './themes/ITPROtheme/assets/dist/css/combined.css'
)
.setPublicPath('./themes/ITPROtheme/assets/dist/');

// mix.browserSync({
//     proxy: 'itpro',
//     host: 'localhost',
//     files: [
//         './themes/ITPROtheme/assets/dist/css/*.css'
//     ]
// })

mix.browserSync('index.css');