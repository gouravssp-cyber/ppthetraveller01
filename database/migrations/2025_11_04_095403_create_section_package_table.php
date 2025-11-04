<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('package_package_section', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('package_section_id')
                ->constrained('package_sections')
                ->onDelete('cascade');
            $table->foreignId('package_id')
                ->constrained('packages')
                ->onDelete('cascade');

            // Position within section
            $table->integer('position')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('package_section_id');
            $table->index('package_id');
            $table->unique(['package_section_id', 'package_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('package_package_section');
    }
};
