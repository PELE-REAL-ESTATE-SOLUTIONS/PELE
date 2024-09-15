<form method="POST" action="{{ route('filter-listings')}}"
  class="sticky top-16 w-full bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 shadow-md p-4 z-40">
  @csrf
  <div class="grid grid-cols-2 md:flex flex-wrap items-center gap-4">
    <div class="col-span-2 w-full md:w-auto flex-grow">
      <input wire:model.live='location' name="location" id="location"
        class="w-full px-3 py-2 dark:text-white dark:bg-gray-800 dark:border-none border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent"
        placeholder="Location..." type="search" />
    </div>
    {{-- <div class="text-white">
      {{ $price }} hhh
    </div> --}}
    <div class="relative">
      <x-filter-select wire:model.live="listing_type" name="listing_type" class="w-full">
        <option value="" disabled selected>Listing Type</option>
        <option value="all">All</option>
        <option value="sale">For Sale</option>
        <option value="rent">For Rent</option>
        <option value="sublet">For Subletting</option>
      </x-filter-select>

    </div>
    <div class="relative">
      <x-filter-select wire:model.live="price" name="price">
        <option value="" disabled selected>Price (NLE)</option>
        <option value="all">All Prices</option>
        <option value="10000-50000">10,000 - 50,000</option>
        <option value="50001-100000">50,001 - 100,0000</option>
        <option value="100001-200000">100,001 - 200,000</option>
      </x-filter-select>

    </div>
    <div class="relative">
      <x-filter-select wire:model.live="bedrooms" name="bedrooms">
        <option value="" disabled selected>Bedrooms</option>
        <option value="any">Any</option>
        <option value="1-5">1 - 5</option>
        <option value="6-10">6 - 10</option>
        <option value="11-20">11 - 20</option>
      </x-filter-select>

    </div>
    <div class="relative">
      <x-filter-select wire:model.live="bathrooms" name="bathrooms">
        <option value="" disabled selected>Baths</option>
        <option value="any">Any</option>
        <option value="1-5">1 - 5</option>
        <option value="6-10">6 - 10</option>
        <option value="11-20">11 - 20</option>
      </x-filter-select>

    </div>
    <x-primary-button wire:click="search" class="text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ms-2" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
      Search
    </x-primary-button>
  </div>
</form>