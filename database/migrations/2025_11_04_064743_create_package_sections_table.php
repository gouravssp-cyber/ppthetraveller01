<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('package_sections', function (Blueprint $table) {
            $table->id();

            // Section details
            $table->string('title', 150)->unique();
            $table->string('slug', 150)->unique();
            $table->text('description')->nullable();

            // Positioning and visibility
            $table->integer('position')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');

            // SEO fields
            $table->string('meta_title', 150)->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->string('section_icon', 100)->nullable(); // for icon display

            // Banner image
            $table->string('banner_image', 255)->nullable();
            $table->string('banner_image_alt', 200)->nullable();

            $table->timestamps();

            // Indexes
            $table->index('slug');
            $table->index('position');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('package_sections');
    }
};
