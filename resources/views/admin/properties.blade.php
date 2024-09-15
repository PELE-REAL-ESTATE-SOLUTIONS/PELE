<x-admin-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-4 w-full flex items-center justify-between">
                @if ($approved == false)
                <div>
                    <h1 class="text-xl font-bold text-custom-blue leading-tight">Unapproved Listings</h1>
                    <p class="text-sm text-gray-400 leading-relaxed">This table shows the list of properties that have
                        been submitted to be listed on the site.</p>
                </div>

                @else
                <div>
                    <h1 class="text-xl font-bold text-custom-blue leading-tight">Approved Listings</h1>
                    <p class="text-sm text-gray-400 leading-relaxed">This table shows the list of properties that are
                        approved and made available to users.</p>
                </div>
                @endif
            </div>
            <div class="flex flex-col mt-5">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div
                            class="border rounded-lg divide-y divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
                            <div class="py-3 px-4">
                                <div class="relative max-w-xs">
                                    <label for="hs-table-search" class="sr-only">Search</label>
                                    <input type="text" name="hs-table-search" id="hs-table-search"
                                        class="py-2 px-3 ps-9 block w-full text-md border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Search for property owners">
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                        <svg class="size-4 text-gray-400 dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <path d="m21 21-4.3-4.3"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                    <thead class="bg-gray-50 dark:bg-neutral-700">
                                        <tr>
                                            <th scope="col" class="py-3 px-4 pe-0">
                                                <div class="flex items-center h-5">
                                                    <input id="hs-table-search-checkbox-all" type="checkbox"
                                                        class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-700 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                    <label for="hs-table-search-checkbox-all"
                                                        class="sr-only">Checkbox</label>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-md font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                ID</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-md font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                Type</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-md font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                For</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-md font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                Price</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-md font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                Location</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-md font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                Owner</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-md font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                Owner Email</th>

                                            <th scope="col"
                                                class="px-6 py-3 text-start text-md font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                Submitted On</th>
                                            @if ($approved != false)
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-md font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                Admin</th>

                                            @endif
                                            <th scope="col"
                                                class="px-6 py-3 text-end text-md font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                        @foreach ($listings as $property)
                                        <tr
                                            class="hover:bg-gray-100 dark:hover:bg-white/10 transition-all duration-500 ease-linear">
                                            <td class="py-3 ps-4">
                                                <div class="flex items-center h-5">
                                                    <input id="hs-table-search-checkbox-1" type="checkbox"
                                                        class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                    <label for="hs-table-search-checkbox-1"
                                                        class="sr-only">Checkbox</label>
                                                </div>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                {{ $property->id }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                {{ ucwords($property->property_type) }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                {{ ucwords($property->listing_type) }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                NLE {{ number_format($property->price) }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                {{ ucwords($property->location) }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                {{ $property->propertyOwner->user->name }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                {{ $property->propertyOwner->user->email }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                {{ $property->created_at }}</td>
                                            @if ($approved != false)
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                {{ Auth::user()->name }}</td>

                                            @endif
                                            <td class="px-6 py-1 whitespace-nowrap text-end text-sm font-medium">
                                                <a href="{{ route('review', ['property' => $property]) }}"
                                                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                                    View
                                                </a>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt-4">
                            {{ $listings->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>