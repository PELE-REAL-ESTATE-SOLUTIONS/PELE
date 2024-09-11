<?php

use App\Livewire\PropertyListings;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/property-listings', [PropertyListings::class, 'render'])->name('property-listings');
    Route::get('/property-listings/create', [PropertyListings::class, 'create'])->name('create-property-listings');
    Route::post('/property-listings', [PropertyListings::class, 'store'])->name('add-listing');
    Route::get('/property-listings/{property}', [PropertyListings::class, 'show'])->name('listing-details');
});
