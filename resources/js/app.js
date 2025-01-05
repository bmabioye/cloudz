import './bootstrap';
import AOS from "aos";
import "aos/dist/aos.css";

// Initialize AOS
AOS.init({
    duration: 1200, // Animation duration in ms
    //offset: 200,    // Start animation after scrolling 200px
    easing: "ease-in-out",
    once: false,     // Animation only occurs once
    disable: function () {
      return window.innerWidth < 768; // Disable animations on small screens
    },
  });
  

// app.js or the Alpine.js script
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.store('theme', {
    darkMode: localStorage.getItem('theme') === 'dark',
    toggle() {
        this.darkMode = !this.darkMode;
        localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
        document.documentElement.classList.toggle('dark', this.darkMode);
    },
    init() {
        const isDark = localStorage.getItem('theme') === 'dark';
        this.darkMode = isDark;
        document.documentElement.classList.toggle('dark', isDark);
    },
});

Alpine.start();

// Add a global Alpine store for dark mode
// Initialize Alpine.js store for dark mode
document.addEventListener('alpine:init', () => {
    Alpine.store('theme', {
        darkMode: localStorage.getItem('theme') === 'dark',
        toggle() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
            document.documentElement.classList.toggle('dark', this.darkMode);
        },
        init() {
            if (localStorage.getItem('theme') === 'dark') {
                this.darkMode = true;
                document.documentElement.classList.add('dark');
            } else {
                this.darkMode = false;
                document.documentElement.classList.remove('dark');
            }
        },
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const slides = document.getElementById('testimonial-slides');
    const prevButton = document.getElementById('prev-slide');
    const nextButton = document.getElementById('next-slide');
    let currentIndex = 0;

    const updateCarousel = () => {
        const slideWidth = slides.children[0].offsetWidth;
        slides.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    };

    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) currentIndex--;
        updateCarousel();
    });

    nextButton.addEventListener('click', () => {
        if (currentIndex < slides.children.length - 1) currentIndex++;
        updateCarousel();
    });

    window.addEventListener('resize', updateCarousel); // Adjust on window resize
});
