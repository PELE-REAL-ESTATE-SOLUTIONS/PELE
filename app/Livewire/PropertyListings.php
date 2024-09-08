<?php

namespace App\Livewire;

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
}
