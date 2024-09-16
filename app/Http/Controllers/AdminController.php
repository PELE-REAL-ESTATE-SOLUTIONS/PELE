<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyOwner;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashbord');
    }

    public function showOwners()
    {
        $propertyOwenrs = PropertyOwner::with('properties')->latest()->paginate(7);
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

    public function showRejected()
    {
        $unapprovedListings = Property::where('approved', '=', 2)->with('propertyOwner')->paginate(20);
        return view('admin.rejected', ['listings' => $unapprovedListings, 'approved' => false]);
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
        $property->approved_by = Auth::user()->name;
        $property->save();
        $unapprovedListings = Property::where('approved', '=', 0)->with('propertyOwner')->paginate(20);
        return view('admin.properties', ['listings' => $unapprovedListings, 'approved' => false]);
    }

    public function revoke(Property $property)
    {
        $property->approved = 2;
        $property->approved_by = null;
        $property->save();
        $unapprovedListings = Property::where('approved', '=', 0)->with('propertyOwner')->paginate(20);
        return view('admin.properties', ['listings' => $unapprovedListings, 'approved' => false]);
    }

    public function reject(Property $property)
    {
        $property->approved = 2;
        $property->approved_by = null;
        $property->save();
        $unapprovedListings = Property::where('approved', '=', 0)->with('propertyOwner')->paginate(20);
        return view('admin.properties', ['listings' => $unapprovedListings, 'approved' => false]);
    }

    public function downloadAll(Property $property)
    {

        $files = $property->documents_paths;
        // Assuming files is a collection of file paths

        // Create a new ZIP file
        $zip = new ZipArchive;
        $zipFileName = 'property_files_' . $property->id . '.zip';
        $zipFilePath = storage_path('app/public/' . $zipFileName);

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            // dd($files);
            foreach ($files as $file) {
                $filePath = storage_path('app/public/' . $file->path);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }
            $zip->close();
        } else {
            abort(500, 'Could not create ZIP file.');
        }

        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

    public function search()
    {

    }
}
