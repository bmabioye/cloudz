<!-- resources/views/cybersecurity-services.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-red-600 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Safeguard Your Digital Assets</h1>
            <p class="text-lg">
                Comprehensive cybersecurity solutions tailored to protect businesses in the MEA region.
            </p>
            <a href="#get-quote" class="mt-6 inline-block bg-white text-red-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Schedule a Security Assessment</a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Proactive Cybersecurity for MEA Businesses</h2>
            <p class="text-center text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                With increasing cyber threats targeting financial, healthcare, and energy sectors, our services ensure that your business stays ahead of potential risks while meeting local and international compliance requirements.
            </p>
        </div>
    </section>

    <!-- Core Offerings Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our Cybersecurity Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Offering 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-shield-alt text-4xl text-red-600 dark:text-red-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Security Assessments</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Identify vulnerabilities with in-depth security evaluations and penetration testing.
                    </p>
                </div>
                <!-- Offering 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-user-shield text-4xl text-red-600 dark:text-red-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Managed Security Services</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Continuous monitoring and management of your IT environment to prevent threats.
                    </p>
                </div>
                <!-- Offering 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-laptop-code text-4xl text-red-600 dark:text-red-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Incident Response</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Swift and effective responses to minimize the impact of cybersecurity incidents.
                    </p>
                </div>
                <!-- Offering 4 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-file-signature text-4xl text-red-600 dark:text-red-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Compliance Consulting</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Guidance on GDPR, ISO 27001, and NESA compliance to meet regulatory requirements.
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
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Financial Institutions</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Conducting security assessments to protect sensitive customer data from cyber threats.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Healthcare</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Ensuring compliance with GDPR and securing electronic health records (EHRs).
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Oil and Gas</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Protecting SCADA systems and other critical infrastructure from cyberattacks.
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
                            "Their incident response team minimized our downtime after a ransomware attack."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Ahmed M., Banking Executive</span>
                    </div>
                    <div class="swiper-slide bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                        <p class="text-gray-700 dark:text-gray-300 italic mb-4">
                            "CloudZone's compliance consulting ensured our GDPR readiness with ease."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Sarah A., Healthcare CIO</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="get-quote" class="py-12 text-center bg-red-600 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Secure Your Business Today</h2>
            <p class="mb-6">
                Take the first step in protecting your business from cyber threats. Contact us for a security consultation.
            </p>
            <a href="#quoteModal" data-bs-toggle="modal" class="inline-block bg-white text-red-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">
                Request a Security Assessment
            </a>
        </div>
    </section>
</div>
@endsection
