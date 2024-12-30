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
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!--Logo-->
                        <div class="shrink-0 flex items-center">
                            <a href="/" class="flex items-center">
                                <img src="{{ asset('images/logo.png') }}" alt="MyWebsite Logo" class="h-[95px] w-auto">
                            </a>
                        </div>

                        <!--Navigation Link-->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <a href="/gallery" class="inline-flex items-center px-1 pt
                            -1 border-b-2 border-transparent text-md font-medium leading-5 text-gray-500 dark:text-gray-400 hover: text-gray-700 dark:hover:text-gray-300 
                            hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border
                            -gray-700 transition duration-150 ease-in-out">Gallery</a>
                            <a href="/calendars" class="inline-flex items-center px-1 pt
                            -1 border-b-2 border-transparent text-md font-medium leading-5 text-gray-500 dark:text-gray-400 hover: text-gray-700 dark:hover:text-gray-300 
                            hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border
                            -gray-700 transition duration-150 ease-in-out">Calendar</a>
                            <a href="/matches" class="inline-flex items-center px-1 pt
                            -1 border-b-2 border-transparent text-md font-medium leading-5 text-gray-500 dark:text-gray-400 hover: text-gray-700 dark:hover:text-gray-300 
                            hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border
                            -gray-700 transition duration-150 ease-in-out">Matches</a>
                            <a href="/members" class="inline-flex items-center px-1 pt
                            -1 border-b-2 border-transparent text-md font-medium leading-5 text-gray-500 dark:text-gray-400 hover: text-gray-700 dark:hover:text-gray-300 
                            hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border
                            -gray-700 transition duration-150 ease-in-out">Member</a>
                            <a href="/contact" class="inline-flex items-center px-1 pt
                            -1 border-b-2 border-transparent text-md font-medium leading-5 text-gray-500 dark:text-gray-400 hover: text-gray-700 dark:hover:text-gray-300 
                            hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border
                            -gray-700 transition duration-150 ease-in-out">Contact</a>
                        </div>
                    </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <a href="/login" class="inline-flex items-center px-1 pt
                                -1 border-b-2 border-transparent text-md font-medium leading-5 text-gray-500 dark:text-gray-400 hover: text-gray-700 dark:hover:text-gray-300 
                                hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border
                                -gray-700 transition duration-150 ease-in-out">Login</a>
                            <a href="/register" class="inline-flex items-center px-1 pt
                                -1 border-b-2 border-transparent text-md font-medium leading-5 text-gray-500 dark:text-gray-400 hover: text-gray-700 dark:hover:text-gray-300 
                                hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border
                                -gray-700 transition duration-150 ease-in-out">Register</a>
                        </div>
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

        <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
    </body>

</html>
