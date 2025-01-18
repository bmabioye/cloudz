<!-- resources/views/services.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="text-center py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Explore Our IT Services</h1>
            <p class="text-lg">
                Empowering MEA businesses with tailored solutions for growth, efficiency, and security.
            </p>
        </div>
    </section>

    <!-- Services Overview Section -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our Expertise</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-cloud text-4xl text-blue-600 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Cloud Solutions & Migration</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Seamlessly transition to scalable and cost-effective cloud environments.
                    </p>
                    <a href="cloud-solutions" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">Learn More</a>
                </div>
                <!-- Service 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-shield-alt text-4xl text-red-600 dark:text-red-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Cybersecurity Services</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Protect your digital assets with comprehensive security solutions.
                    </p>
                    <a href="cybersecurity" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">Learn More</a>
                </div>
                <!-- Service 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-balance-scale text-4xl text-green-600 dark:text-green-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Governance, Risk & Compliance</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Navigate regulatory complexities with our tailored GRC services.
                    </p>
                    <a href="grc" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">Learn More</a>
                </div>
                <!-- Service 4 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-server text-4xl text-indigo-600 dark:text-indigo-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">IT Infrastructure Modernization</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Transform legacy systems into efficient and future-ready IT environments.
                    </p>
                    <a href="modernization" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">Learn More</a>
                </div>
                <!-- Service 5 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-project-diagram text-4xl text-purple-600 dark:text-purple-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Digital Transformation</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Embrace innovative digital tools to enhance efficiency and competitiveness.
                    </p>
                    <a href="digital-transformation" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">Learn More</a>
                </div>
                <!-- Service 6 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-chart-line text-4xl text-yellow-600 dark:text-yellow-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">AI & Data Analytics</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Drive insights and automation with AI and advanced analytics.
                    </p>
                    <a href="ai-analytics" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">Learn More</a>
                </div>
                <!-- Service 7 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-users text-4xl text-teal-600 dark:text-teal-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">IT Staffing & Ad-hoc Support</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Address skill gaps with flexible and reliable staffing solutions.
                    </p>
                    <a href="staffing" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">Learn More</a>
                </div>
                <!-- Service 8 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-life-ring text-4xl text-blue-800 dark:text-blue-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Managed Services</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Simplify IT operations with comprehensive managed services.
                    </p>
                    <a href="managed-services" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">Learn More</a>
                </div>
                <!-- Service 9 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-industry text-4xl text-orange-600 dark:text-orange-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Industry-Specific Solutions</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Tailored IT solutions for healthcare, retail, finance, and more.
                    </p>
                    <a href="industry-solutions" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">Learn More</a>
                </div>
                <!-- Service 10 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center transition transform hover:scale-105">
                    <i class="fas fa-user-graduate text-4xl text-green-700 dark:text-green-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Training & Certification</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Upskill your workforce with world-class training programs.
                    </p>
                    <a href="training-certifications" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">Learn More</a>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- resources/views/components/faq-section.blade.php -->

<div class="bg-gray-100 dark:bg-gray-800 py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Frequently Asked Questions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Question 1 -->
            <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">What industries do you cater to?</h3>
                <p class="text-gray-700 dark:text-gray-300">
                    We provide tailored IT solutions for a wide range of industries including healthcare, oil and gas, retail, financial services, and more.
                </p>
            </div>
            <!-- Question 2 -->
            <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">How do I request a consultation or service?</h3>
                <p class="text-gray-700 dark:text-gray-300">
                    You can request a consultation by using the "Request a Quote" or "Contact Us" buttons available on each service page.
                </p>
            </div>
            <!-- Question 3 -->
            <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Do you offer customized solutions?</h3>
                <p class="text-gray-700 dark:text-gray-300">
                    Yes, all our services are customizable to meet the unique requirements of your business and industry.
                </p>
            </div>
            <!-- Question 4 -->
            <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">What training programs do you provide?</h3>
                <p class="text-gray-700 dark:text-gray-300">
                    We offer training in cloud platforms, cybersecurity, project management, and other high-demand areas. Custom training is also available.
                </p>
            </div>
            <!-- Question 5 -->
            <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Do you assist with regulatory compliance?</h3>
                <p class="text-gray-700 dark:text-gray-300">
                    Absolutely. Our GRC services help ensure compliance with local and international regulations such as GDPR, ISO 27001, and NESA.
                </p>
            </div>
            <!-- Question 6 -->
            <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">How can I get IT support in case of emergencies?</h3>
                <p class="text-gray-700 dark:text-gray-300">
                    We offer ad-hoc IT support services to address emergencies. Reach out through our support hotline or request assistance online.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
