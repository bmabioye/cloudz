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

    <!-- Mentorship Services -->
    <section id="services" class="mt-16">
        <h2 class="text-center text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-10">
            Available Mentorship Services
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4 lg:px-8">
            @foreach($services as $service)
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $service->name }}</h3>
                <p class="mt-4 text-gray-600 dark:text-gray-300">{{ $service->description }}</p>
                <a href="{{ route('mentorship.book', $service->id) }}" class="mt-4 block bg-blue-500 text-white py-2 px-4 rounded-lg text-center hover:bg-blue-600">
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

    <!-- Testimonials -->
    <section class="mt-16">
        <h2 class="text-center text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-10">
            What Our Participants Say
        </h2>
        <div class="swiper-container px-4 lg:px-8">
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                <div class="swiper-slide bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                    <p class="text-gray-600 dark:text-gray-300 italic">
                        "{{ $testimonial->message }}"
                    </p>
                    <p class="mt-4 text-right text-gray-800 dark:text-gray-100">
                        - {{ $testimonial->name }}
                    </p>
                </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
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
