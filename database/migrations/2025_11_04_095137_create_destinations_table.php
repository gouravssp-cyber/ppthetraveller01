<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('slug', 150)->unique();
            
            // Tour Type (International or Domestic)
            $table->foreignId('tour_type_id')
                ->nullable()
                ->constrained('tour_types')
                ->onDelete('set null');

            // SEO
            $table->string('meta_title', 150)->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->string('h1_title', 150)->nullable();
            $table->text('description')->nullable();

            // Visibility
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('featured')->default(false);

            $table->timestamps();

            $table->index('slug');
            $table->index('tour_type_id');
            $table->index('status');
            $table->index('featured');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
