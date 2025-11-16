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
        Schema::table('products', function (Blueprint $table) {
            $table->string('brand')->nullable()->after('category_id');
            $table->string('color')->nullable()->after('brand');
            $table->json('sizes')->nullable()->after('color');
            $table->decimal('min_price', 10, 2)->nullable()->after('sizes');
            $table->decimal('max_price', 10, 2)->nullable()->after('min_price');
            
            $table->index('brand');
            $table->index('color');
            $table->index(['min_price', 'max_price']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex(['brand']);
            $table->dropIndex(['color']);
            $table->dropIndex(['min_price', 'max_price']);
            $table->dropColumn(['brand', 'color', 'sizes', 'min_price', 'max_price']);
        });
    }
};
