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

            <form nethod="POST" ation="{{ route('create-property-listings') }}">
                <div class="space-y-6 px-6 py-4 border rounded-lg mb-6">
                    <div>
                        <h1 class="text-md font-bold dark:text-white">Property Details</h1>
                        <p class="text-sm text-gray-400">Specify the essential property information</p>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <x-listing-form.label for="propertyType">Property Type</x-listing-form.label>
                            <x-listing-form.select name="propertyType">
                                <option>Bungalow</option>
                            </x-listing-form.select>
                        </div>
                        <div>
                            <x-listing-form.label for="listingType">Listing Type</x-listing-form.label>
                            <x-listing-form.select name="listingType">
                                <option>For Sale</option>
                            </x-listing-form.select>

                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <x-listing-form.label for="price">Price (NLE)</x-listing-form.label>
                            <x-listing-form.input name="price" placeholder="150000" />
                        </div>
                        <div>
                            <x-listing-form.label for="location">Location</x-listing-form.label>
                            <x-listing-form.input name="location" placeholder="59 Old Railwayline Wilberforce" />
                        </div>
                    </div>

                    <div>
                        <x-listing-form.label for="area">Area (ft)</x-listing-form.label>
                        <x-listing-form.input type="number" name="area" placeholder="3000" />
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <x-listing-form.label for="bedrooms">Number of Bedrooms</x-listing-form.label>
                            <x-listing-form.input type="number" name="bedrooms" placeholder="4" />
                        </div>
                        <div>
                            <x-listing-form.label for="bathrooms">Number of Bathrooms</x-listing-form.label>
                            <x-listing-form.input type="number" name="bathrooms" placeholder="2" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <x-listing-form.label for="livingrooms">Number of Living Rooms</x-listing-form.label>
                            <x-listing-form.input type="number" name="livingrooms" placeholder="1" />
                        </div>
                        <div>
                            <x-listing-form.label for="kitchens">Number of Kitchens</x-listing-form.label>
                            <x-listing-form.input type="number" name="kitchens" placeholder="1" />
                        </div>
                    </div>

                    <div>
                        <x-listing-form.label for="diningrooms">Number of Dining Rooms</x-listing-form.label>
                        <x-listing-form.input type="number" name="diningrooms" placeholder="1" />
                    </div>
                </div>

                <div class="space-y-6 px-6 py-4 border rounded-lg mb-6">
                    <div>
                        <h1 class="text-md font-bold dark:text-white">Property Description And Features</h1>
                        <p class="text-sm text-gray-400">Explain the in depth the details of your property and state
                            it’s features and amenities</p>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <x-listing-form.label for="price">Property Description</x-listing-form.label>
                            <x-listing-form.textarea type="textarea" col="50" rows="7" name="description"
                                placeholder="element represents a multi-line plain-text editing control..." />
                        </div>
                        <div>
                            <x-listing-form.label for="price">Property Amenities / Features</x-listing-form.label>
                            <x-listing-form.textarea type="textarea" col="50" rows="7" name="amenities"
                                placeholder="element represents a multi-line plain-text editing control..." />
                        </div>
                    </div>
                </div>

                <div class="space-y-6 px-6 py-6 border rounded-lg mb-6">

                    <div class="grid grid-cols-1 gap-6">
                        <div class="w-full max-w-md">
                            <label for="file-upload"
                                class="flex flex-col items-center justify-center w-full h-32 px-4 transition border-2 border-custom-blue border-dashed rounded-lg appearance-none cursor-pointer hover:border-blue-500 focus:outline-none">
                                <span class="flex flex-col items-center space-y-1">
                                    <span class="font-medium text-blue-900">Upload Images (at least 5)</span>
                                    <span class="text-xs text-blue-600">ImageName.png</span>
                                </span>
                                <input id="file-upload" type="file" class="hidden" accept="image/*" multiple>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex items-center mb-2">
                    <input id="terms" type="checkbox"
                        class="h-4 w-4 text-custom-blue focus:ring-custom-blue border-gray-300 rounded dark:bg-transparent">
                    <label for="terms" class="ml-2 text-sm text-gray-700 dark:text-white">
                        I agree to the <a href="#" class="text-custom-blue hover:underline font-semibold">Terms of
                            Service</a>
                    </label>
                </div>
                <div class="w-full flex items-center justify-end">
                    <x-main-button color="bg-custom-purple" path="{{ route('create-property-listings')}}">Add Listing
                    </x-main-button>
                </div>
            </form>


        </div>
    </div>
</x-app-layout>