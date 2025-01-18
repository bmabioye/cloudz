@extends('layouts.app')

@section('content')

<div id="slotModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Confirm Your Slot</h3>
        <p id="selectedDate" class="text-gray-600"></p>
        <p id="selectedTime" class="text-gray-600 mb-4"></p>

        <form id="bookingForm" method="POST">
            @csrf
            <input type="hidden" name="slot_start" id="slotStart" />
            <input type="hidden" name="slot_end" id="slotEnd" />
            
            <!-- Optional: Add dropdowns for service type, topic, etc. -->
            <div class="mb-4">
                <label for="mentorshipType" class="block text-sm font-medium text-gray-700">Mentorship Type</label>
                <select name="mentorship_type" id="mentorshipType" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="Webinar">Webinar</option>
                    <option value="One-on-One">One-on-One</option>
                    <option value="Bootcamp">Bootcamp</option>
                </select>
            </div>
            <label for="mentorshipServicee" class="block text-sm font-bold mb-2">Service</label>
            <select id="mentorship_service" name="mentorship_service_id" class="w-full mb-4 p-2 border rounded">
                <option value="" disabled selected>Select a service</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->type }}</option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Confirm Booking
            </button>
            <button type="button" onclick="document.getElementById('slotModal').classList.add('hidden')" class="text-gray-500 px-4 py-2 rounded-md hover:text-gray-700">
                Cancel
            </button>
        </form>
    </div>
</div>

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

<!-- Mentorship Services -->
<section id="services" class="mt-16">
    <h2 class="text-center text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-10">
        Available Mentorship Services
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4 lg:px-8">
        @foreach($services as $service)
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg relative group">
            <!-- Image with hover effect -->
            <div class="relative overflow-hidden rounded-md">
                <img 
                    src="{{ asset($service->image) }}" 
                    alt="{{ $service->type }}" 
                    class="w-full h-48 object-cover transition-transform duration-300 transform group-hover:scale-105"
                />
                <!-- "Live" label -->
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <span class="text-white text-lg font-bold uppercase">Live</span>
                </div>
            </div>
            <!-- Service details -->
            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-4">
                {{ $service->type }}
            </h3>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
                {{ $service->description }}
            </p>
            <a href="{{ route('mentorship.book', $service->id) }}" 
               class="mt-4 block bg-blue-500 text-white py-2 px-4 rounded-lg text-center hover:bg-blue-600">
                Book a Session
            </a>
        </div>
        @endforeach
    </div>
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
        <div
            class="flex transition-transform duration-500 ease-in-out"
            data-aos="fade-up"
            id="testimonial-slides"
        >
            @foreach($testimonials as $testimonial)
                <div class="min-w-full bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg flex flex-col items-center space-y-4">
                    <div class="w-16 h-16 rounded-full overflow-hidden bg-gray-300 dark:bg-gray-700">
                        <img
                            src="{{ $testimonial->avatar_url ?? '/default-avatar.png' }}"
                            alt="{{ $testimonial->name }}"
                            class="w-full h-full object-cover"
                        />
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center italic">
                        "{{ $testimonial->content }}"
                    </p>
                    <p class="text-gray-800 dark:text-gray-100 text-lg font-medium">
                        - {{ $testimonial->name }}
                    </p>
                </div>
            @endforeach
        </div>
        <!-- Navigation -->
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
        </div>
    </div>
</section>
    <!-- Call to Action -->
    <section class="mt-16 text-center">
        <a href="#services" class="bg-blue-500 text-white py-3 px-6 rounded-full shadow-lg hover:bg-blue-600">
            Get Started Today
        </a>
    </section>
</div>

@endsection
