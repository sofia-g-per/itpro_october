window.addEventListener('load', function(){
    new Glider(document.querySelector('.glider'), {
        slidesToShow: 'auto',
        draggable: true,
        itemWidth: 634,
        exactWidth: true,
    })
  })