<!-- resources/views/grc-services.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-green-600 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Streamline Governance, Risk, and Compliance</h1>
            <p class="text-lg">
                Helping MEA businesses meet regulatory requirements and reduce risks with tailored GRC solutions.
            </p>
            <a href="#get-quote" class="mt-6 inline-block bg-white text-green-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Request a GRC Assessment</a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Ensure Compliance and Mitigate Risks</h2>
            <p class="text-center text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                Industries like banking, healthcare, and telecom in the MEA region face increasing regulatory demands. Our GRC services help you navigate compliance complexities and build robust risk management frameworks.
            </p>
        </div>
    </section>

    <!-- Core Offerings Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our GRC Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Offering 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-balance-scale text-4xl text-green-600 dark:text-green-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Risk Management Frameworks</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Implement industry-standard frameworks like COBIT and NIST for effective risk management.
                    </p>
                </div>
                <!-- Offering 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-file-contract text-4xl text-green-600 dark:text-green-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Policy and Procedure Development</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Create and maintain policies that align with regulatory and operational needs.
                    </p>
                </div>
                <!-- Offering 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-clipboard-check text-4xl text-green-600 dark:text-green-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Regulatory Audit Preparation</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Ensure your organization is audit-ready for standards like ISO 27001 and GDPR.
                    </p>
                </div>
                <!-- Offering 4 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-users-cog text-4xl text-green-600 dark:text-green-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Third-Party Risk Assessments</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Identify and manage risks associated with vendors and third-party services.
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
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Banking Sector</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Implementing robust risk management frameworks to meet international compliance standards.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Healthcare</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Developing policies to ensure compliance with HIPAA and GDPR regulations.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Telecom</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Preparing for regulatory audits and improving third-party vendor risk management.
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
                            "Their policy development services streamlined our compliance processes."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– John D., Compliance Officer</span>
                    </div>
                    <div class="swiper-slide bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                        <p class="text-gray-700 dark:text-gray-300 italic mb-4">
                            "The team provided exceptional support during our ISO 27001 audit preparation."
                        </p>
                        <span class="text-gray-800 dark:text-gray-100 font-bold">– Fatima H., IT Manager</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="get-quote" class="py-12 text-center bg-green-600 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Take Control of Compliance and Risks</h2>
            <p class="mb-6">
                Contact us today to learn how our GRC solutions can strengthen your business.
            </p>
            <a href="#quoteModal" data-bs-toggle="modal" class="inline-block bg-white text-green-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">
                Request a GRC Assessment
            </a>
        </div>
    </section>
</div>
@endsection
