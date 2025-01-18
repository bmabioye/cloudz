<!-- resources/views/privacy-policy.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-green-700 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Privacy Policy</h1>
            <p class="text-lg">Your privacy is important to us. Please review how we handle your data.</p>
        </div>
    </section>

    <!-- Privacy Policy Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">1. Data Collection</h2>
            <p class="text-gray-700 dark:text-gray-300">
                We collect personal information such as your name, email address, and phone number when you interact with our services, such as signing up for newsletters or submitting inquiries.
            </p>

            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mt-8 mb-6">2. Data Usage</h2>
            <p class="text-gray-700 dark:text-gray-300">
                The information we collect is used to provide and improve our services, respond to inquiries, and send updates or promotional material, where consent is provided.
            </p>

            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mt-8 mb-6">3. Data Sharing</h2>
            <p class="text-gray-700 dark:text-gray-300">
                We do not sell, trade, or rent your personal information to others. Data may be shared with trusted third parties who assist in operating our website and delivering services, under strict confidentiality agreements.
            </p>

            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mt-8 mb-6">4. Cookies</h2>
            <p class="text-gray-700 dark:text-gray-300">
                Our website uses cookies to enhance your experience. You can modify your browser settings to disable cookies, though some features may not function as intended.
            </p>

            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mt-8 mb-6">5. Data Security</h2>
            <p class="text-gray-700 dark:text-gray-300">
                We implement robust security measures to protect your personal data from unauthorized access, alteration, or disclosure.
            </p>

            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mt-8 mb-6">6. Changes to This Policy</h2>
            <p class="text-gray-700 dark:text-gray-300">
                We may update this privacy policy from time to time. Any changes will be posted on this page, and we encourage you to review it periodically.
            </p>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-12 text-center bg-green-700 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Have Questions About Your Privacy?</h2>
            <p class="mb-6">Contact us for further details about how we handle your personal data.</p>
            <a href="/contact" class="inline-block bg-white text-green-700 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Contact Us</a>
        </div>
    </section>
</div>
@endsection
