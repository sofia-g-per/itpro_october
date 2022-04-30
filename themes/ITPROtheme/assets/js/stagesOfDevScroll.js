window.addEventListener('load', function(){
    new Glider(document.querySelector('.stages-of-dev-glider'), {
        rewind: true, 
        slidesToShow: 'auto',
        draggable: true,
        itemWidth: 634,
        exactWidth: true,
    })
  })