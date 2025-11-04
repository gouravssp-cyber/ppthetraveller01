<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop foreign key constraints first
        Schema::table('itinerary_days', function (Blueprint $table) {
            $table->dropForeign(['variant_id']);
            $table->dropColumn('variant_id');
        });

        Schema::table('package_gallery', function (Blueprint $table) {
            $table->dropForeign(['variant_id']);
            $table->dropColumn('variant_id');
        });

        // Now drop the variants table
        Schema::dropIfExists('package_variants');
    }

    public function down(): void
    {
        // Recreate if needed (reverse operation)
        Schema::create('package_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained('packages')->onDelete('cascade');
            $table->string('variant_name', 100);
            $table->string('variant_slug', 100)->nullable();
            $table->text('variant_description')->nullable();
            $table->integer('duration_days')->nullable();
            $table->integer('duration_nights')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('price_compare_at', 10, 2)->nullable();
            $table->json('highlights')->nullable();
            $table->integer('sort_order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->unique(['package_id', 'variant_name']);
        });
    }
};
