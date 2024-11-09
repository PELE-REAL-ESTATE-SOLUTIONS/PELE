<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PELE - Real Estate</title>
    <title>{{ config('app.name', 'PELE') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <style>
        .menu-open {
            overflow: hidden;
        }
    </style>
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="flex flex-col min-h-screen dark:bg-gray-900 hover:cursor-default">
    <header class="sticky top-0  z-20 w-full py-6 px-4 sm:px-6 lg:px-8 bg-white border-b">
        <div class="container mx-auto flex justify-between items-center">
            <nav class="hidden md:flex space-x-10">
                <a href="#" class=" text-custom-purple hover:text-custom-blue">BUY</a>
                <a href="#" class=" text-custom-purple hover:text-custom-blue">RENT</a>
                <a href="#" class=" text-custom-purple hover:text-custom-blue">SELL</a>
            </nav>
            <p class="flex items-center space-x-2">
                {{-- <i data-feather="home" class="h-8 w-8 text-custom-purple"></i> --}}
                <span class="text-2xl font-bold">PELE</span>
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
        {{-- @if (Route::has('login'))
        <div class="flex flex-col space-y-6 text-center">
            @auth
            <a href="{{ url('/property-listings') }}"
                class="text-xl font-medium text-custom-purple hover:text-custom-blue">
                Listings
            </a>
            @else
            <a href="{{ route('login') }}" class="text-xl font-medium text-custom-purple hover:text-custom-blue">
                LOG IN
            </a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="rounded-md px-3 py-2 gradient-text ring-1 ring-transparent transition hover:text-custom-blue focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-custom-purple dark:focus-visible:ring-white">
                REGISTER
            </a>
            @endif
            @endauth
        </div>
        @endif --}}
    </div>

    <main class="flex-grow">
        {{-- Hero Section --}}
        <section class="relative bg-gray-900 text-white">
            <img src="{{ asset('images/hero-demo.jpg')}}" alt="Luxury home"
                class="absolute inset-0 w-full h-full object-cover opacity-50">
            <div class="relative container mx-auto px-4 py-32 sm:px-6 lg:px-8 flex flex-col items-center text-center">
                <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                    Find Your Dream Home
                </h1>
                <p class="mt-6 text-xl max-w-3xl">
                    Discover quality properties in prime locations. Let us guide you to your perfect home.
                </p>
                <div class="mt-10 max-w-xl w-full">
                    <div class="flex gap-4">
                        <input type="text" placeholder="Enter location"
                            class="text-black flex-grow px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button
                            class="px-6 py-2 bg-custom-purple text-white font-semibold rounded-md hover:bg-blue-700">Search</button>
                    </div>
                </div>
            </div>
        </section>
        {{-- End of Hero Section --}}

        {{-- Featured Properties Section --}}
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center mb-12">Featured Properties</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($featured_properties as $featured_property)
                        @livewire('property-card', ['property' => $featured_property])
                    @endforeach
                </div>
                <div class="mt-12 text-center">
                    <button id="see-more-btn"
                        class="px-14 py-3 bg-custom-blue text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                        SEE MORE
                    </button>
                </div>
            </div>
        </section>
        {{-- End of Featured Properties Section --}}

        {{-- Services Section --}}
        <section class="py-16">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center mb-12">Our Services</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-lg shadow-md text-center p-6">
                        <i data-feather="home" class="mx-auto h-12 w-12 text-custom-purple mb-4"></i>
                        <h3 class="font-semibold text-lg mb-2">Property Listing</h3>
                        <p class="text-gray-600">Explore a wide selection of properties for sale or for rent, with
                            detailed listings
                            to help you find the perfect home.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md text-center p-6">
                        <i data-feather="settings" class="mx-auto h-12 w-12 text-custom-purple mb-4"></i>
                        <h3 class="font-semibold text-lg mb-2">Property Management</h3>
                        <p class="text-gray-600">Homeowners can easily manage and update their property listings using
                            our efficient property management system</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md text-center p-6">
                        <i data-feather="phone" class="mx-auto h-12 w-12 text-custom-purple mb-4"></i>
                        <h3 class="font-semibold text-lg mb-2">Consulting</h3>
                        <p class="text-gray-600">Access expert real estate insights and advice through our resources,
                            helping you navigate the property market with confidence.</p>
                    </div>
                </div>
            </div>
        </section>
        {{-- End of Services Section --}}

        {{-- Client Testimonial Section --}}
        <section class="py-16 bg-custom-purple text-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold mb-6">What Our Clients Say</h2>
                    <blockquote class="text-xl italic">
                        "PELE helped us find our dream home. Their expertise and dedication made the
                        entire process smooth and enjoyable. Highly recommended!"
                    </blockquote>
                    <p class="mt-4 font-semibold">- Sarah & John Kombay</p>
                </div>
            </div>
        </section>
        {{-- End of Client Testimonial Section --}}
    </main>

    <footer class="bg-gray-900 text-white">
        <div class="container mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">About PELE</h3>
                    <p class="text-gray-400">
                        Pele is a company that aims to reinvent the way properties are acquired, by providing a safe,
                        reliable marketplace for property owners and clients to meet and transact.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i data-feather="map-pin" class="h-5 w-5 mr-2"></i>
                            Hillstation Freetown
                        </li>
                        <li class="flex items-center">
                            <i data-feather="phone" class="h-5 w-5 mr-2"></i>
                            +232 88 000 111
                        </li>
                        <li class="flex items-center">
                            <i data-feather="mail" class="h-5 w-5 mr-2"></i>
                            info@pele.com
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-blue-400">
                            <i data-feather="facebook" class="h-6 w-6"></i>
                        </a>
                        <a href="#" class="hover:text-blue-400">
                            <i data-feather="twitter" class="h-6 w-6"></i>
                        </a>
                        <a href="#" class="hover:text-blue-400">
                            <i data-feather="instagram" class="h-6 w-6"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800 text-center">
                <p>&copy; 2024 PELE. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        feather.replace();

        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const closeMenu = document.getElementById('close-menu');
            const mobileMenu = document.getElementById('mobile-menu');
            const body = document.body;

            function toggleMenu() {
                mobileMenu.classList.toggle('hidden');
                body.classList.toggle('menu-open');
            }

            menuToggle.addEventListener('click', toggleMenu);
            closeMenu.addEventListener('click', toggleMenu);

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInside = mobileMenu.contains(event.target) || menuToggle.contains(event.target);
                if (!isClickInside && !mobileMenu.classList.contains('hidden')) {
                    toggleMenu();
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768 && !mobileMenu.classList.contains('hidden')) {
                    toggleMenu();
                }
            });
        });
    </script>
</body>

</html>