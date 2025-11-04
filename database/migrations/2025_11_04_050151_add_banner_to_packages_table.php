<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->string('banner_image', 255)->nullable()->after('og_image');
            $table->string('banner_image_alt', 200)->nullable()->after('banner_image');
        });
    }

    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn(['banner_image', 'banner_image_alt']);
        });
    }
};
