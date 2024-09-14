<?php
// app/Livewire/FilterBar.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;
use App\Livewire\PropertyListings;


class FilterBar extends Component
{
    // Search fields
    public $location;
    public $listing_type;
    public $price; // This is the correct variable
    public $bedrooms = '';
    public $bathrooms = '';

    public $results = [];

    // Search method to handle multiple filters
    public function search()
    {
        $query = Property::query(); // Start the query builder

        if ($this->location) {
            $query->where('location', 'like', '%' . $this->location . '%');
        }

        if ($this->listing_type) {
            $query->where('listing_type', 'like', '%' . $this->listing_type . '%');
        }

        if ($this->price) {
            list($start, $end) = explode('-', $this->price);
            $start = (int) $start;
            $end = (int) $end;
            $query->whereBetween('price', [$start, $end]);
        }

        if ($this->bedrooms) {
            list($start, $end) = explode('-', $this->bedrooms);
            $start = (int) $start;
            $end = (int) $end;
            $query->whereBetween('bedrooms', [$start, $end]);
        }

        if ($this->bathrooms) {
            list($start, $end) = explode('-', $this->bathrooms);
            $start = (int) $start;
            $end = (int) $end;
            $query->whereBetween('bathrooms', [$start, $end]);
        }

        // Fetch filtered results
        $this->results = $query->get();
        // $this->dispatch('filtered-property', listings: $this->results);
        // return redirect('#', )->with(['properties' => $this->results]);        
    }

    public function render()
    {
        return view('livewire.filter-bar');
    }
}
