<?php

namespace App\Livewire;

use App\Models\Property;
use Illuminate\Http\Request;
use Livewire\Component;

class PropertyListings extends Component
{
    public function render()
    {
        return view('property-listing.index');
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
        ]);

        Property::create($attributes);
        return redirect()->route('property-listings');

    }
}
