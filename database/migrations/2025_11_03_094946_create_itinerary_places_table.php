<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('itinerary_places', function (Blueprint $table) {
            $table->id();

            // Foreign Key to Itinerary Day
            $table->foreignId('itinerary_day_id')
                ->constrained('itinerary_days')
                ->onDelete('cascade');

            // Place Details
            $table->string('place_name', 150);
            $table->text('place_description')->nullable();

            // Optional destination reference
            $table->foreignId('destination_id')
                ->nullable()
                ->constrained('destinations')
                ->onDelete('set null');

            // Geographic info
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            // Media
            $table->string('image_url', 255)->nullable();
            $table->string('image_alt', 200)->nullable();

            // Sort Order
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('itinerary_day_id');
            $table->index('destination_id');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerary_places');
    }
};
