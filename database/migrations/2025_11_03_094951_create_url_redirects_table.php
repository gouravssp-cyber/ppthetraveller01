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
        Schema::create('url_redirects', function (Blueprint $table) {
            $table->id();

            // Old URL from legacy site
            $table->string('old_url', 255)->unique();
            $table->string('old_slug', 200)->nullable();

            // New URL (points to current page)
            $table->string('new_url', 255);

            // Foreign Keys (optional - for tracking which package/destination)
            $table->foreignId('package_id')
                ->nullable()
                ->constrained('packages')
                ->onDelete('set null');
            
            $table->foreignId('destination_id')
                ->nullable()
                ->constrained('destinations')
                ->onDelete('set null');

            // Redirect Type
            $table->enum('redirect_type', ['301', '302', '307'])->default('301');

            // Status
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Notes
            $table->text('notes')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('old_url');
            $table->index('new_url');
            $table->index('package_id');
            $table->index('destination_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('url_redirects');
    }
};
