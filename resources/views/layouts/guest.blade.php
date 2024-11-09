<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PELE') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="dark:bg-gray-900">
    @if (preg_match("*property-listings*", request()->path()))
        <header class="sticky top-0  z-20 w-full py-6 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-900 border-b dark:border-gray-800">
            <div class="container mx-auto flex justify-between items-center">
                <nav class="hidden md:flex space-x-10">
                    <a href="#" class=" text-custom-purple hover:text-custom-blue">BUY</a>
                    <a href="#" class=" text-custom-purple hover:text-custom-blue">RENT</a>
                    <a href="#" class=" text-custom-purple hover:text-custom-blue">SELL</a>
                </nav>
                <p class="flex items-center space-x-2">
                    {{-- <i data-feather="home" class="h-8 w-8 text-custom-purple"></i> --}}
                    <a href="/" class="text-2xl font-bold dark:text-white">PELE</a>
                </p>
                <button id="menu-toggle"
                    class="md:hidden text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600"
                    aria-label="Toggle menu">
                    <i data-feather="menu" class="h-6 w-6"></i>
                </button>
                {{-- <button
                    class="hidden md:inline-flex px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-custom-purple hover:bg-blue-700">
                    Get in Touch
                </button> --}}
                @if (Route::has('login'))
                <div class="hidden md:flex">
                    @auth
                    <a href="{{ url('/property-listings') }}" class=" text-custom-purple hover:text-custom-blue">
                        HOME
                    </a>
                    @else
                    <a href="{{ route('login') }}" class=" text-custom-purple hover:text-custom-blue mr-4">
                        LOG IN
                    </a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class=" text-custom-purple hover:text-custom-blue">
                        REGISTER
                    </a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </header>
        <div id="mobile-menu"
            class="hidden md:hidden fixed inset-0 bg-white z-50 flex flex-col justify-center items-center">
            <button id="close-menu"
                class="absolute top-6 right-6 text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600"
                aria-label="Close menu">
                <i data-feather="x" class="h-6 w-6"></i>
            </button>
            <nav class="flex flex-col space-y-6 text-center">
                <a href="#" class="text-xl font-medium text-custom-purple hover:text-custom-blue">BUY</a>
                <a href="#" class="text-xl font-medium text-custom-purple hover:text-custom-blue">RENT</a>
                <a href="#" class="text-xl font-medium text-custom-purple hover:text-custom-blue">SELL</a>
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/property-listings') }}"
                    class="bg-custom-blue/10 px-3 py-1 rounded text-xl font-medium text-custom-blue hover:text-custom-blue">
                    HOME
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="bg-custom-blue/10 px-3 py-1 rounded text-xl font-medium text-custom-blue hover:text-custom-blue">
                    LOG IN
                </a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="bg-custom-blue/10 px-3 py-1 rounded text-xl font-medium text-custom-blue hover:text-custom-blue">
                    REGISTER
                </a>
                @endif
                @endauth
                @endif
            </nav>
        </div>
        {{ $slot }}
    @else
        <div class="font-sans antialiased min-h-screen flex items-center justify-center hover:cursor-default">
            {{ $slot }}
        </div>
    @endif

    @livewireScripts
</body>

</html>