<!-- resources/views/managed-services.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-blue-800 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Simplify Your IT Management</h1>
            <p class="text-lg">
                Reliable managed IT services to ensure your business runs smoothly and efficiently.
            </p>
            <a href="#get-quote" class="mt-6 inline-block bg-white text-blue-800 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Request Managed Services</a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Comprehensive IT Management for MEA Businesses</h2>
            <p class="text-center text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                SMEs in the MEA region often lack in-house IT teams. Our managed services provide end-to-end IT support and management, enabling you to focus on core business activities while we handle your technology needs.
            </p>
        </div>
    </section>

    <!-- Core Offerings Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our Managed IT Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Offering 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-cogs text-4xl text-blue-800 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Infrastructure Management</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Manage and maintain your IT infrastructure for optimal performance.
                    </p>
                </div>
                <!-- Offering 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-desktop text-4xl text-blue-800 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Remote Monitoring</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Proactively monitor your systems to prevent downtime and address issues.
                    </p>
                </div>
                <!-- Offering 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-cloud text-4xl text-blue-800 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Backup and Recovery</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Protect your data with reliable backup solutions and disaster recovery plans.
                    </p>
                </div>
                <!-- Offering 4 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-life-ring text-4xl text-blue-800 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Application Support</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Ensure the seamless operation of business-critical applications.
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
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Small Businesses</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Providing full IT management to SMEs without dedicated in-house IT teams.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Healthcare</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Ensuring uptime for critical healthcare applications and patient data systems.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Retail</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Managing POS systems and cloud environments for retail chains.
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
                            "Their managed services allowed us to focus on our business while they handled all IT operations seamlessly."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Ahmed K., Retail Manager</span>
                    </div>
                    <div class="swiper-slide bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                        <p class="text-gray-700 dark:text-gray-300 italic mb-4">
                            "With CloudZone's backup solutions, we no longer worry about data loss."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Fatima H., Healthcare CIO</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="get-quote" class="py-12 text-center bg-blue-800 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Let Us Manage Your IT Needs</h2>
            <p class="mb-6">
                Contact us today to learn how our managed services can simplify your IT operations.
            </p>
            <a href="#quoteModal" data-bs-toggle="modal" class="inline-block bg-white text-blue-800 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">
                Request Managed Services
            </a>
        </div>
    </section>
</div>
@endsection
