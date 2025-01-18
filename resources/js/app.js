import './bootstrap';
import AOS from "aos";
import "aos/dist/aos.css";
import dayjs from 'dayjs';

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
axios.defaults.baseURL = 'http://127.0.0.1:8000';
axios.defaults.withCredentials = true; // For Sanctum Authentication

// Initialize AOS
AOS.init({
    delay: 0,
    duration: 1200, // Animation duration in ms
    //offset: 200,    // Start animation after scrolling 200px
    easing: "ease-in-out",
    once: false,     // Animation only occurs once
    disable: function () {
      return window.innerWidth < 768; // Disable animations on small screens
    },
  });
  


// app.js or the Alpine.js script
// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start();

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

// store the access_token
document.addEventListener('livewire:load', () => {
    Livewire.on('storeToken', (token) => {
        localStorage.setItem('access_token', token);
        console.log('Token stored successfully:', token);
    });
});


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

        if(calendarContainer){
            calendarContainer.innerHTML = calendarHTML;
            currentMonthLabel.textContent = currentMonth.format("MMMM YYYY");
        }

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

    const prevMonth = document.getElementById("prev-month");
    if(prevMonth) {
        prevMonth.addEventListener("click", () => {
            currentMonth = currentMonth.subtract(1, "month");
            renderCalendar();
        });
    }
    
    const comingMonth = document.getElementById("next-month");
    if(comingMonth) {
        comingMonth.addEventListener("click", () => {
        currentMonth = currentMonth.add(1, "month");
        renderCalendar();
    });

    }

    await renderCalendar();
});


document.addEventListener("DOMContentLoaded", function () {
    const searchIcon = document.getElementById("searchIcon");
    const searchBar = document.getElementById("searchBar");

    const element = document.getElementById('your-element-id');
    if (searchIcon) {
        searchIcon.addEventListener("click", function () {
            // Toggle the visibility of the search bar
            if (searchBar.classList.contains("hidden")) {
                searchBar.classList.remove("hidden");
            } else {
                searchBar.classList.add("hidden");
            }
        });
    }
    
});

document.addEventListener("click", function (event) {
    const searchIcon = document.getElementById("searchIcon");
    const searchBar = document.getElementById("searchBar");

    // Check if the clicked element is outside the search icon and search bar
    if (!searchBar.contains(event.target) && !searchIcon.contains(event.target)) {
        searchBar.classList.add("hidden");
    }
});

// Control access to view Premium resources
function accessResource(resourceId) {
    axios.get(`/api/resources/${resourceId}/access`, {
        headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
        }
    })
    .then(response => {
        console.log('Resource details:', response.data);
        // Show resource details
    })
    .catch(error => {
        if (error.response && error.response.status === 403) {
            alert('You need to purchase or subscribe to access this resource.');
        } else {
            console.error('Error accessing resource:', error);
        }
    });
}

document.getElementById('accountDropdown').addEventListener('click', () => {
    const menu = document.getElementById('accountMenu');
    menu.classList.toggle('hidden');
});



