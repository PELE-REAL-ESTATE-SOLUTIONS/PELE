<?php

namespace App\Http\Controllers;

use App\Models\Property;
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
        return view('admin.propertyowners', ['owners' => $propertyOwenrs]);
    }

    public function showPending()
    {
        // Properties are displayed from oldest to newest so that users don't keep waiting for long periods (first come first served)
        $unapprovedListings = Property::where('approved', '=', 0)->with('propertyOwner')->paginate(20);
        return view('admin.properties', ['listings' => $unapprovedListings, 'approved' => false]);
    }

    public function showApproved()
    {
        $approvedListings = Property::where('approved', '=', 1)->with('propertyOwner')->latest()->paginate(20);
        return view('admin.properties', ['listings' => $approvedListings, 'approved' => true]);
    }

    public function review(Property $property)
    {
        $pictures = json_decode($property->pictures_paths, true);
        $firstFivePictures = array_slice($pictures, 0, 5);
        return view('admin.review', ['property' => $property, 'firstFivePictures' => $firstFivePictures]);
    }

    public function gallery(Property $property)
    {
        $pictures = json_decode($property->pictures_paths, true);
        return view('admin.gallery', compact('property', 'pictures'));
    }

    public function approve(Property $property)
    {
        $property->approved = 1;
        $property->save();
        $unapprovedListings = Property::where('approved', '=', 0)->with('propertyOwner')->paginate(20);
        return view('admin.properties', ['listings' => $unapprovedListings, 'approved' => false]);
    }

    public function revoke(Property $property)
    {
        $property->approved = 0;
        $property->save();
        $unapprovedListings = Property::where('approved', '=', 0)->with('propertyOwner')->paginate(20);
        return view('admin.properties', ['listings' => $unapprovedListings, 'approved' => false]);
    }

    public function reject(Property $property)
    {
        $property->delete();
        $unapprovedListings = Property::where('approved', '=', 0)->with('propertyOwner')->paginate(20);
        return view('admin.properties', ['listings' => $unapprovedListings, 'approved' => false]);
    }
}
