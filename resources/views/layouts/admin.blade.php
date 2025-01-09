<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css') {{-- Tailwind CSS --}}
</head>
<body class="bg-gray-100">
    <div class="flex">
        {{-- Sidebar --}}
        <div class="w-64 bg-gray-800 text-white h-screen">
            <div class="p-4">
                <h2 class="text-lg font-bold">Admin Panel</h2>
            </div>
            <nav class="mt-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.resources.index') }}" class="block px-4 py-2 hover:bg-gray-700">Resources</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.plans.index') }}" class="block px-4 py-2 hover:bg-gray-700">Plans</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 hover:bg-gray-700">Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.coupons.index') }}" class="block px-4 py-2 hover:bg-gray-700">Coupons</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 hover:bg-gray-700">
                            @csrf
                            <button type="submit" class="w-full text-left">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>

        {{-- Main Content --}}
        <div class="flex-1">
            <header class="bg-white shadow py-4 px-6">
                <h1 class="text-xl font-bold">@yield('title', 'Dashboard')</h1>
            </header>

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
