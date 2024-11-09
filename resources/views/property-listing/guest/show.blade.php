<x-guest-layout>

    <div class="py-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-4 w-full flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold text-custom-blue leading-tight">Listing Details</h1>
                    <p class="text-sm text-gray-400 leading-relaxed">Please enter the accurate details of the property
                        you want to list.</p>
                </div>
            </div>

            <div class="relative overflow-hidden h-fit md:h-max md:grid grid-cols-4 gap-4 mb-4">
                @foreach($firstFivePictures as $picture)
                @if ($loop->first)
                <div class="md:h-[30rem] col-span-2 relative">
                    <img src="{{ asset('storage/' . $picture) }}" alt="Property Picture" class="h-full w-full" />
                </div>
                @endif
                @endforeach
                <div class="hidden h-[30rem] col-span-2 md:grid grid-cols-2 grid-rows-2 gap-4">
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
                <a href="{{ route('gallery', ['property' => $property]) }}"
                    class="px-4 py-2 bg-transparent border-2 dark:border-gray-800 text-purple-600 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition duration-150 ease-in-out">
                    View all photos
                </a>
            </div>

            <div class="bg-transparent mb-8">
                <div class=" mb-4">
                    <div class="md:flex items-start justify-between mb-6 md:mb-0">
                        <h1 class="text-3xl font-bold mb-2 dark:text-white">NLE {{ number_format($property->price) }} -
                            {{ strtoupper($property->property_type) }}</h1>

                        <span
                            class="bg-custom-blue/10 text-custom-blue px-3 py-1 rounded-full text-sm font-semibold">FOR
                            {{
                            strtoupper($property->listing_type) }}</span>
                    </div>
                    <div class="md:flex justify-between items-center w-full">
                        <p class="text-xl text-gray-600 dark:text-gray-400">{{ strtoupper($property->location) }}
                        </p>
                        <div class="md:flex space-x-4 text-lg dark:text-gray-400">
                            <span><strong>{{ $property->bedrooms }}</strong> bedrooms |</span>
                            <span><strong>{{ $property->bathrooms }}</strong> bathrooms |</span>
                            <span><strong>{{ $property->area }}</strong> sqft</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap md:space-x-4 mb-8">
                    <span class="bg-custom-blue/10 text-custom-blue px-4 py-2 rounded-md text-sm mr-4 md:mr-0">{{
                        $property->livingrooms }}
                        Living Room</span>
                    <span class="bg-custom-blue/10 text-custom-blue px-4 py-2 rounded-md text-sm mr-4 md:mr-0">{{
                        $property->kitchens
                        }}
                        Kitchens</span>
                    <span class="bg-custom-blue/10 text-custom-blue px-4 py-2 rounded-md text-sm mt-4 md:mt-0">{{
                        $property->diningrooms }}
                        Dining Room</span>
                </div>
                <div class="flex flex-col-reverse md:grid grid-cols-3 gap-8">
                    <div class="col-span-2 border border-custom-blue rounded-lg p-6">
                        <h3 class="text-xl font-semibold mb-4 dark:text-white">Description</h3>
                        <p class="text-gray-600 mb-4 dark:text-gray-300">
                            {{ $property->description }}
                        </p>
                        <h3 class="text-xl font-semibold mb-4 dark:text-white">Amenities</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $property->amenities }}
                        </p>
                    </div>
                    <div class=" border border-custom-blue rounded-lg h-fit p-6">
                        <div
                            class="w-full bg-gradient-to-r from-custom-purple to-custom-blue text-white py-3 rounded-md mb-4">

                            <a href="mailto:{{ $property->propertyOwner->user->email}}"
                                class="w-full h-full flex items-center justify-center">
                                GET THIS HOUSE</a>
                        </div>
                        <div class="w-full border border-purple-600 text-purple-600 py-3 rounded-md">

                            <a href="mailto:{{ $property->propertyOwner->user->email}}"
                                class="w-full h-full flex items-center justify-center">
                                REQUEST FOR A TOUR</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-guest-layout>