@extends('layouts.app')

@section('content')

<div class="bg-gray-100 dark:bg-gray-900 py-10">
    <!-- Hero Section -->
    <section class="text-center px-4 lg:px-8">
        <h1 class="text-4xl font-extrabold text-gray-800 dark:text-gray-100">
            Empower Your Career with Expert Mentorship
        </h1>
        <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
            Join our mentorship programs to learn from top industry experts.
        </p>
        <a href="#services" class="mt-6 inline-block bg-blue-500 text-white py-3 px-6 rounded-full shadow-lg hover:bg-blue-600">
            Explore Mentorship Services
        </a>
    </section>

    <section id="services" class="mt-16">
        <h2 class="text-center text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-10">
            Available Mentorship Services
        </h2>
    </section>

        <!-- How It Works -->
    <section class="mt-16 bg-gray-200 dark:bg-gray-800 py-12">
        <h2 class="text-center text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-10">
            How It Works
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4 lg:px-8">
            <div class="text-center">
                <div class="w-16 h-16 mx-auto bg-blue-500 text-white rounded-full flex items-center justify-center">
                    1
                </div>
                <p class="mt-4 text-lg text-gray-800 dark:text-gray-100">Select a mentorship service.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 mx-auto bg-blue-500 text-white rounded-full flex items-center justify-center">
                    2
                </div>
                <p class="mt-4 text-lg text-gray-800 dark:text-gray-100">Choose an available time slot.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 mx-auto bg-blue-500 text-white rounded-full flex items-center justify-center">
                    3
                </div>
                <p class="mt-4 text-lg text-gray-800 dark:text-gray-100">Join the session with your mentor.</p>
            </div>
        </div>
    </section>

    <section id="testimonials" class="mt-16">
    <h2 class="text-center text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-10">
        What Our Participants Say
    </h2>
    <div class="relative overflow-hidden max-w-4xl mx-auto">
        <!-- <div
            class="flex transition-transform duration-500 ease-in-out"
            data-aos="fade-up"
            id="testimonial-slides"
        > Testimonial goes here
 
        </div>
    
        <div class="absolute top-1/2 transform -translate-y-1/2 left-4">
            <button
                id="prev-slide"
                class="bg-gray-300 dark:bg-gray-700 text-gray-800 dark:text-gray-100 p-2 rounded-full"
            >
                &larr;
            </button>
        </div>
        <div class="absolute top-1/2 transform -translate-y-1/2 right-4">
            <button
                id="next-slide"
                class="bg-gray-300 dark:bg-gray-700 text-gray-800 dark:text-gray-100 p-2 rounded-full"
            >
                &rarr;
            </button>
        </div> -->
    </div>
</section>

