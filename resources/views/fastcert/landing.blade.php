    @extends('layouts.app')

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <div class="text-center bg-gray-800 text-white py-16 rounded-lg shadow-md">
            <h1 class="text-5xl font-bold mb-4">Welcome to FastCert Library</h1>
            <p class="text-lg mb-6">Your ultimate destination for premium certification resources.</p>
            <a href="{{ route('fastcert.resources') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-full">Explore Now</a>
        </div>

    <!-- Features Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="feature-card p-6 shadow-lg rounded-lg text-center">
            <div class="icon mb-4 text-4xl text-blue-500">
                📚
            </div>
            <h3 class="text-lg font-semibold mb-2">Extensive Resource Library</h3>
            <p class="text-gray-600 dark:text-gray-300">
                Access hundreds of ebooks, training guides, and more.
            </p>
        </div>
        <div class="feature-card p-6 shadow-lg rounded-lg text-center">
            <div class="icon mb-4 text-4xl text-green-500">
                💳
            </div>
            <h3 class="text-lg font-semibold mb-2">Flexible Subscription Plans</h3>
            <p class="text-gray-600 dark:text-gray-300">
                Choose a subscription that fits your needs and budget.
            </p>
        </div>
        <div class="feature-card p-6 shadow-lg rounded-lg text-center">
            <div class="icon mb-4 text-4xl text-yellow-500">
                🎓
            </div>
            <h3 class="text-lg font-semibold mb-2">Certification Assistance</h3>
            <p class="text-gray-600 dark:text-gray-300">
                Achieve certifications with curated resources tailored to your goals.
            </p>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="mt-12 text-center">
        <a href="{{ route('subscription.index') }}" class="cta-btn bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-full font-medium">
            Access All Resources
        </a>
    </div>
</div>



        <!-- Popular Resources Section -->
        <div id="explore" class="mt-16">
            <h2 class="text-3xl font-bold text-center mb-8">Popular Resources</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Resource Item -->
                <div class="bg-white shadow rounded-lg p-4">
                    <img src="/images/placeholder.png" alt="Resource" class="w-full h-40 object-cover rounded-md mb-4">
                    <h3 class="text-lg font-bold">Resource Title 1</h3>
                    <p class="text-gray-600 text-sm">Brief description of the resource.</p>
                    <a href="#" class="block mt-4 text-blue-500 hover:underline">Learn More</a>
                </div>

                <!-- Resource Item -->
                <div class="bg-white shadow rounded-lg p-4">
                    <img src="/images/placeholder.png" alt="Resource" class="w-full h-40 object-cover rounded-md mb-4">
                    <h3 class="text-lg font-bold">Resource Title 2</h3>
                    <p class="text-gray-600 text-sm">Brief description of the resource.</p>
                    <a href="#" class="block mt-4 text-blue-500 hover:underline">Learn More</a>
                </div>

                <!-- Resource Item -->
                <div class="bg-white shadow rounded-lg p-4">
                    <img src="/images/placeholder.png" alt="Resource" class="w-full h-40 object-cover rounded-md mb-4">
                    <h3 class="text-lg font-bold">Resource Title 3</h3>
                    <p class="text-gray-600 text-sm">Brief description of the resource.</p>
                    <a href="#" class="block mt-4 text-blue-500 hover:underline">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="mt-16 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Start Learning?</h2>
            <p class="text-gray-600 mb-6">Join FastCert today and unlock unlimited access to premium resources.</p>
            <a href="/register" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-full">Get Started</a>
        </div>
    </div>
    @endsection