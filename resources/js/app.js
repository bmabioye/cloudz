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
  
  import { Calendar } from '@fullcalendar/core';
  import dayGridPlugin from '@fullcalendar/daygrid';
  import timeGridPlugin from '@fullcalendar/timegrid';
  import interactionPlugin from '@fullcalendar/interaction';
  
  // Import CSS directly
//   import '@fullcalendar/daygrid/index.css';
//   import '@fullcalendar/timegrid/index.css';
//   import '@fullcalendar/core/index.css';

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

// Booking calendar
document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('booking-calendar');
    
    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
       initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            // right: 'timeGridDay,timeGridWeek',
            right: 'dayGridMonth,timeGridWeek,timeGridDay',
        },
        // initialView: timeGridDay,
        // height: auto,

        events: async function (fetchInfo, successCallback, failureCallback) {
            try {
                // Fetch available slots from API
                const response = await axios.get(`/api/bookings/availability/${fetchInfo.startStr}/${fetchInfo.endStr}`);
                successCallback(response.data);
            } catch (error) {
                failureCallback(error);
            }
        },
        selectable: true,
        select: function (info) {
            // Handle slot selection
            alert(`Selected: ${info.startStr} to ${info.endStr}`);

             // Open the modal and pass selected slot details
            document.getElementById('slotModal').classList.remove('hidden');
            document.getElementById('selectedDate').innerText = `Date: ${info.startStr}`;
            document.getElementById('selectedTime').innerText = `Time: ${info.start.toLocaleTimeString()} - ${info.end.toLocaleTimeString()}`;
            document.getElementById('slotStart').value = info.start.toISOString();
            document.getElementById('slotEnd').value = info.end.toISOString();
        },
        eventClick: function (info) {
            // Handle event click (e.g., edit or delete a booking)
            alert(`Event: ${info.event.title}`);
        },
    });

    calendar.render();
});


// Booking form logic for submission 


document.addEventListener('DOMContentLoaded', () => {
    // Fetch mentorship services
    fetch('/api/bookings')
        .then(response => response.json())
        .then(data => {
            const serviceDropdown = document.getElementById('mentorship-service');
            data.forEach(service => {
                const option = document.createElement('option');
                option.value = service.id;
                option.textContent = `${service.service_name} (${service.price} USD)`;
                serviceDropdown.appendChild(option);
            });
        });
});


