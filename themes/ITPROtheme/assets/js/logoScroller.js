
document.addEventListener( 'DOMContentLoaded', function() {

    new Splide( '#logos-splide', {
            type   : 'loop',
            drag: 'free',
            whee: true,
            fixedWidth: '90px',
            gap: '90px',
            pagination: false,
            arrows: false,
        }).mount();
} );



