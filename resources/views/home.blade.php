@extends('layouts.app')

@section('content')
    <section class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 py-16">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to CloudZone</h1>
            <p class="text-lg">CloudZone IT empowers your journey with expert consulting and tailored mentorship.</p>
        </div>
    </section>

    <section class="bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-200 py-12">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Explore Our Services</h2>
            <p class="text-lg mb-8">
                Transform your career and business with our cutting-edge solutions and training.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div class="p-6 bg-white dark:bg-gray-700 rounded shadow text-left">
                    <h3 class="text-xl font-bold mb-2">Cloud Solutions</h3>
                    <p class="mb-4">Transform your business with secure, scalable cloud technologies.</p>
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Learn More</a>
                </div>
                <!-- Service Card 2 -->
                <div class="p-6 bg-white dark:bg-gray-700 rounded shadow text-left">
                    <h3 class="text-xl font-bold mb-2">Cybersecurity</h3>
                    <p class="mb-4">Protect your digital assets with cutting-edge security strategies.</p>
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Learn More</a>
                </div>
                <!-- Service Card 3 -->
                <div class="p-6 bg-white dark:bg-gray-700 rounded shadow text-left">
                    <h3 class="text-xl font-bold mb-2">One-on-One Coaching</h3>
                    <p class="mb-4">Achieve your career goals with personalized mentorship.</p>
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Learn More</a>
                </div>
            </div>
        </div>
    </section>
@endsection
