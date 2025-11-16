<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'E-Commerce Store')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased" style="background-color: var(--color-background);">
    <nav class="shadow-md" style="background-color: var(--color-white); border-bottom: 1px solid var(--color-border);">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold transition-colors" style="color: var(--color-primary);">
                        E-Commerce Store
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <form action="{{ route('search') }}" method="GET" class="flex items-center">
                        <input 
                            type="text" 
                            name="query" 
                            placeholder="Search products..." 
                            class="px-4 py-2 rounded-l-full border border-r-0" 
                            style="border-color: var(--color-border);"
                            value="{{ request()->input('query') }}"
                        >
                        <button 
                            type="submit" 
                            class="bg-[#8d6e63] hover:bg-[#5d4037] text-white px-4 py-2 rounded-r-full transition duration-300"
                        >
                            Search
                        </button>
                    </form>
                    <a href="{{ route('home') }}" class="transition-colors" style="color: var(--color-text);" onmouseover="this.style.color='var(--color-primary)'" onmouseout="this.style.color='var(--color-text)'">
                        Home
                    </a>
                    <a href="{{ route('filter') }}" class="transition-colors" style="color: var(--color-text);" onmouseover="this.style.color='var(--color-primary)'" onmouseout="this.style.color='var(--color-text)'">
                        Products
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="mt-16" style="background-color: var(--color-primary-dark); color: var(--color-white);">
        <div class="container mx-auto px-4 py-8">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} E-Commerce Store. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @livewireScripts
    @stack('scripts')
</body>
</html>

