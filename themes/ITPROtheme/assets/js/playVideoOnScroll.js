const video = document.querySelector('.project-video video');
window.onscroll = function() {
    if (window.scrollY > video.offsetTop) {
        video.play();
    }
}