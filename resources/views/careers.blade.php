<!-- resources/views/careers.blade.php -->

@extends('layouts.app')

@section('content')


<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-blue-700 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Join Our Team</h1>
            <p class="text-lg">
                Be a part of a dynamic and innovative team at CloudZone IT Consulting.
            </p>
            <a href="#open-positions" class="mt-6 inline-block bg-white text-blue-700 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Explore Opportunities</a>
        </div>
    </section>

    <!-- Why Work With Us Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Why Work With Us</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                    <i class="fas fa-users text-4xl text-blue-700 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Collaborative Environment</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Work alongside industry experts and innovative thinkers to create impactful solutions.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                    <i class="fas fa-chart-line text-4xl text-blue-700 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Growth Opportunities</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Advance your career with professional development and leadership programs.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center">
                    <i class="fas fa-heart text-4xl text-blue-700 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Employee Well-Being</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Enjoy competitive benefits, flexible work arrangements, and a supportive culture.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Open Positions Section -->
    <section id="open-positions" class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Open Positions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Position 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Cloud Architect</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Design and implement scalable cloud solutions for our clients.
                    </p>
                    <a href="/careers/cloud-architect" class="text-blue-700 dark:text-blue-400 font-bold hover:underline">View Details</a>
                </div>
                <!-- Position 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Cybersecurity Analyst</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Protect client systems and data with cutting-edge cybersecurity strategies.
                    </p>
                    <a href="/careers/cybersecurity-analyst" class="text-blue-700 dark:text-blue-400 font-bold hover:underline">View Details</a>
                </div>
                <!-- Position 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Project Manager</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Lead and manage diverse IT projects from conception to completion.
                    </p>
                    <a href="/careers/project-manager" class="text-blue-700 dark:text-blue-400 font-bold hover:underline">View Details</a>
                </div>
                <!-- Position 4 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Data Analyst</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Provide actionable insights through data visualization and predictive analytics.
                    </p>
                    <a href="/careers/data-analyst" class="text-blue-700 dark:text-blue-400 font-bold hover:underline">View Details</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-12 text-center bg-blue-700 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Ready to Join Us?</h2>
            <p class="mb-6">Take the first step towards an exciting career at CloudZone IT Consulting.</p>
            <a href="javascript:void(0)" onclick="toggleModal()" class="btn bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700">Apply Now</a>
            <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#applicationFormModal" class="inline-block bg-white text-blue-700 px-6 py-3 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Apply Now</a> -->
        </div>
    </section>
</div>
@if (session('success'))
    <div id="success-alert" class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-900" role="alert">
        {{ session('success') }}
    </div>
@endif
<!-- Application Form Modal -->
<div id="applicationFormModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-11/12 md:w-1/2">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b border-gray-300 dark:border-gray-700 p-4">
            <h5 class="text-lg font-bold text-gray-800 dark:text-gray-100">Apply Now</h5>
            <button onclick="toggleModal()" class="text-gray-800 dark:text-gray-100 hover:text-red-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <!-- Modal Body -->
        <div class="p-6">
            <form action="{{ route('careers.apply') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Full Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded dark:bg-gray-700 dark:text-gray-100" required>
                </div>
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Email Address</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded dark:bg-gray-700 dark:text-gray-100" required>
                </div>
                <!-- Position -->
                <div class="mb-4">
                    <label for="position" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Position</label>
                    <select id="position" name="position" class="w-full p-2 border border-gray-300 rounded dark:bg-gray-700 dark:text-gray-100" required>
                        <option value="">Select a position</option>
                        <option value="Cloud Architect">Cloud Architect</option>
                        <option value="Cybersecurity Analyst">Cybersecurity Analyst</option>
                        <option value="Project Manager">Project Manager</option>
                        <option value="Data Analyst">Data Analyst</option>
                    </select>
                </div>
                <!-- Resume -->
                <div class="mb-4">
                    <label for="resume" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Upload Resume</label>
                    <input type="file" id="resume" name="resume" class="w-full p-2 border border-gray-300 rounded dark:bg-gray-700 dark:text-gray-100" required>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Submit Application</button>
            </form>
        </div>
    </div>
</div>

 <script>
    function toggleModal() {
        const modal = document.getElementById('applicationFormModal');
        modal.classList.toggle('hidden');
    }


    // Wait for the DOM to fully load
    document.addEventListener("DOMContentLoaded", function () {
        const successAlert = document.getElementById('success-alert');
        
        if (successAlert) {
            // Set a timeout to remove the alert after 5 seconds
            setTimeout(() => {
                successAlert.style.transition = "opacity 0.5s ease"; // Add a smooth fade-out effect
                successAlert.style.opacity = "0";

                // Remove the element from the DOM after the fade-out
                setTimeout(() => successAlert.remove(), 500);
            }, 5000); // Adjust the duration here (5000ms = 5 seconds)
        }
    });


</script>

@endsection
