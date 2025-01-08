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
        <div class="flex justify-center space-x-4 mb-6 step-indicator-container">
            <div class="step-indicator active" id="indicator-1">Select Mentorship</div>
            <div class="step-indicator" id="indicator-2">Available Slot</div>
            <div class="step-indicator" id="indicator-3">Personal Info</div>
            <div class="step-indicator" id="indicator-4">Summary</div>
            <div class="step-indicator" id="indicator-5">Confirmation</div>
        </div>

        <!-- Steps -->
        <div id="step-1" class="step">
            <h3 class="text-xl font-bold mb-4">Select a Mentorship Service</h3>
            <!-- <label for="serviceDropdown" class="block text-sm font-bold mb-2">Service</label>
            <select id="serviceDropdown" name="service" class="w-full mb-4 p-2 border rounded">
        
            </select>

            <label for="typeDropdown" class="block text-sm font-bold mb-2">Type</label>
            <select id="typeDropdown" name="type" class="w-full mb-4 p-2 border rounded">
           
            </select> -->
            <select id="serviceDropdown" name="service" class="form-control">
                <option value="">Select Service</option>
            </select>

            <select id="typeDropdown" name="type" class="form-control">
                <option value="">Select Type</option>
            </select>
            <select id="topicDropdown" name="topic" class="form-control">
                <option value="">Select Topic</option>
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


        <div id="step-4" class="step hidden">
       <h3 class="text-xl font-bold mb-4">Review Your Booking</h3>
            <div id="bookingSummary" class="bg-gray-100 p-4 rounded summary-container">

            </div>
            <button onclick="prevStep()" class="bg-gray-300 text-gray-700 px-6 py-2 rounded mr-4">Back</button>
            <button onclick="nextStep()" class="bg-green-500 text-white px-6 py-2 rounded">Next</button>
        </div>

        <div id="step-5" class="step hidden">

            <!-- <h3 class="text-lg font-bold mb-4">Payment</h3>
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
            </div> -->
            <h3>Confirm Your Booking</h3>
            <div id="bookingSummary"></div>
            <h3>Payment link will be sent via email after the booking slot has been confirmed</h3>
            <button onclick="prevStep()" class="bg-gray-300 text-gray-700 px-6 py-2 rounded mr-4">Back</button>
            <button onclick="submitForm()" id="confirmBookingButton" class="bg-blue-500 text-white px-6 py-2 rounded">Confirm Booking</button>
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

    // Booking confirmation button
    const confirmBookingButton = document.getElementById("confirmBookingButton");

    let selectedSlots = []; // To store selected slots

    function showStep(step) {
        steps.forEach((el, index) => {
            el.classList.toggle("hidden", index !== step);
            stepIndicators[index].classList.toggle("active", index === step);
        });

        // Update the summary when reaching the summary step
        if (step === 3) {
            updateSummary();
        }
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
        // Display notification
        notificationSection.classList.remove("hidden");

        // Reset form and selections
        formSection.classList.add("hidden");
        currentStep = 0;
        showStep(0);

        document.getElementById("serviceDropdown").value = "";
        document.getElementById("typeDropdown").value = "";
        document.getElementById("topicDropdown").value = "";
        document.getElementById("user-name").value = "";
        document.getElementById("user-email").value = "";
        document.getElementById("payment-method").value = "";
        document.getElementById("card-number").value = "";
        document.getElementById("expiry-date").value = "";
        document.getElementById("cvv").value = "";
        selectedSlots = [];
        document.getElementById("selectedSlotsList").innerHTML = "";

        toggleFormButton.scrollIntoView({ behavior: "smooth" });

        setTimeout(() => {
            notificationSection.classList.add("hidden");
        }, 5000);
    };

    window.hideNotification = function () {
        notificationSection.classList.add("hidden");
    };

    // Function to dynamically update the booking summary
    const updateSummary = () => {
        const service = document.querySelector("#serviceDropdown").options[document.querySelector("#serviceDropdown").selectedIndex].text || "Not selected";
        const type =  document.querySelector("#typeDropdown").options[document.querySelector("#typeDropdown").selectedIndex].text  || "Not selected";
        const topic =  document.querySelector("#topicDropdown").options[document.querySelector("#topicDropdown").selectedIndex].text || "Not selected";
        const price = document.querySelector("#priceInput")?.value || "Not provided";

        const slotsSummary = selectedSlots
            .map(
                (slot) => `<li>${slot.date} (${slot.startTime} - ${slot.endTime})</li>`
            )
            .join("");

        console.log("Selected Slots:", slotsSummary);

        const summaryContainer = document.getElementById("bookingSummary");
            summaryContainer.innerHTML = `
            <p><strong>Service:</strong> ${service}</p>
            <p><strong>Type:</strong> ${type}</p>
            <p><strong>Topic:</strong> ${topic}</p>
            <p><strong>Price:</strong> ${price}</p>
            <p><strong>Slots:</strong></p>
            <ul>${slotsSummary || "<li>No slots selected</li>"}</ul>
        `;
    };


    confirmBookingButton.addEventListener("click", async function () {
        const bookingDetails = {
            service: document.querySelector('select[name="service"]').value,
            type: document.querySelector('select[name="type"]').value,
            topic: document.querySelector('select[name="topic"]').value,
            slots: selectedSlots,
        };

        try {
            const response = await fetch("/api/bookings/confirm", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(bookingDetails),
            });

            const result = await response.json();
            if (response.ok) {
                alert("Booking confirmed! Booking ID: " + result.bookingId);
                // Optionally redirect to confirmation or dashboard page
            } else {
                alert("Error confirming booking: " + result.message);
            }
        } catch (error) {
            console.error("Error confirming booking:", error);
            alert("Booking Confirmation error. Please try again");
        }
    });

    // Example function to handle slot selection (integrate into slot click logic)
    window.addSlotToSelection = function (slotData) {
        selectedSlots.push(slotData);
        updateSummary(); // Update the summary immediately when a slot is added
    };
    // if (currentstep === 3) {
    //         updateSummary();
    //     }
});



// service drop menu
document.addEventListener('DOMContentLoaded', function () {
    const serviceDropdown = document.getElementById('serviceDropdown');
    const typeDropdown = document.getElementById('typeDropdown');
    const topicDropdown = document.getElementById('topicDropdown');
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

                typeDropdown.addEventListener("change", function () {
                const selectedTypeValue = this.value; // Get the value of the selected option
                const selectedType = this.options[this.selectedIndex].text; // Get the text of the selected option

                console.log("Selected Value:", selectedTypeValue);
                console.log("Selected Text:", selectedType);
            });

            } else {
                console.error('Error: ', data);
            }
        })
        .catch(error => console.error('Error fetching mentorship types:', error));

    // fetch topics 

    fetch('/api/mentorship-topics')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                data.data.forEach(topic => {
                    const option = document.createElement('option');
                    option.value = topic.id;
                    option.textContent = topic.name;
                    topicDropdown.appendChild(option);
                });
            } else {
                console.error('Error: ', data);
            }
        })
        .catch(error => console.error('Error fetching mentorship topics:', error));


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