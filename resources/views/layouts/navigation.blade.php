<!-- <nav>

    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('profile') }}">Profile</a>
    <a href="{{ route('services.cloud-solutions') }}">Cloud Solutions</a>
    <a href="{{ route('services.cybersecurity') }}">Cybersecurity</a>
    <a href="{{ route('services.grc') }}">GRC</a>
    <a href="{{ route('services.subscription-plans') }}">Subscription Plans</a>
    <a href="{{ route('dashboard') }}">Dashboard</a>

</nav> -->
<nav class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="text-lg font-bold text-gray-700 dark:text-gray-300">
                CloudZone
            </a>

            <!-- Navigation Links -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">Home</a>

                <!-- Services Dropdown -->
                <div class="relative group">
                    <button class="flex items-center text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                        <span>Services</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 001.414 0L10 6.414l3.293 3.293a1 1 0 001.414-1.414l-4-4a1 1 0 00-1.414 0l-4 4a1 1 0 000 1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="absolute hidden group-hover:block bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded shadow-lg mt-2">
                        <a href="{{ route('services.cloud-solutions') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 flex items-center">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11m-6 0v10m0 0l-4-4m4 4l4-4m13 10h-4m4-8h-4m4 8V6a2 2 0 00-2-2H6a2 2 0 00-2 2v6m4 4l4-4m0 0l-4-4m4 4v6" />
                            </svg>
                            Cloud Solutions
                        </a>
                        <a href="{{ route('services.cybersecurity') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 flex items-center">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h4l-2-2m0 0l2 2m-2-2v6m-4-2H9m4-2H9m0 0H5m4 2v6" />
                            </svg>
                            Cybersecurity
                        </a>
                    </div>
                </div>

                <!-- Search -->
                <div class="relative">
                    <input type="text" placeholder="Search..." class="text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-900 rounded-full px-3 py-1">
                </div>
            </div>
            <!-- dark mode switch -->
            <div x-data="{ darkMode: $store.theme.darkMode }">
    <label for="theme-toggle" class="flex items-center cursor-pointer">
        <div class="relative">
            <input
                id="theme-toggle"
                type="checkbox"
                class="sr-only"
                :checked="$store.theme.darkMode"
                x-on:click="$store.theme.toggle()"
            >
            <div 
                class="block w-10 h-6 rounded-full transition duration-300"
                :class="$store.theme.darkMode ? 'bg-gray-700' : 'bg-gray-400'"
            ></div>
            <div 
                class="dot absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition transform duration-300"
                :class="$store.theme.darkMode ? 'translate-x-4' : ''"
            ></div>
        </div>
        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-100">
            Switch Theme
        </span>
    </label>
    </div>
            <!-- Account Dropdown -->
            <div class="relative group">
                <button class="flex items-center text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                    Account
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 001.414 0L10 6.414l3.293 3.293a1 1 0 001.414-1.414l-4-4a1 1 0 00-1.414 0l-4 4a1 1 0 000 1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded shadow-lg mt-2">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Dashboard</a>
                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Profile</a>
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Login</a>
                </div>
            </div>
        </div>
    </div>
</nav>
