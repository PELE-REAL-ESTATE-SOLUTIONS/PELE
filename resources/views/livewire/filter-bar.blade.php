<div class="sticky top-16 w-full bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 shadow-md p-4">
    <div class="flex flex-wrap items-center gap-4">
      <div class="flex-grow">
        <input
          class="w-full px-3 py-2 dark:bg-gray-800 dark:border-none border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent"
          placeholder="Location..."
          type="search"
        />
      </div>
      <div class="relative">
        <x-filter-select>
          <option value="" disabled selected>Category</option>
          <option value="all">All Categories</option>
          <option value="electronics">Electronics</option>
          <option value="clothing">Clothing</option>
          <option value="books">Books</option>
        </x-filter-select>
        {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
          </svg>
        </div> --}}
      </div>
      <div class="relative">
        <x-filter-select>
          <option value="all">All Prices</option>
          <option value="0-50">$0 - $50</option>
          <option value="50-100">$50 - $100</option>
          <option value="100+">$100+</option>
        </x-filter-select>
        {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
          </svg>
        </div> --}}
      </div>
      <div class="relative">
        <x-filter-select>
          <option value="" disabled selected>Rating</option>
          <option value="all">All Ratings</option>
          <option value="4+">4+ Stars</option>
          <option value="3+">3+ Stars</option>
          <option value="2+">2+ Stars</option>
        </x-filter-select>
        {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
          </svg>
        </div> --}}
      </div>
      <div class="relative">
        <x-filter-select>
          <option value="" disabled selected>Location</option>
          <option value="all">All Locations</option>
          <option value="usa">USA</option>
          <option value="europe">Europe</option>
          <option value="asia">Asia</option>
        </x-filter-select>
        {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
          </svg>
        </div> --}}
      </div>
      <button class="bg-[#00A3FF] hover:bg-[#0082CC] text-white font-bold py-2 px-4 rounded-md flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        Search
      </button>
    </div>
  </div>