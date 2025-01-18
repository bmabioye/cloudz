<!-- resources/views/it-staffing-ad-hoc-support.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-teal-600 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Bridge the IT Skills Gap</h1>
            <p class="text-lg">
                Providing MEA businesses with skilled IT professionals for projects, temporary needs, or long-term growth.
            </p>
            <a href="#get-quote" class="mt-6 inline-block bg-white text-teal-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Request Staffing Support</a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">On-Demand IT Talent, When You Need It</h2>
            <p class="text-center text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                Addressing the IT skills gap in the MEA region, we provide reliable staffing solutions to support your business goals, whether you need project-specific expertise or long-term team augmentation.
            </p>
        </div>
    </section>

    <!-- Core Offerings Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our IT Staffing Solutions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Offering 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-users text-4xl text-teal-600 dark:text-teal-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Staff Augmentation</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Scale your team with skilled IT professionals for short-term or long-term projects.
                    </p>
                </div>
                <!-- Offering 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-laptop-house text-4xl text-teal-600 dark:text-teal-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Project-Specific Staffing</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Hire experts for cloud, cybersecurity, or digital transformation initiatives.
                    </p>
                </div>
                <!-- Offering 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-user-clock text-4xl text-teal-600 dark:text-teal-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Temporary IT Support</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Access on-demand IT support for emergencies or short-term needs.
                    </p>
                </div>
                <!-- Offering 4 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-headset text-4xl text-teal-600 dark:text-teal-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Managed IT Services</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Ensure smooth operations with ongoing remote IT management and support.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Use Cases Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Real-World Use Cases</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Cloud Projects</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Providing cloud architects for successful migrations and hybrid solutions.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Cybersecurity Initiatives</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Deploying cybersecurity analysts for incident response and compliance projects.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">IT Support</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Delivering remote support for SMEs needing helpdesk services.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Testimonials Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">What Our Clients Say</h2>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                        <p class="text-gray-700 dark:text-gray-300 italic mb-4">
                            "Their staff augmentation helped us meet tight deadlines for our cloud migration project."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Sarah L., IT Manager</span>
                    </div>
                    <div class="swiper-slide bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                        <p class="text-gray-700 dark:text-gray-300 italic mb-4">
                            "Their temporary IT support ensured business continuity during a critical outage."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Ahmed M., Operations Lead</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="get-quote" class="py-12 text-center bg-teal-600 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Find the Right Talent for Your IT Needs</h2>
            <p class="mb-6">
                Contact us today to learn how we can support your IT staffing and ad-hoc requirements.
            </p>
            <a href="#quoteModal" data-bs-toggle="modal" class="inline-block bg-white text-teal-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">
                Request Staffing Support
            </a>
        </div>
    </section>
</div>
@endsection
