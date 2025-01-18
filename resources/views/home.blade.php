@extends('layouts.app')

@section('content')
    <section class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 py-16">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to CloudZone</h1>
            <p class="text-lg">CloudZone IT empowers your journey with expert consulting and tailored mentorship.</p>
        </div>
    </section>

    <section class="py-12 bg-gray-100 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-300 mb-8">Explore Our Services</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Cloud Solutions -->
            <a href="/services/cloud-solutions" class="group bg-white dark:bg-gray-800 rounded-lg shadow p-6 text-center hover:shadow-lg transform hover:-translate-y-1 transition duration-300">
                <i class="fas fa-cloud text-blue-500 dark:text-blue-300 text-4xl mb-4"></i>
                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 group-hover:text-blue-500 dark:group-hover:text-blue-300">Cloud Solutions</h3>
                <p class="text-gray-600 dark:text-gray-400">Transform your business with secure, scalable cloud technologies.</p>
            </a>

            <!-- Cybersecurity -->
            <a href="/services/cybersecurity" class="group bg-white dark:bg-gray-800 rounded-lg shadow p-6 text-center hover:shadow-lg transform hover:-translate-y-1 transition duration-300">
                <i class="fas fa-shield-alt text-red-500 dark:text-red-300 text-4xl mb-4"></i>
                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 group-hover:text-red-500 dark:group-hover:text-red-300">Cybersecurity</h3>
                <p class="text-gray-600 dark:text-gray-400">Protect your digital assets with cutting-edge security strategies.</p>
            </a>

            <!-- One-on-One Coaching -->
            <a href="/mentorship/booking" class="group bg-white dark:bg-gray-800 rounded-lg shadow p-6 text-center hover:shadow-lg transform hover:-translate-y-1 transition duration-300">
                <i class="fas fa-user-graduate text-green-500 dark:text-green-300 text-4xl mb-4"></i>
                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 group-hover:text-green-500 dark:group-hover:text-green-300">Mentorship & Coaching</h3>
                <p class="text-gray-600 dark:text-gray-400">Achieve your career goals with personalized mentorship.</p>
            </a>

            <!-- GRC Services -->
            <a href="/services/grc" class="group bg-white dark:bg-gray-800 rounded-lg shadow p-6 text-center hover:shadow-lg transform hover:-translate-y-1 transition duration-300">
                <i class="fas fa-balance-scale text-purple-500 dark:text-purple-300 text-4xl mb-4"></i>
                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 group-hover:text-purple-500 dark:group-hover:text-purple-300">GRC Services</h3>
                <p class="text-gray-600 dark:text-gray-400">Governance, risk, and compliance solutions for your organization.</p>
            </a>

            <!-- Webinars & Workshops -->
            <a href="/services/digital-transformation" class="group bg-white dark:bg-gray-800 rounded-lg shadow p-6 text-center hover:shadow-lg transform hover:-translate-y-1 transition duration-300">
                <i class="fas fa-chalkboard-teacher text-yellow-500 dark:text-yellow-300 text-4xl mb-4"></i>
                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 group-hover:text-yellow-500 dark:group-hover:text-yellow-300">Digital Transformation</h3>
                <p class="text-gray-600 dark:text-gray-400">Participate in interactive sessions with industry experts.</p>
            </a>

            <!-- Certification Study Packs -->
            <a href="/fastcert/resources" class="group bg-white dark:bg-gray-800 rounded-lg shadow p-6 text-center hover:shadow-lg transform hover:-translate-y-1 transition duration-300">
                <i class="fas fa-book text-pink-500 dark:text-pink-300 text-4xl mb-4"></i>
                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 group-hover:text-pink-500 dark:group-hover:text-pink-300">FastCert Library</h3>
                <p class="text-gray-600 dark:text-gray-400">Get resources to excel in your certification exams.</p>
            </a>
        </div>
    </div>
</section>

<section class="mt-16">
  <div class="text-center mb-8">
    <h2 class="text-3xl font-bold">What Our Clients Say</h2>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div
      data-aos="fade-right"
      class="p-6 bg-white rounded shadow dark:bg-gray-800"
    >
      <p class="text-gray-600 dark:text-gray-300">
        "CloudZone transformed our business!"
      </p>
      <h4 class="font-bold mt-4">- Jane Doe</h4>
    </div>
    <div
      data-aos="fade-up"
      class="p-6 bg-white rounded shadow dark:bg-gray-800"
    >
      <p class="text-gray-600 dark:text-gray-300">
        "Incredible cybersecurity services."
      </p>
      <h4 class="font-bold mt-4">- John Smith</h4>
    </div>
    <div
      data-aos="fade-left"
      class="p-6 bg-white rounded shadow dark:bg-gray-800"
    >
      <p class="text-gray-600 dark:text-gray-300">
        "Highly recommend their GRC services."
      </p>
      <h4 class="font-bold mt-4">- Alice Johnson</h4>
    </div>
  </div>
