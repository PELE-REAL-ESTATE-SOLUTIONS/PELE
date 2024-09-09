<x-app-layout>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 w-full flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold text-custom-blue leading-tight">Search Results</h1>
                    <p class="text-sm text-gray-400 leading-relaxed">Showing results for your query</p>
                </div>

                <x-main-button tag="a" path="{{ route('create-property-listings')}}">Create Listing</x-main-button>
            </div>
            <x-property-grid />
        </div>
    </div>
</x-app-layout>