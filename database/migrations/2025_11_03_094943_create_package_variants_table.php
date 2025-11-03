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
        Schema::create('package_variants', function (Blueprint $table) {
            $table->id();

            // Foreign Key to Package
            $table->foreignId('package_id')
                ->constrained('packages')
                ->onDelete('cascade');

            // Variant Details
            $table->string('variant_name', 100);
            $table->string('variant_slug', 100)->nullable();
            $table->text('variant_description')->nullable();

            // Pricing & Duration (can differ from base package)
            $table->integer('duration_days')->nullable();
            $table->integer('duration_nights')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('price_compare_at', 10, 2)->nullable();

            // Variant-specific highlights (JSON)
            $table->json('highlights')->nullable();

            // Sort Order
            $table->integer('sort_order')->default(0);

            // Status
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();

            // Indexes
            $table->index('package_id');
            $table->index('status');
            $table->index('sort_order');
            
            // Unique constraint
            $table->unique(['package_id', 'variant_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_variants');
    }
};
