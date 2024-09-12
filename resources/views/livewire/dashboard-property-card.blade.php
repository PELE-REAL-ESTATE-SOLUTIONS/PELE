<div
    class="bg-white dark:bg-gray-800 h-fit sm:h-64 rounded-lg border dark:border-gray-700 flex flex-col sm:flex-row overflow-hidden">
    <div class="w-96 md:w-1/3 h-full">
        <img src="{{ asset('storage/' . $firstPicture) }}" alt="" class="w-full h-full">
    </div>
    <div class="md:w-2/3 p-6">
        <div class="flex justify-between items-start mb-4 relative">
            <div>
                <h3 class="text-xl dark:text-white font-bold mb-2 sm:mb-0">NLE {{ number_format($property->price) }}
                </h3>
                <p class="text-gray-600 dark:text-white/80">{{ $property->bedrooms }} bedrooms | {{ $property->bathrooms
                    }} bathrooms | {{
                    $property->area }} sqft</p>
                <p class="text-gray-600 dark:text-white/80">{{ strtoupper($property->location) }}</p>
            </div>
            <span
                class="bg-custom-blue/10 text-custom-blue px-3 py-1 rounded-full text-sm font-semibold absolute top-0 right-2 sm:right-0 sm:relative">FOR
                {{ strtoupper($property->listing_type) }}</span>
        </div>
        <p class="text-gray-700 dark:text-white/60 mb-4">{{ $shortDescription }}</p>
        <div class="flex space-x-4">
            <a href="/"
                class="border border-custom-blue hover:bg-custom-blue hover:text-white text-custom-blue px-4 py-2 rounded-md transition-colors duration-500">Edit
                Listing</a>
            <button class="bg-green-500 text-white px-4 py-2 rounded-md">Mark As Sold</button>
        </div>
    </div>
</div>