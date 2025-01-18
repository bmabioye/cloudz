@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-indigo-600 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Modernize Your IT Infrastructure</h1>
            <p class="text-lg">
                Transform legacy systems into scalable, efficient, and future-ready IT environments tailored for MEA businesses.
            </p>
            <a href="#get-quote" class="mt-6 inline-block bg-white text-indigo-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Request a Modernization Plan</a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Future-Proof Your IT Infrastructure</h2>
            <p class="text-center text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                Legacy systems are a common challenge for enterprises in the MEA region. Our IT Infrastructure Modernization services are designed to enhance scalability, reliability, and efficiency, helping your business stay competitive in a fast-evolving digital landscape.
            </p>
        </div>
    </section>

    <!-- Core Offerings Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our Modernization Solutions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Offering 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-server text-4xl text-indigo-600 dark:text-indigo-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Data Center Modernization</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Upgrade your data centers with state-of-the-art technologies for better performance.
                    </p>
                </div>
                <!-- Offering 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-network-wired text-4xl text-indigo-600 dark:text-indigo-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Network Optimization</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Enhance connectivity with SD-WAN and cutting-edge network solutions.
                    </p>
                </div>
                <!-- Offering 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-cloud text-4xl text-indigo-600 dark:text-indigo-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Virtualization</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Optimize workloads with virtualization and hyper-converged infrastructure.
                    </p>
                </div>
                <!-- Offering 4 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-cogs text-4xl text-indigo-600 dark:text-indigo-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">IT Service Management</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Implement ITIL-based practices for seamless service delivery.
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
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Public Sector</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Modernizing legacy systems for improved citizen services and cost efficiency.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Healthcare</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Upgrading IT infrastructure to support telemedicine and digital health records.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Large Enterprises</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Streamlining operations with virtualized environments and ITSM solutions.
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
                            "Their IT modernization solutions transformed our legacy systems into a modern and efficient infrastructure."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Ahmed H., Public Sector Official</span>
                    </div>
                    <div class="swiper-slide bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                        <p class="text-gray-700 dark:text-gray-300 italic mb-4">
                            "The CloudZone team provided seamless network optimization, boosting our operational efficiency."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Fatima A., IT Manager</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="get-quote" class="py-12 text-center bg-indigo-600 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Upgrade Your IT Infrastructure Today</h2>
            <p class="mb-6">
                Contact us to learn how our modernization solutions can drive efficiency and scalability for your business.
            </p>
            <a href="#quoteModal" data-bs-toggle="modal" class="inline-block bg-white text-indigo-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">
                Request a Modernization Plan
            </a>
        </div>
    </section>
</div>
@endsection
