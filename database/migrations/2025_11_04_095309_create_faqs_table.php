<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();

            // Foreign keys (both optional)
            $table->foreignId('package_id')
                ->nullable()
                ->constrained('packages')
                ->onDelete('cascade');
            $table->foreignId('destination_id')
                ->nullable()
                ->constrained('destinations')
                ->onDelete('cascade');

            // Content
            $table->string('question', 255);
            $table->longText('answer');

            // Sort order
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('package_id');
            $table->index('destination_id');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
