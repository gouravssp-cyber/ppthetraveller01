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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();

            // Foreign Keys (both optional - can be package-specific or destination-specific)
            $table->foreignId('package_id')
                ->nullable()
                ->constrained('packages')
                ->onDelete('cascade');
            
            $table->foreignId('destination_id')
                ->nullable()
                ->constrained('destinations')
                ->onDelete('cascade');

            // FAQ Content
            $table->string('question', 255);
            $table->longText('answer');

            // Sort Order
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('package_id');
            $table->index('destination_id');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
