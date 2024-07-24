let scrollPosition = 0;
let body = document.body;

export const disableScroll = () => {
    scrollPosition = window.pageYOffset;
    body.classList.toggle('not-scrollable');
    body.style.top = `-${scrollPosition}px`;
  }

  export const enableScroll = () => {
    body.classList.toggle('not-scrollable');
    body.style.removeProperty('top');
    window.scrollTo(0, scrollPosition);
  }
