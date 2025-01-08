<nav 
     :class="darkMode ? 'bg-gray-900 text-gray-100' : 'bg-gray-800 text-white'"
    class="sticky top-0 z-50 shadow-md transition-colors duration-300"
    x-data="{ isOpen: false }"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <!-- <a href="/" class="text-xl font-bold">CloudZone</a> -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/cloudzone-white.png') }}" alt="logo" style="height: 40px;">
                </a>

                <div class="hidden md:flex space-x-4 ml-10">
                    <a href="/" class="hover:text-gray-300">Home</a>
                    <div class="relative group">
                        <button class="flex items-center hover:text-gray-300">
                            Services
                            <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute hidden group-hover:block bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-100 mt-2 py-2 rounded shadow-lg">
                            <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700">Cloud Solutions</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700">Cybersecurity</a>
                        </div>
                    </div>
                    <div class="relative group">
                        <button class="flex items-center hover:text-gray-300">
                            FastCert Library
                            <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute hidden group-hover:block bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-100 mt-2 py-2 rounded shadow-lg">
                            <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700">Library Overview</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700">Certification Resources</a>
                        </div>
                    </div>
                    <div class="relative group">
                        <button class="flex items-center hover:text-gray-300">
                            Mentorship
                            <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute hidden group-hover:block bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-100 mt-2 py-2 rounded shadow-lg">
                            <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700">One-on-One Coaching</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700">Group Mentorship</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center">
            <div class="relative">
                <!-- FontAwesome Search Icon -->
                <button id="searchIcon" class="dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-400">
                <i class="fas fa-search text-xl"></i>
                </button>

                <!-- Hidden Search Bar -->
                <div
                    id="searchBar"
                    class="absolute top-10 right-0 hidden bg-white dark:bg-gray-800 p-2 rounded-lg shadow-lg w-64"
                >
                    <input
                        type="text"
                        placeholder="Search..."
                        class="w-full rounded-full px-4 py-2 text-gray-900 dark:text-gray-300 focus:outline-none focus:ring focus:ring-gray-300 dark:focus:ring-gray-600"
                    >
                     </div>
                </div>

                <div class="hidden md:flex items-center space-x-4 ml-4">
                    <div class="relative group">
                        <button class="flex items-center hover:text-gray-300">
                            Account
                            <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute hidden group-hover:block bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-100 mt-2 py-2 rounded shadow-lg">
                            <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700">Dashboard</a>
                            <a href="/profile" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700">Profile</a>
                            <a href="/login" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700">Login</a>
                        </div>
                    </div>
                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Get a Quote</a>
                    <div>
                        <input id="theme-toggle" type="checkbox" class="sr-only" x-model="darkMode">
                        <label for="theme-toggle" class="flex items-center cursor-pointer">
                            <div class="relative">
                                <span class="block w-10 h-6 bg-gray-300 dark:bg-gray-600 rounded-full"></span>
                                <span class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full transform transition-transform" :class="{ 'translate-x-4': darkMode }"></span>
                            </div>
                            <span class="ml-3">Theme</span>
                        </label>
                    </div>
                </div>
                <div class="md:hidden">
                    <button @click="isOpen = !isOpen" class="text-gray-300 hover:text-white focus:outline-none">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div x-show="isOpen" class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700">Home</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700">Services</a>
                <div class="relative">
                    <button class="block px-3 py-2 w-full text-left rounded-md text-base font-medium hover:bg-gray-700">FastCert Library</button>
                    <div class="hidden">
                        <a href="#" class="block px-3 py-2 hover:bg-gray-700">Library Overview</a>
                        <a href="#" class="block px-3 py-2 hover:bg-gray-700">Certification Resources</a>
                    </div>
                </div>
                <div class="relative">
                    <button class="block px-3 py-2 w-full text-left rounded-md text-base font-medium hover:bg-gray-700">Mentorship</button>
                    <div class="hidden">
                        <a href="#" class="block px-3 py-2 hover:bg-gray-700">One-on-One Coaching</a>
                        <a href="#" class="block px-3 py-2 hover:bg-gray-700">Group Mentorship</a>
                    </div>
                </div>
                <div class="relative">
                    <button class="block px-3 py-2 w-full text-left rounded-md text-base font-medium hover:bg-gray-700">Account</button>
                    <div class="hidden">
                        <a href="/dashboard" class="block px-3 py-2 hover:bg-gray-700">Dashboard</a>
                        <a href="/profile" class="block px-3 py-2 hover:bg-gray-700">Profile</a>
                        <a href="/login" class="block px-3 py-2 hover:bg-gray-700">Login</a>
                    </div>
                </div>
                <a href="#" class="block bg-blue-500 text-white px-3 py-2 rounded-md text-base font-medium hover:bg-blue-600">Get a Quote</a>
            </div>
        </div>
    </div>
</nav>
