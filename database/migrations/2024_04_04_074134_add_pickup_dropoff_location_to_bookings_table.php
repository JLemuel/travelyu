<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->double('pickup_latitude', 15, 8)->nullable()->after('status');
            $table->double('pickup_longitude', 15, 8)->nullable()->after('pickup_latitude');
            $table->double('dropoff_latitude', 15, 8)->nullable()->after('pickup_longitude');
            $table->double('dropoff_longitude', 15, 8)->nullable()->after('dropoff_latitude');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['pickup_latitude', 'pickup_longitude', 'dropoff_latitude', 'dropoff_longitude']);
        });
    }
};
