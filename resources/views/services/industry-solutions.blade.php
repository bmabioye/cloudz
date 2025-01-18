<!-- resources/views/industry-specific-solutions.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-orange-600 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Tailored IT Solutions for Your Industry</h1>
            <p class="text-lg">
                Addressing the unique challenges of industries across MEA with customized IT services.
            </p>
            <a href="#get-quote" class="mt-6 inline-block bg-white text-orange-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Explore Custom Solutions</a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Innovative IT Solutions for Key Industries</h2>
            <p class="text-center text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                Different industries have different IT requirements. Our industry-specific solutions are designed to address unique challenges and empower businesses in oil and gas, retail, healthcare, and financial services.
            </p>
        </div>
    </section>

    <!-- Core Offerings Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our Industry-Specific Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Offering 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-gas-pump text-4xl text-orange-600 dark:text-orange-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Oil and Gas</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Secure SCADA systems and implement advanced IT infrastructure for energy operations.
                    </p>
                </div>
                <!-- Offering 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-stethoscope text-4xl text-orange-600 dark:text-orange-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Healthcare</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Deploy telemedicine solutions and ensure compliance with healthcare regulations.
                    </p>
                </div>
                <!-- Offering 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-university text-4xl text-orange-600 dark:text-orange-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Financial Services</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Implement FinTech solutions and blockchain for secure and efficient transactions.
                    </p>
                </div>
                <!-- Offering 4 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-shopping-cart text-4xl text-orange-600 dark:text-orange-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Retail</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Enhance customer experience with omni-channel IT solutions and POS systems.
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
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Oil and Gas</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Securing critical energy infrastructure against cyber threats.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Healthcare</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Deploying IoT-enabled patient monitoring systems for improved care.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Financial Services</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Integrating blockchain for secure cross-border payments.
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
                            "Their FinTech solutions streamlined our operations and improved security."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Ahmed M., Banking Executive</span>
                    </div>
                    <div class="swiper-slide bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                        <p class="text-gray-700 dark:text-gray-300 italic mb-4">
                            "CloudZone's healthcare solutions enhanced patient care and ensured compliance."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Fatima A., Hospital Administrator</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="get-quote" class="py-12 text-center bg-orange-600 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Discover Custom IT Solutions</h2>
            <p class="mb-6">
                Contact us today to explore tailored IT services for your industry.
            </p>
            <a href="#quoteModal" data-bs-toggle="modal" class="inline-block bg-white text-orange-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">
                Explore Custom Solutions
            </a>
        </div>
    </section>
</div>
@endsection
