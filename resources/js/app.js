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


// Calendar

document.addEventListener("DOMContentLoaded", async () => {
    const calendarContainer = document.getElementById("calendar");
    const currentMonthLabel = document.getElementById("current-month");
    const selectedSlotsList = document.getElementById("selectedSlotsList");
    const slotDetailsPanel = document.getElementById("slotDetailsPanel");
    // const bookingSummary = document.getElementById("bookingSummary");

    let currentMonth = dayjs().startOf("month");
    let availableSlots = [];
    let selectedSlots = [];

    const fetchAvailableSlots = async (startDate, endDate) => {
        try {
            const response = await fetch(`/api/bookings/availability?start=${startDate}&end=${endDate}`);
            if (!response.ok) throw new Error("Failed to fetch slots");
            const data = await response.json();
            return data.map(slot => ({
                id: slot.id,
                date: dayjs(slot.date).format("YYYY-MM-DD"),
                startTime: dayjs(slot.start_time, "HH:mm:ss").format("hh:mm A"),
                endTime: dayjs(slot.end_time, "HH:mm:ss").format("hh:mm A"),
                available: slot.available,
            }));
        } catch (error) {
            console.error("Error fetching slots:", error);
            return [];
        }
    };

    const renderCalendar = async () => {
        const startDate = currentMonth.format("YYYY-MM-DD");
        const endDate = currentMonth.endOf("month").format("YYYY-MM-DD");
        availableSlots = await fetchAvailableSlots(startDate, endDate);

        let calendarHTML = "";
        const daysInMonth = currentMonth.daysInMonth();

        for (let i = 1; i <= daysInMonth; i++) {
            const date = currentMonth.date(i);
            const formattedDate = date.format("YYYY-MM-DD");
            const slotsForDate = availableSlots.filter(slot => slot.date === formattedDate);
            const slotClass = slotsForDate.length > 0 ? "available-slot" : "no-slot";

            calendarHTML += `
                <div class="calendar-day ${slotClass}" 
                     data-date="${formattedDate}" 
                     title="${slotsForDate.length > 0 ? `${slotsForDate.length} slot(s) available` : "No slots available"}">
                    <span class="date">${date.format("DD")}</span>
                    <div>${slotsForDate.length > 0 ? "Available" : "No Slot"}</div>
                </div>
            `;
        }

        calendarContainer.innerHTML = calendarHTML;
        currentMonthLabel.textContent = currentMonth.format("MMMM YYYY");

        document.querySelectorAll(".calendar-day").forEach(dayElement => {
            dayElement.addEventListener("click", function () {
                if (this.classList.contains("no-slot")) return;

                const selectedDate = this.dataset.date;
                const slotsForDate = availableSlots.filter(slot => slot.date === selectedDate);

                const isDateSelected = selectedSlots.some(slot => slot.date === selectedDate);

                if (isDateSelected) {
                    this.classList.remove("selected");
                    selectedSlots = selectedSlots.filter(slot => slot.date !== selectedDate);
                } else {
                    this.classList.add("selected");
                    selectedSlots.push(...slotsForDate);
                }

                updateSlotDetailsPanel();
                // updateBookingSummary(); // Update summary when slots change
            });
        });
    };

    const updateSlotDetailsPanel = () => {
        selectedSlotsList.innerHTML = "";

        if (selectedSlots.length > 0) {
            slotDetailsPanel.classList.remove("hidden");

            const slotsGroupedByDate = selectedSlots.reduce((grouped, slot) => {
                grouped[slot.date] = grouped[slot.date] || [];
                grouped[slot.date].push(slot);
                return grouped;
            }, {});

            Object.entries(slotsGroupedByDate).forEach(([date, slots]) => {
                const dateItem = document.createElement("li");
                dateItem.innerHTML = `<strong>${date}</strong>: ${slots
                    .map(slot => `${slot.startTime} - ${slot.endTime}`)
                    .join(", ")}`;
                selectedSlotsList.appendChild(dateItem);
            });
        } else {
            slotDetailsPanel.classList.add("hidden");
        }
    };


    document.getElementById("prev-month").addEventListener("click", () => {
        currentMonth = currentMonth.subtract(1, "month");
        renderCalendar();
    });

    document.getElementById("next-month").addEventListener("click", () => {
        currentMonth = currentMonth.add(1, "month");
        renderCalendar();
    });

    await renderCalendar();
});


document.addEventListener("DOMContentLoaded", function () {
    const searchIcon = document.getElementById("searchIcon");
    const searchBar = document.getElementById("searchBar");

    searchIcon.addEventListener("click", function () {
        // Toggle the visibility of the search bar
        if (searchBar.classList.contains("hidden")) {
            searchBar.classList.remove("hidden");
        } else {
            searchBar.classList.add("hidden");
        }
    });
});

document.addEventListener("click", function (event) {
    const searchIcon = document.getElementById("searchIcon");
    const searchBar = document.getElementById("searchBar");

    // Check if the clicked element is outside the search icon and search bar
    if (!searchBar.contains(event.target) && !searchIcon.contains(event.target)) {
        searchBar.classList.add("hidden");
    }
});
