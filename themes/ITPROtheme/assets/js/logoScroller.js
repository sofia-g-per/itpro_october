
document.addEventListener( 'DOMContentLoaded', function() {

    new Splide( '.splide', {
            type   : 'loop',
            drag: 'free',
            fixedWidth: '90px',
            gap: '90px',
            pagination: false,
            arrows: false,
        }).mount();
} );