</section>





<!-- <section class="bg-blue-600 dark:bg-blue-900 py-12">
  <div class="max-w-7xl mx-auto text-center text-white">
    <h2 class="text-3xl font-extrabold">Ready to Take the Next Step?</h2>
    <p class="mt-4">Join the thousands of professionals who trust CloudZone for their career and business growth.</p>
    <div class="mt-6 flex justify-center space-x-4">
      <a href="/get-started" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">Get Started</a>
      <a href="/contact" class="bg-blue-800 px-6 py-3 rounded-lg font-semibold hover:bg-blue-700">Contact Us</a>
    </div>
  </div>
</section> -->

<section class="bg-blue-600 dark:bg-blue-900 py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h2 class="text-3xl font-extrabold text-white">Take the Leap with CloudZone</h2>
    <p class="mt-4 text-lg text-gray-200">Join thousands of professionals who trust CloudZone for their career and business growth.
      Transform your business and career with our expert consulting and tailored solutions.</p>
    <div class="mt-6 flex justify-center space-x-4">
      <a href="/services" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">Get Started</a>
      <a href="/contact" class="bg-blue-800 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">Contact Us</a>
    </div>
  </div>
</section>

<section class="py-16">
  <div class="text-center mb-8">
    <h2 class="text-3xl font-bold">Why Choose CloudZone?</h2>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Card 1 -->
    <div
      data-aos="fade-up"
      class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:shadow-gray-700"
    >
      <div class="flex items-center justify-center text-blue-500 mb-4">
        <i class="fas fa-user-tie text-4xl"></i>
      </div>
      <h3 class="text-xl font-semibold mb-2 text-center">Expert Consultants</h3>
      <p class="text-gray-600 dark:text-gray-300 text-center">
        Work with seasoned professionals to achieve your goals.
      </p>
    </div>
    <!-- Card 2 -->
    <div
      data-aos="fade-up"
      class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:shadow-gray-700"
    >
      <div class="flex items-center justify-center text-green-500 mb-4">
        <i class="fas fa-tools text-4xl"></i>
      </div>
      <h3 class="text-xl font-semibold mb-2 text-center">Customized Solutions</h3>
      <p class="text-gray-600 dark:text-gray-300 text-center">
        Tailored services designed to meet your unique needs.
      </p>
    </div>
    <!-- Card 3 -->
    <div
      data-aos="fade-up"
      class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:shadow-gray-700"
    >
      <div class="flex items-center justify-center text-red-500 mb-4">
        <i class="fas fa-clock text-4xl"></i>
      </div>
      <h3 class="text-xl font-semibold mb-2 text-center">24/7 Support</h3>
      <p class="text-gray-600 dark:text-gray-300 text-center">
        Enjoy round-the-clock assistance whenever you need it.
      </p>
    </div>
    <!-- Card 4 -->
    <div
      data-aos="fade-up"
      class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:shadow-gray-700"
    >
      <div class="flex items-center justify-center text-yellow-500 mb-4">
        <i class="fas fa-shield-alt text-4xl"></i>
      </div>
      <h3 class="text-xl font-semibold mb-2 text-center">Security First</h3>
      <p class="text-gray-600 dark:text-gray-300 text-center">
        Safeguard your data with top-tier security measures.
      </p>
    </div>
    <!-- Card 5 -->
    <div
      data-aos="fade-up"
      class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:shadow-gray-700"
    >
      <div class="flex items-center justify-center text-purple-500 mb-4">
        <i class="fas fa-chart-line text-4xl"></i>
      </div>
      <h3 class="text-xl font-semibold mb-2 text-center">Proven Results</h3>
      <p class="text-gray-600 dark:text-gray-300 text-center">
        Leverage a track record of success to achieve your goals.
      </p>
    </div>
    <!-- Card 6 -->
    <div
      data-aos="fade-up"
      class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:shadow-gray-700"
    >
      <div class="flex items-center justify-center text-cyan-500 mb-4">
        <i class="fas fa-rocket text-4xl"></i>
      </div>
      <h3 class="text-xl font-semibold mb-2 text-center">Innovative Strategies</h3>
      <p class="text-gray-600 dark:text-gray-300 text-center">
        Stay ahead with cutting-edge solutions tailored to your needs.
      </p>
    </div>
  </div>
</section>

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
