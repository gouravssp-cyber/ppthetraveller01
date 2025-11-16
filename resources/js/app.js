import "./bootstrap";

import Swiper from "swiper/bundle";
import "swiper/css/bundle";
import AOS from "aos";
import Lenis from "lenis";
import Alpine from "alpinejs";

window.Swiper = Swiper;
window.Alpine = Alpine;

import "aos/dist/aos.css";

AOS.init({
    duration: 800,
    easing: "ease-in-out",
    once: true,
    offset: 100,
});

const lenis = new Lenis({
    autoRaf: true,
});

Alpine.start();

document.addEventListener("alpine:init", () => {
    Alpine.data("gallery", () => ({
        galleryModalOpen: false,
        openGallery() {
            this.galleryModalOpen = true;
            setTimeout(initGallerySwipers, 150);
        },
        closeGallery() {
            this.galleryModalOpen = false;
        },
    }));
});

function initGallerySwipers() {
    const galleryThumbs = new Swiper("#galleryThumbs", {
        spaceBetween: 10,
        slidesPerView: "auto",
        freeMode: true,
        watchSlidesProgress: true,
    });

    new Swiper("#gallerySwiper", {
        spaceBetween: 20,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        thumbs: { swiper: galleryThumbs },
        centeredSlides: true,
        loop: true,
        grabCursor: true,
    });
}




// Log app ready
console.log("Frontend initialized - Livewire, Tailwind, Vite");


