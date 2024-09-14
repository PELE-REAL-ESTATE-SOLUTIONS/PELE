<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use App\Models\PropertyOwner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PropertyListings extends Component
{
    public $properties;

    protected $listeners = ['filtered-property' => 'filter'];

    #[On('filtered-property')]
    public function filter($listings = null)
    {
        dd(22);
        $this->properties = $listings;
    }

    public function render()
    {
        // $this->dispatch('filtered-property');
        $this->properties = Property::orderBy('created_at', 'desc')->paginate(6);
        return view('property-listing.index', ['properties' => $this->properties]);
    }

    public function create()
    {
        return view('property-listing.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'property_type' => ['required', 'string', 'max:225'],
            'listing_type' => ['required', 'string', 'max:225'],
            'price' => ['required', 'numeric'],
            'location' => ['required', 'string', 'max:225'],
            'area' => ['required', 'numeric'],
            'bedrooms' => ['required', 'integer'],
            'bathrooms' => ['required', 'integer'],
            'livingrooms' => ['required', 'integer'],
            'kitchens' => ['required', 'integer'],
            'diningrooms' => ['required', 'integer'],
            'description' => ['required', 'string', 'max:5000'],
            'amenities' => ['required', 'string', 'max:5000'],
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


        // Check if user is a property owner
        $property_owner = PropertyOwner::where('user_id', '=', Auth::id())->get();
        // If false make user property owner and create listing
        if (!$property_owner || count($property_owner) == 0) {
            Auth::user()->propertyOwner()->create();
        }

        // If true add property listing
        $attributes['property_owner_id'] = Auth::id();
        Property::create($attributes);
        return redirect()->route('property-listings');
    }

    public function show(Property $property)
    {

        $pictures = json_decode($property->pictures_paths, true);
        $firstFivePictures = array_slice($pictures, 0, 5);
        return view('property-listing.show', ['property' => $property, 'firstFivePictures' => $firstFivePictures]);
    }

    public function edit(Property $property)
    {
        if (Gate::allows('edit-listing', $property)) {
            return view('property-listing.edit', ['property' => $property]);
        }

        return redirect('/property-listings');
    }

    public function update(Request $request, Property $property)
    {
        if (!Gate::allows('edit-listing', $property)) {
            return redirect('/property-listings');
        }

        $attributes = $request->validate([
            'property_type' => ['required', 'string', 'max:225'],
            'listing_type' => ['required', 'string', 'max:225'],
            'price' => ['required', 'numeric'],
            'location' => ['required', 'string', 'max:225'],
            'area' => ['required', 'numeric'],
            'bedrooms' => ['required', 'integer'],
            'bathrooms' => ['required', 'integer'],
            'livingrooms' => ['required', 'integer'],
            'kitchens' => ['required', 'integer'],
            'diningrooms' => ['required', 'integer'],
            'description' => ['required', 'string', 'max:5000'],
            'amenities' => ['required', 'string', 'max:5000'],
            'terms_of_service' => ['required', 'accepted'],
        ]);

        unset($attributes['terms_of_service']);

        $property->update($attributes);
        return redirect('/property-listings/' . $property->id);

    }

    public function destroy(Property $property)
    {
        if (!Gate::allows('edit-listing', $property)) {
            return redirect('/property-listings');
        }

        $property->delete();
        return redirect('/dashboard');
    }
}
