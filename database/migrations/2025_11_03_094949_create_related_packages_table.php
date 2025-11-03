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
        Schema::create('related_packages', function (Blueprint $table) {
            $table->id();

            // Foreign Keys to packages
            $table->foreignId('package_id')
                ->constrained('packages')
                ->onDelete('cascade');
            
            $table->foreignId('related_package_id')
                ->constrained('packages')
                ->onDelete('cascade');

            // Sort Order
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('package_id');
            $table->index('related_package_id');
            $table->index('sort_order');
            
            // Unique constraint to prevent duplicate relationships
            $table->unique(['package_id', 'related_package_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('related_packages');
    }
};