<div class="container mx-auto py-6">
    <!-- Request Button -->
    <div class="text-center mb-6">
        <button id="toggleFormButton" class="bg-blue-500 text-white px-6 py-3 rounded-full shadow-lg hover:bg-blue-600">
            Request Mentorship
        </button>
    </div>

    <!-- Notification Section -->
    <div id="notificationSection" class="hidden text-center bg-green-100 text-green-700 p-4 rounded mb-6">
        <p>Your mentorship booking has been successfully submitted!</p>
        <button onclick="hideNotification()" class="text-red-500 font-bold">X</button>
    </div>

    <!-- Booking Form Section -->
    <div id="bookingFormSection" class="hidden transition-all duration-500">
        <!-- Step Indicators -->
        <div class="flex justify-center space-x-4 mb-6">
            <div class="step-indicator active" id="indicator-1">1</div>
            <div class="step-indicator" id="indicator-2">2</div>
            <div class="step-indicator" id="indicator-3">3</div>
            <div class="step-indicator" id="indicator-4">4</div>
            <div class="step-indicator" id="indicator-5">5</div>
        </div>

        <!-- Steps -->
        <div id="step-1" class="step">
            <h3 class="text-xl font-bold mb-4">Select a Mentorship Service</h3>
            <label for="serviceDropdown" class="block text-sm font-bold mb-2">Service</label>
            <select id="serviceDropdown" name="service" class="w-full mb-4 p-2 border rounded">
                <!-- Dynamically populated options -->
            </select>

            <label for="typeDropdown" class="block text-sm font-bold mb-2">Type</label>
            <select id="typeDropdown" name="type" class="w-full mb-4 p-2 border rounded">
                <!-- Dynamically populated options -->
            </select>

            <button onclick="nextStep()" class="bg-green-500 text-white px-6 py-2 rounded">Next</button>
        </div>

        <div id="step-2" class="step hidden">
            <h3 class="text-xl font-bold mb-4">Select an Available Slot</h3>
            <div id="calendar-navigation" class="calendar-navigation">
         
            <div id="slotDetailsPanel" class="slot-details hidden">
                <h3>Selected Slots</h3>
                <ul id="selectedSlotsList"></ul>
            </div>
        </div>
        <diV>
            <button id="prev-month" class="nav-button">&laquo; Previous</button>
            <span id="current-month"></span>
            <button id="next-month" class="nav-button">Next &raquo;</button>
        </div>
            <div id="calendar" class="mb-4 calendar-container"></div>
            <input type="hidden" id="selected-slot" name="selected-slot">
            <button onclick="prevStep()" class="bg-gray-300 text-gray-700 px-6 py-2 rounded mr-4">Back</button>
            <button onclick="nextStep()" class="bg-green-500 text-white px-6 py-2 rounded">Next</button>
        </div>

       <div id="step-3" class="step hidden">
            <h3 class="text-xl font-bold mb-4">Booking Summary</h3>
            <div id="bookingSummary" class="bg-gray-100 p-4 rounded">
                <!-- Summary dynamically populated -->
                <p><strong>Service:</strong> <span id="summary-service"></span></p>
                <p><strong>Type:</strong> <span id="summary-type"></span></p>
                <p><strong>Date:</strong> <span id="summary-date"></span></p>
                <p><strong>Time:</strong> <span id="summary-time"></span></p>
                <p><strong>Price:</strong> <span id="summary-price"></span></p>
            </div>
            <button onclick="prevStep()" class="bg-gray-300 text-gray-700 px-6 py-2 rounded mr-4">Back</button>
            <button onclick="nextStep()" class="bg-green-500 text-white px-6 py-2 rounded">Next</button>
        </div>

          <div id="step-4" class="step hidden">
            <h3 class="text-lg font-bold mb-4">Your Details</h3>
            <p class="mb-4">Please provide your details to proceed with the booking.</p>
            <div class="mb-4">
                <label for="user-name" class="block font-bold mb-2">Full Name</label>
                <input id="user-name" type="text" class="w-full border rounded px-2 py-2" placeholder="Enter your full name">
            </div>
            <div class="mb-4">
                <label for="user-email" class="block font-bold mb-2">Email Address</label>
                <input id="user-email" type="email" class="w-full border rounded px-2 py-2" placeholder="Enter your email address">
            </div>
            <div class="mb-4">
                <label for="user-phone" class="block font-bold mb-2">Phone Number</label>
                <input id="user-phone" type="tel" class="w-full border rounded px-2 py-2" placeholder="Enter your phone number">
            </div>

            <button onclick="prevStep()" class="bg-gray-300 text-gray-700 px-6 py-2 rounded mr-4">Back</button>
            <button onclick="nextStep()" class="bg-green-500 text-white px-6 py-2 rounded">Next</button>
        </div>

        <div id="step-5" class="step hidden">

            <h3 class="text-lg font-bold mb-4">Payment</h3>
            <p class="mb-4">Choose your payment method and provide payment details.</p>
            <div class="mb-4">
                <label for="payment-method" class="block font-bold mb-2">Payment Method</label>
                <select id="payment-method" class="w-full border rounded px-2 py-2">
                <option value="paypal">PayPal</option>
                    <option value="credit_card">Credit Card</option>
                </select>
            </div>
            <div id="credit-card-details" class="hidden mb-4">
                <h4 class="font-bold mb-2">Credit Card Details</h4>
                <div class="mb-2">
                    <label for="card-number" class="block font-bold mb-2">Card Number</label>
                    <input id="card-number" type="text" class="w-full border rounded px-2 py-2" placeholder="Enter your card number">
                </div>
                <div class="flex space-x-2">
                    <div class="w-1/2">
                        <label for="expiry-date" class="block font-bold mb-2">Expiry Date</label>
                        <input id="expiry-date" type="text" class="w-full border rounded px-2 py-2" placeholder="MM/YY">
                    </div>
                    <div class="w-1/2">
                        <label for="cvv" class="block font-bold mb-2">CVV</label>
                        <input id="cvv" type="text" class="w-full border rounded px-2 py-2" placeholder="CVV">
                    </div>
                </div>
            </div>

            <button onclick="prevStep()" class="bg-gray-300 text-gray-700 px-6 py-2 rounded mr-4">Back</button>
            <button onclick="submitForm()" class="bg-blue-500 text-white px-6 py-2 rounded">Pay & Confirm</button>
        </div>
    </div>
