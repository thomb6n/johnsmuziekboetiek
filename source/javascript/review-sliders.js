import { Swiper } from "swiper";
import { Navigation, A11y, Autoplay } from "swiper/modules";

document.addEventListener("DOMContentLoaded", () => {
	const slider = new Swiper(".review-slider", {
		modules: [Navigation, A11y, Autoplay],
		a11y: true,
		loop: true,
		autoplay: {
			delay: 5000,
		},
		speed: 1000,
		autoHeight: true,
		slidesPerView: 1,
		navigation: {
			nextEl: ".review-slider-nav .slider-next",
			prevEl: ".review-slider-nav .slider-prev",
		},
	});
});
