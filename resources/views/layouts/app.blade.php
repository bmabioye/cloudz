<!DOCTYPE html>

<html lang="en" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      x-init="$watch('darkMode', value => { 
          localStorage.setItem('darkMode', value); 
          document.documentElement.classList.toggle('dark', value);
      }); 
      if (darkMode) document.documentElement.classList.add('dark');">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'CloudZone') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=raleway:400,500,600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.8/dayjs.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>




    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
<!-- <header class="flex justify-between items-center py-4 px-6 bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow">
    <h1 class="text-xl font-bold">CloudZone</h1>

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

</header> -->

    <div class="min-h-screen">
        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow dark:bg-gray-800">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
        @yield('content')
        </main>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    @livewireScripts
</body>
</html>
