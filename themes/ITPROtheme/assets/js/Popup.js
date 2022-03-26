const pageOverlay = document.querySelector(".page-overlay");
const popups = document.querySelectorAll(".popup");
const popupBtns = document.querySelectorAll(".open-popup-btn");
console.log();

const openPopup = (popup) =>  {
    pageOverlay.classList.add("page-overlay--active");
    popup.classList.add('popup--active');
}

const closePopup = (popup) => {
    pageOverlay.classList.remove("page-overlay--active");
    popup.classList.remove('popup--active');
}

popups.forEach((popup)=>{
    popup.querySelector(".x-button").addEventListener('click', closePopup.bind(this, popup));
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
    console.log('target', targetPopup)
    popupBtn.addEventListener('click', openPopup.bind(this, targetPopup));
});