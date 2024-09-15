<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyOwner;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashbord');
    }

    public function showOwners()
    {
        $propertyOwenrs = PropertyOwner::with('user')->with('properties')->latest()->paginate(7);
        ;
        return view('admin.propertyowners', ['owners' => $propertyOwenrs]);
    }
}
