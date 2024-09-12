<a href="{{ route('listing-details', ['property' => $property->id ]) }}"
  class="w-full max-w-md rounded-xl overflow-hidden shadow-lg">
  <div class="relative border border-b-0 border-[#8F00FF] rounded-t-xl overflow-hidden">
    <img src="{{ asset('storage/' . $firstPicture) }}" alt="Property image" class="w-full h-48 object-cover" />
  </div>
  <div class="p-4 border border-t-0 border-[#00A3FF] rounded-b-xl">
    <div class="flex justify-between items-center mb-1">
      <h2 class="text-xl font-bold text-gray-800 dark:text-white">NLE {{ number_format($property->price) }}</h2>
      <span class="bg-[#C8EBFF] text-[#00A3FF] text-xs font-medium px-3 py-1 rounded-full">FOR {{
        strtoupper($property->listing_type) }}</span>
    </div>
    <div class="text-gray-600 mb-1">
      <span class="font-semibold">{{ $property->bedrooms }}</span> bedrooms |
      <span class="font-semibold">{{ $property->bathrooms }}</span> bathrooms |
      <span class="font-semibold">{{ $property->area }}</span> sqft
    </div>
    <div class="text-gray-500">{{ $property->location }}</div>
  </div>
</a>