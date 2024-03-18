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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id'); // Define the destination_id column
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('duration');
            $table->unsignedBigInteger('activities_id'); // Define the activities_id column
            $table->foreign('activities_id')->references('id')->on('activities')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->longText('full_address')->nullable();
            $table->double('lat', 10, 6)->nullable();
            $table->double('lng', 10, 6)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
