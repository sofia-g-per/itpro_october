

const imgContainer = document.querySelector('.our-customers__img');

const width = window.innerWidth;
const height = window.innerHeight;
const domain = window.location.href;

if (width > 2560 && height > 1506) imgContainer.innerHTML  = `<img src="${domain}themes/ITPROtheme/assets/img/our_customers/contacts-bg4k.jpg">`