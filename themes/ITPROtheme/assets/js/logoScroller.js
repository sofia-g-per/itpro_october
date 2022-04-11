window.addEventListener('load', function(){
    new Glider(document.querySelector('.logo-glider'), {
        slidesToShow: 'auto',
        slidesToScroll: 'auto',
        itemWidth: 100,
        draggable: true,
        rewind: true,
        
    })
  })