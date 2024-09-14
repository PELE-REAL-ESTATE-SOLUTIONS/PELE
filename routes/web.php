<?php

use App\Http\Middleware\IsPropertyOwner;
use App\Livewire\Dashboard;
use App\Livewire\Gallery;
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
    Route::get('/dashboard', [Dashboard::class, 'render'])->name('dashboard')->middleware(IsPropertyOwner::class);

    Route::get('/property-listings', [PropertyListings::class, 'render'])->name('property-listings');
    Route::get('/property-listings/create', [PropertyListings::class, 'create'])->name('create-property-listings');
    Route::post('/property-listings', [PropertyListings::class, 'store'])->name('add-listing');
    Route::get('/property-listings/{property}', [PropertyListings::class, 'show'])->name('listing-details');
    Route::get('/property-listings/{property}/edit', [PropertyListings::class, 'edit'])->name('edit');
    Route::patch('/property-listings/{property}', [PropertyListings::class, 'update'])->name('update');
    Route::delete('/property-listings/{property}', [PropertyListings::class, 'destroy']);

    Route::get('/property-listings/{property}/images', [Gallery::class, 'render'])->name('gallery');
});
