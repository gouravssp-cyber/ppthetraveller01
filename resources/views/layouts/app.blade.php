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

<body class="">

    <!-- Navigation -->
    <x-navigation />

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>



    <x-testimonials />
    <x-discount />
    <x-footer />


    @livewireScripts

    @stack('scripts')

    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuBtn')?.addEventListener('click', () => {
            console.log('Mobile menu clicked');
        });
    </script>
</body>

</html>