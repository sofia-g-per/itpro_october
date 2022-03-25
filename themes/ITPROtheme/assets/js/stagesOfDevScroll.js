
window.addEventListener('load', function(){
    new Glider(document.querySelector('.glider'), {
        slidesToShow: 1,
        draggable: true,
        responsive: [
            {
                breakpoint: 768,
                settings: 
                {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 1000,
                settings: 
                    {
                        slidesToShow: 3,
                    }
            },
        ]
    })
  })