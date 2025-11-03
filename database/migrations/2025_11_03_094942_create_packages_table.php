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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('title', 200);
            $table->string('slug', 200)->unique();
            $table->text('summary')->nullable();
            $table->longText('full_description')->nullable();

            // Type & Destination (Foreign Keys)
            $table->foreignId('tour_type_id')
                ->constrained('tour_types')
                ->onDelete('restrict');
            
            $table->foreignId('destination_id')
                ->constrained('destinations')
                ->onDelete('cascade');

            // Duration & Pricing
            $table->integer('duration_days');
            $table->integer('duration_nights');
            $table->decimal('price_start', 10, 2);
            $table->decimal('price_compare_at', 10, 2)->nullable();
            $table->string('currency', 3)->default('INR');

            // Tour Highlights (JSON)
            $table->json('highlights')->nullable();

            // SEO Fields
            $table->string('meta_title', 150)->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->string('canonical_url', 255)->nullable();
            $table->string('h1_title', 150)->nullable();
            $table->string('og_title', 150)->nullable();
            $table->string('og_description', 160)->nullable();
            $table->string('og_image', 255)->nullable();

            // Status & Visibility
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->boolean('featured')->default(false);
            $table->boolean('migrated_from_legacy')->default(false);

            $table->timestamps();

            // Indexes
            $table->index('slug');
            $table->index('tour_type_id');
            $table->index('destination_id');
            $table->index('status');
            $table->index('featured');
            $table->index('migrated_from_legacy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
