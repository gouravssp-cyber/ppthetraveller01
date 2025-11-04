<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('package_gallery', function (Blueprint $table) {
            $table->id();

            // Foreign key
            $table->foreignId('package_id')
                ->constrained('packages')
                ->onDelete('cascade');

            // Image
            $table->string('image_url', 255);
            $table->string('alt_text', 200)->nullable();
            $table->text('caption')->nullable();

            // Sort order
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('package_id');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('package_gallery');
    }
};
