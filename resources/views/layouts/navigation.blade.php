@include('layouts.quotemodal')
<nav 
     :class="darkMode ? 'bg-gray-900 text-gray-100' : 'bg-blue-800 text-white'"
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

                
                <div class="hidden md:flex space-x-6 ml-10">
                <a href="/" class="hover:text-gray-300">Home</a>

                <!-- Services Dropdown -->
                <div class="relative group">
                    <button class="flex items-center space-x-2 hover:text-gray-300">
                        <i class="fas fa-tools"></i>
                        <span>Services</span>
                    </button>
                    <div class="absolute hidden group-hover:block bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-100 mt-2 py-1 rounded shadow-md w-40 transition duration-200 ease-in-out">
                        <a href="/services" class="flex items-center space-x-2 px-3 py-1 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">
                            <i class="fas fa-briefcase"></i>
                            <span>Offerings</span>
                        </a>
                        <a href="/services/cloud-solutions" class="flex items-center space-x-2 px-3 py-1 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">
                            <i class="fas fa-cloud"></i>
                            <span>Cloud Solutions</span>
                        </a>
                        <a href="/services/cybersecurity" class="flex items-center space-x-2 px-3 py-1 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">
                            <i class="fas fa-shield-alt"></i>
                            <span>Cybersecurity</span>
                        </a>
                    </div>
                </div>

                <!-- FastCert Library Dropdown -->
                <div class="relative group">
                    <button class="flex items-center space-x-2 hover:text-gray-300">
                        <i class="fas fa-book"></i>
                        <span>FastCert Library</span>
                    </button>
                    <div class="absolute hidden group-hover:block bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-100 mt-2 py-1 rounded shadow-md w-40 transition duration-200 ease-in-out">
                        <a href="/fastcert" class="flex items-center space-x-2 px-3 py-1 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">
                            <i class="fas fa-book-open"></i>
                            <span>FastCert Resources</span>
                        </a>
                        <a href="/fastcert/subscription" class="flex items-center space-x-2 px-3 py-1 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">
                            <i class="fas fa-credit-card"></i>
                            <span>Subscription Plans</span>
                        </a>
                    </div>
                </div>

                <!-- Mentorship Dropdown -->
                <div class="relative group">
                    <button class="flex items-center space-x-2 hover:text-gray-300">
                        <i class="fas fa-user-friends"></i>
                        <span>Mentorship</span>
                    </button>
                    <div class="absolute hidden group-hover:block bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-100 mt-2 py-1 rounded shadow-md w-40 transition duration-200 ease-in-out">
                        <a href="/mentorship" class="flex items-center space-x-2 px-3 py-1 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Mentorship</span>
                        </a>
                        <a href="/services/training-certifications" class="flex items-center space-x-2 px-3 py-1 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Training</span>
                        </a>
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
                    <button class="flex items-center space-x-2 hover:text-gray-300">
                        <i class="fas fa-user-circle"></i>
                        <span>Account</span>
                    </button>
                    <div id="accountMenu" class="absolute hidden group-hover:block bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-100 mt-2 py-2 rounded shadow-md w-40">
                        <ul>
                            @auth
                                <li>
                                    <a href="/dashboard" class="flex items-center space-x-2 px-3 py-1 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">
                                        <i class="fas fa-tachometer-alt"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/profile" class="flex items-center space-x-2 px-3 py-1 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">
                                        <i class="fas fa-user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="flex items-center space-x-2 px-3 py-1 text-sm text-left w-full hover:bg-gray-200 dark:hover:bg-gray-700">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <a href="/login" class="flex items-center space-x-2 px-3 py-1 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">
                                        <i class="fas fa-sign-in-alt"></i>
                                        <span>Login</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/register" class="flex items-center space-x-2 px-3 py-1 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">
                                        <i class="fas fa-user-plus"></i>
                                        <span>Register</span>
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
                            <!-- Cart Icon with Badge -->
                    <div class="relative">
                        <button id="cart-button" class="relative flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 text-white-700 hover:text-gray-200"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 3h18l-2 14H5L3 3zM8 21a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm13 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                                />
                            </svg>
                            <!-- Badge -->
                             <a href="{{ route('cart.index') }}">
                            <span
                                id="cart-badge"
                                class="absolute -top-1 -right-2 bg-red-500 text-white text-xs font-bold rounded-full px-2 py-0.5 hidden"
                            >
                            {{ session('cart_count', 0) }}
                            </span>
                            </a>
                        </button>
                    </div>
                    <a href="javascript:void(0);" onclick="openQModal()" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Get a Quote</a>
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
<!-- 
                <div class="md:hidden">
                    <button @click="isOpen = !isOpen" class="text-gray-300 hover:text-white focus:outline-none">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div> -->
            </div>
        </div>

        
        <!-- Mobile Menu -->

