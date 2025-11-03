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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('slug', 150)->unique();

            // SEO & Meta
            $table->string('meta_title', 150)->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->string('h1_title', 150)->nullable();
            $table->text('description')->nullable();

            // Status & Visibility
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('featured')->default(false);

            $table->timestamps();

            // Indexes
            $table->index('slug');
            $table->index('status');
            $table->index('featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
