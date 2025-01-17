@extends('layouts.app')
@include('layouts.quotemodal')
@section('content')
<div class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-500 to-blue-700 text-white text-center py-16 px-4">
        <h1 class="text-4xl font-bold mb-4">Empower Your Business with Expert Consulting</h1>
        <p class="text-lg mb-4">CloudZone IT delivers plug-and-play consulting services and customized solutions tailored to your business needs. <br /> From IT modernization to compliance frameworks, we are your trusted partner for success."</p>
        <div class="flex justify-center space-x-4">
            <a href="javascript:void(0);" onclick="openModal()" class="bg-white text-blue-700 px-6 py-3 rounded shadow font-medium hover:bg-gray-200">Get a Quote</a>
            <a href="/services" class="bg-transparent border-2 border-white px-6 py-3 rounded shadow hover:bg-white hover:text-blue-700">Explore Services</a>
        </div>
    </div>

    <!-- Services Offered -->
    <div class="max-w-7xl mx-auto py-12 px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Our Consulting Services</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach([
                ['icon' => 'cloud', 'title' => 'Cloud Solutions', 'desc' => 'Secure and scalable cloud technologies.'],
                ['icon' => 'shield', 'title' => 'Cybersecurity', 'desc' => 'Cutting-edge security strategies.'],
                ['icon' => 'scale', 'title' => 'GRC Services', 'desc' => 'Governance, risk, and compliance.'],
                ['icon' => 'chart-bar', 'title' => 'AI & Analytics', 'desc' => 'Data insights and predictive analysis.'],
                ['icon' => 'desktop', 'title' => 'IT Modernization', 'desc' => 'Legacy modernization and ITIL frameworks.'],
                ['icon' => 'industry', 'title' => 'Industry-Specific Solutions', 'desc' => 'FinTech, retail, and more.'],
            ] as $service)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 text-center">
                <div class="text-4xl mb-4 text-blue-500 dark:text-blue-300">
                    <i class="fas fa-{{ $service['icon'] }}"></i>
                </div>
                <h3 class="text-xl font-semibold">{{ $service['title'] }}</h3>
                <p class="mt-2">{{ $service['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="bg-gray-100 dark:bg-gray-800 py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Why Choose CloudZone?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach([
                    ['icon' => 'user-tie', 'title' => 'Expert Consultants', 'desc' => 'Work with seasoned professionals.'],
                    ['icon' => 'cogs', 'title' => 'Customized Solutions', 'desc' => 'Tailored services for unique needs.'],
                    ['icon' => 'clock', 'title' => '24/7 Support', 'desc' => 'Round-the-clock assistance.'],
                    ['icon' => 'shield-alt', 'title' => 'Security First', 'desc' => 'Top-tier security measures.'],
                    ['icon' => 'chart-line', 'title' => 'Proven Results', 'desc' => 'Track record of success.'],
                    ['icon' => 'rocket', 'title' => 'Innovative Strategies', 'desc' => 'Cutting-edge solutions.'],
                ] as $feature)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-6 text-center">
                    <div class="text-4xl mb-4 text-blue-500 dark:text-blue-300">
                        <i class="fas fa-{{ $feature['icon'] }}"></i>
                    </div>
                    <h3 class="text-xl font-semibold">{{ $feature['title'] }}</h3>
                    <p class="mt-2">{{ $feature['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="max-w-7xl mx-auto py-12 px-4">
        <h2 class="text-3xl font-bold text-center mb-8">What Our Clients Say</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <p class="italic">"CloudZone transformed our business!"</p>
                <p class="mt-4 font-bold">- Jane Doe</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <p class="italic">"Incredible cybersecurity services."</p>
                <p class="mt-4 font-bold">- John Smith</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <p class="italic">"Highly recommend their GRC services."</p>
                <p class="mt-4 font-bold">- Alice Johnson</p>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-blue-500 text-white text-center py-8">
        <h2 class="text-2xl font-bold">Take the Leap with CloudZone</h2>
        <p class="mt-2">Transform your business and career with expert consulting and tailored solutions.</p>
        <div class="mt-4">
            <a href="/get-a-quote" class="bg-white text-blue-700 px-6 py-3 rounded shadow font-medium hover:bg-gray-200">Get Started</a>
            <a href="/contact" class="bg-transparent border-2 border-white px-6 py-3 rounded shadow hover:bg-white hover:text-blue-700">Contact Us</a>
        </div>
    </div>
</div>

@endsection
