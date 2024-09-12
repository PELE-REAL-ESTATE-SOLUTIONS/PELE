<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;

class Gallery extends Component
{
    public function render(Property $property)
    {
        $pictures = json_decode($property->pictures_paths, true);
        // dd($pictures);
        return view('property-listing.gallery',  compact('property', 'pictures'));
    }
}
