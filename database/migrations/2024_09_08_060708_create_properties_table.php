<?php

use App\Models\PropertyOwner;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PropertyOwner::class);
            $table->string('property_type');
            $table->string('listing_type');
            $table->float('price');
            $table->string('location');
            $table->string('area');
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->integer('livingrooms')->default(0);
            $table->integer('kitchens')->default(0);
            $table->integer('diningrooms')->default(0);
            $table->text('description');
            $table->text('amenities');
            $table->json('pictures_paths');
            $table->json('documents_paths');
            $table->boolean('featured')->default(false);
            $table->boolean('approved')->default(false);
            $table->string('approved_by')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
