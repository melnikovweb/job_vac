import { disableScroll, enableScroll } from './body-scroll';

export const toggleMenu = (menuBtn) => {

  const header = document.getElementById('header');
  const submenu = document.getElementById('submenu');
  const menuWrapper = document.querySelector('.menu__wrapper');
  const headerStartingClass = Array.from(header.classList).find(className => className.startsWith("sticky-header--"));

  if (menuBtn) {

    menuWrapper.addEventListener('click', () => {
      if (!menuBtn.classList.contains('burger-active')) {
        openMenu(menuBtn);
        if (submenu) {
          submenu.classList.add('hidden');
        }

        header.classList.remove(headerStartingClass);
        header.classList.add('sticky-header--transparent-full');

      } else {
        closeMenu(menuBtn);
        header.classList.remove('sticky-header--transparent-full');
        const scrollY = window.scrollY;
        if (scrollY > 20) {
          header.classList.add('sticky-header--default');
        } else {
          header.classList.add(headerStartingClass);
        }
      }
    });
  }
};

function openMenu(menuBtn) {
  menuBtn.classList.add('burger-active');
  document.getElementById('menu').classList.add('nav-wrapper--active');
  const ua = window.navigator.userAgent;
  const iOS = ua.match(/iPad/i) || ua.match(/iPhone/i);
  const webkit = ua.match(/WebKit/i);
  const iOSSafari = iOS && webkit && !ua.match(/CriOS/i);
  if (iOSSafari) {
    document.getElementById('menu').classList.add('nav-wrapper--iphones');
  }
  document.getElementById('menu').scrollTop = 0;
  disableScroll();
}

function closeMenu(menuBtn) {
  menuBtn.classList.remove('burger-active');
  document.getElementById('menu').classList.remove('nav-wrapper--active');
  const ua = window.navigator.userAgent;
  const iOS = ua.match(/iPad/i) || ua.match(/iPhone/i);
  const webkit = ua.match(/WebKit/i);
  const iOSSafari = iOS && webkit && !ua.match(/CriOS/i);
  if (iOSSafari) {
    document.getElementById('menu').classList.remove('nav-wrapper--iphones');
  }
  enableScroll();
}
