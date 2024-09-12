<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $properties = Property::paginate(6);
        $total_owner_properties = Property::count();
        return view('livewire.dashboard', ['properties' => $properties, 'total_owner_properties' => $total_owner_properties]);
    }
}
