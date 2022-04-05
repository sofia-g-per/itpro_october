const mobileNavPopup = document.getElementById('mobile-nav');
const openMobileNavBtn = document.getElementById('open-mobile-nav-btn'); 
const mobileNavCloseIcon = openMobileNavBtn.querySelector('.mobile-nav-btn__close-icon');
const mobileNavMenuIcon = openMobileNavBtn.querySelector('.mobile-nav-btn__menu-icon');

const toggleMobileNav = () => {
    if(mobileNavPopup.classList.contains('mobile-nav--active')){
        mobileNavPopup.classList.remove('mobile-nav--active');
        mobileNavCloseIcon.classList.add('visually-hidden');
        mobileNavMenuIcon.classList.remove('visually-hidden');
    }else{
        mobileNavPopup.classList.add('mobile-nav--active');
        mobileNavCloseIcon.classList.remove('visually-hidden');
        mobileNavMenuIcon.classList.add('visually-hidden');
    }
}

openMobileNavBtn.addEventListener('click', toggleMobileNav);