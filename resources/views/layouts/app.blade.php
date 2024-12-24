<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Custom Styles -->
        @yield('styles')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @if (Auth::check())
            @include('layouts.navigation')
        @else
            <nav class="bg-gradient-to-r from-[#051022] to-[#3a4e93] px-4 py-3">
                <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="MyWebsite Logo" class="h-[95px] w-auto">
                    </a>
                    <div>
                        <a href="/calendars" class="text-gray-50 hover:text-blue-500 px-4 py-2">Calendar</a>
                        <a href="/gallery" class="text-gray-50 hover:text-blue-500 px-4 py-2">Gallery</a>
                        <a href="/matches" class="text-gray-50 hover:text-blue-500 px-4 py-2">Match</a>
                        <a href="/members" class="text-gray-50 hover:text-blue-500 px-4 py-2">Member</a>
                        <a href="/contact" class="text-gray-50 hover:text-blue-500 px-4 py-2">Contact</a>
                        <a href="/login" class="text-gray-50 hover:text-blue-500 px-4 py-2">Login</a>
                        <a href="/register" class="text-gray-50 hover:text-blue-500 px-4 py-2">Register</a>
                    </div>
                </div>
            </nav>
        @endif

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <div class="container mx-auto">
                @yield('content')
            </div>
        </div>

        @include('layouts.footer')
    </body>
</html>
