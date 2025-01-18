<!-- resources/views/terms-and-conditions.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-gray-800 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Terms and Conditions</h1>
            <p class="text-lg">Please read our terms and conditions carefully before using our services.</p>
        </div>
    </section>

    <!-- Terms Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">1. Introduction</h2>
            <p class="text-gray-700 dark:text-gray-300">
                Welcome to CloudZone IT Consulting. These terms and conditions outline the rules and regulations for the use of our website and services.
            </p>

            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mt-8 mb-6">2. Acceptance of Terms</h2>
            <p class="text-gray-700 dark:text-gray-300">
                By accessing our website or using our services, you agree to comply with these terms. If you do not agree, please refrain from using our services.
            </p>

            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mt-8 mb-6">3. Intellectual Property Rights</h2>
            <p class="text-gray-700 dark:text-gray-300">
                All content, logos, and trademarks displayed on our website are the property of CloudZone IT Consulting or its licensors. You may not use or reproduce them without permission.
            </p>

            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mt-8 mb-6">4. Limitation of Liability</h2>
            <p class="text-gray-700 dark:text-gray-300">
                CloudZone IT Consulting shall not be held liable for any damages arising from the use of our services, including but not limited to data loss or business interruptions.
            </p>

            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mt-8 mb-6">5. Changes to Terms</h2>
            <p class="text-gray-700 dark:text-gray-300">
                We reserve the right to update these terms and conditions at any time. Changes will be effective immediately upon posting on this page.
            </p>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-12 text-center bg-gray-800 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Have Questions?</h2>
            <p class="mb-6">Feel free to contact us for any clarifications regarding our terms and conditions.</p>
            <a href="/contact" class="inline-block bg-white text-gray-800 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Contact Us</a>
        </div>
    </section>
</div>
@endsection
