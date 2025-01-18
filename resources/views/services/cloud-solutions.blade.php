<!-- resources/views/cloud-solutions-migration.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Seamlessly Transition to the Cloud</h1>
            <p class="text-lg">
                Empowering MEA businesses with scalable, secure, and cost-effective cloud solutions.
            </p>
            <a href="#get-quote" class="mt-6 inline-block bg-white text-blue-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Get a Free Cloud Assessment</a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Your Cloud Journey Starts Here</h2>
            <p class="text-center text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                Adopting cloud technologies is essential for businesses in the MEA region to achieve scalability, efficiency, and resilience. Our expert team helps organizations navigate their cloud journey with ease.
            </p>
        </div>
    </section>

    <!-- Core Offerings Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our Cloud Solutions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-cloud-upload-alt text-4xl text-blue-600 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Cloud Migration</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Plan and execute a seamless transition to AWS, Azure, or Google Cloud.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-network-wired text-4xl text-blue-600 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Hybrid Cloud Architecture</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Design and implement hybrid solutions for performance and flexibility.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-dollar-sign text-4xl text-blue-600 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Cost Optimization</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Reduce cloud spending with efficient cost management strategies.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-shield-alt text-4xl text-blue-600 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Disaster Recovery</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Ensure business continuity with robust cloud-based recovery solutions.
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
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Healthcare</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Migrating to a secure cloud environment to store and manage patient records.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Oil and Gas</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Deploying hybrid cloud solutions to optimize SCADA systems.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Government Entities</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Implementing cloud-first strategies for smart city initiatives.
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
                            \"CloudZone helped us migrate our legacy systems to the cloud with zero downtime.\"
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Sarah A., IT Manager</span>
                    </div>
                    <div class="swiper-slide bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                        <p class="text-gray-700 dark:text-gray-300 italic mb-4">
                            \"Their hybrid cloud solutions greatly improved our performance and reduced costs.\"
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Ahmed K., Operations Head</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="get-quote" class="py-12 text-center bg-blue-600 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Take the First Step Towards Cloud Transformation</h2>
            <p class="mb-6">
                Contact us for a free consultation and discover how we can optimize your cloud journey.
            </p>
            <a href="#quoteModal" data-bs-toggle="modal" class="inline-block bg-white text-blue-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">
                Request a Quote
            </a>
        </div>
    </section>
</div>
@endsection
