<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class DashboardPropertyCard extends Component
{
    public $property;

    public function render()
    {
        $pictures = json_decode($this->property->pictures_paths, true);
        $firstPicture = !empty($pictures) ? $pictures[0] : null;
        $shortDescription = Str::limit($this->property->description, 100, '...');
        return view('livewire.dashboard-property-card', ['firstPicture' => $firstPicture, 'shortDescription' => $shortDescription]);
    }
}
