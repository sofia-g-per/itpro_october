window.addEventListener('load', function(){
    new Glider(document.querySelector('.logo-glider'), {
        rewind: true, 
        slidesToShow: 'auto',
        slidesToScroll: 'auto',
        itemWidth: 100,
        draggable: true,

    }).scrollItem(32);

  })