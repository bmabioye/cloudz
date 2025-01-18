<!-- resources/views/training-and-certification.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-green-700 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Empower Your Team with World-Class Training</h1>
            <p class="text-lg">
                Comprehensive training and certification programs tailored to meet your business needs.
            </p>
            <a href="#get-quote" class="mt-6 inline-block bg-white text-green-700 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Request Training Consultation</a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Upskill Your Workforce</h2>
            <p class="text-center text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                In a rapidly evolving IT landscape, training and certifications are essential to stay competitive. We offer customized programs to equip your teams with the knowledge and skills they need to excel.
            </p>
        </div>
    </section>

    <!-- Core Offerings Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our Training and Certification Programs</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Offering 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-cloud text-4xl text-green-700 dark:text-green-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Cloud Training</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Master AWS, Azure, and Google Cloud platforms with hands-on training sessions.
                    </p>
                </div>
                <!-- Offering 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-shield-alt text-4xl text-green-700 dark:text-green-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Cybersecurity Certification</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Prepare for CISSP, CISM, and other leading certifications with expert guidance.
                    </p>
                </div>
                <!-- Offering 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-project-diagram text-4xl text-green-700 dark:text-green-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Project Management</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Get certified in PMP, Agile, and Scrum methodologies to lead projects effectively.
                    </p>
                </div>
                <!-- Offering 4 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-user-graduate text-4xl text-green-700 dark:text-green-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Customized Training</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Tailored programs designed to address specific business and industry needs.
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
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Corporate Training</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Delivering cloud and cybersecurity workshops for Fortune 500 companies.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Government Entities</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Training IT teams on compliance frameworks like ISO 27001 and GDPR.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Small Businesses</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Upskilling employees in digital transformation and agile practices.
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
                            "Their PMP bootcamp was incredibly insightful and helped our project managers excel."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Sarah A., Project Manager</span>
                    </div>
                    <div class="swiper-slide bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                        <p class="text-gray-700 dark:text-gray-300 italic mb-4">
                            "CloudZone's customized training aligned perfectly with our business goals."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Ahmed K., IT Director</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="get-quote" class="py-12 text-center bg-green-700 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Equip Your Team for Success</h2>
            <p class="mb-6">
                Contact us to design a training program that meets your organizational needs.
            </p>
            <a href="#quoteModal" data-bs-toggle="modal" class="inline-block bg-white text-green-700 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">
                Request Training Consultation
            </a>
        </div>
    </section>
</div>
@endsection
