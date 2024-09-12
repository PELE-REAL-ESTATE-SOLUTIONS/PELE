<?php

namespace App\Livewire;

use Livewire\Component;

class PropertyCard extends Component
{
    public $property;

    public function render()
    {
        $pictures = json_decode($this->property->pictures_paths, true);
        $firstPicture = !empty($pictures) ? $pictures[0] : null;
        return view('livewire.property-card', ['firstPicture' => $firstPicture]);
    }
}
