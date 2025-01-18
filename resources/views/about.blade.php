<!-- resources/views/about-us.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">About CloudZone IT Consulting</h1>
            <p class="text-lg">
                Delivering innovative IT solutions tailored to empower businesses across the MEA region.
            </p>
        </div>
    </section>

    <!-- Our Mission Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Our Mission</h2>
            <p class="text-center text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                At CloudZone, our mission is to provide tailored IT solutions that enable businesses to thrive in an ever-evolving digital landscape. We aim to bridge the gap between cutting-edge technology and operational excellence.
            </p>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our Core Values</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                    <i class="fas fa-handshake text-4xl text-blue-600 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Integrity</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        We uphold the highest standards of integrity in every client engagement.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                    <i class="fas fa-lightbulb text-4xl text-blue-600 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Innovation</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        We leverage cutting-edge technology to deliver innovative solutions.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                    <i class="fas fa-users text-4xl text-blue-600 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Collaboration</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        We work closely with clients to understand their needs and exceed expectations.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Our Story</h2>
            <p class="text-center text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                Founded in 2021, CloudZone IT Consulting was born out of a passion for leveraging technology to solve complex business challenges. Over the years, we have partnered with leading organizations across the MEA region to deliver transformative IT solutions that drive measurable results.
            </p>
        </div>
    </section>

    <!-- Leadership Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Meet Our Leadership</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Leader 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                    <img src="/images/leader1.jpg" alt="Leader 1" class="w-24 h-24 mx-auto rounded-full mb-4">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Babatunde Abioye</h3>
                    <p class="text-gray-700 dark:text-gray-300">Founder & CEO</p>
                </div>
                <!-- Leader 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                    <img src="/images/leader2.jpg" alt="Leader 2" class="w-24 h-24 mx-auto rounded-full mb-4">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Afaq Mandi</h3>
                    <p class="text-gray-700 dark:text-gray-300">CTO</p>
                </div>
                <!-- Leader 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                    <img src="/images/leader3.jpg" alt="Leader 3" class="w-24 h-24 mx-auto rounded-full mb-4">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Sarah Karim</h3>
                    <p class="text-gray-700 dark:text-gray-300">Head of Operations</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-12 text-center bg-blue-600 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Partner with Us</h2>
            <p class="mb-6">
                Discover how CloudZone IT Consulting can help your business achieve its goals with innovative IT solutions.
            </p>
            <a href="/contact" class="inline-block bg-white text-blue-600 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Contact Us</a>
        </div>
    </section>
</div>
@endsection
