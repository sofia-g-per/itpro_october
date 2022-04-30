window.addEventListener('load', function(){
    new Glider(document.querySelector('.stages-of-dev-glider'), {
        rewind: true, 
        slidesToShow: 'auto',
        draggable: true,
        itemWidth: 634,
        exactWidth: true,
    })
  })



// document.addEventListener( 'DOMContentLoaded', function() {

//     new Splide( '.splide', {
//             drag: 'free',
//             fixedWidth: '634px',
//             gap: '90px',
//             pagination: false,
//             arrows: false,
//         }).mount();
// } );