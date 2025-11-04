<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('itinerary_places', function (Blueprint $table) {
            $table->id();

            // Foreign key
            $table->foreignId('itinerary_day_id')
                ->constrained('itinerary_days')
                ->onDelete('cascade');

            // Place details
            $table->string('place_name', 150);
            $table->text('place_description')->nullable();

            // Optional destination reference
            $table->foreignId('destination_id')
                ->nullable()
                ->constrained('destinations')
                ->onDelete('set null');

            // Location
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            // Image
            $table->string('image_url', 255)->nullable();
            $table->string('image_alt', 200)->nullable();

            // Sort order
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('itinerary_day_id');
            $table->index('destination_id');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('itinerary_places');
    }
};
