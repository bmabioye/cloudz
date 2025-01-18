@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-800 dark:text-gray-100">Contact Us</h1>
    <p class="mb-8 text-gray-600 dark:text-gray-300">
        Let’s talk about your website or project. Send us a message, and we’ll be in touch within one business day.
    </p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Left Side with Social Media Links -->
        <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Get in Touch</h2>
            <ul class="space-y-4">
                <li>
                    <a href="mailto:contact@cloudzone.com" class="text-blue-600 dark:text-blue-400 hover:underline flex items-center">
                        <i class="fas fa-envelope mr-2"></i> contact@cloudzone.com
                    </a>
                </li>
                <li>
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline flex items-center">
                        <i class="fab fa-twitter mr-2"></i> Twitter
                    </a>
                </li>
                <li>
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline flex items-center">
                        <i class="fab fa-facebook mr-2"></i> Facebook
                    </a>
                </li>
                <li>
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline flex items-center">
                        <i class="fab fa-linkedin mr-2"></i> LinkedIn
                    </a>
                </li>
                <li>
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline flex items-center">
                        <i class="fab fa-instagram mr-2"></i> Instagram
                    </a>
                </li>
            </ul>
        </div>
        <!-- Contact Form -->
        <div class="md:col-span-2 bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Send us a message</h2>
            <form method="POST" action="{{ route('home.contact') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                    <textarea name="message" id="message" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                    By submitting this form, you agree to the processing of the submitted personal data in accordance with our <a href="/privacy" class="text-blue-600 dark:text-blue-400 hover:underline">Privacy Policy</a>.
                </p>
                <button type="submit" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
