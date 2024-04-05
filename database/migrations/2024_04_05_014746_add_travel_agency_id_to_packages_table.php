<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->unsignedBigInteger('travel_agency_id')->nullable()->after('id');
            $table->foreign('travel_agency_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            // If using SQL standard, it's safe to dropForeign by column name on newer Laravel versions
            $table->dropForeign(['travel_agency_id']);
            $table->dropColumn('travel_agency_id');
        });
    }
};
