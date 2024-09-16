<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use App\Models\Property;
use App\Models\PropertyOwner;

class Dashboard extends Component
{
    public function render()
    {
        $user = Auth::id();
        $property_owner_id = PropertyOwner::where('user_id', '=', $user)->pluck('id')->first();
        $properties = Property::where('property_owner_id', '=', $property_owner_id)->orderBy('created_at', 'desc')->paginate(6);
        $total_owner_properties = count($properties);
        return view('livewire.dashboard', ['properties' => $properties, 'total_owner_properties' => $total_owner_properties]);
    }
}
