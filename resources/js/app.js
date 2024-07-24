import {homeSlider, submenuSlider, postsSlider, innerLinksSlider, linksSlider, mobileSlider} from './modules/slider';
import {toggleMenu} from "./modules/menu-toggler";
import {openMenuSubitems} from "./modules/mobile-menu-accordion";
import {changeHeaderStyle} from "./modules/header-styles";
import { changeSubmenuStyles } from "./modules/submenu-styles";
import { toggleSearchStyles } from "./modules/toggle-search-styles";
import SimpleBar from "simplebar";

const homeSliderTag = document.querySelector('.home-slider.swiper');
const submenuSliderTag = document.getElementById('submenuswiper');
const postsSliderTag = document.querySelector('.posts-slider.swiper');
const innerLinksSliderTag = document.querySelector('.inner-links-slider.swiper');
const linksSliderTag = document.querySelector('.links-slider.swiper');
const mobileSliderTag = document.querySelector('.mobile-slider.swiper');

const header = document.getElementById('header');
const headerInitialClass = header.classList[0];


window.addEventListener('load', () => {
  if (homeSliderTag) homeSlider(homeSliderTag);

  const screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	if (screenWidth < 1121) {
  if (postsSliderTag) postsSlider(postsSliderTag);
  }

  if (innerLinksSliderTag) innerLinksSlider(innerLinksSliderTag);
  if (linksSliderTag) linksSlider(linksSliderTag);
  if (mobileSliderTag) mobileSlider(mobileSliderTag);

  if (submenuSliderTag) {
        changeSubmenuStyles();
        submenuSlider(submenuSliderTag);
    }

    new SimpleBar(document.getElementById('container'), { autoHide: false, scrollbarMaxSize: 23 });

    if (header) {
    changeHeaderStyle(headerInitialClass);
        toggleSearchStyles(header);
  }

  const menuBtn = document.getElementById('burger-btn');
  if (menuBtn) {
    toggleMenu(menuBtn);
  }
  document.addEventListener('click', (el) => {
    openMenuSubitems(el)
  });

  const social = document.querySelector(".social");
  const herosoc = document.querySelector(".home-slider__social");
  if (social && herosoc){
    herosoc.innerHTML = social.innerHTML
  }

});

// window.addEventListener('resize', () => {
// });



