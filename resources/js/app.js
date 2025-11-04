import './bootstrap';

import Swiper from 'swiper/bundle';
import AOS from 'aos';
import Lenis from 'lenis';

window.Swiper = Swiper;

// Initialize AOS
AOS.init({
  duration: 800,
  easing: 'ease-in-out',
  once: true,
  offset: 100,
});


// Initialize Lenis
const lenis = new Lenis({
  autoRaf: true,
});

// Log app ready
console.log('Frontend initialized - Livewire, Tailwind, Vite');
