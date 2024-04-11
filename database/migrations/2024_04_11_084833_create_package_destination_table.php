<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('package_destination', function (Blueprint $table) {
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->primary(['package_id', 'destination_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('package_destination');
    }
};
