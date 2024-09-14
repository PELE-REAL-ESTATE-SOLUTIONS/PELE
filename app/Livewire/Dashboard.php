<?php

namespace App\Livewire;

use App\Models\Property;
use Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $user = Auth::user()->propertyOwner->id;
        $properties = Property::where('property_owner_id', '=', $user)->orderBy('created_at', 'desc')->paginate(6);
        $total_owner_properties = count($properties);
        return view('livewire.dashboard', ['properties' => $properties, 'total_owner_properties' => $total_owner_properties]);
    }
}
