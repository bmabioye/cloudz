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
    <!-- Call to Action -->
    <!-- <section class="mt-16 text-center">
        <a href="#services" class="bg-blue-500 text-white py-3 px-6 rounded-full shadow-lg hover:bg-blue-600">
            Get Started Today
        </a>
    </section> -->


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
            <div id="booking-calendar" class="mb-4"></div>
            <button onclick="prevStep()" class="bg-gray-300 text-gray-700 px-6 py-2 rounded mr-4">Back</button>
            <button onclick="nextStep()" class="bg-green-500 text-white px-6 py-2 rounded">Next</button>
        </div>

        <div id="step-3" class="step hidden">
            <h3 class="text-xl font-bold mb-4">Booking Summary</h3>
            <div id="summary" class="bg-gray-100 p-4 rounded">
                <!-- Summary dynamically populated -->
            </div>
            <button onclick="prevStep()" class="bg-gray-300 text-gray-700 px-6 py-2 rounded mr-4">Back</button>
            <button onclick="nextStep()" class="bg-green-500 text-white px-6 py-2 rounded">Next</button>
        </div>

        <div id="step-4" class="step hidden">
            <h3 class="text-xl font-bold mb-4">Enter Your Details</h3>
            <label for="name" class="block text-sm font-bold mb-2">Name</label>
            <input type="text" id="name" name="name" class="w-full mb-4 p-2 border rounded" placeholder="Your Name">

            <label for="email" class="block text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full mb-4 p-2 border rounded" placeholder="Your Email">

            <button onclick="prevStep()" class="bg-gray-300 text-gray-700 px-6 py-2 rounded mr-4">Back</button>
            <button onclick="nextStep()" class="bg-green-500 text-white px-6 py-2 rounded">Next</button>
        </div>

        <div id="step-5" class="step hidden">
            <h3 class="text-xl font-bold mb-4">Payment</h3>
            <label for="payment-method" class="block text-sm font-bold mb-2">Payment Method</label>
            <select id="payment-method" name="payment_method" class="w-full mb-4 p-2 border rounded">
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select>

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
    document.getElementById("mentorship-service").value = "";
    document.getElementById("mentorship-type").value = "";
    document.getElementById("name").value = "";
    document.getElementById("email").value = "";
    document.getElementById("payment-method").value = "";

    // Scroll back to the Request Mentorship button
    toggleFormButton.scrollIntoView({ behavior: "smooth" });
};

});

const calendar = document.getElementById("booking-calendar").fullCalendar;
if (calendar) {
    calendar.unselect(); // Unselect any selected date/time
}

setTimeout(() => {
    notificationSection.classList.add("hidden");
}, 5000); // Hide after 5 seconds
window.hideNotification = function () {
    notificationSection.classList.add("hidden");
};

console.log("Form reset and ready for the next request!");


// Add logic for populating the summary dynamically in nextStep()
function populateSummary() {
    document.getElementById("summary-service").innerText = document.getElementById("mentorship-service").value;
    document.getElementById("summary-type").innerText = document.getElementById("mentorship-type").value;
    document.getElementById("summary-slot").innerText = selectedSlot || "Not selected";
    document.getElementById("summary-name").innerText = document.getElementById("user-name").value;
    document.getElementById("summary-email").innerText = document.getElementById("user-email").value;
    document.getElementById("summary-phone").innerText = document.getElementById("user-phone").value;
}

// Trigger summary population on Step 4
function nextStep() {
    if (currentStep === 3) populateSummary();
    if (currentStep < steps.length - 1) {
        currentStep++;
        showStep(currentStep);
    }
}

const updateSummary = () => {
  const service = document.querySelector('select[name="service"]').value;
  const type = document.querySelector('select[name="type"]').value;
  const slot = selectedSlot; // Assuming `selectedSlot` is populated when selecting a time

  const summaryContainer = document.querySelector('#bookingSummary');
  summaryContainer.innerHTML = `
    <p><strong>Service:</strong> ${service}</p>
    <p><strong>Type:</strong> ${type}</p>
    <p><strong>Slot:</strong> ${slot}</p>
  `;
};

// Call updateSummary() on moving to Step 3



// document.addEventListener('DOMContentLoaded', function () {
//     // Populate the service dropdown
//     fetch('/api/mentorship-services')
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 const serviceDropdown = document.getElementById('serviceDropdown');
//                 data.data.forEach(service => {
//                     const option = document.createElement('option');
//                     option.value = service.id;
//                     option.textContent = `${service.service_name} - $${service.price}`;
//                     serviceDropdown.appendChild(option);
//                 });
//             }
//         })
//         .catch(error => console.error('Error fetching mentorship services:', error));

//     // Populate the type dropdown
//     fetch('/api/mentorship-types')
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 const typeDropdown = document.getElementById('typeDropdown');
//                 data.data.forEach(type => {
//                     const option = document.createElement('option');
//                     option.value = type.id;
//                     option.textContent = type.type;
//                     typeDropdown.appendChild(option);
//                 });
//             }
//         })
//         .catch(error => console.error('Error fetching mentorship types:', error));
// });


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
});


</script>
@endsection