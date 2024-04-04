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
        Schema::table('packages', function (Blueprint $table) {
            Schema::table('packages', function (Blueprint $table) {
                $table->unsignedInteger('addtional_adult_price')->nullable()->after('max_persons');
                $table->unsignedInteger('addtional_youth_price')->nullable()->after('addtional_adult_price');
                $table->unsignedInteger('addtional_children_price')->nullable()->after('addtional_youth_price');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn(['addtional_adult_price', 'addtional_youth_price', 'addtional_children_price']);
        });
    }
};