</div>

<script>

document.addEventListener("DOMContentLoaded", function () {
    let currentStep = 0;
    const steps = document.querySelectorAll(".step");
    const stepIndicators = document.querySelectorAll(".step-indicator");
    const formSection = document.getElementById("bookingFormSection");
    const notificationSection = document.getElementById("notificationSection");
    const toggleFormButton = document.getElementById("toggleFormButton");

    function showStep(step) {
        steps.forEach((el, index) => {
            el.classList.toggle("hidden", index !== step);
            stepIndicators[index].classList.toggle("active", index === step);
        });
    }

    toggleFormButton.addEventListener("click", function () {
        formSection.classList.toggle("hidden");
        formSection.scrollIntoView({ behavior: "smooth" });
    });

    window.nextStep = function () {
        if (currentStep < steps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    };

    window.prevStep = function () {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    };

    window.submitForm = function () {
    // Display the notification section
    notificationSection.classList.remove("hidden");

    // Hide the form section
    formSection.classList.add("hidden");

    // Reset the form to its initial state
    currentStep = 0;
    showStep(0);

    // Clear input fields and selections
    document.getElementById("serviceDropdown").value = "";
    document.getElementById("typeDropdown").value = "";
    document.getElementById("user-name").value = "";
    document.getElementById("user-email").value = "";
    document.getElementById("payment-method").value = "";
    document.getElementById("card-number").value = "";
    document.getElementById("expiry-date").value = "";
    document.getElementById("cvv").value = "";
    // Scroll back to the Request Mentorship button
    toggleFormButton.scrollIntoView({ behavior: "smooth" });
};

});

// const calendar = document.getElementById("booking-calendar").fullCalendar;
// if (calendar) {
//     calendar.unselect(); // Unselect any selected date/time
// }

setTimeout(() => {
    notificationSection.classList.add("hidden");
}, 5000); // Hide after 5 seconds
window.hideNotification = function () {
    notificationSection.classList.add("hidden");
};

console.log("Form reset and ready for the next request!");


// Add logic for populating the summary dynamically in nextStep()
function populateSummary() {
    document.getElementById("summary-service").innerText = document.getElementById("serviceDropdown").value;
    document.getElementById("summary-type").innerText = document.getElementById("typeDropdown").value;
    document.getElementById("summary-slot").innerText = selectedSlot || "Not selected";
    document.getElementById("summary-name").innerText = document.getElementById("user-name").value;
    document.getElementById("summary-email").innerText = document.getElementById("user-email").value;
    // document.getElementById("summary-phone").innerText = document.getElementById("user-phone").value;
}

// Trigger summary population on Step 4

const updateSummary = () => {
  const service = document.querySelector('select[name="service"]').value;
  const type = document.querySelector('select[name="type"]').value;
  const slot = selectedSlot || "Not selected"; // Assuming `selectedSlot` is populated when selecting a time

  const summaryContainer = document.querySelector('#bookingSummary');
  summaryContainer.innerHTML = `
    <p><strong>Service:</strong> ${service}</p>
    <p><strong>Type:</strong> ${type}</p>
    <p><strong>Slot:</strong> ${slot}</p>
  `;
};

// Call updateSummary() on moving to Step 3


document.addEventListener('DOMContentLoaded', function () {
    const serviceDropdown = document.getElementById('serviceDropdown');
    const typeDropdown = document.getElementById('typeDropdown');

    // Fetch mentorship services
    fetch('/api/mentorship-services')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                data.data.forEach(service => {
                    const option = document.createElement('option');
                    option.value = service.id;
                    option.textContent = `${service.service_name} - $${service.price}`;
                    serviceDropdown.appendChild(option);
                });
            } else {
                console.error('Error: ', data);
            }
        })
        .catch(error => console.error('Error fetching mentorship services:', error));

    // Fetch mentorship types
    fetch('/api/mentorship-types')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                data.data.forEach(type => {
                    const option = document.createElement('option');
                    option.value = type.id;
                    option.textContent = type.type;
                    typeDropdown.appendChild(option);
                });
            } else {
                console.error('Error: ', data);
            }
        })
        .catch(error => console.error('Error fetching mentorship types:', error));

        document.getElementById("payment-method").addEventListener("change", (e) => {
        const creditCardDetails = document.getElementById("credit-card-details");
        if (e.target.value === "credit_card") {
            creditCardDetails.style.display = "block";
        } else {
            creditCardDetails.style.display = "none";
        }
    });
});


</script>
@endsection