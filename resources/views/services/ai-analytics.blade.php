<!-- resources/views/ai-data-analytics.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-yellow-600 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Unlock Insights with AI and Data Analytics</h1>
            <p class="text-lg">
                Empowering MEA businesses with actionable insights and intelligent automation.
            </p>
            <a href="#get-quote" class="mt-6 inline-block bg-white text-yellow-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Schedule a Data Consultation</a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Harness the Power of Data</h2>
            <p class="text-center text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                Governments and businesses in the MEA region are adopting AI and data analytics to drive decision-making, optimize operations, and unlock new opportunities. Let us help you leverage these technologies to stay ahead.
            </p>
        </div>
    </section>

    <!-- Core Offerings Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our AI and Data Analytics Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Offering 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-chart-line text-4xl text-yellow-600 dark:text-yellow-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Predictive Analytics</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Unlock future trends and insights with advanced predictive models.
                    </p>
                </div>
                <!-- Offering 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-robot text-4xl text-yellow-600 dark:text-yellow-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">AI-Driven Automation</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Automate repetitive tasks and enhance productivity with AI solutions.
                    </p>
                </div>
                <!-- Offering 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-table text-4xl text-yellow-600 dark:text-yellow-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Data Visualization</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Build interactive dashboards with tools like Power BI and Tableau.
                    </p>
                </div>
                <!-- Offering 4 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-database text-4xl text-yellow-600 dark:text-yellow-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Data Governance</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Ensure compliance and data quality with robust governance practices.
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
                        Using predictive analytics to optimize inventory and improve customer targeting.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Healthcare</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Implementing AI to enhance diagnostics and streamline patient workflows.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Government</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Leveraging data visualization for real-time decision-making and transparency.
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
                            "Their data visualization solutions gave us insights that transformed our operations."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Ahmed Z., Retail Manager</span>
                    </div>
                    <div class="swiper-slide bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                        <p class="text-gray-700 dark:text-gray-300 italic mb-4">
                            "The predictive analytics models helped us anticipate market trends effectively."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Fatima A., Data Scientist</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="get-quote" class="py-12 text-center bg-yellow-600 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Unleash the Potential of Your Data</h2>
            <p class="mb-6">
                Contact us today to discuss how our AI and data analytics solutions can drive your business forward.
            </p>
            <a href="#quoteModal" data-bs-toggle="modal" class="inline-block bg-white text-yellow-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">
                Schedule a Data Consultation
            </a>
        </div>
    </section>
</div>
@endsection
