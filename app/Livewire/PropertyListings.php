<?php

namespace App\Livewire;

use App\Models\Property;
use Illuminate\Http\Request;
use Livewire\Component;

class PropertyListings extends Component
{
    public function render()
    {
        $properties = Property::paginate(5);

        return view('property-listing.index', ['properties' => $properties]);
    }

    public function create()
    {
        return view('property-listing.create');
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'property_type'=> ['required', 'string', 'max:225'],
            'listing_type'=> ['required', 'string', 'max:225'],
            'price'=> ['required', 'numeric'],
            'location'=>  ['required', 'string', 'max:225'],
            'area'=> ['required', 'numeric'],
            'bedrooms'=> ['required', 'integer'],
            'bathrooms'=> ['required', 'integer'],
            'livingrooms'=> ['required', 'integer'],
            'kitchens'=> ['required', 'integer'],
            'diningrooms'=> ['required', 'integer'],
            'description'=> ['required', 'string', 'max:5000'],
            'amenities'=> ['required', 'string', 'max:5000'],
            'pictures' => ['required', 'array', 'min:5', 'max:30'],
            'pictures.*' => ['required', 'file', 'mimes:jpg,png,jpeg,pdf', 'max:2048'],
            'terms_of_service' => ['required', 'accepted'],
        ], [
            'pictures.required' => 'You must upload between 5 and 30 files.',
            'pictures.min' => 'You must upload at least 5 files.',
            'pictures.max' => 'You cannot upload more than 30 files.',
            'pictures.*.mimes' => 'Only jpg, png, jpeg, and pdf files are allowed.',
            'pictures.*.max' => 'Each file must not be larger than 2MB.',
        ]);

        $uploadedFiles = [];

        // Handle the files
        if ($request->hasFile('pictures')) { // This should show an array of UploadedFile objects
            foreach ($request->file('pictures') as $picture) {
                // Store each file
                $filePath = $picture->store('uploads', 'public'); // Stores in the 'public/uploads' directory
                $uploadedFiles[] = $filePath;
            }
        }
        unset($attributes['terms_of_service']);
        unset($attributes['pictures']);
        $attributes['pictures_paths'] = json_encode($uploadedFiles);

        Property::create($attributes);
        return redirect()->route('property-listings');

    }

    public function show(Property $property) {

        $pictures = json_decode($property->pictures_paths, true);
        $firstFivePictures = array_slice($pictures, 0, 4);
        return view('property-listing.show',['property' => $property, 'firstFivePictures' => $firstFivePictures]);
    }
}
