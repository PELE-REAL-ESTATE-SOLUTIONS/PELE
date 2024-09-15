<?php
// app/Livewire/FilterBar.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;
use App\Livewire\PropertyListings;


class FilterBar extends Component
{
    public function render()
    {
        return view('livewire.filter-bar');
    }
}
