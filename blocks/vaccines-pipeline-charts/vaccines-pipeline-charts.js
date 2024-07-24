/* eslint-disable no-unused-vars */
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

const chartsSlider = new Swiper('.charts-slider', {
  slidesPerView: 1,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
