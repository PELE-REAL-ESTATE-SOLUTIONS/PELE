<x-admin-layout>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 w-full flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold text-custom-blue leading-tight">Listing Details</h1>
                    <p class="text-sm text-gray-400 leading-relaxed">Please enter the accurate details of the property
                        you want to list.</p>
                </div>
            </div>

            <div class="relative overflow-hidden h-max grid grid-cols-4 gap-4 mb-4">
                @foreach($firstFivePictures as $picture)
                @if ($loop->first)
                <div class="h-[30rem] col-span-2 relative">
                    <img src="{{ asset('storage/' . $picture) }}" alt="Property Picture" class="h-full w-full" />
                </div>
                @endif
                @endforeach
                <div class="h-[30rem] col-span-2 grid grid-cols-2 grid-rows-2 gap-4">
                    @foreach($firstFivePictures as $picture)
                    @if (!$loop->first)
                    <div>
                        <img src="{{ asset('storage/' . $picture) }}" alt="Property Picture" class="h-full w-full">
                    </div>
                    @endif

                    @endforeach
                </div>
            </div>
            <div class="w-full flex items-center justify-end mb-8">
                <a href="{{ route('admin.gallery', ['property' => $property]) }}"
                    class="mr-4 px-4 py-2 bg-transparent border-2 dark:border-gray-800 text-purple-600 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition duration-150 ease-in-out">
                    View all photos
                </a>
                <a href="{{ route('property.download.all', ['property' => $property]) }}"
                    class="px-4 py-2 border-2 dark:border-gray-800 text-purple-600 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition duration-150 ease-in-out">
                    Download Documents
                </a>
            </div>

            <div class="bg-transparent mb-8">
                <div class=" mb-4">
                    <div class="flex items-start justify-between">
                        <h1 class="text-3xl font-bold mb-2 dark:text-white">NLE {{ number_format($property->price) }} -
                            {{ strtoupper($property->property_type) }}</h1>

                        <span
                            class="bg-custom-blue/10 text-custom-blue px-3 py-1 rounded-full text-sm font-semibold">FOR
                            {{
                            strtoupper($property->listing_type) }}</span>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <p class="text-xl text-gray-600 dark:text-gray-400">{{ strtoupper($property->location) }}
                        </p>
                        <div class="flex space-x-4 text-lg dark:text-gray-400">
                            <span><strong>{{ $property->bedrooms }}</strong> bedrooms |</span>
                            <span><strong>{{ $property->bathrooms }}</strong> bathrooms |</span>
                            <span><strong>{{ $property->area }}</strong> sqft</span>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-4 mb-8">
                    <span class="bg-custom-blue/10 text-custom-blue px-4 py-2 rounded-md text-sm">{{
                        $property->livingrooms }}
                        Living Room</span>
                    <span class="bg-custom-blue/10 text-custom-blue px-4 py-2 rounded-md text-sm">{{ $property->kitchens
                        }}
                        Kitchens</span>
                    <span class="bg-custom-blue/10 text-custom-blue px-4 py-2 rounded-md text-sm">{{
                        $property->diningrooms }}
                        Dining Room</span>
                </div>
                <div class="grid grid-cols-3 gap-8">
                    <div class="col-span-2 border rounded-lg p-6">
                        <h3 class="text-xl font-semibold mb-4 dark:text-white">Description</h3>
                        <p class="text-gray-600 mb-4 dark:text-gray-300">
                            {{ $property->description }}
                        </p>
                        <h3 class="text-xl font-semibold mb-4 dark:text-white">Amenities</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $property->amenities }}
                        </p>
                    </div>

                    <div class=" border rounded-lg h-fit p-6">
                        @if ($property->approved != 1)
                        <button type="submit" form="approval-form"
                            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-md mb-4 transition-all duration-400">APPROVE</button>
                        <button type="submit" form="rejection-form"
                            class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-md transition-all duration-400">REJECT</button>
                        @else
                        <p class="text-gray-600 dark:text-gray-300 mb-4">This property has been been reviewed approved
                            by
                            {{ $property->approved_by }}. Is there any issue with this property?</p>
                        <button type="submit" form="revoke-form"
                            class="w-full border bg-red-600 hover:bg-red-700 text-white py-3 rounded-md transition-all duration-400">REVOKE
                            APPROVAL</button>
                        @endif
                    </div>

                </div>
            </div>

            <form method="POST" action="{{ route('approve', ['property' => $property])}}" id="approval-form"
                class="hidden">
                @csrf
            </form>
            <form method="POST" action="{{ route('reject', ['property' => $property])}}" id="rejection-form"
                class="hidden">
                @csrf
                @method('DELETE')
            </form>
            <form method="POST" action="{{ route('revoke', ['property' => $property])}}" id="revoke-form"
                class="hidden">
                @csrf
            </form>
        </div>
    </div>
</x-admin-layout>