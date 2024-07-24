/* eslint-disable no-unused-vars */
import Swiper, { Pagination, Keyboard, Navigation, Autoplay, EffectCoverflow } from 'swiper';
import 'swiper/css/effect-coverflow';


export const homeSlider = (slider) => {
	if (!slider) return;

	const homeSliderInit = new Swiper(slider, {
		modules: [Pagination, Keyboard, Autoplay],
		spaceBetween: 0,
		speed: 1000,
		loop: true,
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		keyboard: {
			enabled: true,
		},

		pagination: {
			el: '.home-slider__pagination',
			type: 'bullets',
			clickable: true,
		},
	});
};

export const postsSlider = (slider) => {
	if (!slider) return;

	const postSliderInit = new Swiper(slider, {
		modules: [Pagination],
		slideClass: 'wp-block-post',
		grabCursor: true,
		slidesPerView: "auto",
		centeredSlides: false,
		spaceBetween: 20,

		breakpoints: {
			320: {
				centeredSlides: true,
				spaceBetween: 40,
				pagination: {
					el: ".swiper-pagination",
					clickable: true,
				},
			},
			782: {
				centeredSlides: false,
				spaceBetween: 20,
			},
		},



		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
	});
};


export const submenuSlider = (slider) => {
	if (!slider) return;

	const submenuSliderInit = new Swiper(slider, {
		modules: [Navigation, Keyboard],
		spaceBetween: 30,
		breakpoints: {
			320: {
				centeredSlides: false,
				spaceBetween: 20,
			},
			782: {
				centeredSlides: false,
				spaceBetween: 20,
			},
		},
		slidesPerView: 'auto',
		watchSlidesProgress: true,

		keyboard: {
			enabled: true,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

	});
};


export const innerLinksSlider = (slider) => {
	if (!slider) return;

	const innerLinksSliderInit = new Swiper(slider, {
		modules: [Pagination, Keyboard, Navigation],
		grabCursor: true,
		slidesPerView: "auto",
		centeredSlides: false,
		spaceBetween: 80,
		breakpoints: {
			320: {
				centeredSlides: true,
				spaceBetween: 40,
				pagination: {
					el: ".swiper-pagination",
					clickable: true,
				},
			},
			782: {
				centeredSlides: false,
				spaceBetween: 80,
			},
		},
		slideClass: 'is-style-inner-links',
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},

	});
};

export const linksSlider = (slider) => {
	if (!slider) return;

	const overviewSlider = new Swiper('.links-slider', {
		modules: [Pagination, Keyboard, Navigation, EffectCoverflow],
		slidesPerView: 3,
		centeredSlides: true,
		spaceBetween: 10,
		effect: "coverflow",
		

		coverflowEffect: {
			rotate: 0,
			stretch: 0,
			depth: 400,
			modifier: 1,
			slideShadows: false,
		},


		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		breakpoints: {
			768: {
				slidesPerView: 3,
				coverflowEffect: {
					rotate: 0,
					stretch: 20,
					depth: 320,
					modifier: 1,
					slideShadows: false,
				},
				},
			320: {
			slidesPerView: 1,
			centeredSlides: true,
			spaceBetween: 0,
			},
		},
		});
};

export const mobileSlider = (slider) => {
	if (!slider) return;

	const mobileSliderInit = new Swiper(slider, {
		modules: [Pagination, Keyboard],
		spaceBetween: 0,
		speed: 1000,
		slideClass: 'wp-block-post',
		loop: true,

		keyboard: {
			enabled: true,
		},

		slidesPerView: '3',

		breakpoints: {
			576: {
				slidesPerView: 1,
			},
			1100: {
				slidesPerView: 2,
			},
		},

		pagination: {
			el: '.home-slider__pagination',
			type: 'bullets',
			clickable: true,
		},
	});
};