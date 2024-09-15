<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsNotAdmin;
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
    IsNotAdmin::class
])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'render'])->name('dashboard')->middleware(IsPropertyOwner::class);

    Route::get('/property-listings', [PropertyListings::class, 'render'])->name('property-listings');
    Route::get('/property-listings/create', [PropertyListings::class, 'create'])->name('create-property-listings');
    Route::post('/property-listings', [PropertyListings::class, 'store'])->name('add-listing');
    Route::post('/property-listings/filter', [PropertyListings::class, 'filter'])->name('filter-listings');
    Route::get('/property-listings/{property}', [PropertyListings::class, 'show'])->name('listing-details');
    Route::get('/property-listings/{property}/edit', [PropertyListings::class, 'edit'])->name('edit');
    Route::patch('/property-listings/{property}', [PropertyListings::class, 'update'])->name('update');
    Route::delete('/property-listings/{property}', [PropertyListings::class, 'destroy']);

    Route::get('/property-listings/{property}/images', [Gallery::class, 'render'])->name('gallery');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    IsAdmin::class
])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/property-owners', [AdminController::class, 'showOwners'])->name('owners');
    Route::get('/admin/pending', [AdminController::class, 'showPending'])->name('pending');
    Route::get('/admin/approveded', [AdminController::class, 'showApproved'])->name('approved');
    Route::get('/admin/rejected', [AdminController::class, 'showRejected'])->name('rejected');
    Route::get('/admin/{property}/review', [AdminController::class, 'review'])->name('review');
    Route::get('/admin/{property}/gallery', [AdminController::class, 'gallery'])->name('admin.gallery');
    Route::post('/admin/{property}/review', [AdminController::class, 'approve'])->name('approve');
    Route::delete('/admin/{property}', [AdminController::class, 'reject'])->name('reject');
    Route::post('/admin/{property}/revoke', [AdminController::class, 'revoke'])->name('revoke');
});
