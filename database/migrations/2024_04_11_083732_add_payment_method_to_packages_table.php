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
            // Adding a GCash number column
            $table->string('gcash_number')->nullable()->comment('GCash number for payments');

            // Adding a bank account number column
            $table->string('bank_account_number')->nullable()->comment('Bank account number for payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            // Dropping the GCash number column
            $table->dropColumn('gcash_number');

            // Dropping the bank account number column
            $table->dropColumn('bank_account_number');
        });
    }
};