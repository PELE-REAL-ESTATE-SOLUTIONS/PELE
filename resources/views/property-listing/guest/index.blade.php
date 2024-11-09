<x-guest-layout>
    @livewire('filter-bar')

    <div class="py-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-4 w-full flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold text-custom-blue leading-tight">Available Listings</h1>
                    <p class="text-sm text-gray-400 leading-relaxed">Listings based on your search result.</p>
                </div>

                <x-main-button tag="a" path="{{ route('create-property-listings')}}">Create Listing</x-main-button>
            </div>
            @if($properties && count($properties) != 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($properties as $property)
                @livewire('property-card', ['property' => $property])
                @endforeach
            </div>
            <div class="mt-4">
                {{ $properties->links() }}
            </div>
            @else
            <x-empty />
            @endif
            {{--
            @livewire('property-grid') --}}
        </div>
    </div>
</x-guest-layout>