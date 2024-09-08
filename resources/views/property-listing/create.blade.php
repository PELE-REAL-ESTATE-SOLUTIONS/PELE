<x-app-layout>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 w-full flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold text-custom-blue leading-tight">Listing Details</h1>
                    <p class="text-sm text-gray-400 leading-relaxed">Please enter the accurate details of the property
                        you want to list.</p>
                </div>
            </div>

            <x-button-link path="{{ route('create-property-listings')}}">Create Listing</x-button-link>

        </div>
    </div>
</x-app-layout>