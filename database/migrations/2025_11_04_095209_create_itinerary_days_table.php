<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('itinerary_days', function (Blueprint $table) {
            $table->id();

            // Foreign key
            $table->foreignId('package_id')
                ->constrained('packages')
                ->onDelete('cascade');

            // Day details
            $table->integer('day_number');
            $table->string('day_title', 150)->nullable();
            $table->longText('day_description')->nullable();

            // Image
            $table->string('feature_image', 255)->nullable();
            $table->string('feature_image_alt', 200)->nullable();

            // Sort order
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('package_id');
            $table->index('day_number');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('itinerary_days');
    }
};
