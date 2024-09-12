<x-app-layout>

    <div class="py-5">
        <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
            <div class="mb-4 w-full flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold text-custom-blue leading-tight">Overview</h1>
                    <p class="text-sm text-gray-400 leading-relaxed">{{ $total_owner_properties }} Listings</p>
                </div>

                <x-main-button tag="a" path="{{ route('create-property-listings')}}">Create Listing</x-main-button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="col-span-2 space-y-6">
                    @foreach ($properties as $property)
                    @livewire('dashboard-property-card', ['property' => $property])

                    @endforeach
                    <div class="mt-4">
                        {{ $properties->links() }}
                    </div>
                    <!-- Repeat the above div for other listings -->
                </div>
                <div>
                    <div class="bg-white rounded-lg border p-6">
                        <h3 class="text-lg font-semibold mb-4">Recent Customers</h3>
                        <p class="text-gray-500 mb-4">Total number of clients: 4</p>
                        <ul class="space-y-4">
                            <li class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://via.placeholder.com/40" alt="Jenny Wilson"
                                        class="w-10 h-10 rounded-full mr-3">
                                    <div>
                                        <p class="font-medium">Jenny Wilson</p>
                                        <p class="text-gray-500 text-sm">w.lawson@example.com</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm">Date</p>
                                    <p class="text-gray-500 text-sm">Time</p>
                                </div>
                            </li>
                            <!-- Repeat the above li for other customers -->
                        </ul>
                        <a href="#" class="text-blue-500 flex items-center mt-4">
                            SEE ALL CUSTOMERS
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>