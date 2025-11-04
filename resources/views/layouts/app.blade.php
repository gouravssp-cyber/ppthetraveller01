<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('meta_description', 'Tour booking platform with amazing packages')">
    <meta property="og:title" content="@yield('og_title', config('app.name'))">
    <meta property="og:description" content="@yield('og_description', 'Best tour packages')">
    @yield('meta_tags')
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased bg-white text-gray-900">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gradient">
                {{ config('app.name') }}
            </a>

            <div class="hidden md:flex gap-8">
                <a href="/" class="hover:text-orange-500 transition">Home</a>
                <a href="#" class="hover:text-orange-500 transition">Packages</a>
                <a href="#" class="hover:text-orange-500 transition">About</a>
                <a href="#" class="hover:text-orange-500 transition">Contact</a>
            </div>

            <button id="mobileMenuBtn" class="md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="font-bold text-lg mb-4">{{ config('app.name') }}</h3>
                    <p class="text-gray-400">Amazing tour packages for your next adventure.</p>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Home</a></li>
                        <li><a href="#" class="hover:text-white transition">Packages</a></li>
                        <li><a href="#" class="hover:text-white transition">About</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Company</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition">Privacy</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Follow Us</h4>
                    <div class="flex gap-4">
                        <a href="#" class="hover:text-orange-500 transition">Facebook</a>
                        <a href="#" class="hover:text-orange-500 transition">Instagram</a>
                        <a href="#" class="hover:text-orange-500 transition">Twitter</a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @livewireScripts    
    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuBtn')?.addEventListener('click', () => {
            console.log('Mobile menu clicked');
        });
    </script>
</body>
</html>
