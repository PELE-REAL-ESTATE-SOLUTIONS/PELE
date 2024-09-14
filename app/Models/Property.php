<?php

namespace App\Models;

use App\Models\PropertyOwner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function propertyOwner()
    {
        return $this->belongsTo(PropertyOwner::class);
    }
}
