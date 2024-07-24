/* eslint-disable no-unused-vars */
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

const overviewSlider = new Swiper('.overview-slider', {
  slidesPerView: 1,
  centeredSlides: false,
  spaceBetween: 10,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    576: {
      slidesPerView: 3,
      centeredSlides: true,
      spaceBetween: 0,
    },
  },
});
