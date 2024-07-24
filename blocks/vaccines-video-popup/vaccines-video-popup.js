import 'fslightbox';

const homeHero = {
  init: () => {
    const heroBtn = document.querySelector(".vaccines-video-popup .vaccines-video-popup-link");

    if(!heroBtn) return;

    function playPauseIframe() {
      let popup = document.querySelector('.fslightbox-container');
      popup.classList.toggle('active');
      if( popup.classList.contains('active') ) {
        const iframe = popup.querySelector('.fslightbox-youtube-iframe');
        if( !Object.is(iframe,null) ) {
          let src = iframe.getAttribute('src');
          src = src.includes('autoplay=1&mute=1') ? src.replace(/autoplay=0&mute=0/i, 'autoplay=1&mute=0') : src += '&autoplay=1&mute=1';
          iframe.setAttribute('src', src );
          }
        }
      }

    document.addEventListener('click', (e) => {
      if(e.target.classList.contains('vaccines-video-popup-play-btn')) {
        playPauseIframe();
      }
      if(e.target.classList.contains('vaccines-video-popup-mobile-play-btn')) {
        let btnId = e.target.getAttribute('data-btn-id');
        if(btnId) {
          document.getElementById(btnId).click();
        }
      }
    })
  },
}
window.addEventListener('load', homeHero.init);
