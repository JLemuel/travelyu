<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropForeign(['destination_id']);  // Drop foreign key constraint
            $table->dropColumn('destination_id');  // Drop the column
        });
    }

    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->unsignedBigInteger('destination_id')->after('id');
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
        });
    }
};
