const pageOverlay = document.querySelector(".page-overlay");
const popups = document.querySelectorAll(".popup");
const popupBtns = document.querySelectorAll(".open-popup-btn");
const popupContent = document.querySelector(".contacts-popup__content")
const popupImage = document.querySelector(".contacts-image")

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
const openPopup = (popup) =>  {
    pageOverlay.classList.add("page-overlay--active");
    popup.classList.add('popup--active');
    sleep(400).then(() => { 
        popupContent.classList.add('contacts-popup__content--active');
        popupImage.classList.add('contacts-image--active');
    });
}

const closePopup = (popup) => {
    popupContent.classList.remove('contacts-popup__content--active');
    popupImage.classList.remove('contacts-image--active');
    sleep(400).then(() => {
        pageOverlay.classList.remove("page-overlay--active");
        popup.classList.remove('popup--active'); 
    })
 
}

const togglePopup = (popup) => {
    if(popup.classList.contains('popup--active')){
        popup.classList.remove('popup--active');

    }else{
        popup.classList.add('popup--active');
    }
}

// if (document.documentElement.clientWidth <  1348) {
//     popupImage.innerHTML.remove()
// } else {
//     if(document.innerHTML.contains(popupImage)){
        
//     }
// };

popups.forEach((popup)=>{
    const xBtn = popup.querySelector(".x-button");
    if(xBtn){
        xBtn.addEventListener('click', closePopup.bind(this, popup));
    }
});

popupBtns.forEach((popupBtn)=> {
    const popupName = popupBtn.dataset.popup;
    let targetPopup;
    popups.forEach((currPopup)=>{
        if(popupName === currPopup.dataset.popup){
            targetPopup = currPopup;
            return;
        }
    });
    if(popupName !== "mobile-nav"){
        popupBtn.addEventListener('click', openPopup.bind(this, targetPopup));
    } else{
        popupBtn.addEventListener('click', togglePopup.bind(this, targetPopup));
    }
});