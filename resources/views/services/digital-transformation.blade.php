<!-- resources/views/digital-transformation.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-purple-600 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Accelerate Your Digital Transformation</h1>
            <p class="text-lg">
                Empowering MEA businesses with innovative digital tools to enhance efficiency and competitiveness.
            </p>
            <a href="#get-quote" class="mt-6 inline-block bg-white text-purple-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Request a Digital Assessment</a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Transform the Way You Work</h2>
            <p class="text-center text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                Digital transformation is reshaping businesses across the MEA region. Our services are designed to help organizations embrace cutting-edge technologies, streamline processes, and achieve sustainable growth.
            </p>
        </div>
    </section>

    <!-- Core Offerings Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our Digital Transformation Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Offering 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-tools text-4xl text-purple-600 dark:text-purple-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">ERP Implementation</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Deploy and integrate ERP systems like SAP and Microsoft Dynamics for seamless operations.
                    </p>
                </div>
                <!-- Offering 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-users text-4xl text-purple-600 dark:text-purple-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">CRM Consulting</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Optimize customer relationships with Salesforce and other CRM platforms.
                    </p>
                </div>
                <!-- Offering 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-robot text-4xl text-purple-600 dark:text-purple-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Workflow Automation</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Automate processes and workflows to enhance productivity and reduce costs.
                    </p>
                </div>
                <!-- Offering 4 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-project-diagram text-4xl text-purple-600 dark:text-purple-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">IoT Solutions</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Leverage IoT technologies for smart cities, connected industries, and more.
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
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Retail</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Enhancing customer experience through CRM integration and omni-channel strategies.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Healthcare</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Implementing IoT for remote patient monitoring and digital health records.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Manufacturing</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Streamlining workflows with automation and predictive analytics.
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
                            "Their ERP implementation streamlined our operations across multiple departments."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Ayesha K., Retail Manager</span>
                    </div>
                    <div class="swiper-slide bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                        <p class="text-gray-700 dark:text-gray-300 italic mb-4">
                            "The workflow automation solutions significantly improved our productivity."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Omar B., Operations Head</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="get-quote" class="py-12 text-center bg-purple-600 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Take the Leap Towards Digital Excellence</h2>
            <p class="mb-6">
                Contact us today to discuss how our digital transformation solutions can empower your business.
            </p>
            <a href="#quoteModal" data-bs-toggle="modal" class="inline-block bg-white text-purple-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">
                Request a Digital Assessment
            </a>
        </div>
    </section>
</div>
@endsection
