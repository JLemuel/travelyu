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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('customer_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->dateTime('check_in')->nullable();
            $table->dateTime('check_out')->nullable();
            $table->unsignedBigInteger('package_id');
            $table->decimal('total_price', 10, 2); // Adding the total_price column
            $table->text('notes')->nullable();
            $table->string('status')->default('pending'); // String column
            $table->timestamps();
        
            // Foreign key constraint for package_id
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            
            // Foreign key constraint for user_id - assuming you have a 'users' table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