<div x-data="{ openMenu: null, isOpen: false }" class="md:hidden">
    <!-- Toggle Button -->
    <button @click="isOpen = !isOpen" class="px-3 py-2 text-white focus:outline-none">
        <i :class="isOpen ? 'fas fa-times' : 'fas fa-bars'"></i>
    </button>

    <!-- Mobile Menu Wrapper -->
    <div x-show="isOpen" @click.away="isOpen = false" class="px-2 pt-2 pb-3 space-y-1">
        <!-- Home -->
        <a href="/" @click="isOpen = false" class="flex items-center space-x-2 px-3 py-2 rounded text-base font-medium text-white hover:bg-gray-700">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>

        <!-- Services -->
        <div>
            <button @click="openMenu === 'services' ? openMenu = null : openMenu = 'services'"
                class="flex items-center justify-between w-full px-3 py-2 rounded text-base font-medium text-white hover:bg-gray-700">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-tools"></i>
                    <span>Services</span>
                </div>
                <i :class="openMenu === 'services' ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>
            <div x-show="openMenu === 'services'" class="pl-6 bg-blue-900 text-white" x-cloak>
                <a href="/services" @click="isOpen = false" class="block px-3 py-2 rounded text-sm hover:bg-gray-700">
                    <i class="fas fa-book"></i>
                    <span>Library Overview</span>
                </a>
                <a href="/services/certifications" @click="isOpen = false" class="block px-3 py-2 rounded text-sm hover:bg-gray-700">
                    <i class="fas fa-certificate"></i>
                    <span>Certification Resources</span>
                </a>
            </div>
        </div>

        <!-- FastCert Library -->
        <div>
            <button @click="openMenu === 'fastcert' ? openMenu = null : openMenu = 'fastcert'"
                class="flex items-center justify-between w-full px-3 py-2 rounded text-base font-medium text-white hover:bg-gray-700">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-book"></i>
                    <span>FastCert Library</span>
                </div>
                <i :class="openMenu === 'fastcert' ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>
            <div x-show="openMenu === 'fastcert'" class="pl-6 bg-blue-900 text-white" x-cloak>
                <a href="/fastcert" @click="isOpen = false" class="block px-3 py-2 rounded text-sm hover:bg-gray-700">
                    <i class="fas fa-book-open"></i>
                    <span>Library Overview</span>
                </a>
                <a href="/fastcert/subscription" @click="isOpen = false" class="block px-3 py-2 rounded text-sm hover:bg-gray-700">
                    <i class="fas fa-credit-card"></i>
                    <span>Subscription Plans</span>
                </a>
            </div>
        </div>

        <!-- Mentorship -->
        <div>
            <button @click="openMenu === 'mentorship' ? openMenu = null : openMenu = 'mentorship'"
                class="flex items-center justify-between w-full px-3 py-2 rounded text-base font-medium text-white hover:bg-gray-700">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-user-friends"></i>
                    <span>Mentorship</span>
                </div>
                <i :class="openMenu === 'mentorship' ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>
            <div x-show="openMenu === 'mentorship'" class="pl-6 bg-blue-900 text-white" x-cloak>
                <a href="/mentorship" @click="isOpen = false" class="block px-3 py-2 rounded text-sm hover:bg-gray-700">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>One-on-One Coaching</span>
                </a>
                <a href="/mentorship/group" @click="isOpen = false" class="block px-3 py-2 rounded text-sm hover:bg-gray-700">
                    <i class="fas fa-users"></i>
                    <span>Group Mentorship</span>
                </a>
            </div>
        </div>

        <!-- Account -->
        <div>
            <button @click="openMenu === 'account' ? openMenu = null : openMenu = 'account'"
                class="flex items-center justify-between w-full px-3 py-2 rounded text-base font-medium text-white hover:bg-gray-700">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-user-circle"></i>
                    <span>Account</span>
                </div>
                <i :class="openMenu === 'account' ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>
            <div x-show="openMenu === 'account'" class="pl-6 bg-blue-900 text-white" x-cloak>
                <a href="/dashboard" @click="isOpen = false" class="block px-3 py-2 rounded text-sm hover:bg-gray-700">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="/profile" @click="isOpen = false" class="block px-3 py-2 rounded text-sm hover:bg-gray-700">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
                <a href="/login" @click="isOpen = false" class="block px-3 py-2 rounded text-sm hover:bg-gray-700">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span>
                </a>
            </div>
        </div>

        <!-- Get a Quote -->
        <a href="javascript:void(0);" onclick="openQModal()" @click="isOpen = false"
            class="block bg-blue-500 text-white px-3 py-2 rounded-md text-base font-medium hover:bg-blue-600">
            <i class="fas fa-comment-dots"></i>
            <span>Get a Quote</span>
        </a>
    </div>
</div>
    
    </div>
</nav>
<script>
    // Add event listeners to manage dropdown visibility
document.querySelectorAll('.group').forEach((dropdown) => {
    const button = dropdown.querySelector('button');
    const menu = dropdown.querySelector('div');

    let timeout;

    // Show dropdown on hover
    dropdown.addEventListener('mouseenter', () => {
        clearTimeout(timeout);
        menu.classList.remove('hidden');
    });

    // Hide dropdown with delay on mouse leave
    dropdown.addEventListener('mouseleave', () => {
        timeout = setTimeout(() => {
            menu.classList.add('hidden');
        }, 200); // Add a slight delay to make interactions smoother
    });
});
    </script>