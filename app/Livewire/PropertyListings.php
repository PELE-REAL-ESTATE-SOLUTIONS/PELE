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

    public function filter(Request $request)
    { {
            $query = Property::query(); // Start the query builder

            if ($request->location) {
                $query->where('location', 'like', '%' . $request->location . '%');
            }

            if ($request->listing_type && $request->listing_type != 'all') {
                $query->where('listing_type', 'like', '%' . $request->listing_type . '%');
            }

            if ($request->price && $request->price != 'all') {
                list($start, $end) = explode('-', $request->price);
                $start = (int) $start;
                $end = (int) $end;
                $query->whereBetween('price', [$start, $end]);
            }

            if ($request->bedrooms && $request->bedrooms != 'any') {
                list($start, $end) = explode('-', $request->bedrooms);
                $start = (int) $start;
                $end = (int) $end;
                $query->whereBetween('bedrooms', [$start, $end]);
            }

            if ($request->bathrooms && $request->bathrooms != 'any') {
                list($start, $end) = explode('-', $request->bathrooms);
                $start = (int) $start;
                $end = (int) $end;
                $query->whereBetween('bathrooms', [$start, $end]);
            }

            // Fetch filtered results
            $results = $query->paginate(6);
            return view('property-listing.index', ['properties' => $results]);
        }
    }

    public function render()
    {
        // $this->dispatch('filtered-property');
        $properties = Property::where('approved', '=', 1)->orderBy('created_at', 'desc')->paginate(6);
        return view('property-listing.index', ['properties' => $properties]);
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
            'documents' => ['required', 'array', 'min:2', 'max:10'],
            'pictures.*' => ['required', 'file', 'mimes:jpg,png,jpeg,pdf', 'max:3048'],
            'documents.*' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:3048'],
            'terms_of_service' => ['required', 'accepted'],
        ], [
            'pictures.required' => 'You must upload between 5 and 30 files.',
            'pictures.min' => 'You must upload at least 5 files.',
            'pictures.max' => 'You cannot upload more than 30 files.',
            'pictures.*.mimes' => 'Only jpg, png, jpeg, and pdf files are allowed.',
            'pictures.*.max' => 'Each file must not be larger than 3MB.',
            'documents.required' => 'You must upload between 2 and 10 supporting documents',
            'documents.min' => 'You must upload at least 2 supporting documents.',
            'documents.max' => 'You cannot upload more than 10 supporting documents',
            'documents.*.mimes' => 'Only pdf, doc, and pdf supporting documents are allowed.',
            'documents.*.max' => 'Each supporting document must not be larger than 3MB.',
        ]);

        $uploadedFiles = [];
        $uploadedDocuments = [];

        // Handle the files
        if ($request->hasFile('pictures')) { // This should show an array of UploadedFile objects
            foreach ($request->file('pictures') as $picture) {
                // Store each file
                $filePath = $picture->store('uploads', 'public'); // Stores in the 'public/uploads' directory
                $uploadedFiles[] = $filePath;
            }
        }

        // Handle the documents
        if ($request->hasFile('documents')) { // This should show an array of UploadedFile objects
            foreach ($request->file('documents') as $picture) {
                // Store each file
                $filePath = $picture->store('documents', 'public'); // Stores in the 'public/uploads' directory
                $uploadedDocuments[] = $filePath;
            }
        }

        unset($attributes['terms_of_service']);
        unset($attributes['pictures']);
        unset($attributes['documents']);
        $attributes['pictures_paths'] = json_encode($uploadedFiles);
        $attributes['documents_paths'] = json_encode($uploadedDocuments);


        // Check if user is a property owner
        $property_owner = PropertyOwner::where('user_id', '=', Auth::id())->get();
        // If false make user property owner and create listing
        if (!$property_owner || count($property_owner) == 0) {
            Auth::user()->propertyOwner()->create();
        }

        $property_owner_id = PropertyOwner::where('user_id', '=', Auth::id())->pluck('id')->first();
        // If true add property listing
        $attributes['property_owner_id'] = $property_owner_id;
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
