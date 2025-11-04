<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('url_redirects', function (Blueprint $table) {
            $table->id();

            // URLs
            $table->string('old_url', 255)->unique();
            $table->string('old_slug', 200)->nullable();
            $table->string('new_url', 255);

            // Foreign keys (optional)
            $table->foreignId('package_id')
                ->nullable()
                ->constrained('packages')
                ->onDelete('set null');
            $table->foreignId('destination_id')
                ->nullable()
                ->constrained('destinations')
                ->onDelete('set null');

            // Redirect type
            $table->enum('redirect_type', ['301', '302', '307'])->default('301');
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Notes
            $table->text('notes')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('old_url');
            $table->index('new_url');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('url_redirects');
    }
};
