

window.addEventListener('load', function(){
    let glider = new Glider(document.querySelector('.glider'), {
        slidesToShow: 1,
        scrollPropogate: false,
        scrollLock: true,
        scrollLockDelay: 0
    })

    const categoryBtns = document.querySelectorAll(".tab-button");
    categoryBtns[0].classList.add('tab-button--active');
    const changeCategory = (e)=> {
        const btn = e.target.closest('.tab-button');
        if (btn && !btn.classList.contains('tab-button--active')){
            document.querySelector('.tab-button--active').classList.remove('tab-button--active');
            btn.classList.add('tab-button--active');
            const index = Array.prototype.indexOf.call(categoryBtns, btn);
            glider.scrollItem(index);
        }

    };

    categoryBtns.forEach((btn) => {
        btn.addEventListener('click', changeCategory)
    });

});