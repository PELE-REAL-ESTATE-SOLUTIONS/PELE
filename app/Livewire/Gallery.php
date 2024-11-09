<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Gallery extends Component
{
    public function render(Property $property)
    {
        $pictures = json_decode($property->pictures_paths, true);
        if(Auth::user()) {
            return view('property-listing.gallery',  compact('property', 'pictures'));
        }

        return view('property-listing.guest.gallery',  compact('property', 'pictures'));
    }
}
