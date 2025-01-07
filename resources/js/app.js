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

// Testimonial 
// document.addEventListener('DOMContentLoaded', () => {
//     const slides = document.getElementById('testimonial-slides');
//     const prevButton = document.getElementById('prev-slide');
//     const nextButton = document.getElementById('next-slide');
//     let currentIndex = 0;

//     const updateCarousel = () => {
//         const slideWidth = slides.children[0].offsetWidth;
//         slides.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
//     };

//     prevButton.addEventListener('click', () => {
//         if (currentIndex > 0) currentIndex--;
//         updateCarousel();
//     });

//     nextButton.addEventListener('click', () => {
//         if (currentIndex < slides.children.length - 1) currentIndex++;
//         updateCarousel();
//     });

//     window.addEventListener('resize', updateCarousel); // Adjust on window resize
// });

// Calendar


document.addEventListener('DOMContentLoaded', async () => {
    const calendarContainer = document.getElementById('calendar');
    const currentMonthLabel = document.getElementById('current-month');
    const selectedSlots = [];
    let currentMonth = dayjs().startOf('month'); // Start with the current month

    // Function to fetch available slots
    const fetchAvailableSlots = async (startDate, endDate) => {
        try {
            const response = await fetch(`/api/bookings/availability?start=${startDate}&end=${endDate}`);
            if (!response.ok) throw new Error('Failed to fetch slots');
            const data = await response.json();
            return data.map(slot => ({
                id: slot.id,
                date: dayjs(slot.date).format('YYYY-MM-DD'),
                startTime: slot.start_time,
                endTime: slot.end_time,
                available: slot.available,
            }));
        } catch (error) {
            console.error('Error fetching slots:', error);
            return [];
        }
    };

    // Function to render the calendar
    const renderCalendar = async () => {
        const startDate = currentMonth.format('YYYY-MM-DD');
        const endDate = currentMonth.endOf('month').format('YYYY-MM-DD');
        const availableSlots = await fetchAvailableSlots(startDate, endDate);
        const daysInMonth = currentMonth.daysInMonth();

        let calendarHTML = '';
        for (let i = 1; i <= daysInMonth; i++) {
            const formattedDate = currentMonth.date(i).format('YYYY-MM-DD');
            const slot = availableSlots.find(s => s.date === formattedDate);
            const slotClass = slot?.available ? 'available-slot' : 'no-slot';

            calendarHTML += `
                <div 
                    class="calendar-day ${slotClass}" 
                    data-id="${slot?.id || ''}" 
                    data-date="${slot?.date || ''}" 
                    data-start-time="${slot?.startTime || ''}" 
                    data-end-time="${slot?.endTime || ''}" 
                    onclick="${slot?.available ? `handleSlotClick(this)` : ''}">
                    <span class="date">${i}</span>
                    <div>${slot?.available ? 'Available' : 'No Slot'}</div>
                </div>
            `;
        }

        calendarContainer.innerHTML = calendarHTML;
        currentMonthLabel.textContent = currentMonth.format('MMMM YYYY');
    };

    // Handle slot click
    window.handleSlotClick = (slotElement) => {
        if (!slotElement) return;

        const slotData = {
            id: slotElement.dataset.id,
            date: slotElement.dataset.date,
            startTime: slotElement.dataset.startTime,
            endTime: slotElement.dataset.endTime,
        };

        const index = selectedSlots.findIndex(slot => slot.id === slotData.id);
        if (index > -1) {
            // Deselect the slot
            selectedSlots.splice(index, 1);
            slotElement.classList.remove('selected');
        } else {
            // Select the slot
            selectedSlots.push(slotData);
            slotElement.classList.add('selected');
        }

        updateSlotDetailsPanel();
    };

    // Update slot details panel
    const updateSlotDetailsPanel = () => {
        const panel = document.getElementById('slotDetailsPanel');
        const list = document.getElementById('selectedSlotsList');

        list.innerHTML = ''; // Clear the list
        if (selectedSlots.length > 0) {
            panel.classList.remove('hidden');
            selectedSlots.forEach(slot => {
                const listItem = document.createElement('li');
                const formattedStartTime = dayjs(slot.startTime, 'HH:mm:ss').format('hh:mm A');
                const formattedEndTime = dayjs(slot.endTime, 'HH:mm:ss').format('hh:mm A');
                listItem.textContent = `${slot.date} (${formattedStartTime} - ${formattedEndTime})`;
                list.appendChild(listItem);
            });
            
        } else {
            panel.classList.add('hidden');
        }
    };

    // Navigation buttons
    document.getElementById('prev-month').addEventListener('click', () => {
        currentMonth = currentMonth.subtract(1, 'month');
        renderCalendar();
    });

    document.getElementById('next-month').addEventListener('click', () => {
        currentMonth = currentMonth.add(1, 'month');
        renderCalendar();
    });

    // Initial render
    await renderCalendar();
});
