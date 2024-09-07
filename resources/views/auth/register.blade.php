<x-guest-layout>
    <div class="absolute top-4 left-4">
        <a href="/" class="hover:underline"> &lt; Go Back</a>
    </div>
    <x-authentication-card>

            <!-- Form Section -->
            <div class="w-full md:w-[45%] p-8">
                <h1 class="text-4xl font-bold mb-2">Join us today 👋</h1>
                <p class="text-gray-600 mb-8">
                    Pele is a company that aims to reinvent the way properties are acquired, by providing a safe, reliable marketplace for property owners and clients to meet and transact.
                </p>
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    <x-validation-errors class="mb-4" />
                    <div>
                        <x-form-label for="name">First & Last Name</x-form-label>
                        <x-form-input type="text" id="name" name="name" placeholder="i.e. Davon Lean" :value="old('name')" />
                    </div>
                    <div>
                        <x-form-label for="email">Email Address</x-form-label>
                        <x-form-input type="email" id="email" name="email" placeholder="@ davon@mail.com" />
                    </div>
                    <div>
                        <x-form-label for="password">Password</x-form-label>
                        <x-form-input type="password" id="password" name="password" placeholder="••••••••" />
                    </div>
                    <div>
                        <x-form-label for="password_confirmation">password_confirmation</x-form-label>
                        <x-form-input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" />
                    </div>
                    <div></div>
                    <button type="submit" class="w-fit flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-[#8F00FF] hover:bg-[#7700CC] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#8F00FF]">
                        Create Account
                    </button>
                </form>
                <p class="mt-4 text-sm text-gray-600">
                    Already have an account? <a href="/login" class="text-[#8F00FF] hover:underline">Login here</a>
                </p>
            </div>

    </x-authentication-card>
</x-guest-layout>
