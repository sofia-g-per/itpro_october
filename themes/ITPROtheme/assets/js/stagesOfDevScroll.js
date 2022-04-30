window.addEventListener('load', function(){
    new Glider(document.querySelector('.stages-of-dev-glider'), {
        rewind: true, 
        slidesToShow: 'auto',
        draggable: true,
        itemWidth: 650,
        exactWidth: true,
    })
  })



// document.addEventListener( 'DOMContentLoaded', function() {

//     new Splide( '#stages-splide', {
//             drag: 'free',
//             fixedWidth: '634px',
//             padding: '140px',
//             gap: '155px',
//             pagination: false,
//             arrows: false,
//         }).mount();
// } );