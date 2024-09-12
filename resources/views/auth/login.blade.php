<x-guest-layout>
    <div class="absolute top-4 left-4">
        <a href="/" class="hover:underline"> &larr; Go Back</a>
    </div>
    <x-authentication-card>

        <!-- Form Section -->
        <div class="w-full md:w-[45%] p-8">
            <h1 class="text-4xl font-bold mb-2">Welcome Back 👋</h1>
            <p class="text-gray-600 mb-8">
                With PELE your home is just a few clicks away!
            </p>
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <x-validation-errors class="mb-4" />
                <div>
                    <x-form-label for="email">Email Address</x-form-label>
                    <x-form-input type="email" id="email" name="email" placeholder="@ davon@mail.com" />
                </div>
                <div>
                    <x-form-label for="password">Password</x-form-label>
                    <x-form-input type="password" id="password" name="password" placeholder="••••••••" />
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="w-36 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-[#8F00FF] hover:bg-[#7700CC] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#8F00FF]">
                        Login
                    </button>

                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>

            </form>
            <p class="mt-4 text-sm text-gray-600">
                Don't have an account? <a href="/register" class="text-[#8F00FF] hover:underline">Create free
                    account</a>
            </p>
        </div>

    </x-authentication-card>
</x-guest-layout>