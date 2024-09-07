<x-guest-layout>
    <div class="absolute top-4 left-4">
        <a href="/"> &lt; Go Back</a>
    </div>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

            <!-- Image Section -->
            <div class="w-1/2 hidden md:block mr-4">
                <!-- <img src="http://picsum.photos/seed/800/800" alt="Modern house exterior at dusk" class="object-cover w-full h-full rounded-xl"> -->
                <img src="http://picsum.photos/seed/800/800" alt="Modern house exterior at dusk" class="object-cover w-full h-full rounded-xl">
            </div>
    
            <!-- Form Section -->
            <div class="w-full md:w-[45%] p-8">
                <h1 class="text-4xl font-bold mb-2">Join us today 👋</h1>
                <p class="text-gray-600 mb-8">
                    Pele is a company that aims to reinvent the way properties are acquired, by providing a safe, reliable marketplace for property owners and clients to meet and transact.
                </p>
                <form class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300">First & Last Name</label>
                        <x-form-input type="text" id="name" name="name" placeholder="i.e. Davon Lean" />
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                        <x-form-input type="email" id="email" name="email" placeholder="@ davon@mail.com" />
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" class="mt-1 block w-full px-3 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#8F00FF] focus:border-[#8F00FF]">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-[#8F00FF] focus:ring-[#8F00FF] border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-300">Remember me</label>
                    </div>
                    <button type="submit" class="w-fit flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-[#8F00FF] hover:bg-[#7700CC] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#8F00FF]">
                        Create Account
                    </button>
                </form>
                <p class="mt-4 text-sm text-gray-600">
                    Already have an account? <a href="#" class="text-[#8F00FF] hover:underline">Login here</a>
                </p>
            </div>

    </x-authentication-card>
</x-guest-layout>
